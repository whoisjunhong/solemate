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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        Sole Mate Shoes
    </title>
    <link href="images/logos/main/logo.ico" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="css/navigation/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/navigation/meanmenu.css">
    <link rel="stylesheet" type="text/css" href="css/footer/footer.css">
	<link rel="stylesheet" type="text/css" href="css/index/slideshow.css">
	<link rel="stylesheet" type="text/css" href="css/index/index.css">
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
		<div class="slideshow-container">
		  <div class="mySlides fade">
			<img src="images/slideshow/1.jpg" alt="image" class="slideshow">
		  </div>

		  <div class="mySlides fade">
			<img src="images/slideshow/2.jpg" alt="image" class="slideshow">
		  </div>

		  <div class="mySlides fade">
			<img src="images/slideshow/3.jpg" alt="image" class="slideshow">
		  </div>
		  
		  <div class="mySlides fade">
			<img src="images/slideshow/4.jpg" alt="image" class="slideshow">
		  </div>
		  
		  <div class="mySlides fade">
			<img src="images/slideshow/5.jpg" alt="image" class="slideshow">
		  </div>
		  
		  <div class="mySlides fade">
			<img src="images/slideshow/6.jpg" alt="image" class="slideshow">
		  </div>
		  
		  <div class="mySlides fade">
			<img src="images/slideshow/7.jpg" alt="image" class="slideshow">
		  </div>
		  
		  <div class="mySlides fade">
			<img src="images/slideshow/8.jpg" alt="image" class="slideshow">
		  </div>

		  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		  <a class="next" onclick="plusSlides(1)">&#10095;</a>
		</div>
		<br>
		
			<div id="featured">
				<h1>FEATURED PRODUCTS</h1>
					<div class="product-col">
						<div id="product_images">
							<a href="productpage.php?id=20"><img width="300" height="300" alt="image" src="uploads/productimages/ConverseAucklandModern.jpg" class="featuredimages"></a>
							<h5>Converse Auckland Modern Sneakers</h5>
							<h5>$110.00</h5>
						</div>
						<div id="product_images">
							<a href="productpage.php?id=19"><img width="300" height="300" alt="image" src="uploads/productimages/TimberlandWesthaven6SideZipBoots.jpg" class="featuredimages"></a>
							<h5>Timberland West Haven Boots</h5>
							<h5>$107.90</h5>
						</div>
						<div id="product_images">
							<a href="productpage.php?id=38"><img width="300" height="300" alt="image" src="uploads/productimages/ShimanoRP5SPD-SLRoadShoes.jpg" class="featuredimages"></a>
							<h5>Shimano RP5 SPD SL Road Shoes</h5>
							<h5>$250.00</h5>
						</div>
						<div id="product_images">
							<a href="productpage.php?id=44"><img width="300" height="300" alt="image" src="uploads/productimages/BurberryMawdesley.jpg" class="featuredimages"></a>
							<h5>Burberry Mawdesley Heels</h5>
							<h5>$270.00</h5>
						</div>
						<div id="product_images">
							<a href="productpage.php?id=72"><img width="300" height="300" alt="image" src="uploads/productimages/NikeTrainQuickMens.jpg" class="featuredimages"></a>
							<h5>Nike Train Quick Mens</h5>
							<h5>$139.99</h5>
						</div>
						<div id="product_images">
							<a href="productpage.php?id=9"><img width="300" height="300" alt="image" src="uploads/productimages/KnottyDerbyTanOxfordFormalShoes.jpg" class="featuredimages"></a>
							<h5>Knotty Derby Tan Shoes</h5>
							<h5>$160.00</h5>
						</div>
					</div>
	
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
	<script>
	var slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}

	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}

	function showSlides(n) {
	  var i;
	  var slides = document.getElementsByClassName("mySlides");
	  var dots = document.getElementsByClassName("dot");
	  if (n > slides.length) {slideIndex = 1}    
	  if (n < 1) {slideIndex = slides.length}
	  for (i = 0; i < slides.length; i++) {
		  slides[i].style.display = "none";  
	  }
	  slideIndex++;
	  if (slideIndex> slides.length) {slideIndex = 1} 
	  slides[slideIndex-1].style.display = "block";  
	  setTimeout(showSlides, 8000); // 5 Seconds
	}
</script>
	
</body>

</html>