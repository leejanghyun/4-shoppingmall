<?php
require_once "../../db/database.php";
$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("idcheck.php error");

$id = $_POST['id'];

$sql = "SELECT * FROM shoppingmall.$person_tbl WHERE id='$id'";
$result = mysql_query($sql,$conn);
$count = mysql_num_rows($result);

if($count==0){
	echo json_encode("<span style='color:green;'>사용가능합니다.</span>",JSON_HEX_TAG | JSON_HEX_APOS |JSON_HEX_QUOT |JSON_HEX_AMP);
}
else{
	echo json_encode("<span style='color:red;'>사용불가능합니다.</span>",JSON_HEX_TAG | JSON_HEX_APOS |JSON_HEX_QUOT |JSON_HEX_AMP);
}

?>
