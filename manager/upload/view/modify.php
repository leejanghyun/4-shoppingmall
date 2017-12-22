<?php
require_once('../../../db/database.php');
$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("modify.php error");

$code=$_POST['name'];
$type=$_POST['type'];

if(strlen($code)<1 || strlen($type)<1 ){
    echo ("<script language='JavaScript'>
    window.alert('error')
    window.location.href='../../upload.php';
    </script>");
}
else{
    $sql="UPDATE shoppingmall.$clothes_tbl SET `type`='$type' where `name`='$code'"; 
    mysql_query($sql,$conn)or die(mysql_error());   
}
header('Location: ../../upload.php');

?>
