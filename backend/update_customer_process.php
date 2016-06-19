<?php
	include('header2.php');
	if(isset($_GET['id']))
	{
		$cust_id=$_GET['id'];
		$cust_name=$_POST['cust_name'];
		$cust_email=$_POST['cust_email'];
		$cust_phone=$_POST['cust_phone'];
		$cust_otherphone=$_POST['cust_otherphone'];
		$cust_address=$_POST['cust_address'];
		
		$query="UPDATE customer SET name='$cust_name', email='$cust_email', phone='$cust_phone', otherphone='$cust_otherphone', address='$cust_address' WHERE customerid='$cust_id'";
		$result=mysql_query($query);
		
		if($result)
		{
			header('Location:success_update_customer.php');
		}
		else
		{
			echo "WADUH".mysql_error();
		}
	}
	else
	{
		echo "NOT FOUND ID!".mysql_error();
	}
?>