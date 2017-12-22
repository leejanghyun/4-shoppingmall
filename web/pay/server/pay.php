<?php
require_once "../../../db/database.php"; 
header("Content-type:text/html;charset=UTF-8");
$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("form_register.php error");


$username = $_POST["username"];
$HowToPay=$_POST["HowToPay"];
$use_point =$_POST["use_point"];
$allprice =$_POST["allprice"];
$my_save = $_POST["my_save"]; //내가갖는 포인트
$name=$_POST["name"]; //옷의이름
$price=$_POST["price"]; // 옷의가격 
$quantity = $_POST["quantity"]; // 구매한 옷의 량
$option1 =$_POST["option1"]; // 구매한 옷의 종류
$address1 =$_POST["address1"];
$address2 =$_POST["address2"];
$address= $address.$address;
$zip_code =$_POST["zip_code"];


$sql1="select * from shoppingmall.person WHERE name='".$username."'";
mysql_query("set names utf8");//한글꺠짐 방지   
$result1= mysql_query($sql1,$conn);
$my_save = 5000;
$use_point = 3000;
if(is_resource($result)){
    
    if($row=mysql_fetch_array($result)){
    $my_save = $row['my_save']; //내가 갖고있는 포인트를 가져온다       
    }
}

if(0<$use_point<2000){//숫자 6자리
  echo ("<script language='JavaScript'>
    window.alert('포인트는 2000원 이상부터 사용가능합니다')
    window.location.href='../pay.php';
  </script>");
}

else if(0>$use_point){//마이너스포인트 사용시
  echo ("<script language='JavaScript'>
    window.alert('포인트는 200원 이상부터 사용할 수 있습니다.')
    window.location.href='../pay.php';
    </script>");
}
else if($my_save<$use_point){//숫자 6자리
  echo ("<script language='JavaScript'>
    window.alert('포인트는 갖고있는 포인트 보다 많은 값을 사용할 수 없습니다.')
    window.location.href='../pay.php';
    </script>");
}


$sql2="INSERT INTO shoppingmall.last(`no`,`UserName`,`Itemname`,`Ioption`,`Price`,`quantity`,`allprice`,`HowToPay`,`Use_User_Point`,`zip_code`,`address` ) VALUES ( NULL , '".$username."', '".$name."','".$option1."','".$price."','".$quantity."','".$allprice."','".$HowToPay."','".$use_point."','".$zip_code."','".$address."')";
$result = mysql_query($sql2,$conn);






?>