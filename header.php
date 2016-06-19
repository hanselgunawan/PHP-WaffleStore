<?php
	session_start();
	include('connectdb.php');
	if(isset($_SESSION['current_name']))
	{
		$name=$_SESSION['current_name'];
		$signup="log out";
		$login="";
		$login_page="";
		$registration="logout_page.php";
	}
	else
	{
		$name="guest";
		$signup="/ signup";
		$registration="registration.php";
		$login="login";
		$login_page="login_page.php";
	}
?>
<!-- DEVELOPED BY HANSEL BAGUS TRITAMA from INDONESIA -->
<!-- Contact me for Business : 087878264177 -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Waffle & Co</title>
	<link href="css/wafflecss.css" rel="stylesheet" type="text/css" />
	<link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/1/js-image-slider.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
</head>

<div id="header">
<img src="images/HEADERwaffle&amp;co.png">
<p><a href="<?php echo $login_page; ?>"><?php echo $login; ?></a><a href="<?php echo $registration; ?>"><?php echo $signup; ?></a></p>
<a href="menu_all.php?page=shopping_cart"><img src="images/logo_shoppingcart.png" class="tombol_shoppingcart"></a>
<form method="post" action="menu_all.php?page=search">
	<input type="text" name="search_query" id="search" placeholder="Search" required="required"></input>
    <input type="submit" value="search" style="width:46px; margin-left:96%; height:25px;">
</form>
 <p class="welcome">welcome, <span><?php echo $name; ?></span></p>
</div>
	<!--<div id="wallpaper">
    	<img src="images/wood-background.png" width="100%" height="100%" style="position:absolute">
    </div>-->
    <div id="backg">
		<div id="body">
    	<div class="menu_diatas">	
		<ul class="menu_atas">
			