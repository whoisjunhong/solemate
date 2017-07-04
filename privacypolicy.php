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
        Privacy Policy
    </title>
    <link href="images/logos/main/logo.ico" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="css/navigation/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/navigation/meanmenu.css">
	<link rel="stylesheet" type="text/css" href="css/termsofuse/termsofuse.css">
    <link rel="stylesheet" type="text/css" href="css/footer/footer.css">
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
			<h2><u>Sole Mate Inc. Digital Privacy Policy</u></h2>
			
			<u><b><em>Effective May, 2016</em></b></u>
			
			<p>This SOLE MATE INC. Digital Privacy Policy (Singapore) ("Privacy Policy") describes how we collect and use your information through a variety of digital means. By accessing or using this website, mobile application or other SOLE MATE INC. product or service on any computer, mobile phone, tablet, console or other device (collectively, "Device"), you consent to our Privacy Policy. SOLE MATE INC. may modify this Privacy Policy at any time effective upon its posting. Your continued use of our products and services constitutes your acceptance to this Privacy Policy and any updates. This Privacy Policy is incorporated into, and is subject to, the <a href="termsofuse.html">Terms of Use</a>.</p>
			
			<p>While this Privacy Policy is intended to generally describe our privacy practices, our goal is to also provide more detailed information at times when it's most meaningful to you. Please look for these notices within our SOLE MATE INC. services.</p>
			
			<b>COLLECTING INFORMATION</b>
			
			<b>WHAT YOU GIVE US</b>
			
			<p>We collect information you give us or permit us to access. Information may include, but is not limited to, your name, image, birth date, email and physical address, telephone number, gender, contact lists, social media information and profile, location (GPS) information, activity and performance information, and when necessary, credit card information.</p>
			
			<b>WHAT WE COLLECT FROM YOU</b>
			
			<p>We may automatically collect information regarding your interaction with, and use of, our products and services. Information we may collect includes, but is not limited to, your telephone number, Device identifier and hardware information, IP address, browser type and language, cookie information, system type, whether you have enabling software to access certain features, access times, referring website URLs, information about your purchases and other information about your interactions with us.</p>
			
			<b>WHAT WE COLLECT FROM OTHER SOLE MATE INC. INTERACTIONS AND THIRD PARTIES</b>
			
			<p>We may combine information you give us with other information from SOLE MATE INC. sources, transactions and communications. This may include, but is not limited to, information from SOLE MATE INC. stores, direct mail, catalogs, events, products and applications, or other SOLE MATE INC. interactions. We may also combine that information with data that is publicly available and data from third parties. We also collect information about gift recipients provided by the giver.</p>
			
			<b>CHILDREN'S PRIVACY</b>
			
			<p>We do not knowingly collect or solicit personal information from children under 13.</p>

			<b>SHARING INFORMATION</b>
			
			<p>SOLE MATE INC. FamilyWe may provide your information to SOLE MATE INC., Inc. companies and affiliates, including Converse and Hurley ("SOLE MATE INC. Family"), some of which may be outside the U.S.</p>
			
			<b>SERVICE PROVIDERS</b>
			
			<p>We may transfer your information to SOLE MATE INC. Family service providers to conduct our business. For example, they may handle credit card processing, shipping, data management, email distribution, market research, information analysis, and promotions management. We may also share your information to administer features (e.g. music download, race registration, or workout routine).</p>
			
			<b>BY LAW OR TO PROTECT RIGHTS</b>
			
			<p>We may disclose information upon governmental request, in response to a court order, when required by law, to enforce our policies, or to protect our or others' rights, property or safety. We may share information to prevent illegal uses of SOLE MATE INC.'s products and services or violations of the <a href="termsofuse.html">Terms of Use</a>, or to defend ourselves against third-party claims. We may also share information with companies assisting in fraud protection or investigation.</p>
			
			<b>BUSINESS TRANSFERS</b>
			
			<p>Your information may be transferred to a third party as a part of our business assets in a sale of a part or all of SOLE MATE INC.. If this should happen, notice will be provided by posting to the website or other form of communication.</p>
			
			<b>PUBLIC SHARING</b>
			
			<b>DEFAULT SHARING</b>
			
			<p>When you join or use certain services, you agree to publicly share a basic amount of information, which may include your username, city location, and profile picture.</p>
			
			<b>SHARING YOU CHOOSE</b>
			
			<p>You may choose to share certain information. In order to participate in certain features, you may have to adjust your privacy settings and share more information. You may also choose to share your activity on other platforms, such as Facebook and Twitter. Please read the privacy policies of those platforms, because your SOLE MATE INC. activity published on those platforms will no longer be governed by SOLE MATE INC.'s Privacy Policy.</p>
			
			<b>SOLE MATE INC. SHARING</b>
			
			<p>Information that is publicly shared may be used by SOLE MATE INC. for promotional purposes.</p>
			
			<b>PROTECTING INFORMATION</b>
			
			<p>Security Measures: We use a variety of security measures, including encryption and authentication tools, to help protect your information. We use secure servers when you place orders. All credit card information you supply is transmitted via Secure Socket Layer (SSL) technology and then encrypted within our databases.</p>
			
			<b>NO GUARANTEE</b>
			
			<p>However, like other companies, SOLE MATE INC. cannot guarantee 100% the security or confidentiality of the information you provide to us.</p>
			
			<b>COLLECTION TOOLS</b>
			
			<b>HOW WE COLLECT INFORMATION</b>
			
			<p>SOLE MATE INC. automatically collects information within our products and services or stored by your browser or Device. We use a variety of methods to collect this information, including, but not limited to, cookies and pixel tags/web beacons ("Collection Tools").</p>
			
			<b>TURNING OFF COLLECTION TOOLS</b>
			
			<p>If you turn off certain Collection Tools, you may not have access to many features that make your experience more efficient and some of our services and features may not function properly. However, you can still place product orders over the telephone by contacting our customer service number at 1-800-806-6453. Note that our websites may not recognize or respond to Do Not Track (DNT) headers from web browsers.</p>
			
			<b>THIRD PARTY TRACKING</b>
			
			<p>We also work with other companies who use tracking technologies to serve ads on our behalf across the Internet. These companies may collect information about your interaction with us, including advertising. These companies may not recognize or respond to DNT headers from web browsers. If you would like to opt-out of receiving ads tailored by 3rd party tracking technologies associated with our website, please click&nbsp;<a href="http://www.networkadvertising.org/managing/opt_out.asp">here</a>. Note that if you opt-out from these third party tracking technologies, you may still see our ads at other websites, but the ads will not be tailored using third party tracking technologies associated with our website.</p>
			
			<b>CHOICES</b>
			
			<b>MODIFYING OR DELETING YOUR INFORMATION</b>
			
			<p>You can modify or delete your profile within certain SOLE MATE INC. services, through your account. Your information previously posted may still be publicly viewable. SOLE MATE INC. may keep information and content in our backup files and archives.</p>
			
			<b>COMMUNICATION/UNSUBSCRIBE/OPT-OUT</b>
			
			<p>Regardless of the settings you select, SOLE MATE INC. may send you service-related communications. To unsubscribe and stop receiving messages, please change your settings or follow the instructions in the email, text message, notification or other message type. If you have unsubscribed from any SOLE MATE INC. communications, due to production schedules, you may receive communications already in production.</p>
			
			<b>INTERNATIONAL USERS</b>
			
			<p>Our digital operations are conducted, in whole or in part, in the United States. Regardless of where you live, you consent to have your personal data transferred, processed and stored in the United States, and allow SOLE MATE INC. to use and collect your personal information in accordance with this Privacy Policy.</p>
			
			<b>TERMS OF USE</b>
			
			<p>Your use of our products and services, and any disputes arising from them, is subject to this Privacy Policy as well as our <a href="termsofuse.php">Terms of Use</a>. Please visit our <a href="termsofuse.php">Terms of Use</a>, which explains other terms governing the use of our products and services.</p>

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