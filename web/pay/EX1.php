<html>
    <script src ="./javascript/jquery-1.10.1.min.js"></script>
    <script src ="javascript/jquery-1.7.2.js"></script>
    <script src ="javascript/E1.js"></script>
    
    <body>
        <form action= pay.php method= post>
            

            <?php
                $name= 'hoho';
                $price = 10000;
                $delivery = 100;
                $option1 = 'blue';
                $quantity = 5;
                $my_save= 2000;
                echo"<input type ='hidden' name ='name'  value='".$name."' onClick=''javascript:content_view(name);'/>";
                echo"<input type ='hidden' name ='price'  value='".$price."'>";
                echo"<input type ='hidden' name='option1' value='".$option1."'>";
                echo"<input type ='hidden' name='quantity' value='".$quantity."'>";
                echo"<input type ='hidden' name='my_save' value='".$my_save."'>";
            echo $delivery. "원";
            ?>
            
            
            
            
            
            <a href=pay.php"" onClick="content_view(0)" class="submit-link">subma</a>
            
           <input type ='submit'>
        </form>
    
    </body>

</html>
