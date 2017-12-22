<?php
require_once('../../db/database.php');
$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("modify.php error");
$kind = $_GET['kind'];
$object = $_GET['object'];
$name = $_GET['name'];
$type= $_GET['type'];
$sql = "SELECT * FROM  shoppingmall.".$clothes_tbl." where name='$name'";
$result = mysql_query($sql,$conn);
?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>이미지 업로드</title>

    <!-- Bootstrap CSS -->
    <link href="../boostrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/modify.css" rel="stylesheet">
    <!-- Javascript -->
    <script type="text/javascript" src="../js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="../js/modifyType.js"></script>
      
  </head>

  <body>
    <span id='order' style="display:none"><?php if(isset($order)){echo($order);}?></span>
    <span id='name' style="display:none"><?php if(isset($name)){echo($name);}?></span>
      
    <!-- 최상단-->
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href=""><p>품명: <?php echo($name) ?> </p></a>
        </div>
      </div>
    </div>

    <div class="container">
        
	   <div class="row">
	      	<div class="col-lg-12">
	      
                    <p>상위 카테고리 :<input style="display:none" type="text" name="kind" maxlength="20"  value='<?php echo($kind);?>' > <?php echo($kind) ?></p>
                    <p>하위 카테고리 :<input style="display:none" type="text" name="kind" maxlength="20"  value='<?php echo($object);?>' > <?php echo($object) ?></p>
                    <p>품명 :<input style="display:none" type="text" name="name" maxlength="20" value='<?php echo($name);?>' > <?php echo($name) ?></p>
                    <p>타입 :<input style="display:none" type="text" name="name" maxlength="20" value='<?php echo($type);?>' > <?php echo($type) ?></p>
                    
                
                    <form class="well" action="./view/modify.php" method="post" enctype="multipart/form-data">
                    <input style="display:none" type="text" id='name1' name="name" maxlength="20">
                    타입 재설정:
                    <select id='selecttype' name='type'>
                    <option value="noType" selected>noType</option>
                    <option value="best">best</option>
                    <option value="new">new</option>
                    </select>   
                    <input type="submit" value="타입 변경">
                    </form>
              
			</div>
	   </div>
        
     
       <div class='row'> 
            	
            <?php //데이터베이스에 있는 상품
            
                if(is_resource($result)){
                    
                    while($row=mysql_fetch_array($result))
                    {   
                    echo('
                    <p>상품 이미지</p><img id="object" src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>
                    <p>상품설명 이미지</p><img id="description" src="data:image/jpeg;base64,'. base64_encode($row['description']) .'"/>');
                    for($i=1;$i<10;$i++){
                        if($row['description'.$i]!=null){
                            echo('<p>상품설명 이미지</p><img id="description" src="data:image/jpeg;base64,'. base64_encode($row['description'.$i]) .'"/>');
                        }
                    }
                        
                    }
                }
	       ?>
      </div>
        
    </div> <!-- /container -->

  </body>
</html>

