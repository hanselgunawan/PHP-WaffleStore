<?php
	include('header.php');
	require_once('connectdb.php');
	if(!isset($_SESSION))
	{
		session_start();
	}
	if(isset($_GET['page']))
	{
		$pages=array("add_to_cart","cart_view");
		if(in_array($_GET['page'],$pages))
		{
			$current_page=$_GET['page'];
		}
		else
		{
			$current_page="add_to_cart";
		}
	}
	else
	{
		$current_page="add_to_cart";
	}
?>
<li><a href="index.php">Home</a></li>
    		<li><a href="menu_all.php" style="color:purple;">Menu</a></li>
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
        </div>


<script>
$(document).ready(function(){

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
</script>
