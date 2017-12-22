<?php
require_once('../../db/database.php');
$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("upload/remove.php error");
header("Content-Type: text/html; charset=UTF-8");
$name = $_GET['name'];
$sql="delete from shoppingmall.$clothes_tbl where name='$name'";
mysql_query($sql,$conn)or die(mysql_error()); 
header('Location: ../upload.php');
?>