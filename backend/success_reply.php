<?php

	include('header2.php');
	
	if(isset($_GET['id']))
	{
		$halaman=$_GET['hal'];
		$id=$_GET['id'];
		$status=$_POST['status_comment'];
		$pesan=$_POST['reply_message'];
		
		$query="UPDATE contactus SET contactstatus='REPLIED', comment_status='$status' WHERE contactusid='$id'";
		$result=mysql_query($query);
		
		if($result)
		{
			header('Location:contact_us_backend.php');	
		}
		else
		{
			mysql_error();
		}
		
	}

?>