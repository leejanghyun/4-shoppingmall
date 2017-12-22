<?php
require_once('../db/database.php');
session_start();
if(!isset($_SESSION['manager'])){
     header('Location: ./login.php');
}

$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("comment_insert.php error");
mysql_query("set names utf8");

if(isset($_GET['condition'])){//조건 검색이 설정되있는경우
    $condition=$_GET['condition'];
    $value=$_GET['value'];
    
    if($condition=='object'){
        $condition='name';
    }
 
    $sql = "SELECT * FROM  ".$database.".".$clothes_tbl." where ".$condition." like '%".$value."%'";
}
else{
    $order="total";
    $num="total";
    $sql = "SELECT * FROM  ".$database.".".$clothes_tbl;  
}

$result = mysql_query($sql,$conn);

$sql_1 = "SELECT * FROM ".$database.".".$item_tbl."";
$result_1 = mysql_query($sql_1,$conn);
$kindArr=array();

while($row_1=mysql_fetch_array($result_1)){
    array_push($kindArr,[$row_1['kind'],$row_1['object']]);
}

?>


<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta charset="utf-8" />
    <title>이미지 업로드</title>
      
    <!-- Bootstrap CSS -->
    <link href="boostrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/upload.css" rel="stylesheet">
    <!-- Javascript -->
    <script type="text/javascript" src="./js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="./js/upload.js"></script>
  </head>

  <body>
    <span id='order' style="display:none"><?php if(isset($order)){echo($order);}?></span>
    <span id='num' style="display:none"><?php if(isset($num)){echo($num);}?></span>
    <span id='num' style="display:none"><?php if(isset($num)){echo($num);}?></span>
      
    <!-- 최상단-->
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
            <div class="upload_top">
                <a class="navbar-brand" href="./upload/clothes.php">item insert|</a>
                <a class="navbar-brand" href="upload.php"> 상품 업로드 | </a>
                <a class="navbar-brand" href="./manager.php"> 테이블 보기 | </a><a class="navbar-brand" href="./login/logout.php"> 로그아웃 |</a>
            </div>
        </div>
      </div>
    </div>

    <div class="container">
     <!-- 이미지 파일 업로드-->
	   <div class="row">
	      	<div class="col-lg-12">
	           <form class="well" action="./upload/upload.php" method="post" enctype="multipart/form-data">
				  <div class="form-group">
                      
				   카테고리 :<select id='category1' name='kind_object'>
                         <?php
                                $item_sql = "SELECT kind,object FROM ".$database.".".$item_tbl;
                                $item_result = mysql_query($item_sql,$conn);

                                while($row=mysql_fetch_array($item_result)){
                                    $category=$row['kind'].','.$row['object'];
                                    echo '<option value="'.$category.'">'.$category.'</option>';
                                }
                         ?>
                      </select> 
                    
                      <br>
                     
                    타입설정:
                    <select id='selecttype' name='type'>
                        <option value="noType" selected>noType</option>
                        <option value="best">best</option>
                        <option value="new">new</option>
                    </select>   <br>
                    품명 :<input type="text" name="name" maxlength="20">  <br>
                    대표 상품 이미지
                    <input type="file" name="file"><br>
                    상품 관련 이미지(max:10)
                     
                    <select id='selectimg' name='selectimg'>
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <div id='fileimg'>
                    <input type="file" name="file1">
                    </div>
				    <p class="help-block">jpg,jpeg,png,gif 파일만 허용(최대:5MB)</p>
				  </div>
				  <input type="submit" class="btn btn-lg btn-primary" value="Upload">
				</form>
			</div>
	   </div>
        
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
               <form class="well" action="./upload/insertItem.php" method="post" enctype="multipart/form-data">
                상위 카테고리 :
                <input id='kind' name='kind' type="text"  maxlength="10"> 
                하위 카테고리 :
                <input id='object' name='object' type="text"  maxlength="10">
                <input type="submit" class="btn btn-lg btn-primary" value="insert">
                <br>*카테고리의 아이템을 삽입합니다.
                <a href="./upload/clothes.php" class="btn btn-info btn-xs" role="button">보기</a>
                </form>
            </div>
        </div>
        
        
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <form class="well" action="./upload/removeItem.php" method="post" enctype="multipart/form-data">
                카테고리 :
                <select id="objectDelete" name='kind_object'>
                       
                          <?php
                                $itemArr = "SELECT kind,object FROM  shoppingmall.".$item_tbl;
                                $itemResult = mysql_query($itemArr,$conn);

                                while($row=mysql_fetch_array($itemResult)){
                                    $category=$row['kind'].','.$row['object'];
                                    echo '<option value="'.$category.'">'.$category.'</option>';
                                }
                         ?>
                </select>
              
                
                    
                    
                <input type="submit" class="btn btn-danger btn-xs" value="delete">
                </form>
                <p id='red'>*주의 버튼클릭시 해당 종류를 갖는 모든 품목은 삭제됩니다.</p>
            </div>
        </div>
        
    
        
           <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                
                검색 조건 :
                <select id='orderSelect2' name='orderSelect2'>
                        <option value="select" selected>선택하기</option>
                        <option value="total">전체보기</option>
                        <option value="object">품명</option>
                        <option value="type">타입</option>
                </select>
            
                <input id='conditionValue' type="text"  maxlength="10"> 
                <input  id='btn' type="button" onclick="btnClick()" value=" 검색 "> <p id='red'>*해당 단어가 포함된 품목을 가져옵니다.</p> <br>
                타입 종류:noType, best, new
                
            </div>
        </div>
        	
         <div class='row'> 
	       <?php //데이터베이스에 있는 상품
            
                if(is_resource($result)){
                   
                    while($row=mysql_fetch_array($result))
                    {   
                        echo '<div class="col-md-3">
                        <div class="thumbnail">
                        <p>상위 카테고리 :'.$row['kind'].'</p><p>하위 카테고리 :'.$row['object'].'</p><p> 품명 :'.$row['name'].'</p>
                        <p>타입 :'.$row['type'].'  </p>
                        <img style="display:none" id="description" src="data:image/jpeg;base64,'. base64_encode($row['description']) .'"/>
                        <img id="object" src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>
                        <div class="caption">
                        <p><a href="./upload/remove.php?name='.$row['name'].'" class="btn btn-danger btn-xs" role="button">삭제 </a>
                        <a href="./upload/view.php?name='.$row['name'].'&type='.$row['type'].'&kind='.$row['kind'].'&object='.$row['object'].'" class="btn btn-info btn-xs" role="button">보기</a>
                        </p></div></div></div>';
                    }
                }

	       ?>
    	</div>
        
    </div> <!-- /container -->

  </body>
</html>