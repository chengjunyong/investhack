<?php 
include 'dbcon.php'; 

$servername = "localhost";
$username = "root";
$password = "";
$db = "investhack";

$conn = new mysqli($servername, $username, $password, $db);

$a = 1;

function getStockList(){
	$sql = "SELECT * FROM stock_list";
	// $result = $conn->query($sql);

	return $a;
}

?>

