<?php
session_start();
if(isset($_SESSION['manager'])){
     header('Location: ./manager.php');
}

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>메니저 로그인</title>
    <script type="text/javascript" src="./js/jquery-1.10.1.min.js"></script> 
     <script type="text/javascript" src="./js/login.js"></script> 
    <link href="./css/login.css" rel="stylesheet" type="text/css" />
</head>

<body>
    
<div id="container">
<form method = "post" action="./login/login.php">

    <table class="login_tbl">   <!-- 헤드부 -->
        <thead> <!-- 테이블  최 상단 -->   
            <tr><th colspan="10">로그인</th></tr>
        </thead>
            <tfoot>
                <tr><th colspan="10"><p id='find'>아이디/비번 찾기</p></th></tr>
            </tfoot>

    <tbody id='login_tbody'>
        <tr>
           <th>ID</th>
             <td>
               <input type="text" name="managerid" minlength="4" maxlength="16"/>
             </td>
        </tr>
        
        <tr>
           <th>PW</th>
            <td>
               <input type="password" name="managerpw" minlength="4" maxlength="16"/>
               <input class='manager_login_btn' type="submit" value="login" />
             </td>
        </tr>
    </tbody>
        
    
</table>
</form>
     </div>
</body>
</html>