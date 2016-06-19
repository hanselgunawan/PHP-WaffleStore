<?php

	include('header2.php');
	if(isset($_GET['id']))
	{
		$hist_id=$_GET['id'];
		$query="UPDATE history SET payment_status='PAID' WHERE history_id='$hist_id'";//harus history ID nya !!
		$result=mysql_query($query);
		if($result)
		{
			header("Location:customer_history.php");
		}
		else
		{
			echo "Can't UPDATE !".mysql_error();
		}
	}
	else
	{
		echo "CANT GET ID!".mysql_error();
	}
	
?>