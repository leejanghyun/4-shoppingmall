<?php
require_once('./manager/question/init.php');

if(!isset($_SESSION['manager'])){
     header('Location: ./login.php');
}

if(!empty($_REQUEST['table'])){
    
      $table=$_REQUEST['table'];
      $sql="SELECT * FROM shoppingmall.".$table;
    
      if($table=='buy'){//구매 테이블
        $sql="SELECT * FROM shoppingmall.".$table." ORDER BY id";
      }
      else if($table=='question'){// 자주 묻는 질문 등록
        $sql = "SELECT * FROM shoppingmall.$question_tbl";
        
        if(isset($_REQUEST['page'])){ 
            $current_page=$_REQUEST['page']-1;
            $start=$current_page++*$page_size;
        }
        else{
            $current_page=0;
            $start=$current_page++*$page_size;
        }      
        $sql=$sql." ORDER BY no DESC LIMIT 8 offset ".$start;    
      }
      
      $result= mysql_query($sql,$conn);  
}
else if(!empty($_REQUEST['option'])){ //글작성 + 수정하기
    $option=$_REQUEST['option'];
    
    switch($option){
        case 'modify':
            if(isset($_REQUEST['no'])){
                $no=$_REQUEST['no'];
                $sql = "SELECT * FROM shoppingmall.".$question_tbl." where no='$no'" ;
                $result= mysql_query($sql,$conn);
            }
            break;
    }
    
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta charset="utf-8" />
	<title>manager.php</title>
   
    <!-- CSS -->
    <link rel="stylesheet" href="./css/manager.css" type="text/css">
    <link href="boostrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/manager.css" rel="stylesheet">
    <!-- Javascript -->
    <script type="text/javascript" src="./js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="./js/manager.js"></script>
</head>

    <body>
        
        <!-- 최상단-->
        <div class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header">
                <div class="manager_top">
                    <a class="navbar-brand" href="./upload/clothes.php">item insert|</a>
                    <a class="navbar-brand" href="./upload.php"> 상품 업로드 |</a>
                    <a class="navbar-brand" href="<?php $_SERVER['REQUEST_URI']?>?table=person">회원 테이블 |</a>
                    <a class="navbar-brand" href="<?php $_SERVER['REQUEST_URI']?>?table=buy">구매 테이블 |</a>
                    <a class="navbar-brand" href="<?php $_SERVER['REQUEST_URI']?>?table=question">Qusetion 테이블 |</a><a class="navbar-brand" href="./login/logout.php"> 로그아웃 |</a>
                </div>
            </div>
          </div>
        </div>
        
        
        
        <?php if(isset($table)){ ?>
        
        <table class="manager_tbl">
            
           
            <thead> <!-- 테이블  최 상단 -->
    
            <?php if(!strcmp($table,"person")) { //회원 테이블 ?>    
            <tr><th>아이디</th><th>이름</th><th>휴대폰</th><th>주민번호</th><th>date</th><th>point</th><th >주소</th></tr>
            <?php }   
                  else if(!strcmp($table,"buy")){   //구매 테이블    ?>
            <tr><th>물품명</th><th>아이디</th><th>수량</th><th>가격</th><th>포인트</th><th>총결재액</th><th>배송지 주소</th><th>상태</th><th>상태 변경</th></tr>
            <?php }
                  else if(!strcmp($table,"question")){   //구매 테이블    ?>
                <tr><th>no</th><th>Question</th><th>Answer</th><th><a href="<?php $_SERVER['REQUEST_URI']?>?option=write">글쓰기</a></th></tr>
            <?php 
                  }
                ?>    
            </thead>
            <tfoot>
                <?php if(!strcmp($table,"person")) { //회원 테이블 ?>    
                        <tr><th colspan="10">회원 테이블</th></tr>
                <?php }   
                      else if(!strcmp($table,"buy")){   //구매 테이블    ?>
                        <tr><th colspan="10">구매 테이블</th></tr>
                <?php }
                      else if(!strcmp($table,"question")){       //자주 묻는 질문 테이블    ?>
                        <tr><th colspan="10">자주 묻는 질문 테이블</th></tr>   
                <?php
                      }
                ?>
            </tfoot>
            <tbody>
            <?php   if(is_resource($result)){ 
                        while($row= mysql_fetch_array($result)){ 
                            
                            switch($table){
                                case 'person':
                                    echo("<tr><th>".$row['id']."</th><td>".$row['name']."</td><td>".$row['phone']."</td><td>".$row['pid']."</td><td>".substr($row['date'],0,10)."</td><td>".$row['point']."</td><td >".$row['addr']."</td></tr>");
                                    break;
                                case 'buy':
                                    if($row['state']==0){
                                        $state='준비중';
                                    }
                                    else if($row['state']==1) $state='전송완료';
                                    else if($row['state']==2) $state='주문 취소';
                                    $total=$row['num']*$row['amount']-$row['point'];
                                    echo("<tr><th>".$row['name']."</th><td>".$row['id']."</td><td>".$row['num']."</td><td>".$row['amount']."</td><td>".$row['point']."</td><td>".$total."</td><td>".$row['address']."</td><td>".$state."</td><td>
                                    <form  action='./manager/manager.php' method='post'>
                                    <input type='text' class='personal_id' name='id' value='".$row['no'].",".$row['id']."'></input>
                                    <select class='orderstate' name='state'>
                                    <option value='0' selected>준비중</option>
                                    <option value='1'>전송완료</option>
                                    <option value='2'>주문취소</option>
                                    </select>
                                    <input type='submit' name='option' value='삭제'></input>
                                    <input type='submit' name='option' value='갱신'></input>
                                    </form>
                                    </td></tr>");
                                    break;
                                case 'question':
                                    echo("<tr><th>".urlencode($row['no'])."</th><td>".substr($row['Question'],0,100)."</td><td>".substr($row['Answer'],0,100)."</td><td><a href='".htmlspecialchars("./manager.php?option=modify&no=".urlencode($row['no']))."'>수정|</a><a href='".htmlspecialchars("./manager/question/delete.php?no=".urlencode($row['no']))."'>삭제|</a></td></tr>");
                                    break;
                            }
                        }
                    } 
                } ?>
            </tbody>
        </table>
        
        <!-- 글쓰기  최 상단 -->
        <?php if(isset($option)) { //글쓰기  + 글수정 
        
                switch($option){  
                    case 'write':
                    case 'modify':
                ?>
                    <div class='manager_question'>
                        <?php if(!strcmp($option,"write")){ ?>
                        <form action="./manager/question/write.php" method="post">
                        <?php }else { ?>
                        <form action="./manager/question/modify.php?no=<?=$no ?>" method="post">
                        <?php $row= mysql_fetch_array($result);
                                    } ?>
                            자주 묻는 질문 : <br><textarea name="title" rows="2" cols="50">
                                <?php 
                                    if(!strcmp($option,'modify')){
                                        echo($row['Question']);
                                    }
                                ?>
                            </textarea><br>
                            답변 : <br><textarea name="comment" rows="2" cols="50">
                                 <?php 
                                    if(!strcmp($option,'modify')){
                                        echo($row['Answer']);
                                    }
                                ?>
                                </textarea><br>
                            <input type="submit" value="등록">
                          
                        </form>
                    </div>
            <?php 
                    break;
                }
            }
        ?>  
    </body>
</html>

