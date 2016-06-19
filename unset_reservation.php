<?php
	include('header.php');
	if(isset($_SESSION['current_name_reservation']))
	{
		unset($_SESSION['current_name_reservation']);
		unset($_SESSION['current_email']);
		unset($_SESSION['current_contact']);
		unset($_SESSION['current_adult']);
		unset($_SESSION['current_child']);
		unset($_SESSION['current_date']);
		unset($_SESSION['current_time']);
		unset($_SESSION['current_event']);
		
		header('Location:reservation.php');
	}

?>