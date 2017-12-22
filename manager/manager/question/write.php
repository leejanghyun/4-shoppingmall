<?php   
    require_once('../../../db/database.php');   
  	$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("write.php error");

   if($_POST['title']=='' || $_POST['comment']==''){
        echo ("<script language='JavaScript'>
        window.alert('입력 양식을 모드 채워주세요')
        window.location.href='../../manager.php?option=write';
        </script>");
    }
    else if( strlen($_POST['title'])<3 || strlen($_POST['comment'])<3 ){
        echo ("<script language='JavaScript'>
        window.alert('제목이나 내용은 3글자 이상 작성 해주세요')
        window.location.href='../../manager.php?option=write';
        </script>");
    }
    else{
        $title= $_POST["title"];
        $comment= $_POST["comment"];
        
        $date = date('Y-m-d H:i:s', time());
    
        $sql="INSERT INTO shoppingmall.question(`no`,`Question`,`Answer`,`date`) VALUES ( NULL , '".$title."','".$comment."','".$date."')";

        $result = mysql_query($sql,$conn)or die(mysql_error());   
        header('Location: ../../manager.php?table=question');
    }
    
?>
