<?php 
 { 
	  session_start();
	  $conn = mysqli_connect("localhost", "root", "", "shoedb");
	  
	  $userid = $_SESSION['MM_Username'];
	  $newPassword = $_POST['newPassword'];
	  $sql = "UPDATE user_details SET password = '$newPassword' WHERE username = '$userid' ";
	  
	  $update = mysqli_query ($conn, $sql);
	  
	  if($update)
	  {
	   header("Location:myaccount.php?status=passwordUpdated");
	  }
	  else {
		echo '<script language="javascript">';
		echo 'alert("Error updating, please try again")';
		echo '</script>';
	}
 }
?>