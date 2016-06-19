<?php
	session_start();
	
	include('connectdb.php');
?>
        
        
        <?php 
			if(isset($_SESSION['current_username']) && isset($_SESSION['current_password']) && isset($_SESSION['current_custname']) && isset($_SESSION['current_email']) && isset($_SESSION['current_phone']) && isset($_SESSION['current_otherphone']) && isset($_SESSION['current_address'])){
				$username=$_SESSION['current_username'];
				$password=md5($_SESSION['current_password']);
				$name=$_SESSION['current_custname'];
				$email=$_SESSION['current_email'];
				$phone=$_SESSION['current_phone'];
				$other=$_SESSION['current_otherphone'];
				$address=$_SESSION['current_address'];
				$today=date("y-m-d");
				
		$query1="INSERT INTO customer(name,email,phone,otherphone,address,join_date) VALUES('$name','$email','$phone','$other','$address','$today')";
		$result1=mysql_query($query1);
		$last_inserted_row=mysql_insert_id($sql);//untuk ambil id terakhir, yaitu CUSTOMERID
		$query2="INSERT INTO account(username,password,customerid) VALUES ('$username','$password','$last_inserted_row')";
		$result2=mysql_query($query2);
		
		if(!$result1 && !$result2){
			echo "GAGAL INSERT!".mysql_error();
		}
		else
		{
			header("Location:success_registration.php");
		}
				
	}
		?>
