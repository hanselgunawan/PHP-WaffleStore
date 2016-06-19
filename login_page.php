<?php
	include('header.php');
	include('connectdb.php');

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
        <!----------------------------------------------------------------->
        <img src="images/kayu_login.jpg" class="kayu_menu_login">
        
        <div id="login_form">
       		
            <div id="login_kanan">
            	<form method="post" action="">
                	<label>username</label><br/>
                    <input type="text" maxlength="25" placeholder="your username" autofocus="autofocus" name="username" required="required"></input>
                    <label>password</label><br/>
                    <input type="password" maxlength="25" placeholder="your password" name="password" required="required"></input>
                    <input type="submit" value="login" name="submit" class="submit_button" class="submit_login">
                    <p class="login_forgot2">haven't got a username?<span><br/><a href="registration.php">sign up here!</a></span></p>
                </form>
                <?php
			if(isset($_POST['username']) && isset($_POST['password']))
			{
				$user=$_POST['username'];
				$pass=md5($_POST['password']);
				$query="SELECT * FROM account WHERE username='$user' AND password='$pass'";
				$result=mysql_query($query);
				$row=mysql_fetch_array($result);
				
				
	
				if(mysql_num_rows($result))
				{
					$_SESSION['current_id']=$row['customerid'];
					$_SESSION['current_name']=$user;
					header("Location:index.php");
				}
				else
				{
					?><p class="info_login"><?php echo "Username or Password <br/>NOT FOUND!";?></p><?php
				}
			}
			?>
            
            <?php 
			if(isset($_POST['username']) && isset($_POST['password']) && isset($_SESSION['items'])){
				$_SESSION['current_name']=$user;
				header('Location:menu_all.php?page=shopping_cart');
			}
			?>
                
            </div>
            
        </div>
        
        
        
        </div>
    </div>
        
    <?php

	include('footer.php');
	
?>