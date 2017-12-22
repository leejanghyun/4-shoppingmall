<?php
require_once "../../db/database.php";
$conn=mysql_connect($dbServer,$dbUser,$dbPass) or die("form_register.php error");


$idch = $_POST['user_id'];

$sql = "SELECT * FROM shoppingmall.$person_tbl WHERE id='".$idch."'";
$result = mysql_query($sql,$conn);
$count = mysql_num_rows($result);
if($count==0){
	echo json_encode("<span style='color:green;'>asdasdfadsfasfadf.</span>",JSON_HEX_TAG | JSON_HEX_APOS |JSON_HEX_QUOT |JSON_HEX_AMP);



}
else{
	echo json_encode("<span style='color:red;'>bbbbbbb.</span>",JSON_HEX_TAG | JSON_HEX_APOS |JSON_HEX_QUOT |JSON_HEX_AMP);

?>
