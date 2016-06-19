<?php
	session_start();
	include('connectdb.php');
	if(isset($_SESSION['current_name2']))
	{
		$name=$_SESSION['current_name2'];
		$signup="log out";
		$login="";
		$login_page="";
		$registration="logout_admin.php";
	}
	else
	{
		$name="guest";
		$signup="";
		$registration="registration.php";
		$login="";
		$login_page="login_page.php";
	}
?>

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
 <p class="welcome">welcome, <span><?php echo $name; ?></span></p>
</div>
	<!--<div id="wallpaper">
    	<img src="images/wood-background.png" width="100%" height="100%" style="position:absolute">
    </div>-->
    <div id="backg">
		<div id="body">
        <ul class="menu_atas">
			<li class="menu_atas_backend"><a href="product.php">Product </a>
            	<ul class="dropdown_product">
                	<li class="li_product"><a href="add_product.php">Add Product</a></li>
                    <li class="li_product"><a href="update_product.php">Update Product</a></li>
                    <li class="li_product"><a href="delete_product.php">Delete Product</a></li>
               </ul>
           </li>
    		<li class="menu_atas_backend"><a href="venue.php">Section</a>
            	<ul class="dropdown_venue">
                	<li class="li_venue"><a href="add_venue.php">Add Section</a></li>
                    <li class="li_venue"><a href="update_venue.php">Update Section</a></li>
                    <li class="li_venue"><a href="delete_venue.php">Delete Section</a></li>
               </ul></li>
    		<li class="menu_atas_backend"><a href="reservation_backend.php">Reservation</a></li>
    		<li class="menu_atas_backend"><a href="contact_us_backend.php">Contact Us</a></li>
    		<li class="menu_atas_backend"><a href="customer_backend.php">Customer</a></li>
            <li class="menu_atas_backend"><a href="customer_history.php">Customer's Transaction</a></li>
 		</ul>
        <img src="../images/garismenu.jpg" width="1000px" height="8px" class="garismenu" style="margin-top:15px;">
			