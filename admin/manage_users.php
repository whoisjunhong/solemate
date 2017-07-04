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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        Manage Products
    </title>
    <link href="../images/logos/main/logo.ico" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="../css/navigation/navbar.css">
    <link rel="stylesheet" type="text/css" href="../css/navigation/meanmenu.css">
    <link rel="stylesheet" type="text/css" href="../css/footer/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/manage_users.css">
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
			<section id="adminPage" class="hidden">
							<br>
						<h1><?php echo $logUser ?></h1>
							<hr>
							<div id="content">
					<table id="adminTable">
					<tr>
						<div class="header">
							<a href="manage_users.php"> Manage Users </a>
							<a href="addproduct.php"> Add Product </a>
							<a href="manage_products.php"> Manage Products </a>
						</div>
					</tr>
						<th> Username </th>
						<th> First Name </th>
						<th> Last Name </th>
						<th> Password </th>
						<th> Email </th>
						<th> Birthdate </th>
						<th> Gender </th>
						<th> Admin Rights </th>
						<th> Remove ? </th>
					</tr>
					<?php
						$sql = "SELECT * FROM user_details";
						$result_set = mysqli_query($conn, $sql);
						while($row = mysqli_fetch_assoc($result_set))
						{
					?>
					<tr>
					<td>
					<form action="updateUsers_action.php?col=username" method="post">
							Username : <b><?php echo $row['username']; ?></b><br>
							<input type="text" size="10" name="username">
							<input type="hidden" name="userToUpdate" value="<?php echo $row['username'] ?>">
							<button type="submit" class="updateButton">Update</button>
						 </form>
						</td>
						<td>
						<form action="updateUsers_action.php?col=firstname" method="post">
							First Name : <b><?php echo $row['firstname']; ?></b><br>
							<input type="text" size="10" name="firstname">
							<input type="hidden" name="userToUpdate" value="<?php echo $row['username'] ?>">
							<button type="submit" class="updateButton">Update</button>
						 </form>
						</td>
						<td>
						<form action="updateUsers_action.php?col=lastname" method="post">
							Last Name : <b><?php echo $row['lastname']; ?></b><br>
							<input type="text" size="10" name="lastname">
							<input type="hidden" name="userToUpdate" value="<?php echo $row['username'] ?>">
							<button type="submit" class="updateButton">Update</button>
						 </form>
						</td>
						<td>
						<form action="updateUsers_action.php?col=password" method="post">
							Password : <b><?php echo $row['password']; ?></b><br>
							<input type="text" size="10" name="password">
							<input type="hidden" name="userToUpdate" value="<?php echo $row['username'] ?>">
							<button type="submit" class="updateButton">Update</button>
						 </form>
						 </td>
						 <td>
						<form action="updateUsers_action.php?col=email" method="post">
							Email : <b><?php echo $row['email']; ?></b><br>
							<input type="text" size="18" name="email">
							<input type="hidden" name="userToUpdate" value="<?php echo $row['username'] ?>">
							<button type="submit" class="updateButton">Update</button>
						 </form>
						  </td>
						<td>
						<form action="updateUsers_action.php?col=dob" method="post">
							Birthday : <b><?php echo $row['dob']; ?></b><br>
							<input type="date" name="dob">
							<input type="hidden" name="userToUpdate" value="<?php echo $row['username'] ?>">
							<button type="submit" class="updateButton">Update</button>
						 </form>
						</td>
						<td>
						<form action="updateUsers_action.php?col=gender" method="post">
							Gender : <b><?php echo $row['gender']; ?></b><br>
							<select name="gender">
								<option hidden selected>Gender</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
								<option value="O">Others</option>
							</select>
							<input type="hidden" name="userToUpdate" value="<?php echo $row['username'] ?>">
							<button type="submit" class="updateButton">Update</button>
						 </form>
						</td>	
						<td>
						<form action="updateUsers_action.php?col=adminRights" method="post">
							<b><?php echo $row['adminRights']; ?></b><br>
							Admin Rights :
							<select name="adminRights">
								<option selected hidden>Select</option>
								<option value="T">Yes</option>
								<option value="F">No</option>
							</select>
							<input type="hidden" name="userToUpdate" value="<?php echo $row['username'] ?>">
							<button type="submit" class="updateButton">Update</button>
						</form>
						</td>
					<td style="align:center">
						<form action="removeUser.php" method="post">
							<input type="hidden" name="username" value="<?php echo $row['username'] ?>">
						<button type="submit" class="updateButton">Remove</button>
				   </form>
				   </td>
				</tr>
			  <?php } ?>
			</table>
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