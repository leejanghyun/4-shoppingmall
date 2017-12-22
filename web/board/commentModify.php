<?php
$sql = "SELECT * FROM shoppingmall.$comment_tbl";

    if(isset($_REQUEST['no'])){
        $no=$_REQUEST['no'];
    }

    if(isset($_SESSION['id'])==''){
        header('Location: ../../login.php');
    }
    $sql=$sql." where no='".$no."'";
    $result=mysql_query($sql,$conn);
    $result_row=mysql_fetch_array($result);

?>

<!DOCTYPE html>
<html>
	 <head>
		  <title>댓글 보기</title>
		  <meta name="author" content="4조"/>
		  <meta name="description" content="view_comment.php"/>
	 </head>

        <body>
             
                <form action="../board/server/comment_update.php?no=<?php echo $no ?>" method="post">

                 
                    <div > no.<?=$no?> <?=$result_row['id']?>님 작성글 </div> 
                    <div class='commentmodify_title'>제목</div>
                    <div> <textarea  cols="100" rows="2" class='cm_textarea' <?php if(strcmp($_SESSION['id'],$result_row['id'])) echo('disabled') ?> name="user_title" ><?php echo $result_row['title']?></textarea> </div>
                    <div class='commentmodify_comment'>내용</div>
                    <div><textarea cols="100" rows="10" class='cm_textarea' <?php if(strcmp($_SESSION['id'],$result_row['id'])) echo('disabled') ?>  name="user_comment"  ><?php echo $result_row['comment']?></textarea></div>
                        
                  <?php
                    if($_SESSION['id']==$result_row['id'])//내가 작성한 글
                    {?>
                    <div><input class='commentmodify' type="submit" value="수정"></div>
                </form>

                <?php
                    }
                ?>

    	</body>
</html>
