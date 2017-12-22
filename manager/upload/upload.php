<?php
require_once('../../db/database.php');
$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("comment_insert.php error");

function errorPrint($error)
{
        switch ($error) {
		case UPLOAD_ERR_INI_SIZE:
			$response = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
               echo($response);
			break;
		case UPLOAD_ERR_PARTIAL:
			$response = 'The uploaded file was only partially uploaded.';
            echo($response);
			break;
		case UPLOAD_ERR_NO_FILE:
			$response = 'No file was uploaded.';
            echo($response);
			break;
		case UPLOAD_ERR_NO_TMP_DIR:
			$response = 'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';
            echo($response);
            break;
		case UPLOAD_ERR_CANT_WRITE:
			$response = 'Failed to write file to disk. Introduced in PHP 5.1.0.';
            echo($response);
			break;
	   }
   

}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $kind_object=$_POST['kind_object'];
    $arr = split(',',$kind_object);
    $objkind=$arr[0];
    $objobject=$arr[1];
    $objtype=$_POST['type'];
    $objname=$_POST['name'];    //상품이름
    $imgnum=(int)$_POST['selectimg'];
   
    
    
    if(strlen($objkind)<1 ||strlen($objobject)<1  || strlen($objname)<1){
        echo ("<script language='JavaScript'>
        window.alert('입력 양식을 모드 채워주세요')
        window.location.href='../upload.php';
        </script>");
    }
    else{
        
        $name     = $_FILES['file']['name']; //file:상품 이미지
        $tmpName  = $_FILES['file']['tmp_name'];
        $error    = $_FILES['file']['error'];
        $size     = $_FILES['file']['size'];
        $ext	  = strtolower(pathinfo($name, PATHINFO_EXTENSION));
 
        $imagesname=array();
        $imagestmpname=array();
        $imageserror=array();
        $imagessize=array();
        $imagesext=array();
        
        for($i = 0; $i < $imgnum; $i++){
            
           array_push($imagesname,$_FILES['file'.($i+1)]['name']);
           array_push($imagestmpname,$_FILES['file'.($i+1)]['tmp_name']);
           array_push($imageserror,$_FILES['file'.($i+1)]['error']);
           array_push($imagessize,$_FILES['file'.($i+1)]['size']);
           array_push($imagesext,strtolower(pathinfo($imagesname[$i], PATHINFO_EXTENSION)));
        }
        
        errorPrint($error);//error발생
        
        for($i=0;$i< $imgnum; $i++){
            errorPrint($imageserror[$i]);
        }
       
        $imageserror=0;
        
        for($i=0;$i<$imgnum; $i++){
            
            if($imageserror[$i]!=UPLOAD_ERR_OK){
                $imageserror=1;
            }
        }
        
        if( ( ($error==UPLOAD_ERR_OK) && ($imageserror==0)) ) {//이미지 파일에 이상없을시
            
    
            $valid = true;
		
			if (!in_array($ext, array('jpg','jpeg','png','gif'))) {
				$valid = false;
				$response = 'Invalid file extension.';
			}
			
            for($i=0;$i< $imgnum; $i++){
                if(!in_array($imagesext[$i], array('jpg','jpeg','png','gif'))){
                   $valid = false;
				   $response = 'Invalid file extension.';
                }
            }
         
			if ( ($size/1024/1024 > 5)  ) {
				$valid = false;
				$response = 'File size is exceeding maximum allowed size.';
                echo($response);//error발생
			}
			
            for($i=0;$i< $imgnum; $i++){
                if( ($imagessize[$i]/1024/1024>5) ){
                    $valid = false;
                    $response = 'File size is exceeding maximum allowed size.';
                    echo($response);//error발생
                }
            }
                 
			if ($valid) {
                
				$targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. '../image' . DIRECTORY_SEPARATOR. 'sample'.'.'.$ext;  
                
                $imagestargetPath=array();
                for($i=0;$i< $imgnum; $i++){
                    array_push($imagestargetPath, dirname( __FILE__ ) . DIRECTORY_SEPARATOR. '../image' . DIRECTORY_SEPARATOR.'sample'.''.$i.'Des.'.$imagesext[$i]);
                }
                
                move_uploaded_file($tmpName,$targetPath);
                
                for($i=0;$i<$imgnum;$i++){
                     move_uploaded_file($imagestmpname[$i],$imagestargetPath[$i]);
                }
             
                $fileinfo = pathinfo($targetPath);
                
                $imagesfileinfo=array();
                for($i=0;$i< $imgnum; $i++){
                    array_push($imagesfileinfo,pathinfo($imagestargetPath[$i]));
                }
             
                $imagestype=array();
                for($i=0;$i< $imgnum; $i++){
                    array_push($imagestype, $imagesfileinfo[$i]['extension']);
                }
            
                $imageblob=addslashes(fread(fopen($targetPath,"r"),filesize($targetPath)));     
              
                $imageblobArr=array();
                for($i=0; $i<$imgnum; $i++){                     array_push($imageblobArr,addslashes(fread(fopen($imagestargetPath[$i],"r"),filesize($imagestargetPath[$i]))));
                }
                
                for($i=$imgnum; $i<10; $i++){                         
                    array_push($imageblobArr,null);
                }
            
                $sql="INSERT INTO shoppingmall.$clothes_tbl(`kind`,`object`,`name`,`type`,`image`,`description`,`description1`,`description2`,`description3`,`description4`,`description5`,`description6`,`description7`,`description8`,`description9`) VALUES ( '".$objkind."','".$objobject."','".$objname."', '".$objtype."','".$imageblob."','".$imageblobArr[0]."','".$imageblobArr[1]."','".$imageblobArr[2]."','".$imageblobArr[3]."','".$imageblobArr[4]."','".$imageblobArr[5]."','".$imageblobArr[6]."','".$imageblobArr[7]."','".$imageblobArr[8]."','".$imageblobArr[9]."')";
   
                $result = mysql_query($sql,$conn)or die(mysql_error());   
           }
            
           header( 'Location: ../upload.php' ) ;
           exit;
        }	  
    }
}
?>