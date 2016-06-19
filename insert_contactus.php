<?php
	session_start();
	include('connectdb.php');
	
	$cust_name=$_SESSION['current_customer_name'];
	$cust_email=$_SESSION['current_customer_email'];
	$cust_title=$_SESSION['current_customer_title'];
	$cust_comment=mysql_real_escape_string($_SESSION['current_customer_comment']);
	$cust_status="UNREAD";
	$comment_status="neutral";
		date_default_timezone_set("Asia/Jakarta");
		$mydate=date("y-m-d");
	$query="INSERT INTO `contactus`(`contactname`,`contactemail`,`contacttitle`,`contactcomment`,`contactstatus`,`contactdate`,`comment_status`) 						VALUES('$cust_name','$cust_email','$cust_title','$cust_comment','$cust_status','$mydate','$comment_status')";
	$result=mysql_query($query);
	
	if(!$result)
	{
		echo "Cannot Insert into Database".mysql_error();
	}
	else
	{
		header("Location:success_contact.php");
	}

?>