<?php
	include('header.php');
?>
<li><a href="index.php">Home</a></li>
    		<li><a href="menu_all.php">Menu</a></li>
    		<li><a href="reservation.php" style="color:purple;">Reservation</a></li>
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
            	<h1>RESERVING DONE</h1>
                <h2>You have been successfully reserved!</h2>
                <p><i>We are waiting for your attendance</i></p>
                <h3 class="back_home"><a href="index.php">&#65513;Back To Home</a></h3>
            </div>
        </div>
        
    </div>
    </div>
    
    <?php
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
	}
	include('footer.php');
	
?> 