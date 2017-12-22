<?php

$hostname = "localhost";
$user = "root";


try {
$conn = new PDO('mysql:host=localhost;dbname=join_table', $user,'');
} catch(PDOException $e) {
print $e;
}

?>
