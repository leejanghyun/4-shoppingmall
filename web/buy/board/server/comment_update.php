<?php
    require_once('../../../db/database.php');
    session_start();
    $conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("comment_update.php error");
    $no=$_REQUEST['no'];
    $name=$_REQUEST['objname'];
    if(isset($_SESSION['id'])==''){//정상적이지 않은 접근
        header('Location: ../../../main/main.php?id=login');
    }
    else if( strlen($_POST['user_title'])<5 || strlen($_POST['user_comment'])<5 ){

        echo ("<script language='JavaScript'>
        window.alert('제목이나 내용은 5글자 이상 작성 해주세요')
        window.location.href='../../commentModify.php?name=$name&no=$no';
        </script>");
    }
    else{
        $title= $_POST["user_title"];
        $comment= $_POST["user_comment"];
        $userId= $_SESSION['id'];
        $date = date('Y-m-d H:i:s', time());
        $sql="update shoppingmall.$comment_tbl set title='".$title."' , comment='".$comment."' where  no=".$no;
        $result = mysql_query($sql,$conn)or die(mysql_error());
       
        header('Location: ../../../../main/main.php?id=buy&name='.$name);
    }
?>
