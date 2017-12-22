<?php
    require_once('../../db/database.php');
    session_start();
  	$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("comment_view.php error");
    $sql = "SELECT * FROM shoppingmall.$comment_tbl";
?>
