<?php 
	session_start();
	
	$search = $_POST['search'];
	$search = str_replace("","", $search);
	echo $search;
	
	if (isset($_POST['search']) && $_POST['search'] == "")
	{
		header("location:products.php?mode=search&search=blank");
	}
	else {
		header("location:products.php?mode=search&search=$search");
	}