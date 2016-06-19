<?php
	include('header.php');
	if(isset($_SESSION['current_username']))
	{
		unset($_SESSION['current_username']);
		unset($_SESSION['current_password']);
		unset($_SESSION['current_custname']);
		unset($_SESSION['current_email']);
		unset($_SESSION['current_phone']);
		unset($_SESSION['current_otherphone']);
		unset($_SESSION['current_address']);
		
		header('Location:registration.php');
	}

?>