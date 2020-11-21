<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "investhack";

$conn = new mysqli($servername, $username, $password,$db);

function getStockList($conn){
	$sql = "SELECT * FROM stock_list";
	$result = $conn->query($sql);

	return $result;
}

function getCompanyProfile($conn,$id){
	$sql = "SELECT * FROM stock_list WHERE id=".$id;
	$result = $conn->query($sql);

	return $result;
}

function getUserDetail($conn){
	$sql = "SELECT * FROM user";
	$result = $conn->query($sql);

	return $result;
}

?>