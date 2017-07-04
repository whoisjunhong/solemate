<?php
	session_start();
	
	$conn = mysqli_connect("localhost", "root", "","shoedb" );	
	
	$productId = $_GET['id'];
	$productSize = $_POST['productSize'];
	$productColors = $_POST['productColors'];
	$productQty = $_POST['quantity'];
	
	$username = $_SESSION['MM_Username'];
	
	$sql = "INSERT INTO cart_details(product_id, product_size, product_colors, quantity, username) VALUES ('$productId', '$productSize', '$productColors','$productQty', '$username')";
	
	$mycart = mysqli_query($conn , $sql) or die(mysqli_error($conn)); 
	
	if($mycart)
	{
		header("Location: cart.php");	
	}

?>