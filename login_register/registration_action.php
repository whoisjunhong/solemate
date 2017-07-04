<?php
		{
			$conn = mysqli_connect("localhost", "root", "", "shoedb");
			
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$dob = $_POST['dob'];
			$gender = $_POST['gender'];
		    $picture = $_FILES['profile_picture']['name'];
			
			$allowedType = array("image/jpeg", "image/jpg". "image/png", "image/gif");
			
			echo "You have selected " .$_FILES["profile_picture"]["name"]."<br>";
			echo "The file size is " .$_FILES["profile_picture"]["size"]."<br>";
			echo "The file type is " .$_FILES["profile_picture"]["type"]."<br>";
			
			if($_FILES["profile_picture"]["size"] < 800000)
			{
				echo "File Size is acceptable!<br>";
			}
	
			else
			{
				echo "file is too large!<br>";
				exit();
			}
			
			$target = "../uploads/profile_pictures/".$username.".jpg";
			
			$result = move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target);
			
		    $sql = "SELECT * FROM user_details WHERE username = '$username'";	
			
		    $result = mysqli_query($conn, $sql);
			 
			$num = mysqli_num_rows($result);
			
			$imgname = $username . ".jpg";
			 
			if($num > 0)
			{
				 header("location:login_register.php?status=duplicateUsername#toregister");
			}
			
			$sql = "INSERT INTO user_details(firstname, lastname, username, email, password, dob, gender, profile_picture) VALUES ('$firstname', '$lastname', '$username', '$email', '$password', '$dob', '$gender', '$imgname')";
		
			$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

			if($result)
			{
				header("location:login_register.php?status=success");
			}
			else {
				header("location:login_register.php");
				echo "Error occurred. Please register again.";
			}
		}
?>
