<?php
  require_once './database.php';
  $conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("form_register.php error");
  printf("MySQL server version: %s\n",  phpinfo());
/*
  $userId=$_POST["userid"];
  $userName=$_POST["name"]; 
  $userPw=$_POST["password"];
  $userPid=$_POST["personal_id"];
  $userPhone=$_POST["phone"];

  $sql="INSERT INTO shoppingmall.$person_tbl(`no`,`id`,`name`,`password`,`phone`) VALUES ( NULL , '".$userId."', '".$userName."','".$userPw."','".$userPhone."')";
  $result = mysql_query($sql,$conn);

  //프라이머리키 재정렬
  $sql="ALTER TABLE shoppingmall.$person_tbl AUTO_INCREMENT=1";
  $result = mysql_query($sql,$conn);
  $sql="SET @COUNT = 0";
  $result = mysql_query($sql,$conn);
  $sql="update shoppingmall.$person_tbl SET shoppingmall.$person_tbl.no = @COUNT:=@COUNT+1";
  $result = mysql_query($sql,$conn);



  header('Location: ../login.php');
*/
?>


