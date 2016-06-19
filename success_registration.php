<?php
	include('header.php');
?>
<li><a href="index.php">Home</a></li>
    		<li><a href="menu_all.php">Menu</a></li>
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
        
        <div id="container_success">
        	<div id="success">
            	<h1>CONGRATULATION</h1>
                <h2>You have been successfully registered!</h2>
                <p><i>Thankyou for joining with us !</i></p>
                <h3 class="back_home"><a href="index.php">&#65513;Back To Home</a></h3>
                <h3 class="login_now"><a href="login_page.php" class="login_now">Log In Now&#65515;</a></h3>
            </div>
        </div>
        
    </div>
    </div>
    
    <?php
                        
     if(isset($_SESSION['current_username']))
     {
     	unset($_SESSION['current_username']);
        unset($_SESSION['current_password']);
        unset($_SESSION['current_custname']);
        unset($_SESSION['current_email']);
        unset($_SESSION['current_phone']);
        unset($_SESSION['current_otherphone']);
        unset($_SESSION['current_address']);
     }

	include('footer.php');
	
?>