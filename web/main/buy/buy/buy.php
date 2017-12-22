<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
require_once "../../db/database.php"; 
header("Content-type:text/html;charset=UTF-8");
$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("form_register.php error");
$name='hoho';
    
$sql="select * from shoppingmall.".$clothesinformation_tbl." WHERE name='".$name."'";
mysql_query("set names utf8");//한글꺠짐 방지   
$result= mysql_query($sql,$conn);

$imagesArr=array();
$sql2="select * from shoppingmall.".$clothes_tbl." WHERE name='".$name."'";
mysql_query("set names utf8");//한글꺠짐 방지   
$result2= mysql_query($sql2,$conn);
    $price;
    $i = 0; $size = array(); 
    $ColorSize =array();
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
        $ColorSize[$i][0]=$row['xxs'];
        
        $ColorSize[$i][1] = $row['xs'];
        
        $ColorSize[$i][2] = $row['s'];
        $ColorSize[$i][3] = $row['m'];
        $ColorSize[$i][4] = $row['l'];
        $ColorSize[$i][5] = $row['xl'];
        $ColorSize[$i][6] = $row['xxl'];
        $i +=1;
        $j =0;
        }
        }


?>
 






<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src ="./js/jquery-1.10.1.min.js"></script>
    <script src ="./js/buy.js"></script>
    
    <script src="./js/prototype.js" type="text/javascript"></script>
    <script src="./js/scriptaculous.js" type="text/javascript"></script>
    <script type="text/javascript" src="./js/effects.js"></script>

    <script src="./js/pictures.js" type="text/javascript"></script>
    
    <link href="./css/buy.css" rel="stylesheet" type="text/css"/>
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
                            <div id="prdInfo" class="">
                                <div class="prd_name">
                                    <h3 style="font-family:돋움;"><?php echo($name); ?></h3>
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
                                            <th scope="row">상품 금액</th>
                                            <td>
                                                <strong id="span_product_price_text" class="ProductPrice">
                                                    <?php echo $price;
                                                    ?>
                                                </strong>
                                           
                                            </td>
                                        </tr>
                                       
                                        <tr class="mileage ">
                                            <th scope="row">Point</th>
                                            <td class="ProductPoint">
                                               
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
                                                    <input id="quantity" name="quantity_name" style="" value="0" type="text">
                                                    <img src="./img/btn_up.jpg" id='up' alt="up" class="QuantityUp">
                                                    &nbsp;<img src="./img/btn_down.jpg" id='down'  alt="down" class="QuantityDown">
                                                    &nbsp;</p>
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
                                        <select id='kind' option_product_no="13547" option_select_element="ec-option-select-finder" option_sort_no="1" option_type="T" item_listing_type="S" option_title="색상&amp;사이즈" product_option_area="product_option_13547_0" name="option1" id="product_option_id1" class="ProductOption0" option_style="select" required="true"><option value="11" link_image="">- [필수] 색상&amp;사이즈 선택 -</option><option value="11" link_image="">---------------------------------------------</option>
                                            <?php
                                                for($j=0;$j<$i;$j++){
                                                    for($k=0;$k<7;$k++){
                                                echo '<option value="'.$ColorSize[$k][$l].'"> '.$color[$j].' ['.$size[$k].'] 재고:--'.$ColorSize[$j][$k].'</option>';
                                            }
                                         }
                                                ?>                   
                                            
                                        </select>
                                    </td>
                                    </tr>
                                    </tbody>
                                </table>
                                
                                

                                <div class="xans-element- xans-product xans-product-action btnArea clearfix">
                                    <a id="next_product" onclick="ImagePreview.viewProductBtnClick(&#39;next&#39;);" href="google.com"></a>
                                    
                                    <a id="prev_product" onclick="ImagePreview.viewProductBtnClick(&#39;prev&#39;);" href="google.com"></a>
                                    
                                    
                                    <a href="http://www.hummingsuper.com/product/detail.html?product_no=13547&amp;cate_no=12&amp;display_group=1#none" onclick="product_submit(1, &#39;/exec/front/order/basket/&#39;, this)" class=""><img class="smp-btn-cart" src="./img/btn_cart_w.jpg"></a>
                                    
                                    <a href="http://www.hummingsuper.com/product/detail.html?product_no=13547&amp;cate_no=12&amp;display_group=1#none" onclick="product_submit(1, &#39;/exec/front/order/basket/&#39;, this)" class=""><img class="smp-btn-cart" src="./img/btn_buy.jpg"></a>
                                        

                             
<!-- 상품 간략설명 -->
                                   
                                    <a href="http://www.hummingsuper.com/product/detail.html?product_no=13547&amp;cate_no=12&amp;display_group=1" onclick="return false;" class="text_simple" style="display:block; clear:both; padding-top:30px; text-align:left; color:#999; font-size:11px; cursor:text;">
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    </a>
                                </div>
                            </div>
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
                                        //echo('<img class="BigImage " id="image"  src="data:image/jpeg;base64,'. base64_encode($row2['image']) .'"/>');
                                    ?>
                                        <img id="mainimage" src="" alt="picture" style="position: relative;">
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
                                    
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="description" src="data:image/jpeg;base64,'. base64_encode($row2['description9']) .'"/>'); ?></li>
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
                        <div id="prdDetail">
		
		
                            <div id="detailArea">
                                <?php 
                                $sql2="select * from shoppingmall.".$clothes_tbl." WHERE name='".$name."'";
                                mysql_query("set names utf8");//한글꺠짐 방지   
                                $result2= mysql_query($sql2,$conn);
                                
                                 if(is_resource($result2)){
   
                                    while($row2=mysql_fetch_array($result2)){
                                      
                                        echo('<img class="BigImage " id="image"  src="data:image/jpeg;base64,'. base64_encode($row2['image']) .'"/>'); ?>
                                    <div class="xans-element- xans-product xans-product-addimage listImg">
                                        
                                        
                                    <ul>
                                        
                                    
                                         <?php
                                        if($row2['description4']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="description" src="data:image/jpeg;base64,'. base64_encode($row2['description4']) .'"/>'); ?></li>
                                    <?php } ?>
                                         <?php
                                        if($row2['description5']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="description" src="data:image/jpeg;base64,'. base64_encode($row2['description5']) .'"/>'); ?></li>
                                    <?php } ?>
                                         <?php
                                        if($row2['description6']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="description" src="data:image/jpeg;base64,'. base64_encode($row2['description6']) .'"/>'); ?></li>
                                    <?php } ?>
                                         <?php
                                        if($row2['description7']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="description" src="data:image/jpeg;base64,'. base64_encode($row2['description7']) .'"/>'); ?></li>
                                    <?php } ?>
                                         <?php
                                    if($row2['description8']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="description" src="data:image/jpeg;base64,'. base64_encode($row2['description8']) .'"/>'); ?></li>
                                    <?php } ?>
                                        <?php
                                    if($row2['description9']!=null){
                                    ?>
                                    <li class="xans-record-"><?php echo('<img class="ThumbImage" id="description" src="data:image/jpeg;base64,'. base64_encode($row2['description9']) .'"/>'); ?></li>
                                    <?php } ?>
                                     
                                    </ul>
                                </div>
                                        
                                <?php        
                                    }
                        
                                 }         
                                ?>
                            </div>
                        </div>

<!-- 교환 및 반품 -->
                        <div id="prdChange" style="display:none;">
                            <hr class="layout">
                        </div> 
                    </div>
                </div>
            </div>
            <div id="sider">
                <hr class="layout"><hr class="layout">
<!-- #########quickL######### -->
                <div id="quickL"></div>
                <div id="quickR">
                    <div style=" position:fixed;bottom:50px; right:50px; z-index:10000;"> <p><a onclick="$(&#39;html, body&#39;).animate( { scrollTop:0 }, &#39;slow&#39; );" href="javascript:void(0);"><img src="./20대,남자쇼핑몰,허밍슈퍼_files/topbotton.png" alt="" ismodify="1"></a></p></div>
                </div>
                <hr class="layout">
                <!-- #########footer######### --><div id="footer" style="background-color: white; z-index: 9999; position: relative;"></div>
            </div>
        </div>
    </div>
    </body>
    </head>
</html>
