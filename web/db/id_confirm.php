<?php
if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) ||
   $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest'){
	die(json_encode(array('status' =>'잘못된호출')));
}

require_once './database.php';
$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("id_confirm.php error");

$idch = $_POST['id'];

$sql = "SELECT * FROM shoppingmall.$person_tbl WHERE id='".$idch."'";
$result = mysql_query($sql,$conn);
$count = mysql_num_rows($result);

if($count==0){
	echo json_encode("<span style='color:green;'>사용 가능 합니다.</span>",JSON_HEX_TAG | JSON_HEX_APOS |JSON_HEX_QUOT |JSON_HEX_AMP);
}
else{
	echo json_encode("<span style='color:red;'>이미 존재하는 아이디 입니다.</span>",JSON_HEX_TAG | JSON_HEX_APOS |JSON_HEX_QUOT |JSON_HEX_AMP);	
}
?>

