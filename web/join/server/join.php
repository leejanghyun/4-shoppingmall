<?php
// 아이디 길이:4-10  숫자,문자만 허용
require_once "../../db/database.php";
$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("form_register.php error");

$password =$_POST["password"];
$name =$_POST["name"];
$id =$_POST["user_id"];
$ssn1 =$_POST["ssn1"];
$ssn2 =$_POST["ssn2"];

$birth_year =$_POST["birth_year"];
$birth_month =$_POST["birth_month"];
$birth_day =$_POST["birth_day"];

$inAddr1 =$_POST["inAddr1"];
$inAddr2 =$_POST["inAddr2"];//주소

$inZip1 =$_POST["inZip1"];
$inZip2 =$_POST["inZip2"];//우편번호

$Fphone =$_POST["Fphone"];
$Mphone =$_POST["Mphone"];
$Lphone =$_POST["Lphone"];



if(!preg_match("/[0-9]{6}/", $ssn1)){//숫자 6자리
      echo ("<script language='JavaScript'>
        window.alert('주민등록번호를 채워주세요')
        window.location.href='../../main/main.php?id=join';
        </script>");
}elseif(!preg_match("/[0-9]{7}/", $ssn2)){//숫자 7자리
      echo ("<script language='JavaScript'>
        window.alert('주민등록번호를 채워주세요')
        window.location.href='../../main/main.php?id=join';
        </script>");
}
elseif(!preg_match("/[0-9]{4}/", $birth_year)){//숫자 4자리
      echo ("<script language='JavaScript'>
        window.alert('생일 년도를 채워주세요')
        window.location.href='../../main/main.php?id=join';
        </script>");
}elseif(!preg_match("/0[0-9]|1[0-2]/", $birth_month)){//00~12
      echo ("<script language='JavaScript'>
        window.alert('생일 달을 채워주세요')
        window.location.href='../../main/main.php?id=join';
        </script>");
}elseif(!preg_match("/0[0-9]|1[0-9]|2[0-9]|3[0-1]/", $birth_day)){//00~31
      echo ("<script language='JavaScript'>
        window.alert('생일 일을 채워주세요')
        window.location.href='../../main/main.php?id=join';
        </script>");
}elseif(!preg_match("/^[0-9A-Z][0-9A-Z_-]{3,11}$/i", $id)){//한글X 영문숫자 3~11자리
      echo ("<script language='JavaScript'>
        window.alert('아이디 양식을 정확히 입력하시오')
        window.location.href='../../main/main.php?id=join';
        </script>");
}
elseif(!preg_match('/^.*(?=^.{8,15}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/' ,$password)){  //영문특수문자포함8~15자리
     echo ("<script language='JavaScript'>
        window.alert('비밀번호는 영문숫자특수문자포함8~15')
        window.location.href='../../main/main.php?id=join';
        </script>");

}
elseif(!preg_match("/[0-9]{3}/" ,$Fphone)){  //영문특수문자포함8~15자리
    echo ("<script language='JavaScript'>
        window.alert('휴대폰양식 올바르게 입력하시오')
        window.location.href='../../main/main.php?id=join';
        </script>");
}elseif(!preg_match("/[0-9]{4}/" ,$Mphone)){  //영문특수문자포함8~15자리
    echo ("<script language='JavaScript'>
        window.alert('휴대폰양식 올바르게 입력하시오')
        window.location.href='../../main/main.php?id=join';
        </script>");
}
elseif(!preg_match("/[0-9]{4}/" ,$Lphone)){  //영문특수문자포함8~15자리
    echo ("<script language='JavaScript'>
        window.alert('휴대폰양식 올바르게 입력하시오')
        window.location.href='../../main/main.php?id=join';
        </script>");
}



$pid = $ssn1.$ssn2;
$phone = $Fphone.$Mphone.$Lphone;
$addr =$inZip1.$inZip2.$inAddr1.$inAddr2;

$joindate= date('ymd');


$sql="ALTER TABLE shoppingmall.$person_tbl AUTO_INCREMENT=1";
$result = mysql_query($sql,$conn);
$sql="SET @COUNT = 0";
$result = mysql_query($sql,$conn);
$sql="update shoppingmall.$person_tbl SET shoppingmall.$person_tbl.no = @COUNT:=@COUNT+1";
$result = mysql_query($sql,$conn);
$date = date('Y-m-d H:i:s', time());

$sql="INSERT INTO shoppingmall.$person_tbl(`id`,`name`,`pw`,`phone`,`addr`,`order_addr`,`pid`,`date`,`point`) VALUES ( '".$id."', '".$name."','".$password."','".$phone."','".$addr."','".$addr."','".$pid."','".$date."',1000)";
$result = mysql_query($sql,$conn);


echo ("<script language='JavaScript'>
        window.alert('회원가입을 축하합니다.')
        window.location.href='../../main/main.php?id=login';
        </script>");

$idch = $_POST['user_id'];

$sql = "SELECT * FROM shoppingmall.$person_tbl WHERE id='".$idch."'";
$result = mysql_query($sql,$conn);
$count = mysql_num_rows($result);
if($count==0){
	echo json_encode("<span style='color:green;'>asdasdfadsfasfadf.</span>",JSON_HEX_TAG | JSON_HEX_APOS |JSON_HEX_QUOT |JSON_HEX_AMP);
}
else{
	echo json_encode("<span style='color:red;'>bbbbbbb.</span>",JSON_HEX_TAG | JSON_HEX_APOS |JSON_HEX_QUOT |JSON_HEX_AMP);
}
?>
