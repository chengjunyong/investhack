<?php
include 'dbcon.php';

if($_POST['method'] == 'buy'){
	$sql = "INSERT INTO transaction (user_id,type,stock_id,lot,price,credit_type,amount,transaction_date) VALUES ('".$_POST['user_id']."','buy','".$_POST['stock_id']."','".$_POST['lot']."','".$_POST['lot_price']."','".$_POST['credit_type']."','".$_POST['amount']."','".$_POST['date']."')";
	$result = $conn->query($sql);
	if($result){
		echo 1;
	}else{
		echo 0;
	}

}else if($_POST['method'] == 'sell'){

}

?>