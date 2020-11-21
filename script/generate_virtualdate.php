<?php
include 'dbcon.php';

if(isset($_GET['method']) && $_GET['method'] == 'current'){

    $machine = getMachineById($conn,1);
    $machine = $machine->fetch_assoc();
    $eq = "-".$machine["date_difference"]." days";
    $currentLiveDate = date('Y-m-d', strtotime($eq,strtotime(date('Y-m-d'))));

	$data = array();

	for($a=0;$a<=365;$a++){
		$pre_date = date('Y-m-d',strtotime($currentLiveDate."-".$a." days"));
		$result = $pre_date;
		$values = mt_rand(50,60)/2.1752;
		$round = round($values,4);
		$data[$a]['time'] = $result;
		$data[$a]['value'] = $round;
	}

	echo json_encode(array_reverse($data));

}

?>