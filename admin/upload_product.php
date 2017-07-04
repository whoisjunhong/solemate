<?php
		{
			$conn = mysqli_connect("localhost", "root", "", "shoedb");
			
			$product_brand = $_POST['product_brand'];
			$product_name = $_POST['product_name'];
			$product_colors = $_POST['product_colors'];
			$product_price = $_POST['product_price'];
			$product_gender = $_POST['product_gender'];
			$product_category = $_POST['product_category'];
			$product_subCategory = $_POST['product_subCategory'];
			$product_description = $_POST['product_description'];
			$product_description = str_replace("'", "''", $product_description);
			$product_specifications = $_POST['product_specifications'];
			$product_specifications = str_replace("'", "''", $product_specifications);
		    $product_image = $_FILES['product_image']['name'];
			$promoStatus = "F";
			$newarrival = "F";
			$productNameWOSpace = str_replace(array(" ","'"),"",$product_name);
			$sqlImgName = $productNameWOSpace.".jpg";
			
			if(isset($_POST['promoStatus']))
			{
				$promoStatus = "T";
			}
			
			if(isset($_POST['newarrival']))
			{
				$newarrival = "T";
			}
			
			$sql = "INSERT INTO product_info(product_brand, product_name, product_colors, product_price, product_gender, product_category, product_subCategory, product_description, product_specifications, product_image, promoStatus, newarrival) VALUES ('$product_brand', '$product_name', '$product_colors', '$product_price', '$product_gender', '$product_category', '$product_subCategory', '$product_description', '$product_specifications', '$sqlImgName', '$promoStatus', '$newarrival')";
		
			$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
			
			if($result)
			{
				$target = "../uploads/productimages/".$productNameWOSpace.".jpg";
			    $uploadSuccess = move_uploaded_file($_FILES["product_image"]["tmp_name"], $target);
				if($uploadSuccess)
				{
					header("location:addproduct.php?status=success");
				}
			}
			else{
				header("location:addproduct.php?status=fail");
				echo "Error occurred. Please upload again.";
			}
		}
?>