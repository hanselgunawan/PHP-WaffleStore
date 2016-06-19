<?php
	include('header.php');
	if(isset($_SESSION['items']))
	{
		unset($_SESSION['items']);
		header('Location:menu_all.php?page=shopping_cart');
	}
?>