<?php 
	session_start();
	if(!isset($_SESSION['MM_Username']))
	{
		$logStatus = "Login / Register";
		$logStatusLink = 'login_register.php';
		$adminStatus = "";
		$adminStatus = "";
		$username = "";
		$logUser = "";
		$profileLink = '';
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        Sole Mate Shoes
    </title>
			<link href="images/logos/main/logo.ico" rel="shortcut icon">
			<link rel="stylesheet" type="text/css" href="../css/login_register/login_register.css">
			<link rel="stylesheet" type="text/css" href="../css/login_register/login_register1.css">
			<link rel="stylesheet" type="text/css" href="../css/login_register/animate-custom.css">
			<link rel="stylesheet" type="text/css" href="../css/navigation/navbar.css">
			<link rel="stylesheet" type="text/css" href="../css/navigation/meanmenu.css">
			<link rel="stylesheet" type="text/css" href="../css/footer/footer.css">
			<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
			
			<script> 
				function cfmPassword() {
					var password1 = document.getElementById('password1').value;
					var password_confirm = document.getElementById('password_confirm').value;
					if (password1 != password_confirm) 
					{
						alert("Password do not match!");
						return false;
					}
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
                <li><a href="about.php">ABOUT US</a></li>
				
                <li><a href="contact.php">CONTACT US</a></li>
				
                <li><a href="../cart/cart.php"  id="cartnone">&nbsp;<img src="../images/logos/main/cart.png" alt="image" class="cartbox"></a></li>
            </ul>

            <div id="line"></div>
        </nav>
    </header>  
	
	<div class="container">
				<section>				
					<div id="container_demo" >
						<a class="hiddenanchor" id="toregister"></a>
						<a class="hiddenanchor" id="tologin"></a>
						<div id="wrapper">
							<div id="login" class="animate form">
								<form  method="post" action="login_action.php" autocomplete="on"> 
									<h1>Log in</h1> 
									<p> 
										<label for="username" class="uname" data-icon="u" > Username: </label>
										<input id="username" name="username" required="required" type="text" placeholder="Enter your Username">
									</p>
									<p> 
										<label for="password" class="youpasswd" data-icon="p"> Password: </label>
										<input id="password" name="password" required="required" type="password" placeholder="Enter your Password" > 
									</p>
									<p class="login button"> 
										<input type="submit" value="Login"/> 
									</p>
									
									<?php
									$asdf="";
									  if (isset($_GET['status'])&&$_GET['status']=="duplicateUsername")
									  {
										   $asdf= '<p style="color: red;">
										   Username is taken!
										   </p>';
									  }
									  
									  else if (isset($_GET['status'])&&$_GET['status']=="fail")
									  {
										   echo '<p style="color: red;">
										   Invalid Username or Password!
										   </p>';
									  }

									  if (isset($_GET['status'])&&$_GET['status']=="success")
									  {
										   echo '<p style="color: #00cc00;">
										   Account created. Login to shop now!
										   </p>';
									  }
									  ?>

									  
									<p class="change_link">
										Not a mate yet ?
										<a href="#toregister" class="to_register">Join us</a>
									</p>
								</form>
							</div>

							<div id="register" class="animate form">
								<form  method="post" action="registration_action.php" autocomplete="on" enctype="multipart/form-data" onsubmit="return cfmPassword()"> 
									<h1>Register</h1> 
									<p> 
										<label for="firstname" class="firstname" data-icon="u">First Name:</label>
										<input id="firstname" name="firstname" type="text" placeholder="First Name" required>
									</p>
									<p> 
										<label for="lastname" class="lastname" data-icon="u">Last Name:</label>
										<input id="lastname" name="lastname" type="text" placeholder="Last Name" requried>
									</p>
									<p> 
										<label for="username" class="username" data-icon="u">Your Username:</label>
										<input id="username" name="username" type="text" placeholder="Enter Username" required>
										<?php 
											echo $asdf;
									    ?>
									</p>
									<p> 
										<label for="email" class="email" data-icon="e" > Your Email:</label>
										<input id="email" name="email" type="text" placeholder="mymail@mail.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"> 
									</p>
									<p> 
										<label for="password" class="password" data-icon="p">Your Password: </label>
										<input id="password1" name="password" type="password" placeholder="Enter Alphanumeric Password" required pattern="[a-zA-Z0-9]+">
									</p>
									<p> 
										<label for="cfmpassword" class="cfmpassword" data-icon="p">Your Password: </label>
										<input id="password_confirm" name="password" type="password" placeholder="Confirm Password" required pattern="[a-zA-Z0-9]+">
									</p>
									<p> 
										<label for="dob" class="dob" data-icon="u">Date of Birth:</label>
										<input id="dob" name="dob" type="date" placeholder="Enter Date of Birth" required>
									</p>
									<p>
										<label for="gender" class="gender">Gender:</label><br>
										<select name="gender" id="gender" placeholder="select"style="font-size: 1em; margin-top: 5px;">
										   <option selected hidden>Select Gender</option>
										   <option value="M">Male</option>
										   <option value="F">Female</option>
										   <option value="O">Others</option>
										</select>
									</p>
									<p>
									   <label for="profilepicture" date-icon="u">Choose your profile picture:</label>
									   <input type="file" id="profile_picture" name="profile_picture" accept=".jpg,.png,.gif,.jpeg">
									</p>
									<p class="signin button"> 
										<input type="submit" value="Register"> 
									</p>
									
									<p class="change_link">  
										Already a mate?
										<a href="#tologin" class="to_register"> Login here</a>
									</p>
								</form>
							</div>
							
						</div>
					</div>  
				</section>
			</div>

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