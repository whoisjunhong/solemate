<?php
	
	session_start();
	
	$conn = mysqli_connect("localhost", "root", "","shoedb" );	
	
	$idToUpdate = $_POST['order_id'];
	$newQty = $_POST['newQty'];
	
	$sql = "UPDATE cart_details SET quantity = $newQty WHERE order_id = $idToUpdate";
	
	$updateCart = mysqli_query($conn, $sql);
	
	if($updateCart)
	{
		header("Location: cart.php?status=success");	
	}
	else {
		header("Location: cart.php?status=fail");
	}
?>