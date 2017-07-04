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
        Contact Us
    </title>
    <link href="images/logos/main/logo.ico" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="css/navigation/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/navigation/meanmenu.css">
    <link rel="stylesheet" type="text/css" href="css/footer/footer.css">
	<link rel="stylesheet" type="text/css" href="css/contact/contact.css">
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
		<div id="contactDetails">
            <h1><u>CONTACT US</u></h1>
            <p>Address: Ang Mo Kio Ave 8, Singapore 569830 </p>
 
            <p>Contact: <a href="tel:6451 5115">6451 5115</a></p>

            <p>Email: <a href="mailto:solemateinc@outlook.com">SolemateInc@outlook.com</a></p>
		</div>
                
                <br>
				
				
				
				<div id="container_demo" >
						<div id="wrapper">
							<div id="admin" class="form">
								<form  method="post" action="customerEnquiry_action.php" autocomplete="on" enctype="multipart/form-data"> 
									<h1>Send us your enquiries!</h1>
									<?php
									  if (isset($_GET['status'])&&$_GET['status']=="fail")
									  {
										  echo '<p style="color: red;">
										  Error occured! Please re-enter information!</p>';
									  }
									  else if (isset($_GET['status'])&&$_GET['status']=="success")
									  {
										  echo '<p style="color: #00cc00;">
										  Enquiry posted!</p>';
									  }
									  ?>
									<p> 
										<label for="customerName" class="customerName" data-icon="u">Your Name::&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</label>
										<input id="customerName" name="customerName" type="text" placeholder="Full Name">
									</p>
									<p> 
										<label for="customerEmail" class="customerEmail" data-icon="E">Your Email::&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</label>
										<input id="customerEmail" name="customerEmail" type="text" placeholder="Email">
									</p>
									<p> 
										<label for="enquirySubject" class="enquirySubject" data-icon="S">Subject:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
										<input id="enquirySubject" name="enquirySubject" type="text" placeholder="Subject">
									</p>
									<p> 
										<label for="customerEnquiry" class="customerEnquiry">Your Enquiry::&nbsp;&nbsp;&nbsp;</label>
										<textarea id="textarea" name="customerEnquiry" rows="5" cols="60"></textarea>
									</p>
									<p class="signin button"> 
										<input type="submit" value="Send"/> 
									</p>
								</form>
							</div>							
						</div>
					</div>  
				</section>
				<aside>
				<h1>Follow us</h1>
					<div id="socialmedia">
						<div id="link">
							<a href="https://www.facebook.com/Sole-Mate-Shoes-1126601674057658/?ref=br_rs">
							<img src="images/socialmedia/contactus/facebook.png" alt="image" class="icon"></a>
						</div>
						<div id="link">
							<a href="https://www.youtube.com">
							<img src="images/socialmedia/contactus/youtube.png" alt="image" class="icon"></a>
						</div>
						<div id="link">
							<a href="https://www.twitter.com">
							<img src="images/socialmedia/contactus/twitter.png" alt="image" class="icon"></a>
						</div>
						<div id="link">
							<a href="https://www.instagram.com">
							<img src="images/socialmedia/contactus/instagram.png" alt="image" class="icon"></a>
						</div>
						<div id="link">
							<a href="https://www.outlook.com">
							<img src="images/socialmedia/contactus/outlook.png" alt="image" class="icon"></a>
						</div>
						<div id="link">
						<a href="https://www.linkedin.com">
							<img src="images/socialmedia/contactus/linkedin.png" alt="image" class="icon"></a>
							</div>
						<div id="link">
							<a href="https://plus.google.com">
							<img src="images/socialmedia/contactus/googleplus.png" alt="image" class="icon"></a>
						</div>
                </div>

					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.6609056642915!2d103.84684081475403!3d1.3801174989934468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da16eb64b0249d%3A0xe5f10ff680eed942!2sNanyang+Polytechnic!5e0!3m2!1sen!2ssg!4v1470003182758" width="500" height="450" allowfullscreen class="iframe"></iframe>
				</aside>


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