<?php
	include('header2.php');
	
	if(isset($_SESSION['current_name2']))
	{
	session_destroy();
	header('Location:index.php');
	}

?>