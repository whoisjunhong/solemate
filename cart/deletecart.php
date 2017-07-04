<?php
	session_start();
	
	$conn = mysqli_connect("localhost", "root", "","shoedb" );	
	
	$idToDelete = $_POST['order_id'];
	
	$sql = "DELETE FROM cart_details WHERE order_id = '$idToDelete'";
	
	$result = mysqli_query($conn, $sql);
	
	if ($result)
	{
			header('Location:cart.php');  
	}
	

?>

