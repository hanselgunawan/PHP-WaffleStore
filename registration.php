<?php
	include('connectdb.php');

?>

						

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

					
					<?php
						function checkForm(){
							if(isset($_POST['username']))
						{
										
										
								$user=$_POST['username'];
								$email=$_POST['customer_email'];
								$query="SELECT * FROM account WHERE username='$user'";
								$query2="SELECT * FROM customer WHERE email='$email'";
								$result=mysql_query($query);
								$result2=mysql_query($query2);
								if(mysql_num_rows($result)) //kalau ketemu
									{
										$_SESSION['current_email']=$email;
										
										$_SESSION['current_username']=$user;
										
										$password=$_POST['password'];
										$_SESSION['current_password']=$password;
										
										$customer_name=$_POST['customer_name'];
										$_SESSION['current_custname']=$customer_name;
										
										$phone=$_POST['phone'];
										$_SESSION['current_phone']=$phone;
										
										$otherphone=$_POST['other_phone'];
										$_SESSION['current_otherphone']=$otherphone;
										
										$address=$_POST['address'];
										$_SESSION['current_address']=$address;
										
										?><p class="info_form"><?php echo "Your Username has been picked by someone!";?></p><?php
									}
								else if(mysql_num_rows($result2))
									{
										
										
										?><p class="info_form"><?php echo "Your Email has been picked by someone!";?></p><?php
										return false;
									}
								else
									{
										$_SESSION['current_email']=$email;
										
										$_SESSION['current_username']=$user;
										
										$password=$_POST['password'];
										$_SESSION['current_password']=$password;
										
										$customer_name=$_POST['customer_name'];
										$_SESSION['current_custname']=$customer_name;
										
										$phone=$_POST['phone'];
										$_SESSION['current_phone']=$phone;
										
										$otherphone=$_POST['other_phone'];
										$_SESSION['current_otherphone']=$otherphone;
										
										$address=$_POST['address'];
										$_SESSION['current_address']=$address;
										
										header("Location:registration_confirmation.php");
									}
							}
						}
						?>
</head>

        <img src="images/kayu_registration.jpg" class="kayu_menu_regis" />
        <div id="registration">
        	<form method="post" action="">
            <?php
					if(isset($_SESSION['current_email']))
					{
				?>
            	<ul>
                
                	<li>Username* <input type="text" maxlength="32" name="username" required="required" autofocus="autofocus" placeholder="Your Username" value="<?php echo $_SESSION['current_username']; ?>"></li>
                    <li>Password* <input type="password" maxlength="32" name="password" required="required" placeholder="Your Password" value="<?php echo $_SESSION['current_password']; ?>"></li>
                    <li>Name* <input type="text" maxlength="32" name="customer_name" required="required" placeholder="Your Name" value="<?php echo $_SESSION['current_custname']; ?>"></li>
                    <li>Email* <input type="text" maxlength="32" name="customer_email" required="required" placeholder="Your Email" value="<?php echo $_SESSION['current_email']; ?>"></li>
                    <li>Phone* <input type="text" maxlength="32" name="phone" required="required" placeholder="Your Phone Number" value="<?php echo $_SESSION['current_phone']; ?>"></li>
                    <li>Other Phone <input type="text" name="other_phone" maxlength="32" placeholder="Your Other Phone Number (Optional)" value="<?php echo $_SESSION['current_otherphone']; ?>"></li>
                </ul>
                <p class="alamat_regis">Address*</p>
               	<textarea type="text" cols="35" rows="9" required="required" name="address" placeholder="Your Address"><?php echo $_SESSION['current_address']; ?></textarea>
                <a href="unset_registration.php" style="margin-left:15%;
	font-family:rockwell;
	background-color:#09C;
	color:#fff;
    width:10%;
    text-align:center;
    text-decoration:none;
	font-size:13pt;
	border-radius:10px/10px;
	padding:5px;
	cursor:pointer;
	margin-top:50px;
	position:absolute;
	box-shadow:1px 1px 0px 0px #000;">Reset</a>
                <input type="submit" class="tombol_submit" value="Submit">
                </form>
         <p class="tulisan_required">* is required to be filled</p>
         
         <?php 
		 checkForm();
		 ?>
        </div>
                <?php }
				else
				{ ?>
                <ul>
                
  					<li>Username* <input type="text" maxlength="32" name="username" required="required" autofocus="autofocus" placeholder="Your Username"></li>
                    <li>Password* <input type="password" maxlength="32" name="password" required="required" placeholder="Your Password"></li>
                    <li>Name* <input type="text" maxlength="32" name="customer_name" required="required" placeholder="Your Name"></li>
                    <li>Email* <input type="text" maxlength="32" name="customer_email" required="required" placeholder="Your Email"></li>
                    <li>Phone* <input type="text" maxlength="32" name="phone" required="required" placeholder="Your Phone Number"></li>
                   <li>Other Phone <input type="text" name="other_phone" maxlength="32" placeholder="Your Other Phone Number (Optional)"></li>
                </ul>
                <p class="alamat_regis">Address*</p>
               	<textarea type="text" cols="35" rows="9" required="required" name="address" placeholder="Your Address"></textarea>
                <a href="registration.php" style="margin-left:15%;
	font-family:rockwell;
	background-color:#09C;
	color:#fff;
    width:10%;
    text-align:center;
    text-decoration:none;
	font-size:13pt;
	border-radius:10px/10px;
	padding:5px;
	cursor:pointer;
	margin-top:50px;
	position:absolute;
	box-shadow:1px 1px 0px 0px #000;">Reset</a>
                <input type="submit" class="tombol_submit" value="Submit">
                </form>
         <p class="tulisan_required">* is required to be filled</p>
         
         <?php 
		 checkForm();
		 ?>
        </div>
                <?php } ?>
            
         
   </div>
</div>   
   
  <?php

	include('footer.php');
	
?>