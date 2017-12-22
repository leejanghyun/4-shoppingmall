<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php

$name=$_REQUEST['name'];
    
$sql="select * from shoppingmall.". $clothesinfo_tbl." WHERE name='".$name."'";
mysql_query("set names utf8");//한글꺠짐 방지   
$result= mysql_query($sql,$conn);

$imagesArr=array();
$sql2="select * from shoppingmall.".$clothes_tbl." WHERE name='".$name."'";
mysql_query("set names utf8");//한글꺠짐 방지   
$result2= mysql_query($sql2,$conn);
    $price;
    $i = 0; $size = array(); 
    $ColorSizecount =array();
    $ColorSizename = array();
    $color = array();
    $size = array();
    $size[0]='xxs';
    $size[1]='xs';
    $size[2]='s';
    $size[3]='m';
    $size[4]='l';
    $size[5]='xl';
    $size[6]='xxl';
    

    
    if(is_resource($result)){
    
        while($row=mysql_fetch_array($result)){
        $price = $row['price'];
        $color[$i] = $row['color'];
            $ColorSizename[$i][0] = $row['color'].'[xxs]';
        $ColorSizecount[$i][0]=$row['xxs'];
            $ColorSizename[$i][1] = $row['color'].'[xs]';
        $ColorSizecount[$i][1] = $row['xs'];
            $ColorSizename[$i][2] = $row['color'].'[s]';
        $ColorSizecount[$i][2] = $row['s'];
            $ColorSizename[$i][3] = $row['color'].'[m]';
        $ColorSizecount[$i][3] = $row['m'];
            $ColorSizename[$i][4] = $row['color'].'[l]';
        $ColorSizecount[$i][4] = $row['l'];
            $ColorSizename[$i][5] = $row['color'].'[xl]';
        $ColorSizecount[$i][5] = $row['xl'];
            $ColorSizename[$i][6] = $row['color'].'[xxl]';
        $ColorSizecount[$i][6] = $row['xxl'];
        
        $i +=1;
        $j =0;
        }
        }
?>
 






<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src ="../buy/js/jquery-1.10.1.min.js"></script>
    <script src="../buy/js/prototype.js" type="text/javascript"></script>
    <script src="../buy/js/scriptaculous.js" type="text/javascript"></script>
    <script type="text/javascript" src="../buy/js/effects.js"></script>
    <script src="../buy/js/pictures.js" type="text/javascript"></script>
    <script src ="../buy/js/buy.js"></script>
    <link href="../buy/css/buy.css" rel="stylesheet" type="text/css"/>
        </head>
<body>

    <hr class="layout">
    <div id="container">
        <div id="contents">
            <div class="inner_wrap">
                <div id="product_detailA" class="clearFix">
                <!-- 상품 상세정보(오른쪽)-->
                    <div class="product_detailR">
                        <div class="xans-element- xans-product xans-product-detail">
                            <div id="SMS_TD_detail_obj" class="">
                                <div id="SMS_TD_detail_body" style="display:none">
                                    <div id="SMS_TD_name" style="display:none"></div>
                                    <div id="SMS_TD_summary" style="display:none"></div>
                                    <div id="SMS_TD_simple" style="display:none"></div></div>
                            </div>
                            
                            
                            <form action="./main.php?id=pay&name=<?=$name?>" method="post" >   
                            <div id="prdInfo" class="">
                                <div class="prd_name">
                                    <h3 style="font-family:돋움;">
                                        
                                        
                                    <?php
                                        echo ($name);     
                                    ?>
                                    
                                    </h3>
                                    <p></p>
                                </div>
                                <p class="displaynone">() </p>
                                <table border="1" summary="도톰한 하프 폴라니트 기본 정보입니다.">
                                    <caption></caption>
                                    <tbody>
                                        
                                        <tr class="displaynone">
                                            <th scope="row">상품간략설명</th><td></td>
                                        </tr>
                                        <tr class="">
                                            <th scope="row">price</th>
                                            <td>
                                                <strong id="span_product_price_text" class="ProductPrice">
                                                    
                                                <?php
                                                    if(isset($price)){
                                                        echo $price;
                                                        echo"<input type ='hidden' name ='price'  value='".$price."'>";
                                                    }
                                                    else{
                                                        echo("품절");
                                                    }
                                                 
                                                ?>
                                                    
                                                </strong>
                                           
                                            </td>
                                        </tr>
                                       
                                        <tr class="mileage ">
                                            <th scope="row">Point</th>
                                            <td class="ProductPoint">
                                               
                                            <?php
                                                if(isset($price)){
                                                $point =$price *0.05;
                                                echo ($point);
                                                echo"<input type ='hidden' name ='point'  value='".$point."'>";
                                                }
                                            ?>
                                                
                                                
                                                
                                            </td>
                                        </tr>
                                        
                                        <tr class="displaynone">
                                            <th scope="row">
                                                무이자할부
                                            </th>
                                            <td>
                                                <br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">QTY</th>
                                            <td>
                                                <p style="padding-right:30px;">
                                                    
                                                    
                                                    <input id="quantity" name="quantity"  type="text">
                                                    
                                                    
                                                    
                                                    <img src="../buy/img/btn_up.jpg" onclick="btn_up()" alt="up" class="QuantityUp">
                                                    &nbsp;<img src="./buy/img/btn_down.jpg" onclick="btn_down()"  alt="down" class="QuantityDown">
                                                    &nbsp;
                                                </p>
                                            </td>
                                        </tr>
                                        <tr class="displaynone">
                                            <th scope="row">
                                                국내/해외배송
                                            </th>
                                            <td>
                                                <span class="delivery">
                                                    <label for="chkDelivery1">
                                                        <input id="delv_type_A" name="delv_type" value="A" type="radio" checked="checked"> 국내배송</label>
                                                    <label for="chkDelivery2">
                                                        <input id="delv_type_B" name="delv_type" value="B" type="radio"> 해외배송</label>
                                                </span>
                                            </td>
                                        </tr>
                                        
                                    </tbody><tbody class="xans-element- xans-product xans-product-option xans-record-"><tr class="xans-element- xans-product xans-product-option xans-record-">
                                    <th>색상&amp;사이즈</th>
                                    <td>
                                        <select id='kind' onchange="changefunction()" option_product_no="13547" option_select_element="ec-option-select-finder" option_sort_no="1" option_type="T" item_listing_type="S" option_title="색상&amp;사이즈" product_option_area="product_option_13547_0" name="option1" id="product_option_id1" class="ProductOption0" option_style="select" required="true"><option value="11" link_image="">-- [필수] 색상&amp;사이즈 선택 --</option><option value="11" link_image="">---------------------------------------------</option>
                                            <?php
                                                for($j=0;$j<$i;$j++){
                                                    for($k=0;$k<7;$k++){
                                                echo '<option value="'.$color[$j].','.$size[$k].'"> '.$color[$j].' ['.$size[$k].'] 재고:--'.$ColorSizecount[$j][$k].'</option>';
                                                
                                            }
                                         }
                                            
                                                ?>                   
                                            
                                        </select>
                                    </td>
                                    </tr>
                                    </tbody>
                                </table>
                                
                                

                                <div class="xans-element- xans-product xans-product-action btnArea clearfix">
                                    
                                <?php    
                                    if(isset($price)){
                                    $point=$price*0.1;
                                        echo"<input type ='hidden' name ='name'  value='".$name."'>";
                                        echo"<input type ='hidden' name ='price'  value='".$price."'>";
                                        echo"<input type ='hidden' name='my_save' value='".$point."'>";
                                    }
                                    ?>
         
                                    <input class='buy_btn' type="submit">
                                    
                                    
                                        
                                   
                                             
<!-- 상품 간략설명 -->
                                </div>
                            </div>
                            </form>
<!-- //상세정보 내역 -->
                            <div id="prdEvent">
                                <div class="evtArea">
                                </div>
                            </div>
                        </div>                 
                    </div>
<!-- //상단 제품 정보 -->



<!-- 상품상세정보 (왼쪽)-->
                    <div class="product_detailL">


                        <div class="xans-element- xans-product xans-product-detail "><div class="detailArea">
<!-- 이미지 영역 -->
                            <div class="xans-element- xans-product xans-product-image imgArea "><div class="keyImg">
                                
                               <div id="main">
                              <?php                                 
                                 if(is_resource($result2)){   
                                    while($row2=mysql_fetch_array($result2)){
                                    ?>
                                    <img id="mainimage" src="" alt="picture" >
                                </div>
                                    <div class="xans-element- xans-product xans-product-addimage listImg">
                                    <ul>
                                        
                                    <div id="pictures">    
                                    <?php
                                        if($row2['description']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="description" src="data:image/jpeg;base64,'. base64_encode($row2['description']) .'"/>'); ?></li>
                                    <?php } ?>
                                    <?php
                                        if($row2['description1']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="description" src="data:image/jpeg;base64,'. base64_encode($row2['description1']) .'"/>');?></li>
                                    <?php } ?>
                                        
                                         <?php
                                        if($row2['description2']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="description" src="data:image/jpeg;base64,'. base64_encode($row2['description2']) .'"/>'); ?></li>
                                    <?php } ?>
                                        
                                         <?php
                                        if($row2['description3']!=null){
                                    ?>
                                    
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="description" src="data:image/jpeg;base64,'. base64_encode($row2['description3']) .'"/>'); ?></li>
                                    <?php } ?>
                                        </div>
                                        
                                    </ul>
                                </div>
                                        
                                <?php        
                                    }
                                
                             
                                 }
                                
                                ?>
                                
                                
                                
                                
                                &nbsp;</div>
<!-- 참고 : 뉴상품관리 전용 모듈입니다. 뉴상품관리 이외의 곳에서 사용하면 정상동작하지 않습니다. -->
                              
<!-- //참고 -->
<!-- 참고 : 뉴상품관리 전용 모듈입니다. 뉴상품관리 이외의 곳에서 사용하면 정상동작하지 않습니다. -->
                                <div class="displaynone" style="display:none">
											</div>
<!-- //참고 -->
                            </div>
<!-- //이미지 영역 -->
                            </div>
                        </div>
                    </div>
<!-- //상품 상세페이지 시작-->
                    <div class="xans-element- xans-product xans-product-additional "><!-- 상품상세정보 -->
                     <div>
		
                                <?php 
                                $sql2="select * from shoppingmall.".$clothes_tbl." WHERE name='".$name."'";
                                mysql_query("set names utf8");//한글꺠짐 방지   
                                $result2= mysql_query($sql2,$conn);
                                
                                 if(is_resource($result2)){
   
                                    while($row2=mysql_fetch_array($result2)){
                                      
                                        echo('<img class="BigImage " id="underdescription"  src="data:image/jpeg;base64,'. base64_encode($row2['image']) .'"/>'); ?>
                                    <div class="xans-element- xans-product xans-product-addimage listImg">
                                        
                                        
                                    <ul>
                                        
                                    
                                    <?php
                                        if($row2['image']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="underdescription" src="data:image/jpeg;base64,'. base64_encode($row2['image']) .'"/>'); ?></li>
                                    <?php } ?>
                                         <?php
                                        if($row2['description']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="underdescription" src="data:image/jpeg;base64,'. base64_encode($row2['description']) .'"/>'); ?></li>
                                    <?php } ?>
                                         <?php
                                        if($row2['description1']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="underdescription" src="data:image/jpeg;base64,'. base64_encode($row2['description1']) .'"/>'); ?></li>
                                    <?php } ?>
                                         <?php
                                        if($row2['description2']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="underdescription" src="data:image/jpeg;base64,'. base64_encode($row2['description2']) .'"/>'); ?></li>
                                    <?php } ?>
                                    <?php
                                        if($row2['description3']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="underdescription" src="data:image/jpeg;base64,'. base64_encode($row2['description3']) .'"/>'); ?></li>
                                    <?php } ?>
                                         <?php
                                        if($row2['description4']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="underdescription" src="data:image/jpeg;base64,'. base64_encode($row2['description4']) .'"/>'); ?></li>
                                    <?php } ?>
                                         <?php
                                        if($row2['description5']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="underdescription" src="data:image/jpeg;base64,'. base64_encode($row2['description5']) .'"/>'); ?></li>
                                    <?php } ?>
                                         <?php
                                        if($row2['description6']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="underdescription" src="data:image/jpeg;base64,'. base64_encode($row2['description6']) .'"/>'); ?></li>
                                    <?php } ?>
                                         <?php
                                    if($row2['description7']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="underdescription" src="data:image/jpeg;base64,'. base64_encode($row2['description7']) .'"/>'); ?></li>
                                    <?php } ?>
                                        <?php
                                    if($row2['description8']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="underdescription" src="data:image/jpeg;base64,'. base64_encode($row2['description8']) .'"/>'); ?></li>
                                    <?php } ?>
                                            <?php
                                    if($row2['description9']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="underdescription" src="data:image/jpeg;base64,'. base64_encode($row2['description9']) .'"/>'); ?></li>
                                    <?php } ?>
                                    </ul>
                                </div>
                                        
                                <?php        
                                    }
                        
                                 }         
                                ?>
                        </div>
                    </div>
                </div>
                    <a href="../buy/board/commentWrite.php?name=<?=$name?>">글쓰기</a>
                    <?php require_once '../buy/board/board.php';  ?>
            </div>
        </div>
           
        </div>
    </body>

</html>
