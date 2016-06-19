<?php
	include('header2.php');
	
	if(isset($_GET['id']))
	{
		$venue_id=$_GET['id'];
		$current_page=$_GET['hal'];
		
		$query="UPDATE venue SET venue_status='deleted' WHERE venueid='$venue_id'";
		$result=mysql_query($query);
		
		if($result)
		{
			header('Location:delete_venue.php?halaman='.$current_page.'');
		}
		else
		{
			echo "CANNOT UPDATE !".mysql_error();
		}
	}
	
?>