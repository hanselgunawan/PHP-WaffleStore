<?php 
	include('connectdb.php');
if(isset($_POST['username']))
						{
								$user=$_POST['username'];
								$email=$_POST['customer_email'];
								$query="SELECT * FROM account WHERE username='$user'";
								
								$result=mysql_query($query);
								
								if(mysql_num_rows($result)) //kalau ketemu
									{
										echo "UDAH ADA !";
	
									}
								else
									{
										echo "GA ADA !";
									}
						}
?>