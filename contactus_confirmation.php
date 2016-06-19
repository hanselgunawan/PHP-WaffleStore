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
    		<li class="li_contactus2"><a href="contact_us.php" style="color:purple;">Contact Us</a>
            	<ul class="ul_mouseover_contactus2">
                	<li class="li_mouseover_contactus2"><a href="contact_us.php#comment">Comments</a></li>
                </ul></li>
 		</ul>
        <img src="images/garismenu.jpg" height="8px" class="garismenu">
        </div> 
        <img src="images/kayu_contactus.jpg" class="kayu_regis_confirm">
<?php
			if(isset($_POST['customer_name']))
						{
								
										$name=$_POST['customer_name'];
										$_SESSION['current_customer_name']=$name;
										
										$email=$_POST['customer_email'];
										$_SESSION['current_customer_email']=$email;
										
										$title=$_POST['customer_title'];
										$_SESSION['current_customer_title']=$title;
										
										$comment=$_POST['customer_comment'];
										$_SESSION['current_customer_comment']=$comment;
						}
?>  
        	<div id="regis_confirm">
            	<div id="data_confirm">
                	<form>
                		<label>Name:</label> <p><?php echo $name; ?></p>
                    	<label>E-mail:</label> <p><?php echo $email; ?></p>
                    	<label>Title:</label> <p><?php echo $title; ?></p>
                    	<label>Message:</label> <p><?php echo $comment; ?></p>
                    	<hr/>
                    	<a href="contact_us.php"><input type="button" value="CANCEL" class="tombol_cancel_regis"></a>
                    	<a href="insert_contactus.php"><input type="button" value="CONFIRM" class="tombol_confirm_regis"></a>
                    </form>
                </div>
            </div>
        
        </div>
        </div>
     <?php

	include('footer.php');
	
?>