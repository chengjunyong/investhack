<?php
include 'dbcon.php';

    $guruid = $_POST["guruid"];
    $userid = $_POST["userid"];
    $sql = "INSERT INTO mentor (userid,guruid) VALUES (".$userid.", ".$guruid.")";
	$result = $conn->query($sql);
    
    $data = Array(
        "insertStatus" => true
    );
    echo json_encode($data);

?>