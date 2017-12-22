<?php
require_once('../../db/database.php');
$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("inser.php error");

if(isset($_POST['kind']) && isset($_POST['object'])){
    
    $kind=$_POST['kind'];
    $object=$_POST['object'];
    
    if($kind=='' || $object==''){
        echo ("<script language='JavaScript'>
        window.alert('입력 양식을 모드 채워주세요')
        window.location.href='../upload.php';
        </script>");
    }
    else{
        $date = date('Y-m-d H:i:s', time());
        $sql="INSERT INTO shoppingmall.$item_tbl(`kind`,`object`,`date`) VALUES ('$kind','$object','$date')";
        $result = mysql_query($sql,$conn)or die(mysql_error());   
        header('Location: ../upload.php');
      
    }
}
else{
    header('Location: ../upload.php');
}
?>