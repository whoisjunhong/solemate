<?php 
$u = $_POST['username'];
$p = $_POST['password'];

$conn = mysqli_connect("localhost", "root", "", "shoedb");

$sql = "SELECT * FROM user_details WHERE username = '$u' and password = '$p'";
$search_result = mysqli_query($conn, $sql);

$userfound = mysqli_num_rows($search_result);

if($userfound >=1)
{
	session_start();
	header("location:../myaccount.php");
	$_SESSION['MM_Username'] = $u;
}
else
{
	header("location:login_register.php?status=fail");
}
?>