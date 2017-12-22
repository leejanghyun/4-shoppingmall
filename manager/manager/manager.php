<?php
require_once('../../db/database.php');
$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("remove.php error");


$id=$_POST['id'];
$arr = split(',',$id);
$no=$arr[0];
$id=$arr[1];
$state=$_POST['state'];
$option=$_POST['option'];

if(isset($id) && isset($state) && $option=="갱신"){
    $sql="UPDATE shoppingmall.$buy_tbl SET `state`='$state' where `id`='$id' and `no`='$no' "; 
    echo($sql);
    mysql_query($sql,$conn)or die(mysql_error());   
}
else if(isset($id) && isset($state) && $option=="삭제"){
    $sql="delete from shoppingmall.$buy_tbl where `id`='$id' and `no`='$no' "; 
    echo($sql);
    mysql_query($sql,$conn)or die(mysql_error());   
}
    header('Location: ../manager.php?table=buy');

?>
