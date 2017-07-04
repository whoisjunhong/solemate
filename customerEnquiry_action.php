<?php
		{
			session_start();
			
			$conn = mysqli_connect("localhost", "root", "", "shoedb");
			
			$customerName = $_POST['customerName'];
			$enquirySubject = $_POST['enquirySubject'];
			$customerEmail = $_POST['customerEmail'];
			$customerEnquiry = $_POST['customerEnquiry'];
			
		    $sql = "SELECT * FROM customerenquiry WHERE customerName = '$customerName'";	
			
		    $result = mysqli_query($conn, $sql);
			 
			$num = mysqli_num_rows($result);
			
			$sql = "INSERT INTO customerenquiry(customerName, enquirySubject, customerEmail, customerEnquiry) VALUES ('$customerName', '$enquirySubject', '$customerEmail', '$customerEnquiry')";
		
			$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

			if($result)
			{
				header("location:contact.php?status=success");
			}
			else {
				header("location:contact.php?status=fail");
				echo "Error occurred. Please try again.";
			}
		}
?>
