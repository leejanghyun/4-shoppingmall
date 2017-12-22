<?php
require_once('../../../db/database.php');
$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("clothes/insert.php error");

if(isset($_POST['xs']) && isset($_POST['s']) && isset($_POST['m']) && isset($_POST['l']) && isset($_POST['xl']) && isset($_POST['xxl']) && isset($_POST['color']) && isset($_POST['sex'])){
    
    $insertname=$_POST['insertname'];
    $arr = split(',',$insertname);
    $name=$arr[2];
    $xxs=$_POST['xxs']; 
    $xs=$_POST['xs'];    
    $s=$_POST['s'];    
    $m=$_POST['m'];    
    $l=$_POST['l'];      
    $xl=$_POST['xl'];  
    $xxl=$_POST['xxl'];  
    $color=$_POST['color'];    
    $price=$_POST['price'];    
    $sex=$_POST['sex'];  
   
    
    if($name=='' || $xs=='' || $s==''  || $m=='' || $l=='' || $xl=='' || $xxl=='' || $xxs=='' || $color=='' || $price=='' || $sex==''){
        echo ("<script language='JavaScript'>
        window.alert('입력 양식을 모드 채워주세요')
        window.location.href='../clothes.php';
        </script>");
    }
    else{
        $sql="INSERT INTO shoppingmall.$clothesinfo_tbl(`name`,`color`,`xxs`,`xs`,`s`,`m`,`l`,`xl`,`xxl`,`sex`,`price`) VALUES ('$name','$color','$xxs','$xs','$s','$m','$l','$xl','$xxl','$sex','$price') on duplicate key update name='$name', color='$color', xxs='$xxs' , xs='$xs', s='$s' , m='$m' , l='$l' , xl='$xl', xxl='$xxl', sex='$sex', price='$price' ";
        
        $result = mysql_query($sql,$conn)or die(mysql_error());   
        header('Location: ../clothes.php');
    }
}
else{
    header('Location: ../clothes.php');
}
?>