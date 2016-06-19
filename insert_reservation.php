<?php
	session_start();
	include('connectdb.php');
	
				$name=$_SESSION['current_name'];
				$email=$_SESSION['current_email'];
				$contact=$_SESSION['current_contact'];
				$adult=$_SESSION['current_adult'];
				$child=$_SESSION['current_child'];
				$date=$_SESSION['current_date'];
				$time=$_SESSION['current_time'];
				$event=$_SESSION['current_event'];
				$wait="WAITING";
				
	$query1="INSERT INTO reservation(reserve_name,reserve_email,reserve_contact,reserve_adult,reserve_child, reserve_date, reserve_time, reserve_event,reserve_status) VALUES('$name','$email','$contact','$adult','$child','$date','$time','$event','$wait')";
	
	$result1=mysql_query($query1);
	
	if(!$result1)
	{
		echo "error insert!".mysql_error();
	}
	else
	{
		header('Location:success_reservation.php');
	}
	
?>