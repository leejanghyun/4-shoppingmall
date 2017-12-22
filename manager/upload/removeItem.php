<?php
require_once('../../db/database.php');
$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("inser.php error");

if(isset($_POST['kind_object'])){
    
    $kind_object=$_POST['kind_object'];
    $arr = split(',',$kind_object);
    $kind=$arr[0];
    $object=$arr[1];

    $sql="delete from shoppingmall.$item_tbl where kind='$kind' and object='$object'";
    $result = mysql_query($sql,$conn)or die(mysql_error());   
    $sql="delete from shoppingmall.$clothes_tbl where kind='$kind' and object='$object'";
    $result = mysql_query($sql,$conn)or die(mysql_error()); 
    header('Location: ../upload.php');
    
}
else{
        header('Location: ../upload.php');
}
?>