<?php
	include('header2.php');
	
	$query="SELECT * FROM customer INNER JOIN account ON customer.customerid=account.accountid";//UNTUK JOIN!
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	echo $row['password'];
	
?>