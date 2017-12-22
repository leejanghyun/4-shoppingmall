<?php
require_once "../../db/database.php"; 
header("Content-type:text/html;charset=UTF-8");
$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("form_register.php error");
$name=$_GET["name"];
$price=$_POST["price"];
$delivery =2500;
$quantity = $_POST["quantity"];
$option1 =$_POST["option1"];
$allprice = ($price*$quantity)+ $delivery ;
$my_save = $_POST["my_save"]; //나의 포인트
?>

 <link href="../pay/css/pay.css" rel="stylesheet" type="text/css"> 
 <script src ="../pay/javascript/pay.js"></script>
 
<BODY id="pay_body">

<DIV id="wrap"><!-- #########header######### -->		 
<DIV id="header">


    
<HR class="layout">
<DIV id="container">			 <!-- #########content######### -->			 
<DIV id="contents">
<DIV class="inner_wrap">
<DIV class="path">
    
    
    
    
<from>    

<DIV class="xans-element- xans-order xans-order-form xans-record-">
    
    
    
    

  
    <P class="orderStep"><img alt="step 2 주문서 작성" src="../pay/img/img_orderStep2_w.gif"></P>
<DIV class="orderList">
    
    
    
    
<H3>주문서 작성</H3>
<DIV id="SMS_order_name" style="display: none;">린델오버 </DIV>
<TABLE class="boardProduct ordDetail1 " summary="주문서 상세중 기본 배송 내역입니다.">
  <CAPTION>기본 배송 주문서</CAPTION>
  <THEAD>
  <TR>
    <TH class="chk displaynone" scope="col">선택</TH>
    <TH class="thumb" scope="col">이미지</TH>
    <TH class="prduct" scope="col">상품명</TH>
    <TH class="sell" scope="col">판매가</TH>
    <TH class="mileage" scope="col">적립금</TH>
    <TH class="quantity" scope="col">수량</TH>
    <TH class="delivery" scope="col">배송구분</TH>
    <TH class="charge" scope="col">배송비</TH>
    <TH class="total" scope="col">합계</TH></TR></THEAD>
  <TFOOT>
  <TR>
    <TD colspan="9">상품구매금액 <STRONG><? php echo "$price" ?> <SPAN class="displaynone"> 
      </SPAN></STRONG> + 배송비 <STRONG>
        <?php if($delivery ==0){ echo "(0) [무료]"; }
        else{
            echo ($delivery);
        }
        ?>
    </STRONG> = <STRONG 
      class="total">합계 : <?php echo ($allprice); ?>원</STRONG> </TD></TR></TFOOT>
    
    
    
  <TBODY class="xans-element- xans-order xans-order-normallist">
  <TR class="xans-record-"><!-- 스마트스킨 코드 시작 :: 지우지 마세요 -->					 

    					 <!--스마트스킨 코드 끝 :: 지우지 마세요-->                     
    <TD class="chk displaynone"><INPUT name="chk_order_cancel_list_basic0" id="chk_order_cancel_list0" type="checkbox" value="13543:000C:F:661911"></TD>
        
    <TD class="thumb">
        
        
        
        
        
        <?php 
                                $sql2="select * from shoppingmall.".$clothes_tbl." WHERE name='".$name."'";
                                mysql_query("set names utf8");//한글꺠짐 방지   
                                $result2= mysql_query($sql2,$conn);
                                 if(is_resource($result2)){
                                     $row2=mysql_fetch_array($result2);
                                       echo('<img class="img_basket" id="image"  src="data:image/jpeg;base64,'. base64_encode($row2['image']) .'"/>'); }?>

        </TD>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    <TD class="prduct">여기
        <?php 
        echo $name;
        ?>
        
        <STRONG>색상&amp;사이즈= <?php 
            echo ($option1);
            ?><SPAN 
      class="displaynone">(0)</SPAN><BR></STRONG>
            </TD>
        
    <TD class="sell"><?php $price = $_POST["price"];
        echo ($price);
        ?>원</TD>
    <TD class="mileage"><?php
        $save = $price*0.1;
        echo ($save); ?> 원
        </TD>
    <TD class="quantity">
      <FIELDSET><LEGEND>제품 수량 수정</LEGEND>
        <?php
          $quantity = $_POST["quantity"];
          echo $quantity;
          ?>
        </FIELDSET></TD>
    <TD class="delivery">기본배송</TD>
    <TD class="charge">
        <?php
        if($delivery == 0){
        echo "[무료]";
        }
        else{
        echo $delivery."원";
        } ?></TD>
        
        
    <TD class="total">
        <?php 
        echo ($allprice);
        ?>원</TD></TR></TBODY></TABLE>
<TABLE class="boardProduct ordDetail2 displaynone" summary="주문서 상세중 개별 배송 내역입니다.">
  <CAPTION>개별 배송 주문서</CAPTION>
  <THEAD>
  <TR>
    <TH class="chk displaynone" scope="col">선택</TH>
    <TH class="thumb" scope="col">이미지</TH>
    <TH class="prduct" scope="col">상품명</TH>
    <TH class="sell" scope="col">판매가</TH>
    <TH class="mileage" scope="col">적립금</TH>
    <TH class="quantity" scope="col">수량</TH>
    <TH class="delivery" scope="col">배송구분</TH>
    <TH class="charge" scope="col">배송비</TH>
    <TH class="total" scope="col">합계</TH></TR></THEAD>
  <TFOOT>
  <TR>
    <TD colspan="9"> <STRONG><SPAN 
      class="displaynone">()</SPAN></STRONG> + 배송비 <STRONG></STRONG> = <STRONG 
      class="total">합계 :
        
        원</STRONG> </TD></TR></TFOOT></TABLE></DIV>
        
        
        
        
        
        
    
<DIV class="orderArea">
    <H3>주문자 정보</H3>
    <DIV class="boardView">
        <TABLE class="boardView ordAdd" summary="주문자 정보 입력란입니다.">
            <CAPTION>주문자 정보 입력</CAPTION>
            <TBODY>
                <TR>
                    <TH class="first" scope="row">성명</TH>
                    <TD class="first">
                        <INPUT name="oname" class="inputTypeText" id="oname" type="text" size="15" placeholder="" fw-msg="" fw-label="주문자 성명" fw-filter="isFill">
                        </INPUT>
                    </TD>
                </TR>
                    
                <TR>
                    <TH scope="row">주소</TH>
        
                    <TD>
        
                       
                        
<input type="button" onclick="execDaumPostcode()" value="우편번호 찾기"><br> 
 <input type="text" id="zip_code" placeholder="우편번호">신 우편번호<br> 
 <input type="text" id="old_zip_code" placeholder="우편번호">구 우편번호<br> 
 <input type="text" id="roadAddress" placeholder="도로명주소" size="70">도로명 주소<br> 
 <input type="text" id="jibunAddress" placeholder="지번주소" size="70">지번 주소<br> 
<INPUT name="oaddr2" class="inputTypeText" id="oaddr2" type="text" size="40" placeholder="" fw-msg="" fw-label="주문자 주소2" fw-filter="isFill"></INPUT> 나머지주소
<span id="guide" style="color:#999"></span> 
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script> 
 
                    </TD>
                </TR>
  
                <TR>
                    <TH scope="row">유선전화</TH>
                    <TD><SELECT name="ophone1_[]" id="ophone1_1" fw-msg="" fw-label="주문자 전화번호" fw-filter="isNumber&amp;isFill" fw-alone="N">
                        <OPTION value="02">02</OPTION> 
                        <OPTION value="031">031</OPTION> 
                        <OPTION value="032">032</OPTION>
                        <OPTION value="033">033</OPTION> 
                        <OPTION value="041">041</OPTION> 
                        <OPTION value="042">042</OPTION> 
                        <OPTION value="043">043</OPTION>       
                        <OPTION value="044">044</OPTION>
                        <OPTION value="051">051</OPTION> 
                        <OPTION value="052">052</OPTION> 
                        <OPTION value="053">053</OPTION> 
                        <OPTION value="054">054</OPTION> 
                        <OPTION value="055">055</OPTION> 
                        <OPTION value="061">061</OPTION> 
                        <OPTION value="062">062</OPTION> 
                        <OPTION value="063">063</OPTION> 
                        <OPTION value="064">064</OPTION> 
                        <OPTION value="0502">0502</OPTION>
                        <OPTION value="0503">0503</OPTION> 
                        <OPTION value="0504">0504</OPTION>
                        <OPTION value="0505">0505</OPTION> 
                        <OPTION value="0506">0506</OPTION> 
                        <OPTION value="0507">0507</OPTION> 
                        <OPTION value="070">070</OPTION>
                        <OPTION value="010">010</OPTION> 
                        <OPTION value="011">011</OPTION>
                        <OPTION value="016">016</OPTION> 
                        <OPTION value="017">017</OPTION> 
                        <OPTION value="018">018</OPTION> 
                        <OPTION value="019">019</OPTION> 
                        </SELECT>-
                        <INPUT name="ophone1_[]" id="ophone1_2" type="text" size="4" maxlength="4" fw-msg="" fw-label="주문자 전화번호" fw-filter="isNumber&amp;isFill" fw-alone="N"></INPUT>-
                        <INPUT name="ophone1_[]" id="ophone1_3" type="text" size="4" maxlength="4" fw-msg="" fw-label="주문자 전화번호" fw-filter="isNumber&amp;isFill" fw-alone="N"></INPUT>
                    </TD>
                
                </TR>

                <TR>
                    <TH scope="row">휴대전화</TH>
                    <TD>
                        <SELECT name="ophone2_[]" id="ophone2_1" fw-msg="" fw-label="주문자 핸드폰번호" fw-filter="isNumber" fw-alone="N">
                            <OPTION value="010">010</OPTION> 
                            <OPTION value="011">011</OPTION>
                            <OPTION value="016">016</OPTION> 
                            <OPTION value="017">017</OPTION> 
                            <OPTION value="018">018</OPTION> 
                            <OPTION value="019">019</OPTION> 
                        </SELECT>-
                        <INPUT name="ophone2_[]" id="ophone2_2" type="text" size="4" maxlength="4" fw-msg="" fw-label="주문자 핸드폰번호" fw-filter="isNumber" fw-alone="N"></INPUT>-
                        <INPUT name="ophone2_[]" id="ophone2_3" type="text" size="4" maxlength="4" fw-msg="" fw-label="주문자 핸드폰번호" fw-filter="isNumber" fw-alone="N"></INPUT>
                    </TD>
                </TR>
                
                <TR>
                    <TH scope="row">E-mail</TH>
                    <TD><INPUT name="oemail1" id="oemail1" type="text" fw-msg="" fw-label="주문자 이메일" fw-filter="isFill" fw-alone="N">@<INPUT name="oemail2" id="oemail2" type="text" readonly="readonly" fw-msg="" fw-label="주문자 이메일" fw-filter="isFill" fw-alone="N">
                        <SELECT id="oemail3" fw-msg="" fw-label="주문자 이메일" fw-filter="isFill" fw-alone="N"> 
                            <OPTION selected="selected" value="">- 이메일 선택 -</OPTION>
                            <OPTION value="naver.com">naver.com</OPTION> 
                            <OPTION value="daum.net">daum.net</OPTION> 
                            <OPTION value="nate.com">nate.com</OPTION>
                            <OPTION value="hotmail.com">hotmail.com</OPTION>
                            <OPTION value="yahoo.com">yahoo.com</OPTION> 
                            <OPTION value="empas.com">empas.com</OPTION>]
                            <OPTION value="korea.com">korea.com</OPTION> 
                            <OPTION value="dreamwiz.com">dreamwiz.com</OPTION> 
                            <OPTION value="gmail.com">gmail.com</OPTION> 
                            <OPTION value="etc">직접입력</OPTION> 
                        </SELECT> 
                        <BR>제품구입시 E-mail을 통해 주문처리과정을 보내 드립니다.
                        <BR>E-mal 주소란에는 반드시 수신가능한  E-mail 주소를 입력해 주십시오.
                    
                            </TD></TR>
                        <TR>
    <TH scope="row">배송메시지</TH>
    <TD><TEXTAREA name="omessage" id="omessage" maxlength="255" cols="70" fw-msg="" fw-label="배송 메세지" fw-filter=""></TEXTAREA><BR><SPAN 
      class="displaynone">
        </SPAN></TD></TR>
            </TBODY>
        </TABLE></DIV></DIV>
        <script> 
     //본 예제에서는 도로명 주소 표기 방식에 대한 법령에 따라, 내려오는 데이터를 조합하여 올바른 주소를 구성하는 방법을 설명합니다. 
     function execDaumPostcode() { 
         new daum.Postcode({ 
             oncomplete: function(data) { 
                 // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분. 
  
                 // 도로명 주소의 노출 규칙에 따라 주소를 조합한다. 
                 // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다. 
                 var fullRoadAddr = data.roadAddress; // 도로명 주소 변수 
                 var extraRoadAddr = ''; // 도로명 조합형 주소 변수 
                 var sido = data.sido; 
                 var sigungu = data.sigungu; 
  
                 // 법정동명이 있을 경우 추가한다. (법정리는 제외) 
                 // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다. 
                 if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){ 
                     extraRoadAddr += data.bname; 
                 } 
                 // 건물명이 있고, 공동주택일 경우 추가한다. 
                 if(data.buildingName !== '' && data.apartment === 'Y'){ 
                     extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName); 
                 } 
                 // 도로명, 지번 조합형 주소가 있을 경우, 괄호까지 추가한 최종 문자열을 만든다. 
                 if(extraRoadAddr !== ''){ 
                     extraRoadAddr = ' (' + extraRoadAddr + ')'; 
                 } 
                 // 도로명, 지번 주소의 유무에 따라 해당 조합형 주소를 추가한다. 
                 if(fullRoadAddr !== ''){ 
                     fullRoadAddr += extraRoadAddr; 
                 } 
  
                 var remainRoadAddr = fullRoadAddr.replace(sido + " " + sigungu, ""); 
                 var remainjibunAddr = data.jibunAddress.replace(sido + " " + sigungu, ""); 
  
                 // 우편번호와 주소 정보를 해당 필드에 넣는다. 
                 document.getElementById('zip_code').value = data.zonecode; //5자리 새우편번호 사용 
                 document.getElementById('old_zip_code').value = data.postcode; //6자리 우편번호 사용 
                 document.getElementById('roadAddress').value = fullRoadAddr; 
                 document.getElementById('jibunAddress').value = data.jibunAddress; 
                 document.getElementById('user_selected_type').value = data.userSelectedType; //검색 결과에서 사용자가 선택한 주소의 타입(R(도로명), J(지번)) 
  
                 document.getElementById('sido').value = sido; 
                 document.getElementById('sido2').value = sido; 
                 document.getElementById('sigungu').value = sigungu; 
                 document.getElementById('sigungu2').value = sigungu; 
                 document.getElementById('remain_road_addr').value = remainRoadAddr; 
                 document.getElementById('remain_jibun_addr').value = remainjibunAddr; 
  
  
                 // 사용자가 '선택 안함'을 클릭한 경우, 예상 주소라는 표시를 해준다. 
                 if(data.autoRoadAddress) { 
                     //예상되는 도로명 주소에 조합형 주소를 추가한다. 
                     var expRoadAddr = data.autoRoadAddress + extraRoadAddr; 
                     document.getElementById('guide').innerHTML = '(예상 도로명 주소 : ' + expRoadAddr + ')'; 
  
                 } else if(data.autoJibunAddress) { 
                     var expJibunAddr = data.autoJibunAddress; 
                     document.getElementById('guide').innerHTML = '(예상 지번 주소 : ' + expJibunAddr + ')'; 
  
                 } else { 
                     document.getElementById('guide').innerHTML = ''; 
                 } 
             } 
         }).open(); 
     } 
 </script>

        
        
        
        
        
        
        
       <!-- //배송지 정보 --> <!-- 해외 배송지 정보 --> 

<H3>결제정보</H3><!-- 적립금 -->         
<DIV class="boardView ">
<TABLE class="boardView ordAdd" summary="적립금 정보 입력란입니다.">
  <CAPTION>적립금 정보 입력</CAPTION>
  <TBODY>
  <TR>
    <TH scope="row">적립금사용</TH>
    <TD>
      <P><INPUT name="input_mile" class="inputTypeText" id="input_mile" type="text" size="10" placeholder="" fw-msg="" fw-label="적립금" fw-filter=""> 
      원 (총 사용가능 적립금 : 
          <?php 
          if($my_save==0){
echo "0";}else{
          echo ($my_save);
          }    
          ?>원)
          </P>
      <P>적립금은 최소 2,000 이상일 때 결제가능합니다.</P>
      <P id="mileage_max_unlimit">최대 사용금액은 제한이 없습니다.</P>
      <P class="displaynone" id="mileage_max_limit">1회 구매시 적립금 최대 사용금액은 입니다.</P>
      <P>적립금으로만 결제할 경우, 결제금액이 0으로 보여지는 것은 정상이며 [결제하기] 버튼을 누르면 주문이 완료됩니다.</P>
      <P class="displaynone" id="mileage_shipfee">적립금 사용 시 배송비는 적립금으로 사용 할 수 
      없습니다.</P>
      <P class="displaynone" id="mileage_exception">적립금 사용 시 해당 상품에 대한 적립금은 적립되지 
      않습니다.</P></TD></TR></TBODY></TABLE></DIV>
    <!-- 비회원 결제 --><!-- 네이버 마일리지 -->         
<DIV class="boardView displaynone">
<TABLE class="boardView ordAdd" summary="네이버 마일리지 정보 입력란 입니다.">
  <CAPTION>네이버 마일리지</CAPTION>
  <TBODY>
  <TR>
    <TH scope="row"><LABEL><INPUT name="np_use[]" id="np_use0" type="checkbox" 
      value="T" fw-msg="" fw-label="네이버포인트 사용여부" fw-filter=""><LABEL for="np_use0"></LABEL> 
      네이버 마일리지</LABEL>                 </TH>
    <TD><SPAN id="ex_tx_np_save" style="display: none;">[np_rate]% 적립</SPAN>   
                        <SPAN id="ex_tx_np_use" 
      style="display: none;">[np_use]마일 사용</SPAN>                     <SPAN id="divNvPointSave" 
      style="display: none;"><SPAN id="txt_np_save"></SPAN></SPAN>               
            <SPAN id="divNvPointOpr" style="display: none;">/</SPAN>             
              <SPAN id="divNvPointUse" style="display: none;"><SPAN id="txt_np_use"></SPAN></SPAN> 
                                             
                          <IMG id="imgNaverMileageHelp" 
      onclick="" src="">                 &nbsp;</TD></TR>
</TBODY></TABLE></DIV><!-- 네이버마일리지 or 적립금 사용(택1) --> 
        
<DIV class="boardView displaynone">
<TABLE class="boardView ordAdd" summary="다음 쇼핑원 비회원 결제 입력란입니다.">
  <CAPTION>다음 쇼핑원 비회원 결제</CAPTION>
  <TBODY>
  <TR>
    <TH scope="row">Daum 비회원구매<BR>쇼핑정보제공동의</TH>
    <TD>
      <DIV></DIV>                    다음 비회원 구매 및 결제 개인정보취급방침에 대하여 동의하십니까?        
               </TD></TR></TBODY></TABLE></DIV><!-- 전자보증보험 -->         
<!-- 청약철회방침 --> 
        
<!-- 제품 결제 금액 안내 -->         
       
<DIV class="boardView">
<TABLE class="boardView ordAdd" summary="제품 결제 금액 안내표 입니다.">
  <CAPTION>결제방식 선택</CAPTION>
  <TBODY>
  <TR>
    <TH scope="row">결제방식 선택</TH>
    <TD>
        <SPAN class="ec-base-label">
            <INPUT name="addr_paymethod" id="addr_paymethod0" 
      type="radio" value="cash" fw-msg="" fw-label="결제방식" 
      fw-filter="isFill"/>
                <LABEL for="addr_paymethod0">무통장 입금</LABEL>
                </SPAN> 
      <SPAN class="ec-base-label">
          <INPUT name="addr_paymethod" id="addr_paymethod1" 
      type="radio" value="payco" fw-msg="" fw-label="결제방식" 
      fw-filter="isFill"/>
              <LABEL for="addr_paymethod1">페이코(간편결제) <A href="http://www.payco.com/payco/guide.nhn" 
      target="_blank"></A></LABEL></SPAN> 
      <SPAN class="ec-base-label">
          <INPUT name="addr_paymethod" id="addr_paymethod2" 
      type="radio" value="card" fw-msg="" fw-label="결제방식" 
      fw-filter="isFill">
              <LABEL for="addr_paymethod2">카드 결제</LABEL></SPAN>
          <SPAN class="ec-base-label">
              <INPUT name="addr_paymethod" id="addr_paymethod3" 
      type="radio" value="tcash" fw-msg="" fw-label="결제방식" 
      fw-filter="isFill">
                  <LABEL for="addr_paymethod3">에스크로(실시간 
      계좌이체)</LABEL></SPAN>
              <SPAN class="ec-base-label">
                  <INPUT name="addr_paymethod" 
      id="addr_paymethod4" type="radio" value="cell" fw-msg="" fw-label="결제방식" 
      fw-filter="isFill">
                      <LABEL for="addr_paymethod4">휴대폰 결제</LABEL></SPAN>      
                         
            <UL id="payment_input_tcash" style="display: none;">
        <LI><STRONG>예금주명</STRONG><INPUT name="allat_account_nm" class="inputTypeText" id="allat_account_nm" type="text" size="26" maxlength="30" placeholder="" fw-msg="" fw-label="무통장 입금자명" fw-filter=""></LI></UL>
      <UL id="payment_input_esc_vcash" style="display: none;">
        <LI>구매자 주민번호  -  (주민번호를 입력하세요)</LI>
        <LI>배송완료 후, 구매확정시에 본인확인을 위한 주민번호 입니다.</LI>
       </UL></TD></TR></TBODY></TABLE></DIV><!-- //결제방식 선택 -->     </DIV>

      
<DIV class="btnArea smp-btn-pay-info">
    <P class="btnRight"><a herf='#' onclick="submit()"><img id="btn_payment" alt="결제하기" src="./img/btn_ordPayment.gif"></a>
    
    </P></DIV>
    </from>
    

</BODY></HTML>
