<?php
    require_once('../../../db/database.php');
    session_start();
    $conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("comment_insert.php error");
 
    $name=$_POST['objname'];
  
    if( strlen($_POST['user_title'])<5 || strlen($_POST['user_comment'])<5 ){
        
        echo ("<script language='JavaScript'>
        window.alert('제목이나 내용은 5글자 이상 작성 해주세요')
        window.location.href='../commentWrite.php?name=$name';
        </script>");
    }
    else{
        $title= $_POST["user_title"];
        $comment= $_POST["user_comment"];
        $userId= $_SESSION['id'];
        $date = date('Y-m-d H:i:s', time());
        $sql="insert into shoppingmall.$comment_tbl (`no`,`name`,`id`,`date`,`title`,`comment`,`view`) VALUES ( NULL ,'$name','$userId','$date','$title','$comment','0')"; 
        echo $sql;
        $result = mysql_query($sql,$conn)or die(mysql_error());   
        header('Location: ../../../main/main.php?id=buy&name='.$name);
    }
?>