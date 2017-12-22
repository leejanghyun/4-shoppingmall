<?php
if(!isset($_SESSION['is_login'])){//정상적이지 않은 접근
		header('Location: http://localhost/web/main/main.php?id=login');
}
//프라이머리키 재정렬
$sql="ALTER TABLE shoppingmall.$comment_tbl AUTO_INCREMENT=1";
$result = mysql_query($sql,$conn);
$sql="SET @COUNT = 0";
$result = mysql_query($sql,$conn);
$sql="update shoppingmall.$comment_tbl SET shoppingmall.$comment_tbl.no = @COUNT:=@COUNT+1";
$result = mysql_query($sql,$conn);
$page_size=8;//한페이지당 10개의 댓글을 불러온다.
$result=mysql_query("SELECT count(*) FROM shoppingmall.$comment_tbl",$conn);
$result_row=mysql_fetch_row($result);
$total_row = $result_row[0];//현재 저장된 댓글의 총 갯수

if($total_row<=0) $total_row=0;
$total_page = floor(($total_row-1) /$page_size)+1;
$sql = "SELECT * FROM shoppingmall.$comment_tbl";

if(isset($_REQUEST['page'])){  // paging 관련
    $page=$_REQUEST['page'];
}
if(isset($page)){
        $current_page=$page-1;
        $start=$current_page++*$page_size;
        $sql=$sql." ORDER BY no DESC LIMIT $page_size offset ".$start;
}
else{
    $current_page=0;
    $start=$current_page++*$page_size;
    $sql=$sql." ORDER BY no DESC LIMIT $page_size offset ".$start;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>자유게시판</title>
</head>
<body onresize="parent.resizeTo(500,400)" onload="parent.resizeTo(500,400)">


    <div id="container">

        <div id="boardView">


                <table class="boardtable">
                    <tr><th>no</th><th>작성시간</th><th>아이디</th><th>제목</th><th>조회</th><th>수정</th>
                    <th>삭제</th>
                    </tr>

                    <?php

                        $result = mysql_query($sql,$conn);

                        if(is_resource($result)){

                            while($row= mysql_fetch_array($result)){

                              ?>
                    <tr>
                        <td><span>no:<?php echo substr($row['no'],0,10)?></span></td>
                        <td><span><?php echo substr($row['date'],0,10)?></span></td>
                        <td><span><?php echo $row['id']?></span></td>
                        <td><span id="boardContent"><?php echo"<a href='".htmlspecialchars("./main.php?id=commentModify&no=".urlencode($row['no']))."'>".substr($row['title'],0,15)."</a>"?></span></td>
                        <td><span id="boardHit"><?php echo $row['view']?></span></td>

                    <?php
                          if($row['id']===$_SESSION['id']){
                               echo "<td><span><a href='".htmlspecialchars("./main.php?id=commentModify&no=".urlencode($row['no']))."'>수정</a></span></td>";
                               echo "<td><span><a href='".htmlspecialchars("../board/server/comment_delete.php?no=".urlencode($row['no']))."'>삭제</a></span></td>";?>
                        </tr><br>
                    <?php     }
                        }
                    }?>
                    </table>

                    <div class='boardpage'>

                    <?php

                        if(!(1>( ($current_page-1)/8))){
                          echo "<a class='boardL_no' href='".htmlspecialchars("./main.php?id=board&page=".urlencode( $current_page-7))."'> < </a>";
                        }
                        $start=(int)(($current_page-1)/8);//8개로나눔
                        $start=$start*8+1;
                        $end=$start+8;
                        $i=$start;

                        for($i;$i<$end;$i++){
                            if($i>$total_page){
                                break;
                            }
                         echo "<a class='boardno' href='".htmlspecialchars("./main.php?id=board&page=".urlencode($i))."'>".$i."</a>";
                        }
                        if($i<=$total_page){
                           
                            echo "<a class='boardR_no' href='".htmlspecialchars("./main.php?id=board&page=".urlencode($end))."'>  > </a>";
                         }
                    ?>

                    </div>

		</div>
    </div>
</body>
</html>
