<?php
	session_start();
		
	if(!isset($_SESSION['MM_Username']))
	{	
		header("Location:../login_register/login_register.php?status=notLoggedIn");
	}
	
	
	
	else
	{
		$conn = mysqli_connect("localhost", "root", "","shoedb");
		
		$username = $_SESSION['MM_Username'];
		
		$userToUpdate = $_POST['userToUpdate'];
		
		$colToUpdate = $_GET['col'];
		
		$sql = "SELECT * FROM user_details WHERE username = '$userToUpdate'";
		
		$getImage = mysqli_query($conn,$sql);
		$searchImage = mysqli_fetch_assoc($getImage);
		
		$oldImage = $searchImage['profile_picture'];
		
		if($colToUpdate == "gender")
		{
			if($_POST[$colToUpdate] != "Gender")
			{
				$colToUpdateVal = $_POST[$colToUpdate];	
			}
			else
			{
				header("Location:manage_users.php?status=invalidUpdate");
			}
		}
		
		else if ($colToUpdate == "adminRights")
		{
			if($_POST[$colToUpdate] != "Admin Rights?")
			{
				$colToUpdateVal = $_POST[$colToUpdate];	
			}
			else
			{
				header("Location:manage_users.php?status=invalidUpdate");
			}
		}
		
		else if($colToUpdate == "emailPref")
		{
			if($_POST[$colToUpdate] != "Update Pref")
			{
				$colToUpdateVal = $_POST[$colToUpdate];	
			}
			else
			{
				header("Location:manage_users.php?status=invalidUpdate");
			}
		}
		
		else
		{
			if(!empty($_POST[$colToUpdate]))
			{
				$colToUpdateVal = $_POST[$colToUpdate];
			}
			else
			{
				header("Location:manage_users.php?status=invalidUpdate");
			}
		}
		
		$sql2 = "SELECT * FROM user_details WHERE username = '$username'";
		$search_result = mysqli_query($conn, $sql2) or die (mysqli_error($conn));
		
		$row = mysqli_fetch_assoc($search_result);
		$admin = $row['adminRights'];
		
		if($admin == 'T')
			{
				$sql2 = "SELECT * FROM user_details WHERE username = '$username'";
				$conn = mysqli_connect("localhost", "root", "","shoedb");
				
				$search_result = mysqli_query($conn, $sql2) or die (mysqli_error($conn));
				
				$sql3 = "UPDATE user_details SET $colToUpdate = '$colToUpdateVal' WHERE username = '$userToUpdate'";
				$updateUser = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
				
				if($updateUser)
				{
					if(!empty($_POST['username']))
					{
						$oldFolder = "../uploads/profile_pictures/$userToUpdate.jpg";
						$newFolder = "../uploads/profile_pictures/$colToUpdateVal.jpg";
						$renameSuccess = rename($oldFolder, $newFolder);
						if($renameSuccess)
						{
							$renameSuccess = true;	
						}
						
						else
						{
							$renameSuccess = false ;
						}
					}
					
					else
					{
						$renameSuccess = true;	
					}
					
					if($renameSuccess == true)
					{
						header("Location:manage_users.php?status=updateSuccessful");	
					}
					
					else
					{
						header("Location:manage_users.php?status=invalidUpdate");
					}
				
				}
				
				else
				{
					header("Location:manage_users.php?status=invalidUpdate");
				}
			}
			
		else
		{
			header("Location:../login_regitser/login_register.php?status=notAdmin");	
		}
		
	}
?>