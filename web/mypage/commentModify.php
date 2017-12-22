<?php
    require_once('./server/comment_view.php');
    if(isset($_REQUEST['no'])){        
        $no=$_REQUEST['no'];
    }   
    $sql=$sql." where no='".$no."'";
    $result=mysql_query($sql,$conn);
    $result_row=mysql_fetch_array($result);
?>

<!DOCTYPE html>
<html>
	 <head>
		  <title>comment view</title>
		  <meta name="author" content="4조"/>
		  <meta name="description" content="view_comment.php"/>
         <link rel="stylesheet" href="./css/commentModify1.css" type="text/css">
          <script type="text/javascript" src="./js/view_comment.js"></script>   
	 </head> 

        <body>
              <div id="container">
                <form action="./server/comment_update.php?no=<?= $no ?>" method="post">
                    <table class="blueone">
                        <tr><th>no.<?=$no?> <?=$result_row['id']?>님 </th></tr>
                        <tr><td>제목 <textarea name="user_title" id="title"><?php echo $result_row['title']?></textarea></td></tr>
                        <tr><td><textarea name="user_comment" id="comment" ><?php echo $result_row['comment']?></textarea></td></tr>
         
                        <tr><td class="btn"><input class='modify' type="submit" value="수정"></td></tr>
                    </table>
                </form> 
            
               
            </div>
    	</body>
</html>
