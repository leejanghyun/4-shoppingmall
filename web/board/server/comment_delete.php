<?php
    require_once('../../db/database.php');
    session_start();
    $conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("comment_delete.php error");

	$userId= $_SESSION['id'];
    $no= $_REQUEST['no'];

    $sql="delete from shoppingmall.$comment_tbl where id='$userId' and no='$no'";
    echo $sql;
    mysql_query($sql,$conn)or die(mysql_error());

      header('Location:../../main/main.php?id=board');
?>
