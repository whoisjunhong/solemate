<?php 
	session_start();
	if(!isset($_SESSION['MM_Username']))
	{
		header('Location:../login_register/login_register.php');
		$logStatus = "Login / Register";
		$logStatusLink = '../login_register/login_register.php';
		$adminStatus = "";
		$adminStatus = "";
	}
	else
	{
		$username = $_SESSION['MM_Username'];
		$profileLink = '../myaccount.php';
		$logUser = "Welcome back!, $username";
		$logStatus = "Logout";
		$logStatusLink = '../logout.php';
	}
?>

<?php 
	$conn = mysqli_connect("localhost", "root", "","shoedb");
	
	$admin = "SELECT * FROM user_details WHERE username = '$username'";
	
	$search_result = mysqli_query($conn, $admin) or die (mysqli_error($conn));
	
	$row = mysqli_fetch_assoc($search_result);
	$admin = $row['adminRights'];
	
	if($admin == 'T')
		{
			$adminStatus = "ADMINISTRATOR";
			$adminStatusLink = '../admin.php';
		}
		else {
			$adminStatus = "";
			$adminStatusLink = "";
		}
?>

<?php 	
	$conn = mysqli_connect("localhost", "root", "", "shoedb");
	
	$uname = $_SESSION['MM_Username'];
	
	$filter = " WHERE username = '$uname'";
	$sql = "SELECT * FROM cart_details" . $filter;
	$cart = mysqli_query($conn, $sql);
	$grandTotal = 0;
	
	$cartDetails = mysqli_fetch_assoc($cart);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
         Your Cart
    </title>
    <link href="../images/logos/main/logo.ico" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="../css/navigation/navbar.css">
    <link rel="stylesheet" type="text/css" href="../css/navigation/meanmenu.css">
    <link rel="stylesheet" type="text/css" href="../css/footer/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/cart/cart.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>

<body>
    <header>
        <div id="login-btn">
            <a href="<?php echo $profileLink ?>"><?php echo $logUser ?></a>&nbsp;
            <a href="<?php echo $logStatusLink?>"><?php echo $logStatus ?></a>

            <form action="../search_action.php" method="post" class="searchbar cf">
                <input type="text"  name="search" placeholder="Search here...">
                <button type="submit">Search</button>
            </form>
        </div>
        <div id="main-logo">
            <a href="../index.php">
                <img alt="image" class="logo" src="../images/logos/main/logo.png">
            </a>
        </div>
        <div id="navlogo">
            <a href="../myaccount.php"><img alt="image" class="navlogo" src="../images/logos/navbar/myaccountlogo.png">
            </a>
            <a href="../cart/cart.php"><img alt="image" class="navlogo" src="../images/logos/navbar/shoppingcartlogo.png">
            </a>
            <a href="../search.php"><img alt="image" class="navlogo" src="../images/logos/navbar/searchlogo.png">
            </a>
        </div>
		<div id="white"></div>
        <nav>

            <ul class="main-nav">
			<li>
				<a href="../index.php" class="no-home">Home</a>
			</li>
                <li>
                    <a href="../products.php?gender=M">MENS</a>
                    <ul>
                        <li><a href="../products.php?gender=M&category=formal">Formal</a>
                            <ul>
                                <li><a href="../products.php?gender=M&category=formal&subCat=derby">Derby</a></li>
                                <li><a href="../products.php?gender=M&category=formal&subCat=loafers">Loafers</a></li>
                                <li><a href="../products.php?gender=M&category=formal&subCat=boots">Boots</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="../products.php?gender=M&category=casual">Casual</a>
                            <ul>
                                <li><a href="../products.php?gender=M&category=casual&subCat=sneakers">Sneakers</a></li>
                                <li><a href="../products.php?gender=M&category=casual&subCat=sandals">Sandals</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="../products.php?gender=M&category=sports">Sports</a>
                            <ul>
                                <li><a href="../products.php?gender=M&category=sports&subCat=running">Running</a></li>
                                <li><a href="../products.php?gender=M&category=sports&subCat=training">Training</a></li>
                                <li><a href="../products.php?gender=M&category=sports&subCat=cycling">Cycling</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="../products.php?gender=F">WOMENS</a>
                    <ul>
                        <li><a href="../products.php?gender=F&category=formal">&nbsp;&nbsp;Formal&nbsp;&nbsp;</a>
                            <ul>
                                <li><a href="../products.php?gender=F&category=formal&subCat=heels">Heels</a></li>
                                <li><a href="../products.php?gender=F&category=formal&subCat=pumps">Pumps</a></li>
                                <li><a href="../products.php?gender=F&category=formal&subCat=wedges">Wedges</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="../products.php?gender=F&category=casual">&nbsp;&nbsp;Casual&nbsp;&nbsp;</a>
                            <ul>
                                <li><a href="../products.php?gender=F&category=casual&subCat=sneakers">Sneakers</a></li>
                                <li><a href="../products.php?gender=F&category=casual&subCat=sandals">Sandals</a></li>
                                <li><a href="../products.php?gender=F&category=casual&subCat=palms">Palms</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="../products.php?gender=F&category=sports">&nbsp;&nbsp;Sports&nbsp;&nbsp;</a>
                            <ul>
                                <li><a href="../products.php?gender=F&category=sports&subCat=running">Running</a></li>
                                <li><a href="../products.php?gender=F&category=sports&subCat=training">Training</a></li>
                                <li><a href="../products.php?gender=F&category=sports&subCat=cycling">Cycling</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
				<li>
					<a href="../products.php?gender=Y">YOUTH</a>
					<ul>
						<li><a href="../products.php?gender=Y&category=boys">&nbsp;&nbsp;Boys&nbsp;&nbsp;</a></li>
						<li><a href="../products.php?gender=Y&category=girls">&nbsp;&nbsp;Girls&nbsp;&nbsp;</a></li>
					</ul>
                <li>
                <li>
                    <a href="../products.php?promoStatus=T">PROMOTIONS</a>
                    <ul>
                        <li><a href="../products.php?newarrival=T">NEW ARRIVALS</a></li>
                    </ul>
				</li>
                <li><a href="../about.php">ABOUT US</a></li>
				
                <li><a href="../contact.php">CONTACT US</a></li>
				
                <li><a href="../cart/cart.php"  id="cartnone">&nbsp;<img src="../images/logos/main/cart.png" alt="image" class="cartbox"></a></li>
            </ul>

            <div id="line"></div>
        </nav>
    </header>
	
	<section>
		<div class="productTable">
			<h2><?php echo $uname ?>'s Cart</h2>
				<table>
					  <tr>
					    <th>Products</th>
						<th></th>
						<th>Quantity</th>
						<th>Price</th>
						<th></th>
					  </tr>
						<?php
							$sql = "SELECT * FROM cart_details WHERE username = '$username'";
							$result_set = mysqli_query($conn, $sql);
							
							if (mysqli_num_rows($result_set) > 0) {
								
							while($row = mysqli_fetch_assoc($result_set))
							{
								$productId = $row['product_id'];
								$sql2 = "SELECT * FROM product_info WHERE product_id = '$productId'";
								$product = mysqli_query($conn, $sql2);
								$product_info = mysqli_fetch_assoc($product);
								$productName = $product_info['product_name'];
								$productPrice = $product_info['product_price'];
								$quantity = $row['quantity'];
								$productImage = $product_info['product_image'];
								$totalCost = $productPrice * $quantity;
						?>
					  <tr>
					    <td><img src="../uploads/productimages/<?php echo $productImage?>" alt="image" width="200" height="200" class="cartimg" ></td>
						<td class="productinfo"><?php echo $product_info['product_name']; ?></td>
						<td class="quantity"><?php echo $row['quantity']; ?>
						   <form action="updatecart.php" method="post">
								<input type="hidden" name="order_id" value="<?php echo $row['order_id'] ?>">
								<input type="text" name="newQty" class="updatebox">
								<input type="submit" value="Update Qty">
								<?php $asdf="";
										  if (isset($_GET['status'])&&$_GET['status']=="success")
										  {
											   echo '<p style="color: #00cc00;">
											   Quantity Updated
											   </p>';
										  }
										  
										  else if (isset($_GET['status'])&&$_GET['status']=="fail")
										  {
											   echo '<p style="color: red;">
											   Enter a valid value
											   </p>';
										  }
									  ?>
							</form>				
						</td>
						<td>$ <?php echo number_format($product_info['product_price'] * $row['quantity'], 2, '.', ',') ?></td>
						<td>
							<form action="deletecart.php" method="post">
								<input type="hidden" name="order_id" value="<?php echo $row['order_id'] ?>">
								<input type="submit" value="Delete">
							</form>
						</td>
					  </tr>
							<?php $grandTotal += $totalCost; } ?>
							
							<?php
									}
							
								else {
									echo "0 results";
								}
							?>
				</table>
					<div id="checkout">
						Grand Total: $<?php echo number_format($grandTotal, 2, '.', ','); ?>
					<form action="checkout.php" method="post"
					class ="checkoutbutton">
						<input type="submit" value="Checkout">
					</form>
				</div>
			</div>
		<div style="clear:both"></div>
	</section>

    <footer>
        <div id="footerlinks">
            <a href="../index.php">HOME</a> 
			<a href="../contact.php">CONTACT US</a> 
			<a href="<?php echo $adminStatusLink ?>"><?php echo $adminStatus ?></a>
			<a href="../termsofuse.php">TERMS OF USE</a> 
			<a href="../privacypolicy.php">PRIVACY POLICY</a>
        </div>
        <div id="socialmediafooter">
            <a href="https://www.facebook.com/Sole-Mate-Shoes-1126601674057658/?ref=br_rs">
                <img alt="image" class="footerimage" src="../images/socialmedia/footer/facebookfooter.png">
            </a>
            <a href="https://www.youtube.com"><img alt="image" class="footerimage" src="../images/socialmedia/footer/youtubefooter.png">
            </a>
            <a href="https://www.twitter.com"><img alt="image" class="footerimage" src="../images/socialmedia/footer/twitterfooter.png">
            </a>
            <a href="https://www.instagram.com"><img alt="image" class="footerimage" src="../images/socialmedia/footer/instagramfooter.png">
            </a>
        </div>
        <p>
            &copy; 2016 Sole Mate Inc. All rights reserved. All Visual, Audio and Textual Content on this site (including all names, images, characteristics, trademarks and logos) are protected by Copyright, Trademarks and other Intellectual Property Rights owned by Sole Mate Incor its subsidaries, licensors, licenses, suppliers and accoutns. By using this site, you agree to the Terms and Conditions of Use.
            <br>
            <br> &copy; Copyright Wee Jun Hong 165302F
        </p>
    </footer>
    <script src="../js/navigation/jquery-1.11.1.min.js">
    </script>
    <script src="../js/navigation/jquery.meanmenu.js">
    </script>
    <script>
        jQuery(document).ready(function() {
            jQuery('header nav').meanmenu();
        });
    </script>
</body>

</html>