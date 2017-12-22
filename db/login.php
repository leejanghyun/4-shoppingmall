<?php
	session_start();
	require_once('./database.php');
  	$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("login.php error");

  	$userId=$_POST["userid"];
    $userPw=$_POST["pw"];

    $regexp = '/^[0-9A-Za-z]{4,10}$/';

    if(!preg_match($regexp ,$userId))
    {  echo ("<script language='JavaScript'>
        window.alert('id 양식 오류')
        </script>");
       header('../main/main.php?id=login');
    }
    else{
        $regexp = '/^.*(?=^.{8,15}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/';
        if(!preg_match($regexp ,$userPw)){
            echo ("<script language='JavaScript'>
            window.alert('pw 양식 오류')
            </script>");
            header('../main/main.php?id=login');
        }
        else{

            $sql = "SELECT * FROM shoppingmall.$person_tbl WHERE id='".$userId."' and pw='".$userPw."'";
            $result = mysql_query($sql,$conn);
            $count = mysql_num_rows($result);

            if($count==0){//잘못입력
               echo ("<script language='JavaScript'>
                window.alert('id나pw 다시 확인 부탁드립니다.')
                </script>");
               header('Location: ../main/main.php?id=login');
            }
            else{//올바르게 입력
                $_SESSION['id']=$userId;
                $_SESSION['is_login']=true;
                header('Location: ../main/main.php');
            }
        }
    }
?>
