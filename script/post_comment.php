<?php
include 'dbcon.php';

    $content = $_POST["content"];
    $type = $_POST["type"];
    $topicid = $_POST["topicid"];
    $userid = $_POST["userid"];
    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO forum_comment (content, type, userid,topicid, date) VALUES ('".$content."', ".$type.",".$userid.", ".$topicid.",'".$date."')";
	$result = $conn->query($sql);
    
    $data = Array(
        "insertStatus" => true
    );
    echo json_encode($data);

?>