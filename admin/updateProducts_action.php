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
		
		$productsToUpdate = $_POST['productsToUpdate'];
		
		$colToUpdate = $_GET['col'];
		
		if($colToUpdate == "product_gender")
		{
			if($_POST[$colToUpdate] != "Gender")
			{
				$colToUpdateVal = $_POST[$colToUpdate];	
			}
			else
			{
				header("Location:manage_products.php?status=invalidUpdate");
			}
		}
		
		else if ($colToUpdate == "product_category")
		{
			if($_POST[$colToUpdate] != "Select")
			{
				$colToUpdateVal = $_POST[$colToUpdate];	
			}
			else
			{
				header("Location:manage_products.php?status=invalidUpdate");
			}
		}
		
		else if($colToUpdate == "product_subCategory")
		{
			if($_POST[$colToUpdate] != "Select")
			{
				$colToUpdateVal = $_POST[$colToUpdate];	
			}
			else
			{
				header("Location:manage_products.php?status=invalidUpdate");
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
				header("Location:manage_products.php?status=invalidUpdate");
			}
		}
		
		$sql2 = "SELECT * FROM user_details WHERE username = '$username'";
		$search_result = mysqli_query($conn, $sql2) or die (mysqli_error($conn));
		
		$row = mysqli_fetch_assoc($search_result);
		$admin = $row['adminRights'];
		
		if($admin == 'T')
			{				
				$sql3 = "UPDATE product_info SET $colToUpdate = '$colToUpdateVal' WHERE product_id = '$productsToUpdate'";
				$updateProduct = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
				
				if($updateProduct)
				{					
					 header("Location:manage_products.php?status=sucess");			
				}
				
				else
				{
					header("Location:manage_products.php?status=invalidUpdate");
				}
			}
			
		else
		{
			header("Location:../login_regitser/login_register.php?status=notAdmin");	
		}
		
	}
?>