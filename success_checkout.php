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
		
		if(isset($_GET['data']) && isset($_GET['data2']))
		{
			$array4=unserialize($_GET['data']);
			$max=count($array4);
			$_SESSION['current_prod']=array();
			for($x=0;$x<$max;$x++)
			{
				array_push($_SESSION['current_prod'],$array4[$x]);
			}
			$product="&#8611;".implode("<br/>&#8611;",$_SESSION['current_prod']);
			$array_value4=unserialize($_GET['data2']);
			$max=count($array_value4);
			$_SESSION['current_val']=array();
			for($y=0;$y<$max;$y++)
			{
				array_push($_SESSION['current_val'],$array_value4[$y]);
			}
			$valuez="&#8611;".implode("<br/>&#8611;",$_SESSION['current_val']);
		
		$query="SELECT * FROM customer INNER JOIN account ON customer.customerid=account.customerid WHERE username='$name'";
		$result=mysql_query($query);
		$row=mysql_fetch_array($result);
		
		$history_id=$row['customerid'];
		$history_name=$row['name'];
		$history_username=$row['username'];
		
		date_default_timezone_set('Asia/Jakarta');//UNTUK BUAT JADI WAKTU INDONESIA!
		$history_date=date("y-m-d");
		$history_time=date('H:i:s');//untuk CURRENT_TIME
		
		$history_price=$_SESSION['current_price'];
		$history_status="UNPAID";
		
		$query2="INSERT INTO history(`customer_id`,`customer_name`,`customer_username`,`customer_item`,`customer_qty`,`date_buy`,`time_buy`,`total_price`,`payment_status`) VALUES('$history_id','$history_name','$history_username','$product','$valuez','$history_date','$history_time','$history_price','$history_status')";
		
		$result2=mysql_query($query2);
		if($result2)
		{
			echo "";
		}
		else
		{
			"GAK BISA !".mysql_error();
		}
		
	if(isset($_SESSION['items']))
	{
		unset($_SESSION['items']);
	}
 ?>
        <div id="container_success">
        	<div id="success">
            	<h1 class="contact">THANK YOU FOR BUYING!</h1>
                <h2 class="contact">Your requested item has been sent to our place</h2>
                <p><i>We will deliver it soon!</i></p>
                <h3 class="back_home_contact"><a href="index.php">&#65513;Back To Home</a></h3>
            </div>
        </div>
        
    </div>
    </div>
    
    <?php

	include('footer.php');
		}
		else
		{
			echo "GA DAPET datanya !";
		}
?>
