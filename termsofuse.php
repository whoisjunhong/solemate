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
        Terms of Use
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
	<br>
		<h2><u>SOLE MATE INC. TERMS OF USE</u></h2>
		
		<br>
		<br>
		<br>
		
		<p>
			<em>Date of last revision: May 2016</em>
		</p>
		<p>
			PLEASE READ THESE TERMS OF USE CAREFULLY BEFORE USING THIS PLATFORM.
		</p>
		<p>
			By accessing or using this website, mobile application or other SOLE MATE INC. product or service (collectively the "Platform") on any computer, mobile
			phone, tablet, console or other device (collectively, "Device"), you signify that you have read, understand and agree to be bound by these Terms of Use and
			any other applicable law, whether or not you are a registered member of SOLE MATE INC.. SOLE MATE INC. may change these Terms of Use at any time without
			notice, effective upon its posting to the Platform. Your continued use of the Platform shall be considered your acceptance to the revised Terms of Use. If
			you do not agree to these Terms of Use, please do not use this Platform.
		</p>
		<p>
			<b>IMPORTANT NOTICE FOR AMATEUR ATHLETES</b>
		</p>
		<p>
			YOU ARE RESPONSIBLE FOR ENSURING THAT YOUR USE OF OR PARTICIPATION IN THE ACTIVITIES OF THIS PLATFORM DOES NOT AFFECT YOUR ELIGIBILITY AS AN AMATEUR
			ATHLETE. PLEASE CHECK WITH YOUR AMATEUR ATHLETIC ASSOCIATION FOR THE RULES THAT APPLY TO YOU. SOLE MATE INC. IS NOT RESPONSIBLE OR LIABLE FOR YOUR USE OF
			THE PLATFORM RESULTING IN YOUR INELIGIBILITY AS AN AMATEUR ATHLETE.
		</p>
		<p>
			<b>PHYSICAL ACTIVITY NOTICE</b>
		</p>
		<p>
			The Platform may include features that promote physical activity. Consider the risks involved and consult with your medical professional before engaging in
			any physical activity. SOLE MATE INC. is not responsible or liable for any injuries or damages you may sustain that result from your use of, or inability
			to use, the features of the Platform.
		</p>
		<p>
			<b>INTELLECTUAL PROPERTY</b>
		</p>
		<p>
			All intellectual property on the Platform (except for User Generated Content) is owned by SOLE MATE INC. or its licensors, which includes materials
			protected by copyright, trademark, or patent laws. All trademarks, service marks and trade names (e.g., the SOLE MATE INC. name and the Swoosh design) are
			owned, registered and/or licensed by SOLE MATE INC.. All content on the Platform (except for User Generated Content), including but not limited to text,
			software, scripts, code, designs, graphics, photos, sounds, music, videos, applications, interactive features and all other content ("Content") is a
			collective work under the United States and other copyright laws and is the proprietary property of SOLE MATE INC.; All rights reserved.
		</p>
		<p>
			<b>PLATFORM USE RESTRICTIONS</b>
		</p>
		<p>
			You may use the Content only for your own non-commercial use to participate in the Platform or to place an order or purchase SOLE MATE INC. products. You
			agree not to change or delete any ownership notices from materials downloaded or printed from the Platform. You agree not to modify, copy, translate,
			broadcast, perform, display, distribute, frame, reproduce, republish, download, display, post, transmit or sell any Intellectual Property or Content
			appearing on the Platform, including User Generated Content (defined below), without SOLE MATE INC.'s prior written consent, unless it is your own User
			Generated Content that you legally post on the Platform. You agree not to use any data mining, robots, scraping or similar data gathering methods. Nothing
			in these Terms of Use shall be interpreted as granting any license of intellectual property rights to you.
		</p>
		<p>
			<b>PRODUCT ORDERS</b>
		</p>

		<p>
			All orders placed through the Platform are subject to SOLE MATE INC.'s acceptance. This means that SOLE MATE INC. may refuse to accept or may cancel any
			order, whether or not the order has been confirmed, for any or no reason, and without liability to you or anyone else. If your credit card has already been
			charged for an order that is later cancelled, SOLE MATE INC. will issue you a refund.
		</p>
		<p>
			<b>SAFEGUARD YOUR USERNAME/PASSWORD</b>
		</p>
		<p>
			You are responsible for any actions that take place while using your SOLE MATE INC. account. Keep your username/password secure and do not allow anyone
			else to use your username/password to access the Platform. SOLE MATE INC. is not responsible for any loss that results from the unauthorized use of your
			username/password, with or without your knowledge.
		</p>
		<p>
			<b>USER GENERATED CONTENT</b>
		</p>
		<p>
			"User Generated Content" is communications, materials, information, data, opinions, photos, profiles, messages, notes, website links, text information,
			music, videos, designs, graphics, sounds, and any other content that you and/or other Platform users post or otherwise make available on or through the
			Platform, except to the extent the Content is owned by SOLE MATE INC..
		</p>
		<p>
			<b>POSTING RULES: USER GENERATED CONTENT AND USER CONDUCT</b>
		</p>
		<p>
			<b>BE RESPONSIBLE</b>
		</p>
		<p>
			You are solely responsible for your User Generated Content, your interactions with other users and your activity on the Platform. Do not take any action or
			post anything that may expose SOLE MATE INC. or its users to any harm or liability of any type.
		</p>
		<p>
			<b>BE RELEVANT AND CONSTRUCTIVE</b>
		</p>
		<p>
			Stay on topic and post only constructive comments and questions. Unless the Platform feature asks for it, don't talk about policies, future products,
			speculations or rumors about SOLE MATE INC. and SOLE MATE INC. products, or anything else off topic.
		</p>
		<p>
			<b>BE COURTEOUS AND APPROPRIATE</b>
		</p>
		<p>
			Flaming and insults are prohibited. Do not post User Generated Content, or a link to a website, that, in SOLE MATE INC.'s sole discretion, is illegal,
			offensive, libelous, defamatory, infringing, inflammatory, deceptive, inaccurate, misleading, malicious, fraudulent, false, indecent, harmful, harassing,
			intimidating, threatening, hateful, abusive, vulgar, obscene, pornographic, violent, sexually explicit, invasive of privacy, publicity, intellectual
			property, proprietary or contractual rights, offensive in a sexual, racial, cultural, or ethnic context, will harm or threaten the safety of others, or is
			otherwise objectionable. Do not post photos or videos of another person without that person's consent. Do not "stalk," intimidate, abuse, harm or harass
			another Platform user or person.
		</p>
		<p>
			<b>BE PRIVATE</b>
		</p>
		<p>
			Do not post personal information. Do not collect or solicit personal information from other Platform users or send unsolicited emails or other
			communications. Do not collect, use or post on the Platform the private information of anyone else without their consent or for illegal purposes.
		</p>
		<p>
			<b>BE PERSONAL</b>
		</p>
		<p>
			The Platform is not to be used for any commercial purpose. Do not post any advertising, solicitation or commercial content whatsoever on the Platform or
			accept payment from a third party in exchange for your performing commercial activity on the Platform. Do not post any User Generated Content that involves
			the transmission of "junk mail," "chain letters," or unsolicited mass mailing or "spamming." Do not use automated scripts to collect information from, or
			otherwise interact with, the Platform.
		</p>
		<p>
			<b>BE YOURSELF</b>
		</p>
		<p>
			Do not impersonate any person or entity, including without limitation athletes or SOLE MATE INC. employees. Do not misrepresent yourself, your age or your
			affiliation with any person or entity. Do not register for more than one SOLE MATE INC. account, register a SOLE MATE INC. account on behalf of another
			individual, group or entity, or sell or transfer your profile or account. Do not use or attempt to use another person's account, username or password.
		</p>
		<p>
			<b>BE ORIGINAL</b>
		</p>
		<p>
			You promise that you own or control all rights in any User Generated Content that you post on the Platform. You are responsible for ensuring that any User
			Generated Content that you post does not, and will not, infringe or violate anyone else's rights, including copyright, trademark, patent, trade secret,
			privacy, publicity or other personal or proprietary rights. You promise not to submit User Generated Content unless you are the owner or have permission
			from the owner to post such User Generated Content and grant SOLE MATE INC. all of the license rights granted in these Terms of Use.
		</p>
		<p>
			<b>BE LEGAL</b>
		</p>
		<p>
			Do not post any User Generated Content, take any action or use the Platform in a way that violates any law, would create liability or promotes illegal
			activities. Do not take any action on the Platform designed to interfere, disrupt, damage, disable, overburden or limit the functionality of any computer
			software or hardware, telecommunications equipment or the Platform. Do not post User Generated Content that contains software viruses, programs or other
			computer code. Do not circumvent or modify any Platform security technology or software.
		</p>
		<p>
			<b>GENERAL RULES FOR USER GENERATED CONTENT</b>
		</p>
		<p>
			<b>CONTENT IS NOT PRESCREENED</b>
		</p>
		<p>
			SOLE MATE INC. does not prescreen User Generated Content. SOLE MATE INC. does not guarantee the Platform will be free from User Generated Content that is
			inaccurate, deceptive, offensive, threatening, defamatory, unlawful or otherwise objectionable. SOLE MATE INC. is merely acting as a passive channel for
			such distribution and is not undertaking any obligation or liability relating to any User Generated Content or activities of users on the Platform. Even in
			the event SOLE MATE INC. chooses to monitor any User Generated Content, SOLE MATE INC. assumes no responsibility for, or any obligation to monitor or
			remove, such User Generated Content. SOLE MATE INC. reserves the right to edit, remove, or refuse to post any User Generated Content or terminate your
			registered account for any reason.
		</p>
		<p>
			<b>ELIGIBILITY AND REGISTRATION</b>
		</p>
		<p>
			To become a member of the SOLE MATE INC. Platform, or post User Generated Content, you may be required to register for an account. You agree to provide
			accurate and current information about yourself in all registration forms on the Platform. This Platform is intended solely for users who are thirteen (13)
			years of age or older and it is a violation of these Terms of Use for anyone under 13 to register for the Platform. You represent and warrant that you are
			13 or older. Your account may be deleted without warning if you misrepresent your age, whether older or younger.
		</p>
		<p>
			<b>SOLE MATE INC.'S RIGHTS TO YOUR POSTING</b>
		</p>
		<p>
			Your User Generated Content is not confidential or proprietary. You grant, and warrant that you have the right to grant, to SOLE MATE INC. a non-exclusive,
			non-revocable, worldwide, transferable, royalty-free, perpetual right to use your User Generated Content in any manner or media now or later developed, for
			any purpose, commercial, advertising, or otherwise, including the right to translate, display, reproduce, modify, create derivative works, sublicense,
			distribute, assign and commercialize without any payment due to you.
		</p>
		<p>
			<b>COPYRIGHT INFRINGEMENT COMPLAINTS</b>
		</p>
		<p>
			If you believe that your work has been improperly copied and posted on the Platform, such that it constitutes infringement, please provide us with the
			following information: (1) name, address, telephone number, email address and an electronic or physical signature of the copyright owner or of the person
			authorized to act on his/her behalf; (2) a description of the copyrighted work that you claim has been infringed; (3) a description of where on the
			Platform the material that you claim is infringing is located; (4) a written statement that you have a good faith belief that the disputed use is not
			authorized by the copyright owner, its agent, or the law; and (5) a statement by you, made under penalty of perjury, that the above information in your
			notice is accurate and that you are the copyright owner or authorized to act on the copyright owner's behalf. These requirements must be followed to give
			SOLE MATE INC. legally sufficient notice to SOLE MATE INC. of infringement. Send copyright infringement complaints to:
		</p>
		<p>
			We suggest that you consult your legal advisor before filing a notice with SOLE MATE INC.'s copyright agent, because there may be penalties for false
			claims.
		</p>
		<p>
			<b>LINKS</b>
		</p>
		<p>
			The Platform may contain links to websites, applications or other products or services operated by other companies ("Third Party Platforms"). SOLE MATE
			INC. does not endorse, monitor or have any control over these Third Party Platforms, which have separate terms of use and privacy policies. SOLE MATE INC.
			is not responsible for the content or policies of Third Party Platforms and you access such Third Party Platforms at your own risk.
		</p>
		<p>
			<b>MOBILE SERVICES</b>
		</p>
		<p>
			The Platform contains services and features that are available to certain mobile Devices. Your carrier's normal rates and fees apply. Not all mobile
			services will work with all carriers or Devices. By using SOLE MATE INC.'s mobile services, you agree that we may communicate with you by electronic means
			to your mobile Device and that certain information about your use of these services may be shared with us. If you change or deactivate your mobile phone
			number, you must promptly update your account information to ensure that we don't send your messages to a different person.
		</p>
		<p>
			<b>INDEMNIFICATION</b>
		</p>
		<p>
			You agree to indemnify, defend, and hold harmless SOLE MATE INC., Inc, its affiliates, officers, directors, employees, agents, licensors and suppliers from
			and against all claims, losses, liabilities, expenses, damages and costs, including, without limitation, attorneys' fees, arising from or relating in any
			way to your User Generated Content, your use of Content, your use of the Platform, your conduct in connection with the Platform or with other Platform
			users, or any violation of these Terms of Use, any law or the rights of any third party.
		</p>
		<p>
			<b>PRIVACY</b>
		</p>
		<p>
			Our
			<a href="privacypolicy.php"> Privacy Policy </a>
			, which is incorporated into these Terms of Use by this reference, further describes the collection and use of information on this Platform.
		</p>
		<p>
			<b>USER INTERACTION DISCLAIMER</b>
		</p>
		<p>
			You are solely responsible for your interactions with other people, whether online or in person. SOLE MATE INC. is not responsible or liable for any loss
			or damage resulting from any interaction with other Platform users, persons you meet through the Platform, or persons who find you because of information
			posted on, by or through the Platform. You agree to take reasonable precautions in all interactions with other users on the Platform, and conduct any
			necessary investigation before meeting another person. SOLE MATE INC. is under no obligation to become involved with any user dispute, but may do so at its
			own discretion.
		</p>
		<p>
			<b>WARRANTY DISCLAIMER</b>
		</p>
		<p>
			SOLE MATE INC. is not responsible or liable for any User Generated Content or other Content posted on the Platform or for any offensive, unlawful or
			objectionable content you may encounter on or through the Platform. The Platform, User Generated Content, Content, and the materials and products on this
			Platform are provided "AS IS" and without warranties of any kind. To the fullest extent permitted by law, SOLE MATE INC. disclaims all warranties, express
			or implied, including, but not limited to, implied warranties of title, merchantability, fitness for a particular purpose and non-infringement. SOLE MATE
			INC. cannot guarantee and does not promise any specific results from use of the Platform. SOLE MATE INC. does not represent or warrant that the Platform
			will be uninterrupted or error-free, that any defects will be corrected, or that this Platform or the server that makes the Platform available are free of
			viruses or anything else harmful. To the fullest extent permitted by law, SOLE MATE INC. does not make any warranties or representations regarding the use
			of the materials or Content in the Platform in terms of their correctness, accuracy, adequacy, usefulness, reliability or otherwise. You understand and
			agree that you download or otherwise obtain Content at your own risk, and that you will be solely responsible for your use and any damage to your mobile
			Device, computer system or other Device in which you access the Platform, loss of data or other harm of any kind that may result. SOLE MATE INC. reserves
			the right to change any and all Content and other items used or contained in the Platform at any time without notice. Some states do not permit limitations
			or exclusions on warranties, so the above limitations may not apply to you.
		</p>
		<p>
			<b>LIMITATION OF LIABILITY</b>
		</p>
		<p>
			SOLE MATE INC. SHALL NOT BE LIABLE FOR ANY DIRECT, SPECIAL, INCIDENTAL, INDIRECT OR CONSEQUENTIAL DAMAGES, INCLUDING FOR ANY LOST PROFITS OR LOST DATA,
			THAT RESULT FROM THE USE OF, OR THE INABILITY TO USE, THIS PLATFORM OR THE PERFORMANCE OF THE PRODUCTS PURCHASED THROUGH THE PLATFORM OR THE CONDUCT OF
			OTHER PLATFORM USERS (WHETHER ONLINE OR OFFLINE) OR ATTENDANCE AT A SOLE MATE INC. EVENT OR ANY USER GENERATED CONTENT, EVEN IF SOLE MATE INC. HAS BEEN
			ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. YOU ASSUME TOTAL RESPONSIBILITY FOR YOUR USE OF THE PLATFORM. YOUR ONLY REMEDY AGAINST SOLE MATE INC. FOR USE
			OF THE PLATFORM OR ANY CONTENT IS TO STOP USING THE PLATFORM. THAT SAID, IF SOLE MATE INC. IS FOUND TO BE LIABLE TO YOU FOR ANY DAMAGE OR LOSS WHICH IS IN
			ANY WAY CONNECTED WITH YOUR USE OF THIS PLATFORM OR ANY CONTENT, SOLE MATE INC.'S LIABILITY SHALL NOT EXCEED US$100.00. APPLICABLE LAW MAY NOT ALLOW THE
			LIMITATION OR EXCLUSION OF LIABILITY OR INCIDENTAL OR CONSEQUENTIAL DAMAGES, SO THE ABOVE LIMITATION OR EXCLUSION MAY NOT APPLY TO YOU.
		</p>
		<p>
			<b>MISCELLANEOUS</b>
		</p>
		<p>
			You agree that this Platform shall be deemed a passive website solely based in Oregon, USA, which does not give rise to personal jurisdiction over SOLE
			MATE INC. in jurisdictions other than Oregon. You agree that this Platform, Terms of Use, Privacy Policy and any dispute between you and SOLE MATE INC.
			shall be governed in all respects by Oregon law, without regard to choice of law provisions, and not by the 1980 U.N. Convention on contracts for the
			international sale of goods. These Terms of Use are further subject to Oregon Revised Statutes Chapter 72, "Sales". Except where prohibited, you agree that
			all disputes, claims and legal proceedings directly or indirectly arising out of or relating to this Platform (including but not limited to the purchase of
			SOLE MATE INC. products) shall be resolved individually, without resort to any form of class action, and exclusively in the state or federal courts located
			in Multnomah County, Oregon. You consent to waive all defenses of lack of personal jurisdiction and forum non conveniens with respect to venue and
			jurisdiction in the state and federal courts of Multnomah County, Oregon. Any cause of action or claim you may have with respect to the Platform (including
			but not limited to the purchase of SOLE MATE INC. products) must be commenced within one (1) year after the claim or cause of action arises. By using the
			Platform, you agree to receive certain electronic communications from SOLE MATE INC.. You agree that any notice, agreement, disclosure or other
			communication that SOLE MATE INC. sends you electronically will satisfy any legal communication requirements, including that such communications be in
			writing. SOLE MATE INC.'s failure to insist upon or enforce strict performance of any of these Terms of Use shall not be considered a waiver of any
			provision or right. Neither the course of conduct between the parties nor trade practice shall modify any of these Terms of Use. SOLE MATE INC. may assign
			its rights and duties under these Terms of Use to any party at any time without notice to you.
		</p>
		<p>
			<b>SEVERABILITY</b>
		</p>
		<p>
			If any provision in these Terms of Use is held invalid, the remainder of these Terms of Use shall continue to be enforceable. If any provision in these
			Terms of Use is deemed unlawful, void or unenforceable, then that provision is deemed severable from these Terms of Use and the remaining provisions are
			still valid and enforceable.
		</p>
		<p>
			<b>TERMINATION</b>
		</p>
		<p>
			SOLE MATE INC. reserves the right in its sole discretion to terminate your account, delete your profile and any of your User Generated Content, and
			restrict your use of all or any part of the Platform for any or no reason, without notice, and without liability to you or anyone else. SOLE MATE INC. also
			reserves the right to block users from certain IP addresses or Device numbers and prevent access to the Platform. You understand and agree that some of
			your User Generated Content, such as that which is displayed outside your profile, in activity feeds, in other parts of the Platform, or on other platforms
			(e.g., Facebook, Twitter, Google, etc), may continue to appear on the Platform or on other platforms even after your User Generated Content is removed or
			your account is terminated. These Terms of Use remain in effect even after your account is terminated. The Terms of Use relating to Intellectual Property,
			Indemnification, User Interaction Disclaimer, Warranty Disclaimer, Limitation of Liability, Miscellaneous, Severability and terms that by their nature may
			survive termination shall survive any termination.
		</p>

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