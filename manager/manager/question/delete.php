<?php
    require_once('../../../db/database.php');
    $conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("comment_delete.php error");
    $no= $_REQUEST['no'];
    $sql="delete from shoppingmall.question where no='$no'";
    mysql_query($sql,$conn)or die(mysql_error());   
    header('Location: ../../manager.php?table=question');
?>
