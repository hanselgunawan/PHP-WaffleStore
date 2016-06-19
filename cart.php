<?php
//HALAMAN ALGORITMA ADD MINUS BARANG
	require_once('connectdb.php');
	if(!isset($_SESSION))
	{
		session_start();
	}
	if(isset($_GET['action']) && isset($_GET['ref']))
	{
		$action=$_GET['action'];
		$ref=$_GET['ref'];
		
		if($action=='add')
		{
			if(isset($_GET['id']))
			{
				$productid=$_GET['id'];
					if(isset($_SESSION['items'][$productid]))
					{
						$_SESSION['items'][$productid]+=1;
					}
					else
					{
						$_SESSION['items'][$productid]=1;
					}
			}
		}
		else if($action=='plus')
		{
			if(isset($_GET['id']))
			{
				$productid=$_GET['id'];
				if(isset($_SESSION['items'][$productid]))
				{
					$_SESSION['items'][$productid]+=1;
				}
			}
		}
		else if($action=='minus')
		{
			if (isset($_GET['id'])) {
                $productid= $_GET['id'];
                if (isset($_SESSION['items'][$productid])) {
                    $_SESSION['items'][$productid] -= 1;
					if($_SESSION['items'][$productid] < 0)
					{
						$_SESSION['items'][$productid] = 0;
					}
                }
			}
		}
		else if($action=='delete')
		{
			if (isset($_GET['id'])) {
                $productid = $_GET['id'];
                if (isset($_SESSION['items'][$productid])) {
                    unset($_SESSION['items'][$productid]);
                }
            }
		}
		else if($action=='clear')
		{
			if (isset($_SESSION['items'])) {
                foreach ($_SESSION['items'] as $key => $val) {
                    unset($_SESSION['items'][$key]);
                }
                unset($_SESSION['items']);
            }
		}
		header("location:".$ref);
	}
	else if(isset($_GET['action']) && !isset($_GET['ref']))
	{
		$action=$_GET['action'];
		$ref="index.php";
		
		if($action=='add')
		{
			if(isset($_GET['id']))
			{
				$productid=$_GET['id'];
					if(isset($_SESSION['items'][$productid]))
					{
						$_SESSION['items'][$productid]+=1;
					}
					else
					{
						$_SESSION['items'][$productid]=1;
					}
			}
		}
		else if($action=='plus')
		{
			if(isset($_GET['id']))
			{
				$productid=$_GET['id'];
				if(isset($_SESSION['items'][$productid]))
				{
					$_SESSION['items'][$productid]+=1;
				}
			}
		}
		else if($action=='minus')
		{
			if (isset($_GET['id'])) {
                $productid= $_GET['id'];
                if (isset($_SESSION['items'][$productid])) {
                    $_SESSION['items'][$productid] -= 1;
                }
			}
		}
		else if($action=='delete')
		{
			if (isset($_GET['id'])) {
                $productid = $_GET['id'];
                if (isset($_SESSION['items'][$productid])) {
                    unset($_SESSION['items'][$productid]);
                }
            }
		}
		else if($action=='clear')
		{
			if (isset($_SESSION['items'])) {
                foreach ($_SESSION['items'] as $key => $val) {
                    unset($_SESSION['items'][$key]);
                }
                unset($_SESSION['items']);
            }
		}
		header("location:".$ref);
	}
	
?>


















