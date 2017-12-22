<?php
require_once '../db/database.php';
mysql_query("set names utf8");//한글꺠짐 방지

$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("manager.php err");
$sql="SELECT * FROM shoppingmall.".$clothes_tbl." WHERE type='best'";
$page_size=8;

$result1=mysql_query("SELECT count(*) FROM shoppingmall.$clothes_tbl",$conn);
$result_row=mysql_fetch_row($result1);
$total_row = $result_row[0];//현재 저장된 모든 베스트 수량

if($total_row<=0) $total_row=0;//아무것도없으면 0
$total_page = floor(($total_row-1) /$page_size)+1;

if(isset($page)){
    $start=($page-1)*$page_size;
    $sql=$sql." LIMIT $page_size offset ".$start;
}
else{
  $start=0;
  $page=1;
  $sql=$sql." LIMIT $page_size offset ".$start;
}
$result = mysql_query($sql,$conn);
?>

<script src="./js/pictures/prototype.js" type="text/javascript"></script>
<script src="./js/pictures/scriptaculous.js" type="text/javascript"></script>
<script type="text/javascript" src="./js/pictures/effects.js"></script>

<script src="./js/pictures/pictures.js" type="text/javascript"></script>

<div id="main">
  <img id="mainimage" src="" alt="picture" style="position: relative;">
</div>

<div id="pictures">
  <?php
  if(is_resource($result)){
    $i=0;
    while($row= mysql_fetch_array($result)){
        echo('<img id="image".$i src="data:image/jpeg;base64,'. base64_encode($row['image']) .'"/>');
    }
  }
  ?>

  <div class='page'>

 <?php
        if($page>1){
          echo "<a class='L_no' href='".htmlspecialchars("./main.php?id=best&page=".urlencode($page-1))."'> back </a><br>";
        }

        if( ($page<=($total_page))  ){
       echo "<a class='R_no' href='".htmlspecialchars("./main.php?id=best&page=".urlencode($page+1))."'>  front </a>";
      }
      ssssssssssss
  ?>
`
  </div>



</div>
