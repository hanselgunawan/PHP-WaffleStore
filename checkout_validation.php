<?php 

include('header.php');

if(isset($_GET['data']))
{
	$array2=$_GET['data'];
}
if(isset($_GET['data2']))
{
	$array_value2=$_GET['data2'];
}

if(isset($_SESSION['current_name']))
{
	header("Location:checkout.php?data=".$array2."&data2=".$array_value2."");
}
else
{
	header('Location:login_page.php');
}

?>