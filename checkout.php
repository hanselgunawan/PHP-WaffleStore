<?php
	include('header.php');
	if(isset($_SESSION['current_price']))
	{
		$harga=$_SESSION['current_price'];
	}
	
	if(isset($_GET['data']) && isset($_GET['data2']))
	{
		$array3=unserialize($_GET['data']);
		$array5=serialize($array3);
		$url=urlencode($array5);
		
		$array_value3=unserialize($_GET['data2']);
		$array_value5=serialize($array_value3);
		$url2=urlencode($array_value5);
	}
	else
	{
		echo "ADA KESALAHAN!";
	}
	
	function buatrp($angka){
		$jadi="Rp ".number_format($angka,0,',','.').',-';//BUAT BIKIN ANGKA TERPISAH
		return $jadi;
	}?>  

<li><a href="index.php">Home</a></li>
    		<li><a href="menu_all.php" style="color:purple">Menu</a></li>
    		<li><a href="reservation.php">Reservation</a></li>
    		<li class="li_about"><a href="about_us.php">About Us</a>
            <ul class="ul_mouseover">
            	<li class="li_mouseover"><a href="about_us.php#video_aboutus">Video</a></li>
                <li class="li_mouseover"><a href="about_us.php#floorplan_aboutus">Sections</a></li>
            </ul></li>
    		<li class="li_contactus2"><a href="contact_us.php">Contact Us</a>
            	<ul class="ul_mouseover_contactus2">
                	<li class="li_mouseover_contactus2"><a href="contact_us.php#comment">Comments</a></li>
                </ul></li>
 		</ul>
        <img src="images/garismenu.jpg" height="8px" class="garismenu">
    		<div id="checkout">
            
        	<img src="images/kayu_checkout.jpg" class="kayu_checkout">
             <h6 class="breadcrumb_checkout">menu &#10148;<a href="menu_all.php?page=shopping_cart" class="breadcrumb_checkout">shopping cart</a> &#10148;payment method</h6>
            	<div id="checkout2">
               
                	<h3>Your Total Price : <span><?php echo buatrp($harga); ?></span></h3>
                    	<a href="http://www.klikbca.com/" class="klik_bca"><img src="images/klikbca.png" class="icon_bca"><img/></a>
                        <h2>Rek no. : 819181918191<br/>(a/n Anton Setiabudi)</h2>
                    	<a href="success_checkout.php?data=<?php echo $url; ?>&data2=<?php echo $url2; ?>" class="klik_cod"><img src="images/cash_on_delivery.png" class="icon_cod"><img /></a>
                    <a href="menu_all.php?page=shopping_cart"><h4>&#8610;Back to Shopping Cart</h4></a>
                    <a href="success_checkout.php?data=<?php echo $url; ?>&data2=<?php echo $url2; ?>" class="checkout_button"><h4 class="checkout_button">Done Transfer&#8611;</h4></a>
                </div>
        	</div>
        </div>
        </div>

	<?php

	include('footer.php');
	
?>