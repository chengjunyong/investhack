<?php
include 'dbcon.php';

if($_POST['method'] == 'buy'){
	$credit_type = $_POST['credit_type'];
	$deduct = $_POST['amount'];
	$sql = "INSERT INTO transaction (user_id,type,stock_id,lot,price,credit_type,amount,transaction_date) VALUES ('".$_POST['user_id']."','buy','".$_POST['stock_id']."','".$_POST['lot']."','".$_POST['lot_price']."','".$_POST['credit_type']."','".$_POST['amount']."','".$_POST['date']."')";
	$result = $conn->query($sql);
	if($result){
		echo true;
	}else{
		echo false;
	}
	$sql = "SELECT * FROM user WHERE id = '".$_POST['user_id']."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if($credit_type == 'gold'){
		$amount = $row['gold'] - $deduct;
		$sql = "UPDATE user SET gold=".$amount." WHERE id='".$_POST['user_id']."'";
		$result = $conn->query($sql);
	}else{
		$amount = $row['silver'] - $deduct;
		$sql = "UPDATE user SET silver=".$amount." WHERE id='".$_POST['user_id']."'";
		$result = $conn->query($sql);
	}

}else if($_POST['method'] == 'sell'){
	$credit_type = $_POST['credit_type'];
	$deduct = $_POST['amount'];
	$sql = "INSERT INTO transaction (user_id,type,stock_id,lot,price,credit_type,amount,transaction_date) VALUES ('".$_POST['user_id']."','sell','".$_POST['stock_id']."','-".$_POST['lot']."','".$_POST['lot_price']."','".$_POST['credit_type']."','".$_POST['amount']."','".$_POST['date']."')";
	$result = $conn->query($sql);
	if($result){
		echo true;
	}else{
		echo false;
	}
	$sql = "SELECT * FROM user WHERE id = '".$_POST['user_id']."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if($credit_type == 'gold'){
		$amount = $row['gold'] + $deduct;
		$sql = "UPDATE user SET gold=".$amount." WHERE id='".$_POST['user_id']."'";
		$result = $conn->query($sql);
	}else{
		$amount = $row['silver'] + $deduct;
		$sql = "UPDATE user SET silver=".$amount." WHERE id='".$_POST['user_id']."'";
		$result = $conn->query($sql);
	}

}else if($_POST['method'] == 'getLot'){
	$sql = "SELECT SUM(lot) FROM transaction WHERE user_id='".$_POST['user_id']."' AND stock_id='".$_POST['stock_id']."' AND credit_type='".$_POST['credit_type']."'";
	$result = $conn->query($sql);
	$result = $result->fetch_assoc();

	echo $result["SUM(lot)"];
}

?>