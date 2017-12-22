<?php
    require_once('../../../db/database.php');
    session_start();
    $conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("changeInfo.php error");

    $id=$_SESSION['id'];

    if(isset($_POST['user_orderaddr'])){
        $user_orderaddr=$_POST['user_orderaddr'];
        if( strlen($user_orderaddr)<1 ){
            echo ("<script language='JavaScript'>
                window.alert('입력 양식을 다시 확인하세요')
                window.location.href='../changeInfo.php?param=1';
                </script>");
        }
        else{
            $sql="update shoppingmall.$person_tbl set order_addr='".$user_orderaddr."' where id='".$id."'"; 
            $result = mysql_query($sql,$conn)or die(mysql_error());   
            echo ("<script language='JavaScript'>
            window.alert('병경 완료')
            window.location.href='../../main/main.php?id=mypage&param=5';
            </script>");
}
        
    }
    else{
     
        $name=$_POST['user_name'];
        $pw=$_POST['user_pw'];
        $newpw=$_POST['user_new_pw'];
        $addr=$_POST['user_addr'];
        $phone=$_POST['user_phone'];
   

        if(isset($name)  && isset($pw) && isset($newpw) && isset($newpw) && isset($addr) && isset($phone)){

            $regexp = '/^.*(?=^.{8,15}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/';
            if(!preg_match($regexp ,$pw)){
                echo ("<script language='JavaScript'>
                window.alert('비밀번호 양식을 다시 확인하세요')
                window.location.href='../changeInfo.php?param=0';
                </script>");
            }
            else if(!preg_match($regexp ,$newpw)){
                echo ("<script language='JavaScript'>
                window.alert('새 비밀번호 양식을 다시 확인하세요')
                window.location.href='../changeInfo.php?param=0';
                </script>");
            }
            else if( strlen($name)<1 || strlen($id)<3 || strlen($addr)<5 || (strlen($phone)!=11) ){
                echo ("<script language='JavaScript'>
                window.alert('입력 양식 다시확인')
                window.location.href='../changeInfo.php?param=0';
                </script>");
            }
            else{
                $sql = "SELECT * FROM shoppingmall.$person_tbl WHERE id='".$id."' and pw='".$pw."'";
                $result = mysql_query($sql,$conn);
                $count = mysql_num_rows($result);

                if($count==0){//잘못입력
                    echo ("<script language='JavaScript'>
                    window.alert('비밀번호 다시확인')
                    window.location.href='../changeInfo.php?param=0';
                    </script>");
                }
                else{//올바르게 입력

                    $sql="update shoppingmall.$person_tbl set name='".$name."',pw='".$newpw."', addr='".$addr."',phone='".$phone."' where id='".$id."'"; 
                    $result = mysql_query($sql,$conn)or die(mysql_error());   
                    echo ("<script language='JavaScript'>
                    window.alert('병경 완료')
                    window.location.href='../../main/main.php?id=mypage&param=1';
                    </script>");
                }

            }
        }
    }
?>
