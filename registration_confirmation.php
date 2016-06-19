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
        <img src="images/kayu_regis_confirm.jpg" class="kayu_regis_confirm">
        <?php
							
							if(isset($_SESSION['current_username']) && isset($_SESSION['current_password']) && isset($_SESSION['current_custname']) && isset($_SESSION['current_email']) && isset($_SESSION['current_phone']) && isset($_SESSION['current_otherphone']) && isset($_SESSION['current_address']))
							{?>
                            
            <h6><a href="registration.php" class="breadcrumb_regis">registration</a> &#10148;registration confirmation</h6>
        	<div id="regis_confirm">
            
            	<div id="data_confirm">
                	<form>
                		<label>Username:</label> <p><?php echo $_SESSION['current_username'];?></p>
                    	<label>Password:</label> <p><?php echo $_SESSION['current_password'];?></p>
                    	<label>Name:</label> <p><?php echo $_SESSION['current_custname'];?></p>
                    	<label>E-mail:</label> <p><?php echo $_SESSION['current_email'];?></p>
                    	<label>Phone:</label> <p><?php echo $_SESSION['current_phone'];?></p>
                        <label>Other Phone:</label><p><?php 
														if($_SESSION['current_otherphone']=='')
														{
															echo "-";
														}
														else
														{
															echo $_SESSION['current_otherphone'];
														}}?></p>
                    	<label>Address:</label> <p><?php echo $_SESSION['current_address'];?></p>
                    	<hr/>
                    	<a href="registration.php"><input type="button" value="CANCEL" class="tombol_cancel_regis"></a>
                    	<a href="insert_customer.php"><input type="button" value="CONFIRM" class="tombol_confirm_regis"></a>
                    </form>
                </div>
            </div>
        
        </div>
        </div>
     <?php

	include('footer.php');
	
?>