<?php
require_once('../db/database.php');
session_start();
$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("mypage.php error");
mysql_query("set names utf8");//한글꺠짐 방지

    if(isset($_REQUEST['param'])){        
        $param=$_REQUEST['param'];
        $person=$_SESSION['id'];
        if($param==0){//회원정보  
            $sql = "SELECT * FROM  shoppingmall.".$person_tbl." where id='$person'";
            $result = mysql_query($sql,$conn);
        }
        else if($param==1){//배송지
            $sql = "SELECT order_addr FROM  shoppingmall.".$person_tbl." where id='$person'";
            $result = mysql_query($sql,$conn);
           
        }
    }   
?>

<!DOCTYPE html>
<html>
	 <head>
		  <title>정보 변경</title>
		  <meta name="author" content="4조"/>
		  <meta name="description" content="changeInfo.php"/>
          <link rel="stylesheet" href="./css/changeInfo.css" type="text/css">
	 </head> 

        <body>
              <div id="changeinfo">
                <form action="./server/changeInfo.php?param=<?php echo $param ?>" method="post">
                    <table class="changeIndotbl">
                        
                    <?php if($param==0){ ?>
                        <tr><th>회원 정보 수정</th></tr>
                    <?php }else if($param==1){  ?>
                        <tr><th>배송지 정보 수정</th></tr>
                    <?php 
                        }
                    while($row=mysql_fetch_array($result)){
                        if($param==0){
                            ?>    
                        <tr><td> 이름: <textarea rows="1" cols="25" name="user_name" id="u_name"><?php echo $row['name']?></textarea></td></tr><br>
                           <tr><td> 아이디: <?= $row['id'] ?></td></tr><br>
                           <tr><td> 현재 비밀번호: <input type="text" name="user_pw" id="u_pw" ></td></tr><br>
                           <tr><td> 새 비밀번호: <input type="text" name="user_new_pw" id="u_new_pw" ></td></tr><br>
                           <tr><td> 주소: <textarea rows="1" cols="25" name="user_addr" id="u_addr"><?php echo $row['addr']?></textarea></td></tr><br>
                            <tr><td>휴대폰: <textarea rows="1" cols="25" name="user_phone" id="u_phone"><?php echo $row['phone']?></textarea></td></tr><br>
                           <tr><td> 주민등록번호: <?= $row['pid'] ?></td></tr><br>
                    <?php
                        }
                        else if($param==1){ ?>
                            <tr><td> 주문 배송지 : <textarea rows="1" cols="25" name="user_orderaddr"><?php echo($row['order_addr']); ?></textarea></td></tr><br>
                    <?php    }
                    }   ?>
                        <tr><td> <center><button type="submit" >수정</button></center></tr>
                    </table>
                </form> 
            
               
            </div>
    	</body>
</html>
