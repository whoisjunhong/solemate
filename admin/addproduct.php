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
			header('location: ../index.php?status=notAdmin');
		}
?>

<?php
	$categoryArray = array("Formal", "Casual", "Sports", "Boys", "Girls");
	$subCatArray = array("Derby", "Loafers", "Boots", "Sneakers", "Sandals", "Running", "Training", "Cycling", "Heels", "Pumps", "Wedges", "Palms");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        Add Product
    </title>
		<link href="../images/logos/main/logo.ico" rel="shortcut icon">
		<link rel="stylesheet" type="text/css" href="../css/navigation/navbar.css">
		<link rel="stylesheet" type="text/css" href="../css/navigation/meanmenu.css">
		<link rel="stylesheet" type="text/css" href="../css/footer/footer.css">
		<link rel="stylesheet" type="text/css" href="../css/admin/animate-custom.css">
		<link rel="stylesheet" type="text/css" href="../css/admin/addproduct/addproduct.css">
		<link rel="stylesheet" type="text/css" href="../css/admin/addproduct/addproduct1.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<script type="text/javascript">
		function getval(sel) {
			  var category = "<?php $category = sel.val;?>";
		}
		</script>
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
                        <li><a href="../products.php?gender=F&category=formal">Formal</a>
                            <ul>
                                <li><a href="../products.php?gender=F&category=formal&subCat=heels">Heels</a></li>
                                <li><a href="../products.php?gender=F&category=formal&subCat=pumps">Pumps</a></li>
                                <li><a href="../products.php?gender=F&category=formal&subCat=wedges">Wedges</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="../products.php?gender=F&category=casual">Casual</a>
                            <ul>
                                <li><a href="../products.php?gender=F&category=casual&subCat=sneakers">Sneakers</a></li>
                                <li><a href="../products.php?gender=F&category=casual&subCat=sandals">Sandals</a></li>
                                <li><a href="../products.php?gender=F&category=casual&subCat=palms">Palms</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="../products.php?gender=F&category=sports">Sports</a>
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
	
	<div class="container">
				<section>				
					<div id="container_demo" >
						<div id="wrapper">
							<div id="admin" class="form">
								<form  method="post" action="upload_product.php" autocomplete="on" enctype="multipart/form-data"> 
								<div id="breadcrumbs">
									<a href="../admin.php">Admin /</a> 
									<a href="addproduct.php" class="active"> Add Product</a>
								</div>
									<h1>Add Product</h1>
									<?php
									 if (isset($_GET['status'])&&$_GET['status']=="success")
									  {
										   echo '<p style="color: #00cc00;">
										   Product added to store
										   </p>';
									  }
									  else if (isset($_GET['status'])&&$_GET['status']=="fail")
									  {
										  echo '<p style="color: red;">
										  Error occured! Please re-enter product!</p>';
									  }
									  ?>
									<p> 
										<label for="product_brand" class="product_brand" data-icon="u">Brand:</label>
										<input id="product_brand" name="product_brand" type="text" placeholder="Brand Name" required />
									</p>
									<p> 
										<label for="product_name" class="product_name" data-icon="u">Product Name:</label>
										<input id="product_name" name="product_name" type="text" placeholder="Name of Product" required />
									</p>
									<p> 
										<label for="product_colors" class="product_colors" data-icon="C">Colors:</label>
										<input id="product_colors" name="product_colors" type="text" placeholder="Enter Colors" required />
									</p>
									<p> 
										<label for="product_price" class="product_price" data-icon="$" >Price</label>
										<input id="product_price" name="product_price" type="text" placeholder="Enter Price" required /> 
									</p>
									<p>
										<label for="product_gender" class="product_gender">Product Gender:</label><br>
										<select name="product_gender" id="gender" style="font-size: 1em; margin-top: 5px; width: 98%;" required />
										   <option selected>Select Gender</option>
										   <option value="M">Mens</option>
										   <option value="F">Womens</option>
										   <option value="Y">Youth</option>
										   <option value="U">Unisex</option>
										</select>
									</p>									
									<p>
										<label for="product_type" class="product_type">Product Type:</label><br>
										<select name="product_category" id="type" style="font-size: 1em; margin-top: 5px; width: 98%;" required />
										   <option selected >Select Category</option>
											<?php 
												for($i = 0; $i < count($categoryArray); $i++)
												{
													echo '<option value = "'. $categoryArray[$i] .'">'. $categoryArray[$i] .'</option>';
												}
											?>
										</select>
									</p>
									<p>
										<label for="product_subCategory" class="product_subCategory">Product Genre:</label><br>
										<select name="product_subCategory" id="genre" style="font-size: 1em; margin-top: 5px; width: 98%;" required />
											<option selected hidden>Select Sub-Category</option>
											<?php 
												for($i = 0; $i < count($subCatArray); $i++)
												{
													echo '<option value = "'. $subCatArray[$i] .'">'. $subCatArray[$i] .'</option>';
												}
											?>
										</select>
									</p>
									<p> 
										<label for="product_description" class="product_description" required />Description:</label>
										<textarea id="textarea" name="product_description" rows="5" cols="60"></textarea>
									</p>
									<p> 
										<label for="product_specifications" class="product_specifications" required />Specifications:</label>
										<textarea id="textarea" name="product_specifications" rows="5" cols="60" value=""></textarea>
									</p>
									<p>
									   <label for="product_image">Add Product Image:</label>
									   <input type="file" id="product_image" name="product_image" multiple accept=".jpg,.png,.gif,.jpeg" required/>
									</p>
									<p>
										<input type="checkbox" name="promoStatus">Is this item on <em>Promotion</em>?
									</p>
									<p>
										<input type="checkbox" name="newarrival">Is this a <em>New Arrival</em> item?
									</p>
									<p class="signin button"> 
										<input type="submit" value="Add Product"/> 
									</p>
								</form>
							</div>							
						</div>
					</div>  
				</section>
			</div>
	
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