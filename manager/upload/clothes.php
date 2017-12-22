<?php
require_once('../../db/database.php');
session_start();
if(!isset($_SESSION['manager'])){
     header('Location: ../login.php');
}

mysql_query("set names utf8");//한글꺠짐 방지
$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("clothes.php error");
$sql = "SELECT * FROM  shoppingmall.".$clothes_tbl;
$result = mysql_query($sql,$conn);

if(isset($_GET['name']) && isset($_GET['num'])){
    
    $fullname=$_GET['name'];
    $arr = split(',',$fullname);
    
    if($_GET['name']!='total')  $name=$arr[2];
    else    $name='total';
    $num=$_GET['num'];   
    
    if($name=='total' && $num=='total'){    //카테고리 +  재고현황
         $sql1="SELECT * FROM shoppingmall.".$clothesinfo_tbl;
    }
    else if($name!='total' && $num=='total' ){
         $sql1="SELECT * FROM shoppingmall.".$clothesinfo_tbl." where name='".$name."'";
    }
    else if($name=='total' && $num!='total'){
        $sql1="SELECT * FROM shoppingmall.".$clothesinfo_tbl." where (xxs<".$num." or xs<".$num." or s<".$num." or m<".$num." or l<".$num." or xl<".$num." or xxl<".$num.")";
    }
    else if($name!='total' && $num!='total'){
        $sql1="SELECT * FROM shoppingmall.".$clothesinfo_tbl." where name='".$name."' and (xxs<".$num." or xs<".$num." or s<".$num." or m<".$num." or l<".$num." or xl<".$num." or xxl<".$num.")";
    }
}
else{
    $num='total';
    $name='total';
    $sql1="SELECT * FROM shoppingmall.".$clothesinfo_tbl;
}

$result1 = mysql_query($sql1,$conn);
?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>의류 등록</title>

    <!-- Bootstrap CSS -->
    <link href="../boostrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/clothes.css" rel="stylesheet">
    <!-- Javascript -->
    <script type="text/javascript" src="../js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="../js/clothes.js"></script>
  
  </head>

  <body>
    <span id='name' style="display:none"><?php if(isset($fullname)){echo($fullname);}?></span>
    <span id='num' style="display:none"><?php if(isset($num)){echo($num);}?></span>
    
    <!-- 최상단-->
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
            <div class='clothes_top'>
              <a class="navbar-brand" href="">item insert|</a> <a class="navbar-brand" href="../upload.php">상품 업로드|</a> <a class="navbar-brand" href="../manager.php">테이블 보기</a><a class="navbar-brand" href="../login/logout.php"> 로그아웃 |</a>
            </div>
        </div>
      </div>
    </div>

    <div class="container">
    
	   <div class="row">
	      	<div class="col-lg-12">
	           <form class="well" action="./clothes/insert.php" method="post" enctype="multipart/form-data">
				  <div class="form-group">
                        카테고리:        
                        <select class='clothes_select' id="insertname" name='insertname'>
                          <?php 
                                while($row=mysql_fetch_array($result)){
                                    $category=$row['kind'].','.$row['object'].','.$row['name'];
                                    echo '<option value="'.$category.'">'.$category.'</option>';
                                }
                         ?>
                        </select>
                        <br>
                        <?php
                        echo("
                        xxs:<input id='xxs' name='xxs' type='text'  maxlength='3'>
                        xs:<input id='xs' name='xs' type='text'  maxlength='3'> s:<input id='s' name='s' type='text'  maxlength='3'> m:<input id='m' name='m' type='text'  maxlength='3'> l:<input id='l' name='l' type='text'  maxlength='3'> xl:<input id='xl' name='xl' type='text'  maxlength='3'> xxl:<input id='xxl' name='xxl' type='text'  maxlength='3'> <br>color:<input id='color' name='color' type='text'  maxlength='10'> price:<input id='price' name='price' type='text'  maxlength='10'> sex:<input id='sex' name='sex' type='text'  maxlength='3'>");
                        ?>
                  </div>
				  <input type="submit" class="btn btn-lg btn-primary" value="insert">
				</form>
			</div>
	   </div>
                
    </div> <!-- /container -->
<div class="container">
          <div class="row">
	      	<div class="col-lg-12">
                  <div class="form-group">
                  카테고리:
                <select class='clothes_select' id='orderSelect1' name='orderSelect1'>
                       
                        <option value="total">total</option>
                         <?php
                                $itemArr = "SELECT * FROM  shoppingmall.".$clothes_tbl;
                                $itemResult = mysql_query($itemArr,$conn);

    
                                while($row=mysql_fetch_array($itemResult)){
                                    $category=$row['kind'].','.$row['object'].','.$row['name'];
                                    echo '<option value="'.$category.'">'.$category.'</option>';
                                }
                         ?>
                </select>      

                재고 현황 :
                <select class='clothes_select' id='orderSelect2' name='orderSelect2'>

                        <option value="total">total</option>
                        <option value="10">10미만</option>
                        <option value="20">20미만</option>
                        <option value="30">30미만</option>
                        <option value="40">40미만</option>
                        <option value="50">50미만</option>
                        <option value="60">60미만</option>
                </select>
                      
                <table class="clothes_tbl">
                    
                        <thead> <!-- 테이블  최 상단 -->
                            <tr><th>품명</th><th>가격</th><th>색상</th><th>성별</th><th>xxs</th>
                            <th>xs</th><th>s</th><th>m</th><th>l</th><th>xl</th><th>xxl</th></tr>
                        </thead>
                        <tfoot>  
                        <tr><th colspan="14">아이템 재고 현황 입니다.</th></tr>
                        </tfoot>
                    
                        
                        <?php if(is_resource($result1)){  ?>
                        <?php while($row= mysql_fetch_array($result1)){ ?>
                        <tr>
                            <td><span><?php echo ($row['name'])?></span></td>
                            <td><span><?php echo $row['price']?></span></td>
                            <td><span><?php echo $row['color']?></span></td>
                            <td><span><?php echo $row['sex']?></span></td>
                            
                            <?php if($row['xxs']< $num && $num!='total'){ ?>
                                <td><span class='clothes_red'><?php echo($row['xxs'])?></span></td>
                            <?php }else { ?>
                                <td><span><?php echo($row['xxs'])?></span></td>
                            <?php }?>
                            <?php if($row['xs']< $num && $num!='total'){ ?>
                                <td><span class='clothes_red'><?php echo($row['xs'])?></span></td>
                            <?php }else { ?>
                                <td><span><?php echo($row['xs'])?></span></td>
                            <?php }?>
                            <?php if($row['s']< $num && $num!='total'){ ?>
                                <td><span class='clothes_red'><?php echo($row['s'])?></span></td>
                            <?php }else { ?>
                                <td><span><?php echo($row['s'])?></span></td>
                            <?php }?>
                            <?php if($row['m']< $num && $num!='total'){ ?>
                                <td><span class='clothes_red'><?php echo($row['m'])?></span></td>
                            <?php }else { ?>
                                <td><span><?php echo($row['m'])?></span></td>
                            <?php }?>
                             <?php if($row['l']< $num && $num!='total'){ ?>
                                <td><span class='clothes_red'><?php echo($row['l'])?></span></td>
                            <?php }else { ?>
                                <td><span><?php echo($row['l'])?></span></td>
                            <?php }?>
                             <?php if($row['xl']< $num && $num!='total'){ ?>
                                <td><span class='clothes_red'><?php echo($row['xl'])?></span></td>
                            <?php }else { ?>
                                <td><span><?php echo($row['xl'])?></span></td>
                            <?php }?>
                             <?php if($row['xxl']< $num && $num!='total'){ ?>
                                <td><span class='clothes_red'><?php echo($row['xxl'])?></span></td>
                            <?php }else { ?>
                                <td><span><?php echo($row['xxs'])?></span></td>
                            <?php }?>
                            <?php }}?>
                        </tr>

                </table>
                </div>
              </div>
              </div>
      </div>
      
  </body>
</html>

