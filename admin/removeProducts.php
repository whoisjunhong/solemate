<?php
	session_start();
	
	$conn = mysqli_connect("localhost", "root", "","shoedb" );	
	
	$productToDelete = $_POST['productToDelete'];
	
	$sql = "DELETE FROM product_info WHERE product_id = '$productToDelete'";
	
	$result = mysqli_query($conn, $sql);
	
	if ($result)
	{
			header('Location: manage_products.php');  
	}
	

?>

