<?php
	include('header2.php');
	
	if(isset($_GET['id']))
	{
		$prod_id=$_GET['id'];
		$current_page=$_GET['hal'];
		
		$query="UPDATE product SET product_status='deleted' WHERE productid='$prod_id'";
		$result=mysql_query($query);
		
		if($result)
		{
			header('Location:delete_product.php?halaman='.$current_page.'');
		}
		else
		{
			echo "CANNOT UPDATE !".mysql_error();
		}
	}
	
?>