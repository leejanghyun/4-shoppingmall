<!DOCTYPE>
<?php
require_once '../db/database.php';
session_start();
$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("manager.php err");
$sql="SELECT DISTINCT kind FROM shoppingmall.".$item_tbl;
mysql_query("set names utf8");//한글꺠짐 방지
$result= mysql_query($sql,$conn);
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>4조 쇼핑몰 프로젝트</title>
    
    <!-- CSS -->
    <link href="./css/main.css" rel="stylesheet"  type="text/css">
    <link href="./css/pictures.css" rel="stylesheet"  type="text/css">
    <link href="../join/css/join.css" rel="stylesheet"  type="text/css">
    <link href="../login/css/login.css" rel="stylesheet"  type="text/css">
    <link href="../board/css/board1.css" rel="stylesheet"  type="text/css">
    <link href="../mypage/css/mypage.css" rel="stylesheet" type="text/css">
    <link href="../mypage/css/changeInfo.css" rel="stylesheet" type="text/css">
    <link href="../clothes/css/clothes.css" rel="stylesheet" type="text/css">
   
    <script type="text/javascript" src="./js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="./js/jquery.cycle.all.js"></script>
    <script  type="text/javascript" src="./js/main.js"></script>
    </head>
    
    <body onresize="parent.resizeTo(500,400)" onload="parent.resizeTo(500,400)" >
      <div id="header">
      <div class="header_wrap">
      	<div class="util_top_wrap">
      		<div class="util_top clearFix">
      			<div class="left_section ">
              <?php
                if(isset($_SESSION['is_login'])){
                ?>
                <span class="user"> <?= $_SESSION['id'] ?> 님 환영합니다. </span>
                <a href="../logout/logout.php">LOGOUT</a>
                <?php   }
                else{   ?>
                <a href="./main.php?id=login">LOGIN</a>
                <a href="./main.php?id=join">JOIN</a>
                <?php   }   ?>
                    
              <a href="./main.php?id=mypage">MYPAGE</a>
              <a href="./main.php?id=board"><strong>REVIEW</strong></a>
              <a href="./main.php?id=Q&A">Q &amp; A</a>
              <a href="./main.php?id=notice">NOTICE</a>
              <a href="./main.php?id=model">모델지원</a>
            </div>
          </div>
        </div>
      	<h1><a href="./main.php"><img class='max-small' src="./img/logo.jpg"></a></h1>

      <div class="cate_wrap">
    		<div class="inner_area">
    			<ul class="clearFix">

            <li><a href="./main.php?id=best">BEST</a>
            <li><a href="./main.php?id=new">NEW 5%</a>
            <?php
            if(is_resource($result)){
              while($row= mysql_fetch_array($result)){
              ?>
              <li><a href=""><?= $row['kind'] ?></a>
                <?php
                $sql1="SELECT * FROM shoppingmall.".$item_tbl." WHERE kind='".$row['kind']."' order by date";
                $result1= mysql_query($sql1,$conn);
                ?>
                   <div class="dep2">
                     <?php
                     while($row1= mysql_fetch_array($result1)){
                       ?>
                       <ul>
                         <li><a href="./main.php?id=clothes&object=<?=$row1['kind'].','.$row1['object'] ?>"><?= $row1['object'] ?></a></li>
                      </ul>
                    <?php

                  }?>

                  </div>

              </li>
              <?php
            }
            }
            ?>
      			</ul>
          </div>
    	  </div>
      </div>
    </div>

      <div class="main">
        <?php
          if(empty($_GET['id'])){
            echo file_get_contents("banner.php");
          }
          else{
            $file = $_GET['id'];
              
            if(isset($_REQUEST['page'])){  // paging 관련
                $page=$_REQUEST['page'];
            }
            if(!strcmp($file,"commentModify")){
                require_once('../board/'.$file.'.php');
            }
            else{
                require_once('../'.$file.'/'.$file.'.php');
            }
          }
        ?>
      </div>

    </body>
</html>
