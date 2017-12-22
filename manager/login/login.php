<?php
	require_once('../../db/database.php');
	session_start();  	
    $conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("login.php error");
  
  	$id=$_POST["managerid"];
	$pw=$_POST["managerpw"];

    $regexp = '/^[0-9A-Za-z]{11}$/'; 
     
    if(!preg_match($regexp ,$id))
    {  echo ("<script language='JavaScript'>
        window.alert('아이디오류');
        window.location.href='../login.php';
        </script>");
  
    }
    else{
        $regexp = '/^.*(?=^.{11}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/';
        if(!preg_match($regexp ,$pw)){
            echo ("<script language='JavaScript'>
            window.alert('비밀번호 오류');
            window.location.href='../login.php';
            </script>");
        }
        else{
            
            $sql = "SELECT * FROM shoppingmall.manager WHERE id='".$id."' and pw='".$pw."'";
            $result = mysql_query($sql,$conn);
            $count = mysql_num_rows($result);

            if($count==0){//잘못입력
                header('Location: ../login.php');
            }
            else{//올바르게 입력
                $_SESSION['id']=$id;
                $_SESSION['manager']=true;
            	header('Location: ../manager.php');
            }
        }
    }          
?>