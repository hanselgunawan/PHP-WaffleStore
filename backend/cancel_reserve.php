<?php

	include('header2.php');
	
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$hal=$_GET['hal'];
		$cancel="CANCEL";
		$query="UPDATE reservation SET reserve_status='$cancel' WHERE reservationid='$id'";
		
		$result=mysql_query($query);
		if($result)
		{
			header("Location:reservation_backend.php?halaman=$hal");
		}
		else
		{
			echo "ERROR DONING".mysql_error();
		}
		
	}
	else
	{
		echo "ERROR ID!".mysql_error();
	}

?>