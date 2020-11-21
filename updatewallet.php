<?php
include 'script/dbcon.php'; 

$id = $_POST['id'];
$reward = $_POST['gold'];
$sql1 = "SELECT * from `user` WHERE id= $id";
$result = $conn->query($sql1);

while($row = $result->fetch_array()){
    $gold = $row['gold'];
}

$reward = $reward + $gold;
$sql2 = "UPDATE `user` SET `gold`= $reward WHERE id= $id";

if (mysqli_query($conn, $sql2)) {
    echo json_encode(array("statusCode"=>200 , "reward" => $reward));
} 
else {
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($conn);



?>