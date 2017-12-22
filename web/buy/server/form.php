<?php
require_once "../../../db/database.php"; 
$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("form_register.php error");
$sql="SELECT * 
    FROM shppingmallp.$item 
    WHERE no = 55 ";

      mysql_query("set names utf8");//한글꺠짐 방지
      $result= mysql_query($sql,$conn);  


if(is_resource($result)){

                    while($row= mysql_fetch_array($result)){
                    
                     echo ($row['no']);
                     echo($row['name']);
                     echo($row['color']);
                     echo($row['size']);
                     echo($row['price']);
                     echo($row['information']);
                        
                        }}
?>



