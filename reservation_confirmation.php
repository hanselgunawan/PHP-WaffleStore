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
        <img src="images/kayu_reservation_confirmation.jpg" class="kayu_reservation">
        <h6><a href="reservation.php" class="breadcrumb_reservation">reservation</a> &#10148;reservation confirmation</h6>
        <div id="regis_confirm">
        
            	<div id="data_confirm">
                
                	<form>
                    <?php
	if(isset($_POST['date_of_reservation']))
	{
		$name=$_POST['name'];
		$_SESSION['current_name_reservation']=$name;
		$email=$_POST['email'];
		$_SESSION['current_email']=$email;
		$contact=$_POST['contact_number'];
		$_SESSION['current_contact']=$contact;
		$adult=$_POST['adult'];
		$_SESSION['current_adult']=$adult;
		$child=$_POST['child'];
		$_SESSION['current_child']=$child;
		$date=$_POST['date_of_reservation'];
		$_SESSION['current_date']=$date;
		$time=$_POST['time_of_reservation'];
		$_SESSION['current_time']=$time;
		$event=$_POST['event'];
		$_SESSION['current_event']=$event;
	}
?>
                		<label>Name:</label> <p><?php echo $name; ?></p>
                    	<label>Email:</label> <p><?php echo $email; ?></p>
                    	<label>Contact No. :</label> <p><?php echo $contact; ?></p>
                    	<label>People:</label> <p><?php echo $adult ?> Adult(s), <?php echo $child;?> Child(s)</p>
                    	<label>Date:</label> <p><?php echo $date; ?></p>
                    	<label>Time:</label> <p><?php echo $time; ?></p>
                        <label>Event:</label><p><?php echo $event; ?></p>
                    	<hr/>
                        <ol class="terms" style="margin-left:100px;">
                            	<li>Our staff will get in touch with you to confirm the online reservation.</li>
                            	<li>Waffle&Co has right to cancel your reservation due to late check in (>15 minutes).</li>
                            </ol>
                    	<a href="reservation.php"><input type="button" value="CANCEL" class="tombol_cancel_regis"></a>
                    	<a href="insert_reservation.php"><input type="button" value="CONFIRM" class="tombol_confirm_regis"></a>
                    </form>
                </div>
            </div>
        
        </div>
   </div>
   
   <?php

	include('footer.php');
	
?>