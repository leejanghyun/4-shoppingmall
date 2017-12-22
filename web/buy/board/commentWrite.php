<?php
    session_start();
?>

<!DOCTYPE html>
<html>
	 <head>
		  <title>my comment</title>
		  <meta name="author" content="4조"/>
		  <meta name="description" content="comment.php"/>
          <link rel="stylesheet" href="./css/commentWrite.css" type="text/css">
	 </head>

        <body>
         <div id="container">
                <form action="./server/comment_insert.php" method="post">
                      <table class="blueone">
                        <tr><th><?=$_SESSION['id']?>님</th></tr>
                        <textarea id='erase_name' cols="10" rows="1" name="objname"><?php echo $_GET['name']?></textarea>
                        <tr><td>제목 <textarea name="user_title" id="title"></textarea></td></tr>
                        <tr><td><textarea name="user_comment" id="comment" ></textarea></td></tr>
                        <tr><td><input class='btn' type="submit" value="등록"></td></tr>
                    </table>

                </form>
            </div>
    	</body>
</html>
