<?php
	session_start();
	include('connectdb.php');
	if(isset($_SESSION['current_name2']))
	{
		$name=$_SESSION['current_name2'];
		$signup="log out";
		$login="";
		$login_page="";
		$registration="logout_admin.php";
		header('Location:home.php');
	}
	else
	{
		$name="guest";
		$signup="";
		$registration="registration.php";
		$login="";
		$login_page="login_page.php";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Waffle & Co</title>
	<link href="css/wafflecss.css" rel="stylesheet" type="text/css" />
	<link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/1/js-image-slider.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
</head>

<div id="header">
<img src="images/HEADERwaffle&amp;co.png">
<p><a href="<?php echo $login_page; ?>"><?php echo $login; ?></a><a href="<?php echo $registration; ?>"><?php echo $signup; ?></a></p>
 <p class="welcome">welcome, <span><?php echo $name; ?></span></p>
</div>
	<!--<div id="wallpaper">
    	<img src="images/wood-background.png" width="100%" height="100%" style="position:absolute">
    </div>-->
    <div id="backg">
		<div id="body">  										 <!-- BATAS HEADER -->
            <div id="backend_index">
            	<h1>Welcome to Waffle&Co's CMS</h1>
            	<div id="login_backend">
                	<form action="" method="post">
                    	<h3>Username  <span><input type="text" size="35" name="username" placeholder="Your Username" required="required" autofocus="autofocus"></span></h3>
                        <h3>Password  <span><input type="password" size="35" name="password" placeholder="Your Password" required="required"></span></h3>
                        <input type="submit" name="submit_backend" value="Log In" class="submit_backend"></input>
                    </form>
                    <?php
			
				if(isset($_POST['username']))
				{
					$user=$_POST['username'];
					$pass=md5($_POST['password']);
					
					$query="SELECT * FROM admin WHERE username='$user' AND password='$pass'";
					$result=mysql_query($query);
					
					if(mysql_num_rows($result))
					{
						$_SESSION['current_name2']=$user;
						header("Location:home.php");
					}
					else
					{
						?><p class="info_login"><?php echo "Username or Password <br/>NOT FOUND!";?></p><?php
					}
				}
			
			?>
                </div>
            </div>
            
            
            
       
     </div> 
     </div>
     <div id="footer">
    <img src="../images/FOOTERwaffle&co.png" />
    </div>  
</html>