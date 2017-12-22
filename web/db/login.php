<?php
	session_start();
	require_once('./database.php');
  	$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("login.php error");

  	$userId=$_POST["userid"];
    $userPw=$_POST["pw"];

    $regexp = '/^[0-9A-Za-z]{2,20}$/';

    if(!preg_match($regexp ,$userId))
    {  echo ("<script language='JavaScript'>
        window.alert('id 양식 오류 (4~10글자숫자영문 조합)');
        window.location.href='../main/main.php?id=login';
        </script>");
    }
    else{
        $regexp = '/^.*(?=^.{8,15}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/';
        if(!preg_match($regexp ,$userPw)){
            echo ("<script language='JavaScript'>
            window.alert('pw 양식 오류(특수문자 영문 혼합 8~15문자)');
            window.location.href='../main/main.php?id=login';
            </script>");
        }
        else{

            $sql = "SELECT * FROM shoppingmall.$person_tbl WHERE id='".$userId."' and pw='".$userPw."'";
            $result = mysql_query($sql,$conn);
            $count = mysql_num_rows($result);

            if($count==0){//잘못입력
               echo ("<script language='JavaScript'>
                window.alert('id나pw 다시 확인 부탁드립니다.');
                window.location.href='../main/main.php?id=login';
                </script>");
            }
            else{//올바르게 입력
                $_SESSION['id']=$userId;
                $_SESSION['is_login']=true;
                header('Location: ../main/main.php');
            }
        }
    }
?>
