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

function getUserProfile($conn,$id){
	$sql = "SELECT * FROM user WHERE id=".$id;
	$result = $conn->query($sql);

	return $result;
}

function getCompanyDetail($conn,$company_id){
	$sql = "SELECT * FROM company_detail WHERE company_id='".$company_id."'";
	$result = $conn->query($sql);

	return $result;
}

function getUserDetail($conn){
	$sql = "SELECT * FROM user";
	$result = $conn->query($sql);

	return $result;
}

function getMachineById($conn,$id){
	$sql = "SELECT * FROM machine WHERE id=".$id;
	$result = $conn->query($sql);

	return $result;
}

function getMentor($conn){
	$sql = "SELECT * FROM guru ORDER BY roi DESC	";
	$result = $conn->query($sql);

	return $result;
}

function getOpinion($conn){
	$sql = "SELECT * FROM guru_post";
	$result = $conn->query($sql);
	return $result;
}


function getGuruById($conn,$id){
	$sql = "SELECT * FROM guru WHERE id=".$id ;
	$result = $conn->query($sql);

	return $result;
}


function getUserById($conn,$id){
	$sql = "SELECT * FROM user WHERE id=".$id ;
	$result = $conn->query($sql);

	return $result;
}
function getPostById($conn,$id){
	$sql = "SELECT * FROM guru_post WHERE guruid=".$id ;
	$result = $conn->query($sql);

	return $result;
}
function getStockById($conn,$id){
	$sql = "SELECT * FROM guru_portfolio WHERE guruid=".$id ;
	$result = $conn->query($sql);

	return $result;
}

function getEducationById($conn,$id){
	$sql = "SELECT * FROM guru_education WHERE guruid=".$id ;
	$result = $conn->query($sql);

	return $result;
}


function getForumTopicById($conn,$id){
	$sql = "SELECT * FROM forum_topic WHERE guruid=".$id ;
	$result = $conn->query($sql);

	return $result;
}

function getForumCommentById($conn,$id){
	$sql = "SELECT * FROM forum_comment WHERE topicid=".$id ;
	$result = $conn->query($sql);

	return $result;
}

function getMentorById($conn,$id){
	$sql = "SELECT * FROM mentor WHERE userid=".$id ;
	$result = $conn->query($sql);

	return $result;
}

function getChatById($conn,$id){
	$sql = "SELECT * FROM chat WHERE guruid=".$id ;
	$result = $conn->query($sql);

	return $result;
}

function getLatestChatById($conn,$userid){
	$sql = "SELECT * FROM chat ORDER BY id DESC LIMIT 1";
	$result = $conn->query($sql);
	return $result;
}

function getLatestGuruChatById($conn,$guruid){
	$sql = "SELECT * FROM chat WHERE guruid=".$guruid." ORDER BY id DESC LIMIT 1";
	$result = $conn->query($sql);
	return $result;
}

?>