<?php 
	session_start();
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
	//Declare the page variables 
	if (isset($_GET['gender']))
	{
		$gender = $_GET['gender'];
		if($gender == "M" || $gender == "F")
		{
			$unisex = "U";
		}
		
		// Breadcrumbs
		if ($gender == 'M') {
			$breadCrumbs = '/ Mens';
			$breadCrumbsLink = 'products.php?gender=M';
			$breadCrumbsCat = "";
		    $breadCrumbsCatLink = "";
			$breadCrumbsSubCat = " ";
			$breadCrumbsSubCatLink = " ";
		}
		else if ($gender == 'F') {
			$breadCrumbs = '/ Womens';
			$breadCrumbsLink = 'products.php?gender=F';
			$breadCrumbsCat = "";
		    $breadCrumbsCatLink = "";
			$breadCrumbsSubCat = " ";
			$breadCrumbsSubCatLink = " ";
		}
		else if ($gender == 'Y') {
			$breadCrumbs = '/ Youth';
			$breadCrumbsLink = 'products.php?gender=Y';
			$breadCrumbsCat = "";
		    $breadCrumbsCatLink = "";
			$breadCrumbsSubCat = " ";
			$breadCrumbsSubCatLink = " ";
		}
		else if ($unisex =='U') {
			$breadCrumbs = '/ Youth';
			$breadCrumbsLink = 'products.php?gender=U';
			$breadCrumbsCat = "";
		    $breadCrumbsCatLink = "";
			$breadCrumbsSubCat = " ";
			$breadCrumbsSubCatLink = " ";
		}
		else if ($gender == ''){
			$breadCrumbsCat = "";
		    $breadCrumbsCatLink = "";
			$breadCrumbsSubCat = " ";
			$breadCrumbsSubCatLink = " ";
		}
		else if ($gender == ''){
			$breadCrumbsSubCat = " ";
			$breadCrumbsSubCatLink = " ";
		}
	}
	
	if (isset($_GET['category']))
	{
		$category = $_GET['category'];
		if ($gender == 'M' && $category == 'formal') {
			$breadCrumbsCat = '/ Formal';
		    $breadCrumbsCatLink = 'products.php?gender=M&category=formal';
			$breadCrumbsSubCat = " ";
			$breadCrumbsSubCatLink = " ";
		}
		else if ($gender == 'F' && $category == 'formal') {
			$breadCrumbsCat = '/ Formal';
		    $breadCrumbsCatLink = 'products.php?gender=F&category=formal';
			$breadCrumbsSubCat = " ";
			$breadCrumbsSubCatLink = " ";
		}
		else if ($gender == 'M' && $category == 'casual') {
			$breadCrumbsCat = '/ Casual';
		    $breadCrumbsCatLink = 'products.php?gender=M&category=casual';
			$breadCrumbsSubCat = " ";
			$breadCrumbsSubCatLink = " ";
		}
		else if ($gender == 'F' && $category == 'casual') {
			$breadCrumbsCat = '/ Casual';
		    $breadCrumbsCatLink = 'products.php?gender=F&category=casual';
			$breadCrumbsSubCat = " ";
			$breadCrumbsSubCatLink = " ";
		}
		else if ($gender == 'M' && $category == 'sports') {
			$breadCrumbsCat = '/ Sports';
		    $breadCrumbsCatLink = 'products.php?gender=M&category=sports';
			$breadCrumbsSubCat = " ";
			$breadCrumbsSubCatLink = " ";
		}
		else if ($gender == 'F' && $category == 'sports') {
			$breadCrumbsCat = '/ Sports';
		    $breadCrumbsCatLink = 'products.php?gender=F&category=sports';
			$breadCrumbsSubCat = " ";
			$breadCrumbsSubCatLink = " ";
		}
		else if ($gender == 'Y' && $category == 'boys') {
			$breadCrumbsCat = '/ Boys';
		    $breadCrumbsCatLink = 'products.php?gender=Y&category=boys';
			$breadCrumbsSubCat = " ";
			$breadCrumbsSubCatLink = " ";
		}
		else if ($gender == 'Y' && $category == 'girls') {
			$breadCrumbsCat = '/ Girls';
		    $breadCrumbsCatLink = 'products.php?gender=Y&category=girls';
			$breadCrumbsSubCat = " ";
			$breadCrumbsSubCatLink = " ";
		}
		else if ($gender == '' && $category == '') {
			$breadCrumbsSubCat = " ";
			$breadCrumbsSubCatLink = " ";
			$breadCrumbsSubCat = " ";
			$breadCrumbsSubCatLink = " ";
		}
	}
	
	if (isset($_GET['subCat']))
	{
		$subCat = $_GET['subCat'];
		if ($gender == 'M' && $category == 'formal' && $subCat == 'derby') {
			$breadCrumbsSubCat = '/ Derby';
			$breadCrumbsSubCatLink = 'products.php?gender=M&category=formal&subCat=derby';
		}
		else if ($gender == 'M' && $category == 'formal' && $subCat == 'loafers') {
			$breadCrumbsSubCat = '/ Loafers';
			$breadCrumbsSubCatLink = 'products.php?gender=M&category=formal&subCat=loafers';
		} 
		else if ($gender == 'M' && $category == 'formal' && $subCat == 'boots') {
			$breadCrumbsSubCat = '/ Boots';
			$breadCrumbsSubCatLink = 'products.php?gender=M&category=formal&subCat=Boots';
		}
		else if ($gender == 'M' && $category == 'casual' && $subCat == 'sneakers') {
			$breadCrumbsSubCat = '/ Sneakers';
			$breadCrumbsSubCatLink = 'products.php?gender=M&category=casual&subCat=sneakers';
		}
		else if ($gender == 'M' && $category == 'casual' && $subCat == 'sandals') {
			$breadCrumbsSubCat = '/ Sandals';
			$breadCrumbsSubCatLink = 'products.php?gender=M&category=casual&subCat=sandals';
		}
		else if ($gender == 'M' && $category == 'sports' && $subCat == 'running') {
			$breadCrumbsSubCat = '/ Running';
			$breadCrumbsSubCatLink = 'products.php?gender=M&category=sports&subCat=running';
		}
		else if ($gender == 'M' && $category == 'sports' && $subCat == 'training') {
			$breadCrumbsSubCat = '/ Training';
			$breadCrumbsSubCatLink = 'products.php?gender=M&category=sports&subCat=training';
		}
		else if ($gender == 'M' && $category == 'sports' && $subCat == 'cycling') {
			$breadCrumbsSubCat = '/ Cycling';
			$breadCrumbsSubCatLink = 'products.php?gender=M&category=sports&subCat=cycling';
		}
		else if ($gender == 'F' && $category == 'formal' && $subCat == 'heels') {
			$breadCrumbsSubCat = '/ Heels';
			$breadCrumbsSubCatLink = 'products.php?gender=F&category=formal&subCat=heels';
		}
		else if ($gender == 'F' && $category == 'formal' && $subCat == 'pumps') {
			$breadCrumbsSubCat = '/ Pumps';
			$breadCrumbsSubCatLink = 'products.php?gender=F&category=formal&subCat=pumps';
		} 
		else if ($gender == 'F' && $category == 'formal' && $subCat == 'wedges') {
			$breadCrumbsSubCat = '/ Wedges';
			$breadCrumbsSubCatLink = 'products.php?gender=F&category=formal&subCat=wedges';
		}
		else if ($gender == 'F' && $category == 'casual' && $subCat == 'sneakers') {
			$breadCrumbsSubCat = '/ Sneakers';
			$breadCrumbsSubCatLink = 'products.php?gender=F&category=casual&subCat=sneakers';
		}
		else if ($gender == 'F' && $category == 'casual' && $subCat == 'sandals') {
			$breadCrumbsSubCat = '/ Sandals';
			$breadCrumbsSubCatLink = 'products.php?gender=F&category=casual&subCat=sandals';
		}
		else if ($gender == 'F' && $category == 'casual' && $subCat == 'palms') {
			$breadCrumbsSubCat = '/ Palms';
			$breadCrumbsSubCatLink = 'products.php?gender=F&category=casual&subCat=palms';
		}
		else if ($gender == 'F' && $category == 'sports' && $subCat == 'running') {
			$breadCrumbsSubCat = '/ Running';
			$breadCrumbsSubCatLink = 'products.php?gender=F&category=sports&subCat=running';
		}
		else if ($gender == 'F' && $category == 'sports' && $subCat == 'training') {
			$breadCrumbsSubCat = '/ Training';
			$breadCrumbsSubCatLink = 'products.php?gender=F&category=sports&subCat=training';
		}
		else if ($gender == 'F' && $category == 'sports' && $subCat == 'cycling') {
			$breadCrumbsSubCat = '/ Cycling';
			$breadCrumbsSubCatLink = 'products.php?gender=F&category=sports&subCat=cycling';
		}
		else if ($gender == '' && $category == '' && $subCat == ''){
			$breadCrumbsSubCat = " ";
			$breadCrumbsSubCatLink = " ";
		}
	}
	
	if (isset($_GET['promoStatus']))
	{
		$promoStatus = $_GET['promoStatus'];
		$breadCrumbs = '/ Promotions';
		$breadCrumbsLink = 'products.php?promoStatus=T';
		$breadCrumbsCat = " ";
		$breadCrumbsCatLink = " ";
		$breadCrumbsSubCat = " ";
		$breadCrumbsSubCatLink = " ";
	}
	
	if (isset($_GET['newarrival']))
	{
		$newarrival = $_GET['newarrival'];
		$breadCrumbs = '/ New Arrivals';
		$breadCrumbsLink = 'products.php?newarrival=T';
		$breadCrumbsCat = " ";
		$breadCrumbsCatLink = " ";
		$breadCrumbsSubCat = " ";
		$breadCrumbsSubCatLink = " ";
	}
	
	if(isset($_GET['search']) && $_GET['search'] == "blank")
	{
		echo "<script> alert('Field cannot be empty!')</script>";
		$search = "zxc"; //0 products will be found
	}
	else if (isset($_GET['search']))
	{
		$search = $_GET['search'];
		$breadCrumbs = "/ Search";
	    $breadCrumbsLink = "";
		$breadCrumbsCat = " ";
		$breadCrumbsCatLink = " ";
		$breadCrumbsSubCat = " ";
		$breadCrumbsSubCatLink = " ";
	}
	
	
?>

<?php
	//searchbar
	if (isset($_GET['mode']) && $_GET['mode'] == "search")
	{
	   $filter =" WHERE (product_gender LIKE '%$search%') OR (product_name LIKE '%$search%') OR (product_brand LIKE '%$search%')";
	}

	else if (isset($_GET['promoStatus']))
	{
		$filter =" WHERE promoStatus = '$promoStatus'";
	}
	else if (isset($_GET['gender']) && isset($_GET['category']) && isset($_GET['subCat']))
	{
		$filter =" WHERE (product_gender = '$gender') AND (product_category = '$category') AND (product_subCategory = '$subCat')"; 
	}	
	else if (isset($_GET['gender']) && isset($_GET['category'])) 
	{
		$filter =" WHERE product_gender = '$gender' AND product_category = '$category'";
	}
	else if (isset($_GET['gender']))
	{
		$filter =" WHERE product_gender = '$gender'";
	}
	else if (isset($_GET['newarrival']))
	{
		$filter =" WHERE newarrival = '$newarrival'";
	}
	
	$sql = "SELECT * FROM product_info" . $filter;
	
	$productList = mysqli_query($conn, $sql);	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        Products
    </title>
    <link href="images/logos/main/logo.ico" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="css/navigation/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/navigation/meanmenu.css">
    <link rel="stylesheet" type="text/css" href="css/footer/footer.css">
	<link rel="stylesheet" type="text/css" href="css/products/products.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
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
					<ol id="breadcrumbs">
						<li><a href="index.php">Home</a></li>
						<li> <a href="<?php echo $breadCrumbsLink ?>"><?php echo $breadCrumbs ?></a></li> 
						<li> <a href="<?php echo $breadCrumbsCatLink ?>"><?php echo $breadCrumbsCat ?></a></li>
						<li> <a href="<?php echo $breadCrumbsSubCatLink ?>"><?php echo $breadCrumbsSubCat ?></a></li>
					</ol>
			     <div class="product-col">
					<?php 
						if(mysqli_num_rows($productList) > 0 ){
							while ( $fetchProducts = mysqli_fetch_assoc($productList))
							{
								$productId = $fetchProducts['product_id'];
								$productName = $fetchProducts['product_name'];
								$productNameWOSpace = str_replace(" ","",$productName);
								$productImage = $fetchProducts['product_image'];
								$productPrice = $fetchProducts['product_price'];
					?>
					<div id="product_images">
					<a href="productpage.php?id=<?php echo $productId ?>"><img width="300" height="300" alt="image" src="uploads/productimages/<?php echo $productImage ?>" class="image"></a>
						<h5><?php echo $productName ?></h5>
						<h5>$<?php echo number_format($productPrice, 2, '.', ',') ?></h5>
					</div>
					<?php	}
						}
					?>
				 </div>
			</section>
			<div style="clear:both"></div>
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