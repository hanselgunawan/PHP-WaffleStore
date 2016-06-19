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
<script>
	function hide()
	{
		document.getElementById('p_information').style.visibility="hidden";
	}
	
	function show()
	{
		document.getElementById('p_information').style.visibility="visible";
	}
	function hide2()
	{
		document.getElementById('p_information2').style.visibility="hidden";
	}
	
	function show2()
	{
		document.getElementById('p_information2').style.visibility="visible";
	}
	
</script>      
        <img src="images/kayu_reservation.jpg" class="kayu_reservation">
        
       	<div id="reservation">
                           <p class="p_reservation">All fields are required to be filled</p>
        	<form method="post" action="reservation_confirmation.php">
            	<ul class="reserve">   
                <?php
					function hansel(){
						header("Location:index.php");
					}
				?>         
                <?php
					if(isset($_SESSION['current_name_reservation']))
					{
				?>
                	<li>Name <input type="text" name="name" required="required" autofocus="autofocus" placeholder="Your Name" value="<?php echo $_SESSION['current_name_reservation']; ?>"></li>
                    <li>Email <input type="text" name="email" required="required" placeholder="Your Email" value="<?php echo $_SESSION['current_email']; ?>"></li>
                    <li>Contact Number <input type="text" name="contact_number" required="required" placeholder="Your Contact Number" value="<?php echo $_SESSION['current_contact']; ?>"></li>
                    <li>People&nbsp;&nbsp; <select name="adult" id="adult_people" class="select1">
                    				<option value="0">0 Adult</option>
                                    <option value="1">1 Adult</option>
                                    <option value="2">2 Adult</option>
                                    <option value="3">3 Adult</option>
                                    <option value="4">4 Adult</option>
                                    <option value="5">5 Adult</option>
                                    <option value="6">6 Adult</option>
                                    <option value="7">7 Adult</option>
                                    <option value="8">8 Adult</option>
                                    <option value="9">9 Adult</option>
                                    </select>
                                    <img src="images/logo_information.png" class="logo_information" onmouseover="show()" onmouseout="hide()">
                                    <p id="p_information">Older than 12 years old</p>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 <select name="child" id="child_people">
                    				<option value="0">0 Child</option>
                                    <option value="1">1 Child</option>
                                    <option value="2">2 Child</option>
                                    <option value="3">3 Child</option>
                                    <option value="4">4 Child</option>
                                    <option value="5">5 Child</option>
                                    <option value="6">6 Child</option>
                                    <option value="7">7 Child</option>
                                    <option value="8">8 Child</option>
                                    <option value="9">9 Child</option>
                                    </select>
                                    &nbsp;
                                    <img src="images/logo_information.png" class="logo_information" onmouseover="show2()" onmouseout="hide2()" />   									<h1 class="p_info2" id="p_information2">Under or equal to 12 years old</h1>
                                </li>
                           <li>Date <input type="date" name="date_of_reservation" required="required" value="<?php echo $_SESSION['current_date']; ?>"></li>
                           <li>Time <input type="time" name="time_of_reservation" required="required" value="<?php echo $_SESSION['current_time']; ?>"></li>
                           <li>Event <input type="text" name="event" required="required" placeholder="Your Event" value="<?php echo $_SESSION['current_event']; ?>">
                </ul>
                			<hr/>
                			
                            <ol class="terms">
                            	<li>Our staff will get in touch with you to confirm the online reservation.</li>
                            	<li>Waffle&Co has right to cancel your reservation due to late check in (>15 minutes).</li>
                            </ol>
                			<a href="unset_reservation.php" style="color:#c30; font-size:13pt; border:2px solid black; border-radius:10px/10px; padding:3px; margin-left:25%; cursor:pointer; font-family:rockwell; background-color:white; box-shadow:1px 1px 0px 0px; margin-right:200px; text-decoration:none;">Reset</a>
                            <input type="submit" value="Submit" class="submit_reservation"></input>
                            <?php }
							else
							{ ?>
                            <li>Name <input type="text" name="name" required="required" autofocus="autofocus" placeholder="Your Name"></li>
                    <li>Email <input type="text" name="email" required="required" placeholder="Your Email"></li>
                    <li>Contact Number <input type="text" name="contact_number" required="required" placeholder="Your Contact Number"></li>
                    <li>People&nbsp;&nbsp; <select name="adult" id="adult_people" class="select1">
                    				<option value="0">0 Adult</option>
                                    <option value="1">1 Adult</option>
                                    <option value="2">2 Adult</option>
                                    <option value="3">3 Adult</option>
                                    <option value="4">4 Adult</option>
                                    <option value="5">5 Adult</option>
                                    <option value="6">6 Adult</option>
                                    <option value="7">7 Adult</option>
                                    <option value="8">8 Adult</option>
                                    <option value="9">9 Adult</option>
                                    </select>
                                    <img src="images/logo_information.png" class="logo_information" onmouseover="show()" onmouseout="hide()">
                                    <p id="p_information">Older than 12 years old</p>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 <select name="child" id="child_people">
                    				<option value="0">0 Child</option>
                                    <option value="1">1 Child</option>
                                    <option value="2">2 Child</option>
                                    <option value="3">3 Child</option>
                                    <option value="4">4 Child</option>
                                    <option value="5">5 Child</option>
                                    <option value="6">6 Child</option>
                                    <option value="7">7 Child</option>
                                    <option value="8">8 Child</option>
                                    <option value="9">9 Child</option>
                                    </select>
                                    &nbsp;
                                    <img src="images/logo_information.png" class="logo_information" onmouseover="show2()" onmouseout="hide2()" />   									<h1 class="p_info2" id="p_information2">Under or equal to 12 years old</h1>
                                </li>
                           <li>Date <input type="date" name="date_of_reservation" required="required"></li>
                           <li>Time <input type="time" name="time_of_reservation" required="required"></li>
                           <li>Event <input type="text" name="event" required="required" placeholder="Your Event">
                </ul>
                			<hr/>
                			
                            <ol class="terms">
                            	<li>Our staff will get in touch with you to confirm the online reservation.</li>
                            	<li>Waffle&Co has right to cancel your reservation due to late check in (>15 minutes).</li>
                            </ol>
                			<a href="reservation.php" style="color:#c30; font-size:13pt; border:2px solid black; border-radius:10px/10px; padding:3px; margin-left:25%; cursor:pointer; font-family:rockwell; background-color:white; box-shadow:1px 1px 0px 0px; margin-right:230px; text-decoration:none;">Reset</a>
                            <input type="submit" value="Submit" class="submit_reservation"></input>
                            <?php } ?>
            </form>
        </div>
   		
        </div>
   </div>
   
   <?php

	include('footer.php');
	
?>