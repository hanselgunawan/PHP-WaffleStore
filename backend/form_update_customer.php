<?php
	include('header2.php');
				
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		
		$query="SELECT * FROM customer WHERE customerid='$id'";
		$result=mysql_query($query);
		$row=mysql_fetch_array($result);
		
	}
	
 ?>
        <div id="add_product">
        		<h1>Update Customer</h1>
                <div id="kotak_add_product">
                <form method="post" action="update_customer_process.php?id=<?php echo $id; ?>">
                	<ul class="ul_customer_update">
                   <li><p>Customer Name <span><input type="text" name="cust_name" value="<?php echo $row['name']; ?>" class="input_customer"></span></p></li><br/>
                   
                   <li><p>Customer Email <span><input type="text" size="25" name="cust_email" value="<?php echo $row['email']; ?>" class="input_customer"></span></p><br/></li>
                   
                   <li><p>Customer Phone <span><input type="text" style="margin-left:25px;" size="25" name="cust_phone" value="<?php echo $row['phone']; ?>" class="input_customer"></span></p><br/></li>
                   
                   <li style="margin-left:-50px;"><p style="margin-left:-26px;">Customer Other Phone <span><input type="text" style="margin-left:25px;" size="25" name="cust_otherphone" value="<?php echo $row['otherphone']; ?>" class="input_customer"></span></p><br/></li>
                   
                   <li><p style="margin-left:10px;">Customer Address <span><textarea cols="30" style="position:absolute; margin-left:27px;" rows="5" name="cust_address"><?php echo $row['address']; ?></textarea></span></p><br/></li>
                    </ul>
                	<a href="customer_backend.php" style="position:absolute; margin-top:100px;margin-left:-30px;">< Back to Customer</a>
                		<input type="reset" style="margin-top:100px;" value="RESET" class="tombol_reset_add"></input>
                        <input type="submit" value="UPDATE" class="tombol_submit_add"></input>
                </form>
                </div>
        </div>
        
   </div>
   </div>
   
   	<div id="footer">
    	<img src="../images/FOOTERwaffle&co.png" />
    </div> 
   
</html>     