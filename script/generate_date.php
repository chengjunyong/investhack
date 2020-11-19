<?php 

if(isset($_GET['method']) && $_GET['method'] == 'backward'){
	$reqDate = $_GET['date'];
	$data = array();

	for($a=1;$a<=365;$a++){
		$pre_date = date('Y-m-d',strtotime($reqDate."-".$a." days"));
		$result = $pre_date;
		$values = mt_rand(50,60)/2.1752;
		$round = round($values,4);
		$data[$a-1]['time'] = $result;
		$data[$a-1]['value'] = $round;
	}

	echo json_encode(array_reverse($data));

}else if(isset($_GET['method']) && $_GET['method'] == 'current'){
	$reqDate = date("Y-m-d");
	$data = array();

	for($a=1;$a<=365;$a++){
		$pre_date = date('Y-m-d',strtotime($reqDate."-".$a." days"));
		$result = $pre_date;
		$values = mt_rand(50,60)/2.1752;
		$round = round($values,4);
		$data[$a-1]['time'] = $result;
		$data[$a-1]['value'] = $round;
	}

	echo json_encode(array_reverse($data));

}


?>