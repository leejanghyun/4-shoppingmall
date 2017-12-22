<body>

<form method ="post" action="../db/login.php">

    <table class ="logintbl">
   <!-- 헤드부 -->
    <div id='logintitle'>login</div>

        <tr>
           <th>ID</th>
             <td>
               <input type="text" name="userid" minlength="4" maxlength="16"/>
             </td>
        </tr>

        <tr>
           <th>PW</th>
            <td>
                <input type="password" name="pw" minlength="4" maxlength="16"/>
            </td>
        </tr>

        <tr>
           <td colspan="2">
               <input class='login' type="submit" value="login"/> <a class='idfind' type="submit">id/pw찾기</a>
              
            </td>
        </tr>
    </table>
</form>
</body>
