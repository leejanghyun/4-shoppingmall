<?php
$object0=$_REQUEST['object'];
$object=split(',',$_REQUEST['object']);
$sql="SELECT * FROM shoppingmall.".$clothes_tbl." WHERE kind='$object[0]' And object='$object[1]'";
$page_size=8;

$result1=mysql_query("SELECT count(*) FROM shoppingmall.$clothes_tbl",$conn);
$result_row=mysql_fetch_row($result1);
$total_row = $result_row[0];//현재 저장된 모든 베스트 수량

if($total_row<=0) $total_row=0;//아무것도없으면 0
$total_page = floor(($total_row-1) /$page_size)+1;
 
if(isset($_REQUEST['page'])){  // paging 관련
    $page=$_REQUEST['page'];
}


if(isset($page)){
    $current_page=$page-1;
    $start=$current_page++*$page_size;
    $sql=$sql." LIMIT $page_size offset ".$start;
}
else{
    $current_page=0;
    $start=$current_page++*$page_size;
    $sql=$sql." LIMIT $page_size offset ".$start;
}

$result = mysql_query($sql,$conn);

?>
<div class="goods_area">
  <div class="inner">
    <div class="product_listmain_3">
      <div class="xans-element- xans-product xans-product-listmain-3 xans-product-listmain xans-product-3">
          
          <ul class="prdList column4 clearFix">
                <?php
                if(is_resource($result)){
                  $i=0; $cnt = 1;
                  while($row= mysql_fetch_array($result)){?>

                         <li id="anchorBoxId_1358" class="item xans-record-">
                           <div class="box">
                             <a href="./main.php?id=buy&name=<?=$row['name']?>" name="anchorBoxName_13547">
                               <?php
                             echo('<img id="image".$i src="data:image/jpeg;base64,'. base64_encode($row['image']) .'" alt="" class="thumb"/></a>');?>
                                 <div class="status">
                                   <p class="name">
                                     <a href="./main.php?id=buy&name=<?=$row['name']?>" class="">
                                       <strong class="title displaynone"><span style="font-size:11px;color:#000000;">상품명</span> :</strong>
                                         <span style="font-size:11px;color:#000000;"><?=$row['name']?></span></a></p></div>
                           <ul class="xans-element- xans-product xans-product-listitem-3 xans-product-listitem xans-product-3"><li class=" xans-record-">
                             <strong class="title displaynone"><span style="font-size:12px;color:#555555;">상품색상</span> :</strong>
                               <div class="color"><span class="chips" title="#000000" style="background-color:#000000" color_no="" displaygroup="4"></span>
                                 <span class="chips" title="#E3E3DB" style="background-color:#E3E3DB" color_no="" displaygroup="4"></span>
                                 <span class="chips" title="#222742" style="background-color:#222742" color_no="" displaygroup="4"></span>
                                 <span class="chips" title="#A88C76" style="background-color:#A88C76" color_no="" displaygroup="4"></span>
                                 <span class="chips" title="#8E8E8E" style="background-color:#8E8E8E" color_no="" displaygroup="4"></span></div></li>
                         <li class=" xans-record-">
                         <strong class="title displaynone"><span style="font-size:11px;color:#000000;font-weight:bold;">판매가</span> :</strong>
                         <span id="span_product_tax_type_text" style=""></span></li></ul>
                             <p class="icon"></p>
                              </div></li>
                      <?php if($cnt%4 == 0){?> </br><?php }
                        $cnt = $cnt+1;?>
                  <?php
                  }
                }?>
</ul>
    <div>

                    <?php

                        if(!(1>( ($current_page-1)/8))){
                          echo "<a href='".htmlspecialchars("./main.php?id=clothes&object=$object0&page=".urlencode( $current_page-7))."'> < </a>";
                        }
                        $start=(int)(($current_page-1)/8);//8개로나눔
                        $start=$start*8+1;
                        $end=$start+8;
                        $i=$start;

                        for($i;$i<$end;$i++){
                            if($i>$total_page){
                                break;
                            }
                         echo "<a href='".htmlspecialchars("./main.php?id=clothes&object=$object0&page=".urlencode($i))."'> ".$i."</a>";
                        }
                        if($i<=$total_page){

                            echo "<a href='".htmlspecialchars("./main.php?id=clothes&object=$object0&page=".urlencode($end))."'>  > </a>";
                         }
                    ?>
        </div>
    </div>
  </div>