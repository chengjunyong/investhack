<?php
include 'dbcon.php';

    $content = $_POST["content"];
    $userid = $_POST["userid"];
    $guruid = $_POST["guruid"];
    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO chat (userid, guruid, type , date,content) VALUES (".$userid.", ".$guruid.", 0 , '".$date."','".$content."')";
	$result = $conn->query($sql);
    
    $data = Array(
        "insertStatus" => true
    );
    echo json_encode($data);

?>