<?php
if(!isset($_SESSION['is_login'])){
     header('Location: ./main.php?id=login');
}
mysql_query("set names utf8");//한글꺠짐 방지


$person=$_SESSION['id'];
$sql = "SELECT point FROM  shoppingmall.".$person_tbl." where id='$person'";
$result = mysql_query($sql,$conn);

$sql1 = "SELECT count(name) as name ,sum(num*amount) as total, sum(amount*num) as amount, sum(num) as num FROM  shoppingmall.".$buy_tbl." where id='$person' group by id";
$result1 = mysql_query($sql1,$conn);
$sql2 = "SELECT sum(amount*num) as amount ,name,address FROM  shoppingmall.".$buyhistory_tbl." where id='$person' group by id";
$result2 = mysql_query($sql2,$conn);


if(isset($_REQUEST['param'])){//조건 검색이 설정되있는경우
    $param=$_REQUEST['param'];
    switch($param){
        case 0:
            $page=$_REQUEST['page'];
            $page_size=8;//한페이지당 8개
            $count_result=mysql_query("SELECT count(*) FROM shoppingmall.".$buyhistory_tbl." where id='$person' ",$conn);
            $result_row=mysql_fetch_row($count_result);
            $total_row = $result_row[0];//현재 저장된 댓글의 총 갯수
            if($total_row<=0) $total_row=0;
            $total_page = floor(($total_row-1) /$page_size)+1; 
            $current_page= $page-1;
            $start=$current_page++*$page_size;
            $sql3="SELECT * FROM  shoppingmall.".$buyhistory_tbl." where id='$person'";
            $sql3=$sql3." LIMIT 8 offset ".$start;
            break;
        case 1:
            $sql3="SELECT * FROM  shoppingmall.".$person_tbl." where id='$person'";
            break;
        case 3:
            $sql3="SELECT * FROM  shoppingmall.".$person_tbl." where id='$person'";
            break;
        case 4:  //댓글
            $page=$_REQUEST['page'];
            $page_size=8;//한페이지당 8개
            $count_result=mysql_query("SELECT count(*) FROM shoppingmall.".$comment_tbl." where id='$person' ",$conn);
            $result_row=mysql_fetch_row($count_result);
            $total_row = $result_row[0];//현재 저장된 댓글의 총 갯수
            if($total_row<=0) $total_row=0;
            $total_page = floor(($total_row-1) /$page_size)+1; 
            $current_page=$page-1;
            $start=$current_page++*$page_size;
            $sql3="SELECT * FROM  shoppingmall.".$comment_tbl." where id='$person'";
            $sql3=$sql3." ORDER BY no DESC LIMIT 8 offset ".$start;       
            break;
        case 5:
            $sql3="SELECT order_addr FROM  shoppingmall.".$person_tbl." where id='$person'";
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>마이 페이지</title>      
  
  </head>

    <div id="container">
			<!-- #########content######### -->
			<div id="contents">
                <div class="inner_wrap">
                    
                    <div class="xans-element- xans-myshop xans-myshop-benefit">

                         <div class="infoWrap ">

                            <div class="myInfo">
                                <p class="">저희 쇼핑몰을 이용해 주셔서 감사합니다. <strong class="name"><span><?php echo($person)?></span></strong> 님의 회원정보</p>
                            </div>
                        </div>
                    </div>
                </div>

        <div class="xans-element- xans-myshop xans-myshop-bankbook"><ul>
            
        <li class=" ">
                    <strong class="title">가용적립금</strong>
                    <strong class="data use">&nbsp;
                    <?php
                        while($row=mysql_fetch_array($result)){
                            $point=$row['point'];
                            if($point>5000){
                                echo($point);
                            }
                            else{
                                echo('0원');
                            }
                        }
                        while($row=mysql_fetch_array($result1)){
                            $amount=$row['amount'];
                            $num=$row['num'];
                            $name=$row['name'];
                        }
                        while($row=mysql_fetch_array($result2)){
                            $accumulate_amount=$row['amount'];   
                        }
                    ?>
                        
                    </strong>
                </li>
                <li class="">
                    <strong class="title">총적립금</strong>
                    <strong class="data"><?php 
                        if(isset($point))
                        echo($point."원"); ?></strong>
                </li>
              
                <li class="">
                    <strong class="title">현재 진행중인 배송상품</strong>
                    <strong class="data"><?php 
                        if(isset($amount) && isset($name) && isset($num) ){
                        echo( $amount.'원('.$name.'개 상품-'.$num.'개)');} ?></strong>
                </li>
                <li class="etc">
                    <strong class="title">총 누적구매</strong>
                    <strong class="data"><?php 
                        if(isset($accumulate_amount)){
                        echo($accumulate_amount.'원');} ?></strong>
                </li>
            </ul>
        </div>

        <div id="myshopMain" class="xans-element- xans-myshop xans-myshop-main ">
          <div class="shopMain order">
              <a href="./main.php?id=mypage&param=0&page=1">
                <h3><strong>order</strong>주문내역 조회</h3>
                <p>고객님께서 주문하신 상품의 주문내역을 확인하실 수 있습니다.<br>비회원의 경우, 주문서의 주문번호와 비밀번호로 주문조회가 가능합니다.</p></a>
            </div>  
        <div class="shopMain profile">
            <a href="./main.php?id=mypage&param=1">
                <h3><strong>profile</strong>회원 정보</h3>
                <p>회원이신 고객님의 개인정보를 관리하는 공간입니다.<br>개인정보를 최신 정보로 유지하시면 보다 간편히 쇼핑을 즐기실 수 있습니다.</p></a>
            </div>
        <div class="shopMain mileage" >
              <a href="./main.php?id=mypage&param=3">
                <h3><strong>mileage</strong>적립금</h3>
                  <p>적립금은 상품 구매 시 사용하실 수 있습니다.<br>적립된 금액은 현금으로 환불되지 않습니다.</p></a>
            </div>
        <div class="shopMain board">
              <a href="./main.php?id=mypage&param=4&page=1">
                <h3><strong>board</strong>게시물 관리</h3>
                  <p>고객님께서 작성하신 게시물을 관리하는 공간입니다.<br>고객님께서 작성하신 글을 한눈에 관리하실 수 있습니다.</p></a>
            </div>
        <div class="shopMain address">
              <a href="./main.php?id=mypage&param=5">
                <h3><strong>address</strong>배송 주소록 관리</h3>
                  <p>자주 사용하는 배송지를 등록하고 관리하실 수 있습니다.</p></a>
            </div>
        </div>
        </div><!-- #########content######### -->
         <?php if(isset($param)){ ?>
        <div class='right-content'>
            <table id='mypagetbl'>
            <?php $result3 = mysql_query($sql3,$conn); ?>
        
            <?php
                if($param==0){
            ?>
                
                <tr><th>상품 명</th><th>가격</th><th>갯수</th><th>주문 날짜</th><th>배송 주소</th><th>배송 상태</th></tr>
            <?php }else if($param==1){ ?>
                <tr><th>회원 정보</th></tr>
            
            <?php } else if($param==3){ ?>
                <tr><th>포인트</th></tr>       
            <?php } else if($param==4){ ?>
                <tr><th>제목</th><th>내용</th><th>작성일</th><th>수정</th><th>삭제</th></tr>
            <?php }else if($param==5){ ?>
                <tr><th>자주 사용하는 배송지</th></tr>       
            <?php } 
                 while($row=mysql_fetch_array($result3)){
                     
                    switch($param){
                        case 0:
                        ?>    
                        <tr><td><span><?php echo ($row['name'])?></span></td>
                        <td><span><?php echo($row['amount'])?></span></td>
                        <td><span><?php echo($row['num'])?></span></td>
                        <td><span><?php echo($row['date'])?></span></td>
                        <td><span><?php echo($row['address'])?></span></td>
                        <?php
                            if($row['state']==0){ ?>
                                <td><span>배송 완료</span></td>
                        <?php
                            }  
                            else{ ?>
                                <td><span>진행 중</span></td>
                        <?php }
                        ?>
                        </tr>
                 <?php      break;
                        case 1:
                            echo('<tr><td><span> >이름: '.$row['name'].'</span></td></tr>');
                            echo('<tr><td><span> >아이디: '.$row['id'].'</span></td></tr>');
                            echo('<tr><td><span> >주소: '.$row['addr'].'</span></td></tr>');
                            echo('<tr><td><span> >주민 번호: '.$row['pid'].'</span></td></tr>');
                            echo('<tr><td><span> >가입 날짜: '.$row['date'].'</span></td></tr>');
                            echo('<tr><td><span> >포인트: '.$row['point'].'</span></td></tr>');
                            echo("<tr><td><a href='../mypage/changeInfo.php?param=0' ><strong>정보 변경</strong></a></tr></td>");
                            break;
                        case 3:
                            echo('<tr><td><span> >포인트: '.$row['point'].' 점</span></td></tr>');
                            break;
                        case 4:
                            echo('<tr><td><span> 제목: '.substr($row['title'],0,15).'</span></td>');
                            echo('<td><span> 내용: '.substr($row['comment'],0,15).'</span></td>');
                            echo('<td><span> 날짜: '.$row['date'].'</span></td>');
                            echo "<td><span><a href='".htmlspecialchars("../mypage/commentModify.php?no=".urlencode($row['no']))."'>수정</a></span></td>";
                            echo "<td><span><a href='".htmlspecialchars("../mypage/server/delete.php?no=".urlencode($row['no']))."'>삭제</a></span></td></tr>";
                            break;        
                        case 5:
                            echo('<tr><td><span> >배송지 : '.$row['order_addr'].'</span></td></tr>');
                            echo("<tr><td><a href='../mypage/changeInfo.php?param=1'><strong>정보 변경</strong></a></tr></td>");
                            break;
                    }
                }
            ?>
            </table>
              
            <?php
                    if(isset($page)){
                        if(!(1>( ($current_page-1)/8))){
                          echo "<a class='myLno' href='".htmlspecialchars("./mypage.php?param=4&page=".urlencode( $current_page-7))."'> < </a>";
                        }
                        $start=(int)(($current_page-1)/8);//8개로나눔
                        $start=$start*8+1;
                        $end=$start+8;
                        $i=$start;
                      
                        for($i;$i<$end;$i++){
                            if($i>$total_page){
                                break;
                            }
                         echo "<a class='myno' href='".htmlspecialchars("./main.php?id=mypage&param=$param&page=".urlencode($i))."'>".$i."</a>";
                        }
                         if($i<=$total_page){
                            echo "<a class='myRno' href='".htmlspecialchars("./main.php?id=mypage&param=$param&page=".urlencode($end))."'>  > </a>";
                         }
                    }   
                    ?>
            
            <?php } ?>
        </div>
    </div><!-- #########container######### -->
</html>