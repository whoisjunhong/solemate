<?php
	session_start();
	
	$conn = mysqli_connect("localhost", "root", "","shoedb" );	
	
	$usernameToDelete = $_POST['username'];
	
	$sql = "DELETE FROM user_details WHERE username = '$usernameToDelete'";
	
	$result = mysqli_query($conn, $sql);
	
	if ($result)
	{
			header('Location: manage_users.php');  
	}
	

?>

