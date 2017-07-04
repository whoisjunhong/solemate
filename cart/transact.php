<?php 

	session_start();
	
	$conn = mysqli_connect("localhost", "root", "", "shoedb" );
	
	$username = $_SESSION['MM_Username'];
	
	$filter =" WHERE username = '$username'";
	$sqlOne = "SELECT * FROM cart_details" . $filter;
	$mycart = mysqli_query($conn, $sqlOne) or die(mysqli_error($conn)) ;
	
			$fullname = $_POST['fullname'];
			$billingAddress = $_POST['billingAddress'];
			$billingCity = $_POST['billingCity'];
			$postalCode = $_POST['postalCode'];
			$cardName = $_POST['cardName'];
			$cardNo = $_POST['cardNo'];
			$cvvCode = $_POST['cvvCode'];
			$expDate = $_POST['expDate'];

    if (mysqli_num_rows($mycart) > 0) {
			while($row = mysqli_fetch_assoc($mycart)) {
			$orderId = $row['order_id'];
			$id = $row['product_id'];
			$product_size = $row['product_size'];
			$product_colors = $row['product_colors'];
            $qty = $row['quantity'];
			$sqlTwo = "INSERT INTO order_history (product_id, product_size, product_colors, quantity, username, fullname, billingAddress, billingCity, postalCode, cardName, cardNo, cvvCode, expDate) VALUES ('$id', '$product_size', '$product_colors', '$qty', '$username', '$fullname', '$billingAddress', '$billingCity', '$postalCode', '$cardName', '$cardNo', '$cvvCode', '$expDate')";
			
			
			$complete = mysqli_query($conn, $sqlTwo) or die(mysqli_error($conn));
			
				if($complete)
				{
					$sqlThree = "DELETE FROM cart_details WHERE order_id = $orderId";
					$deleteCart = mysqli_query($conn, $sqlThree);
					
					if($deleteCart)
					{
					Header("Location: order_history.php");	
					}
				}
			}
		} 
		
			else {
				echo "0 results";
		}
		?>
?>