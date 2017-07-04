<?php 
	session_start();
	
	$conn = mysqli_connect("localhost", "root", "", "shoedb" );	
	
	if(!isset($_SESSION['MM_Username']))
	{
		$logStatus = "Login / Register";
		$logStatusLink = 'login_register/login_register.php';
		$profileLink = "";
		$logUser = "";
		$adminStatus = "";
		$adminStatusLink = "";
		$username = "";
	}
	else
	{
		$username = $_SESSION['MM_Username'];
		$profileLink = 'myaccount.php';
		$logUser = "Welcome back!, $username";
		$logStatus = "Logout";
		$logStatusLink = 'logout.php';
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
			$adminStatusLink = 'admin.php';
		}
		else {
			$adminStatus = "";
			$adminStatusLink = "";
		}
?>

<?php 	
	$productID = $_GET['id'];
	
	$sql = "SELECT * FROM product_info WHERE product_id = '$productID' ";
	
	$selectedItem = mysqli_query($conn, $sql);
	
	$product = mysqli_fetch_assoc($selectedItem);	
		
?>		

<?php
    // Declare the shoe sizes 
	$shoeSize = array("US 6 / UK 7 / EU 37","US 7 / UK 8 / EU 39","US 8 / UK 9 / EU 42","US 9 / UK 10 / EU 43", "US 10 / UK11 / EU44", "US 11 / UK12 / EU45", "US 11 / UK12 / EU45", "US 11 / UK12 / EU45", "US 12 / UK13 / EU45", "US 13 / UK14 / EU46", "US 14 / UK15 / EU47");

	$shoeColor = $product['product_colors'];
	$color =  str_replace(array("'",'"'),'',$shoeColor); 
	$colorArray = explode(',',$color);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sole Mate Shoes</title>
    <link href="images/logos/main/logo.ico" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="css/navigation/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/navigation/meanmenu.css">
    <link rel="stylesheet" type="text/css" href="css/footer/footer.css">
	<link rel="stylesheet" type="text/css" href="css/productpage/productpage.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,400,400i,500,500i,700,900" rel="stylesheet"> 
</head>

<body>
    <header>
        <div id="login-btn">
		<a href="#"></a>
            <a href="<?php echo $profileLink ?>"><?php echo $logUser ?></a>&nbsp;
            <a href="<?php echo $logStatusLink?>"><?php echo $logStatus ?></a>

            <form action="search_action.php" method="post" class="searchbar cf">
                <input type="text"  name="search" placeholder="Search here...">
                <button type="submit">Search</button>
            </form>
        </div>
        <div id="main-logo">
            <a href="index.php">
                <img alt="image" class="logo" src="images/logos/main/logo.png">
            </a>
        </div>
        <div id="navlogo">
            <a href="myaccount.php"><img alt="image" class="navlogo" src="images/logos/navbar/myaccountlogo.png">
            </a>
            <a href="cart/cart.php"><img alt="image" class="navlogo" src="images/logos/navbar/shoppingcartlogo.png">
            </a>
            <a href="search.php"><img alt="image" class="navlogo" src="images/logos/navbar/searchlogo.png">
            </a>
        </div>
		<div id="white"></div>
        <nav>

            <ul class="main-nav">
			<li>
				<a href="index.php" class="no-home">Home</a>
			</li>
                <li>
                    <a href="products.php?gender=M">MENS</a>
                    <ul>
                        <li><a href="products.php?gender=M&category=formal">Formal</a>
                            <ul>
                                <li><a href="products.php?gender=M&category=formal&subCat=derby">Derby</a></li>
                                <li><a href="products.php?gender=M&category=formal&subCat=loafers">Loafers</a></li>
                                <li><a href="products.php?gender=M&category=formal&subCat=boots">Boots</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="products.php?gender=M&category=casual">Casual</a>
                            <ul>
                                <li><a href="products.php?gender=M&category=casual&subCat=sneakers">Sneakers</a></li>
                                <li><a href="products.php?gender=M&category=casual&subCat=sandals">Sandals</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="products.php?gender=M&category=sports">Sports</a>
                            <ul>
                                <li><a href="products.php?gender=M&category=sports&subCat=running">Running</a></li>
                                <li><a href="products.php?gender=M&category=sports&subCat=training">Training</a></li>
                                <li><a href="products.php?gender=M&category=sports&subCat=cycling">Cycling</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="products.php?gender=F">WOMENS</a>
                    <ul>
                        <li><a href="products.php?gender=F&category=formal">&nbsp;&nbsp;Formal&nbsp;&nbsp;</a>
                            <ul>
                                <li><a href="products.php?gender=F&category=formal&subCat=heels">Heels</a></li>
                                <li><a href="products.php?gender=F&category=formal&subCat=pumps">Pumps</a></li>
                                <li><a href="products.php?gender=F&category=formal&subCat=wedges">Wedges</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="products.php?gender=F&category=casual">&nbsp;&nbsp;Casual&nbsp;&nbsp;</a>
                            <ul>
                                <li><a href="products.php?gender=F&category=casual&subCat=sneakers">Sneakers</a></li>
                                <li><a href="products.php?gender=F&category=casual&subCat=sandals">Sandals</a></li>
                                <li><a href="products.php?gender=F&category=casual&subCat=palms">Palms</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="products.php?gender=F&category=sports">&nbsp;&nbsp;Sports&nbsp;&nbsp;</a>
                            <ul>
                                <li><a href="products.php?gender=F&category=sports&subCat=running">Running</a></li>
                                <li><a href="products.php?gender=F&category=sports&subCat=training">Training</a></li>
                                <li><a href="products.php?gender=F&category=sports&subCat=cycling">Cycling</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
				<li>
					<a href="products.php?gender=Y">YOUTH</a>
					<ul>
						<li><a href="products.php?gender=Y&category=boys">&nbsp;&nbsp;Boys&nbsp;&nbsp;</a></li>
						<li><a href="products.php?gender=Y&category=girls">&nbsp;&nbsp;Girls&nbsp;&nbsp;</a></li>
					</ul>
                <li>
                <li>
                    <a href="products.php?promoStatus=T">PROMOTIONS</a>
                    <ul>
                        <li><a href="products.php?newarrival=T">NEW ARRIVALS</a></li>
                    </ul>
				</li>
                <li><a href="about.php">ABOUT US</a></li>
				
                <li><a href="contact.php">CONTACT US</a></li>
				
                <li><a href="cart/cart.php"  id="cartnone">&nbsp;<img src="images/logos/main/cart.png" alt="image" class="cartbox"></a></li>
            </ul>

            <div id="line"></div>
        </nav>
    </header>
    <section>		
			   <div id="productimage">
					 <img src="uploads/productimages/<?php echo $product['product_image'] ?>" alt="image" class="productimage" width="400px" height="400px" style="border: 1px solid #999999;">
			   </div>
			  
               <div id="productnav">
				  <div id="productname">
						<h3><?php echo $product['product_name'];?></h3>
				  </div>
				  
				  <div id="productprice">
						<h5>$<?php echo number_format ($product['product_price'], 2, '.', ',');?> </h5>
				  </div>
				  
				  <form action="cart/addtocart.php?id=<?php echo $productID?>" method="post">	
					  <div class="sizing">
						<p>Size:</p>
							<select name="productSize" class="form-control input-small">
								<option selected hidden>Select</option>
									<?php
										for($i = 0; $i < count($shoeSize); $i++)
											{
												echo '<option value="'.$shoeSize[$i].'">'.$shoeSize[$i].'</option>';
											} 
									?>
							</select>	
					  </div>
                    
						<div class="color">
						   <p>Color:</p>
							 <select name="productColors" class="form-control input-small" style="width: 100px;">
								 <option selected hidden>Select</option>
									<?php
										for($i = 0; $i < count($colorArray); $i++)
											{
												echo '<option value="'.$colorArray[$i].'">'.$colorArray[$i].'</option>';
											} 
									?>
							</select>	
						</div>
					
						<div class="addtobasket">
							<div id="quantity">
								<p>Quantity</p>
								<select id="qty" name="quantity">
									<option selected hidden>Qty</option>
										<?php 
											 for($i=1; $i<=5; $i++)
											 {
												  echo '<option value='.$i.'>'.$i.'</option>'; 
											 }
										?>
										<option disabled>To increase quantity, go to Cart</option>
									</select>
							</div>
						<div class="addtobasketbutton">
                         <input type="submit" value="Add to Basket">
						</div>
					</div>
				  </form>
				 </div>
                    
                    <div class="productdescription">
                        <h4><b>Product Description</b></h4>
							<p><?php echo $product['product_description'];?></p>
							
						<br>
						
                        <div id="productspecifications">
                        <h3>Specifications</h3>
							<p><?php echo $product['product_specifications'];?></p>
                        </div>
                    </div>
	
	
	
	</section>
    <footer>
        <div id="footerlinks">
            <a href="index.php">HOME</a> 
			<a href="contact.php">CONTACT US</a> 
			<a href="<?php echo $adminStatusLink ?>"><?php echo $adminStatus ?></a>
			<a href="termsofuse.php">TERMS OF USE</a> 
			<a href="privacypolicy.php">PRIVACY POLICY</a>
        </div>
        <div id="socialmediafooter">
            <a href="https://www.facebook.com/Sole-Mate-Shoes-1126601674057658/?ref=br_rs">
                <img alt="image" class="footerimage" src="images/socialmedia/footer/facebookfooter.png">
            </a>
            <a href="https://www.youtube.com"><img alt="image" class="footerimage" src="images/socialmedia/footer/youtubefooter.png">
            </a>
            <a href="https://www.twitter.com"><img alt="image" class="footerimage" src="images/socialmedia/footer/twitterfooter.png">
            </a>
            <a href="https://www.instagram.com"><img alt="image" class="footerimage" src="images/socialmedia/footer/instagramfooter.png">
            </a>
        </div>
        <p>
            &copy; 2016 Sole Mate Inc. All rights reserved. All Visual, Audio and Textual Content on this site (including all names, images, characteristics, trademarks and logos) are protected by Copyright, Trademarks and other Intellectual Property Rights owned by Sole Mate Incor its subsidaries, licensors, licenses, suppliers and accoutns. By using this site, you agree to the Terms and Conditions of Use.
            <br>
            <br> &copy; Copyright Wee Jun Hong 165302F
        </p>
    </footer>
    <script src="js/navigation/jquery-1.11.1.min.js">
    </script>
    <script src="js/navigation/jquery.meanmenu.js">
    </script>
    <script>
        jQuery(document).ready(function() {
            jQuery('header nav').meanmenu();
        });
    </script>
</body>

</html>