
<title>회원가입창</title>
    <script src = "../join/js/jquery-1.10.1.min.js"></script>
    <script src ="../join/js/join.js"></script>
    <script src ="../join/js/joinHandeler.js"></script>
<!-- 이름, 주민등록번호, 아이디, 비밀번호, 비밀번호확인, 생년월일,
     이메일, 우편번호, 주소, 전화번호, 휴대전화번호, 결혼여부, 직업, 가입경로, -->

<body onresize="parent.resizeTo(500,400)" onload="parent.resizeTo(500,400)">
<div id= 'joincontainer'>
<form method = "post" action ="../join/server/join.php">
<table class ="jointable">
	<!-- 헤드부 -->

    <thead>
        <div id = "jointitle">
          Join</br></div>
        <div id ="joinsubtitle">필수 입력사항</div>
    </thead>
    <!-- 바디부 -->
    <tbody>
        <!-- 이름 -->
        <tr>
        	<th>이름 </th>
            <td>
            	<input  type="text" name="name"/>
             </td>
        </tr>
        <!-- 주민등록번호 -->
         <tr>
        	<th>주민등록번호 </th>
            <td>
            	<input type="text" name="ssn1" maxlength="6" />
                - <input type="password" name="ssn2" maxlength="7" />
             </td>
        </tr>

        <!-- 아이디 -->
        <tr>
        	<th>아이디</th>
            <td>
            	<input type="text" name="user_id" id="ckid" minlegth ="4" maxlength="16" />
                <p id='idck'> </p>
             </td>
        </tr>
        <!-- 비밀번호 -->
        <tr>
        	<th>비밀번호</th>
            <td>
            	<input type="password" name="password" maxlength="16"/>
             </td>
        </tr>

        <!-- 생년월일 -->
        <tr>
        	<th>생년월일</th>
            <td>
            	<input type="text" maxlength="4"  name="birth_year" size="5"/>년
            	<select class ='select' name="birth_month">
                	<option value="01">1
                  	<option value="02">2
			        <option value="03">3
              		<option value="04">4
                  	<option value="05">5
			        <option value="06">6
                    <option value="07">7
                  	<option value="08">8
			        <option value="09">9
                    <option value="10">10
                  	<option value="11">11
			        <option value="12">12
                </select> 월
                <select class ='select' name="birth_day">
                	<option value="01">1
                  	<option value="02">2
			        <option value="03">3
              		<option value="04">4
                  	<option value="05">5
			        <option value="06">6
                    <option value="07">7
                  	<option value="08">8
			        <option value="09">9
                    <option value="10">10
                  	<option value="11">11
			        <option value="12">12
                  	<option value="13">13
                  	<option value="14">14
			        <option value="15">15
              		<option value="16">16
                  	<option value="17">17
			        <option value="18">18
                    <option value="19">19
                  	<option value="20">20
			        <option value="21">21
                    <option value="22">22
                  	<option value="23">23
			        <option value="24">24
                   	<option value="25">25
                  	<option value="26">26
			        <option value="27">27
              		<option value="28">28
                  	<option value="29">29
			        <option value="30">30
                    <option value="31">31
                </select> 일

             </td>
        </tr>

        <!-- 우편번호-->
        <tr>
        	<th>우편번호</th>
            <td>
            	<input type="text" name="inZip1" size="7" />-
                <input type="text" name="inZip2" size="7" />
              	<a href="#none" title="우편번호 검색(새창으로 열기)" onclick="" id="postBtn"><img src="http://img.echosting.cafe24.com/design/skin/mono/btn_zip.gif" alt="우편번호 검색"/></a>
             </td>
        </tr>
        <script type="text/javascript" src="../../퀄리티 높은 _허밍슈퍼_입니_files/optimizer(1).js"></script>
        <script type="text/javascript" src="../../퀄리티 높은 _허밍슈퍼_입니_files/optimizer(2).js"></script>
        <script type="text/javascript" src="../../퀄리티 높은 _허밍슈퍼_입니_files/optimizer(3).js"></script>
        <script type="text/javascript">
        var mobileWeb = false;
        var bUseElastic = false;
        var aSearchBannerData = [{"msb_idx":1,"msb_prt_no":0,"msb_contents":"search","msb_type":" ","msb_cate_no":0,"msb_keyword":"","msb_url":"","product_name":null,"category_name":null,"banner_action":null}];
        var sSearchBannerType = 'F';
        var sSearchBannerUseFlag = 'T';
        var isCountryOfLanguage = 'F'
        var displayMemberType = {"business":"F","foreign":"F"};
        $(document).ready(function() {
        ZipcodeFinder.Opener.bind('postBtn', 'postcode1', 'postcode2', 'addr1', 'layer',  'city_name' , 'state_name', 'ko_KR', 'addr2','');
        });
        var userOption= {"returnUrl":"\/member\/join_result.html","checkIdUrl":"\/member\/check_id.html","personalName":"\uc774\ub984","personalSsn":"\uc8fc\ubbfc\ub4f1\ub85d\ubc88\ud638","companyName":"\ubc95\uc778\uba85","companySsn":"\ubc95\uc778\ubc88\ud638","foreignerSsn1":"\uc678\uad6d\uc778 \ub4f1\ub85d\ubc88\ud638","foreignerSsn2":"\uc5ec\uad8c\ubc88\ud638","foreignerSsn3":"\uad6d\uc81c\uc6b4\uc804\uba74\ud5c8\uc99d\ubc88\ud638"}
        $(document).ready(function() {
        var elmSelect = $('#email3');
        var elmTarget = $('#email2');
        elmSelect.bind('change', null, function() {
        var host = this.value;
        if (host != 'etc' && host != '') {
        elmTarget.attr('readonly', true);
        elmTarget.val(host).change();
        } else if (host == 'etc') {
        elmTarget.attr('readonly', false);
        elmTarget.val('').change();
        elmTarget.focus();
        } else {
        elmTarget.attr('readonly', true);
        elmTarget.val('').change();
        }
        });
        });
        $(document).ready(function(){
        AuthSSL.Bind('joinForm', ["joinForm::member_type","joinForm::useSimpleSignin","joinForm::member_name_cert_flag","joinForm::is_name_auth_use","joinForm::is_ipin_auth_use","joinForm::is_mobile_auth_use","joinForm::is_email_auth_use","joinForm::default_auth_reg_page_flag","joinForm::personal_type","joinForm::real_name","joinForm::real_ssn1","joinForm::real_ssn2","joinForm::realNameEncrypt","joinForm::add1_name","joinForm::add2_name","joinForm::add3_name","joinForm::add4_name","joinForm::is_display_register_foreign","joinForm::f_identification_check[]","joinForm::foreigner_name","joinForm::foreigner_type","joinForm::foreigner_ssn","joinForm::member_id","joinForm::idDuplCheck","joinForm::passwd","joinForm::citizenship","joinForm::user_passwd_confirm","joinForm::email1","joinForm::email2","joinForm::email3","joinForm::emailDuplCheck","joinForm::login_id_type","joinForm::agree_service_check[]","joinForm::agree_privacy_check[]","joinForm::agree_information_check[]","joinForm::display_agree_information_check_flag","joinForm::agree_consignment_check[]","joinForm::display_agree_consignment_check_flag","joinForm::job","joinForm::display_required_job","joinForm::reco_id","joinForm::display_required_reco_id","joinForm::school","joinForm::display_required_school","joinForm::earning","joinForm::display_required_earning","joinForm::inter_check[]","joinForm::display_required_interest","joinForm::region","joinForm::display_required_region","joinForm::job_class","joinForm::display_required_job_class","joinForm::child","joinForm::display_required_child","joinForm::car","joinForm::display_required_car","joinForm::is_sex","joinForm::display_required_sex","joinForm::internet","joinForm::display_required_internet","joinForm::is_sms","joinForm::required_is_sms_flag","joinForm::is_news_mail","joinForm::required_is_news_mail_flag","joinForm::marry_year","joinForm::marry_month","joinForm::marry_day","joinForm::is_display_register_wedding","joinForm::display_required_is_wedding_anniversary","joinForm::partner_year","joinForm::partner_month","joinForm::partner_day","joinForm::is_display_register_life_partner","joinForm::display_required_is_life_partner","joinForm::birth_year","joinForm::birth_month","joinForm::birth_day","joinForm::is_solar_calendar","joinForm::is_display_register_birthday","joinForm::display_required_is_birthday","joinForm::nick_name","joinForm::nick_name_flag","joinForm::nick_name_confirm","joinForm::display_required_nick_name_flag","joinForm::display_required_add1","joinForm::display_required_add2","joinForm::display_required_add3","joinForm::display_required_add4","joinForm::passwd_type","joinForm::phone1","joinForm::phone2","joinForm::phone3","joinForm::is_display_register_phone","joinForm::display_required_phone","joinForm::display_register_phone","joinForm::name","joinForm::is_display_register_name","joinForm::display_required_name","joinForm::name_en","joinForm::is_display_register_eng_name","joinForm::display_required_name_en","joinForm::bank_account_owner","joinForm::refund_bank_code","joinForm::bank_account_no","joinForm::is_display_bank","joinForm::display_required_bank_account_no","joinForm::postcode1","joinForm::postcode2","joinForm::addr1","joinForm::addr2","joinForm::city_name","joinForm::state_name","joinForm::country","joinForm::is_display_register_addr","joinForm::__addr1","joinForm::__city_name","joinForm::__state_name","joinForm::direct_input_postcode1_addr[]","joinForm::display_required_address","joinForm::display_required_address2","joinForm::name_phonetic","joinForm::is_display_register_name_phonetic","joinForm::display_required_name_phonetic","joinForm::mobile1","joinForm::mobile2","joinForm::mobile3","joinForm::is_display_register_mobile","joinForm::display_required_cell","joinForm::display_register_mobile","joinForm::hint","joinForm::hint_answer","joinForm::is_display_password_hint","joinForm::returnUrl","joinForm::sUseCountryNumberFlag","joinForm::sUseSeparationNameFlag","joinForm::is_use_checking_join_info","joinForm::is_lifetime","joinForm::name","joinForm::bname"]);
        });
        var aLogData = {"log_server1":"eclog2-124.cafe24.com","log_server2":"eclog2-124.cafe24.com","mid":"humming1"};
        var EC_ASYNC_LIVELINKON_ID = '';
        </script>
        <!-- 주소 -->
         <tr>
        	<th>주소</th>
            <td>
            	<input type="text" size="50" name="inAddr1" /><br/>
                <input type="text" size="50" name="inAddr2" \/>
             </td>
        </tr>

        <!-- 휴대전화번호 -->
        <tr>
        	<th>핸드폰번호</th>
            <td>
                <select class='select' name="Fphone">
                	<option value="010">010</option>
                    <option value="011">011</option>
                    <option value="016">016</option>
                    <option value="017">017</option>
                    <option value="018">018</option>
                    <option value="019">019</option>
                </select> <input type="text" size=3 maxlength="4" name="Mphone" />-
                <input type="text" size=3 maxlength="4" name="Lphone" />
             </td>
        </tr>
    </tbody>
    <!-- 버텀부 -->
	<tfoot>
    	<tr>
  			<td colspan="2">
            	<input class="joinbutton" type="submit" value="등록" />
              <input class="joinbutton" type="reset" value="취소" />
        </td>
        </tr>
    </tfoot>
    </form>
    </div>
</body>

</html>
