<?php
	include('header2.php');
	
	$batas=10;
	$tampil3=mysql_query("SELECT * FROM customer");	
	$jml_data=mysql_num_rows($tampil3);
	$jml_halaman=ceil($jml_data/$batas);
	if(!isset($_GET['halaman']) || $_GET['halaman']<=0 || $_GET['halaman']>$jml_halaman)//ERROR HANDLING
					{
						$halaman=1;
						$halaman1=0;//posisi start-nya
					}
				else
					{
						$halaman=$_GET['halaman'];
						$halaman1=($halaman-1)*$batas;//contoh: HALAMAN 2, posisi nya dimulai dari 10, bukan 0 LAGI!
					}
	if(isset($_POST['sort']))
	{
		switch($_POST['sort'])
		{
			case "Sort By Name":
			$query="SELECT * FROM customer ORDER BY name LIMIT $halaman1,$batas";
			$result=mysql_query($query);break;
			
			case "Sort By ID":
			$query="SELECT * FROM customer ORDER BY customerid LIMIT $halaman1,$batas";
			$result=mysql_query($query);break;
			
			case "Sort By Email":
			$query="SELECT * FROM customer ORDER BY email LIMIT $halaman1,$batas";
			$result=mysql_query($query);break;
			
			case "Sort By Join Date (Newest-Oldest)":
			$query="SELECT * FROM customer ORDER BY join_date DESC LIMIT $halaman1,$batas";
			$result=mysql_query($query);break;
			
			case "Sort By Join Date (Oldest-Newest)":
			$query="SELECT * FROM customer ORDER BY join_date ASC LIMIT $halaman1,$batas";
			$result=mysql_query($query);break;
		}
	}
	else
	{
	$query="SELECT * FROM customer LIMIT $halaman1,$batas";
	$result=mysql_query($query);
	}
	
 ?>
        <div id="content_contactus_backend">
        	<div id="contactus_backend">
            	<h1>Customer</h1>
                	<form action="customer_backend.php" method="post">
                    	<select name="sort">
                        	<option>Sort By Name</option>
                            <option>Sort By ID</option>
                            <option>Sort By Email</option>
                            <option>Sort By Join Date (Newest-Oldest)</option>
                            <option>Sort By Join Date (Oldest-Newest)</option>
                            <input type="submit" value="Go" style="margin-left:0.5%; width:50px;">
                        </select>
                    </form>
                <table id="customer_table">
                  <tr>	
                	<th style="padding:3px;">Cust ID</th>
                    <th>Cust Name</th>
                    <th>Cust Email</th>
                    <th>Cust Phone</th>
                    <th>Cust Other Phone</th>
                    <th>Cust Address</th>
                    <th>Join Date</th>
                    <th>Action</th>                 
                  </tr>
                  <?php while($row=mysql_fetch_array($result)){ 
				  			$join=$row['join_date'];
						$newDate=date("d-m-20y",strtotime($join));
				  	?>
                  <tr>
                  	<td><?php echo $row['customerid']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['otherphone']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td style="width:2500px;"><?php echo $newDate; ?></td>
                    <td><a href="form_update_customer.php?id=<?php echo $row['customerid']; ?>">update</a></td>
                  </tr>
                  <?php } ?>                                 
                </table>
                <?php
			$tampil2=mysql_query("SELECT * FROM customer");
			$jml_data=mysql_num_rows($tampil2);
			$jml_halaman=ceil($jml_data/$batas);
		?>
        <div style="margin-left:60%; margin-top:20px;" id="pagination">
                
                <?php if($jml_halaman>1 && $halaman>1)
                {?>
                <a href="customer_backend.php?halaman=1" style="text-decoration:none;">&#8610;First</a>
                <a href="customer_backend.php?halaman=<?php echo $halaman-1; ?>" style="text-decoration:none; font-size:11pt">&#8676;previous</a>
                <?php } ?>
                <?php
				for($b=1;$b<=$jml_halaman;$b++)
						{
							if($jml_halaman>1)
							{
									?><a href="customer_backend.php?halaman=<?php echo $b; ?>" style="text-decoration:none;" class="paging">
									<?php 
									if($halaman==$b)
									{
										?><span style="color:red; font-size:16pt;"><?php echo $b."&nbsp;";?></span><?php
									}
        							else
        							{
										?><span style="color:black"><?php echo $b."&nbsp;"; ?></span></a><?php
									}
							}
						}
						
		 ?>
         <?php if($halaman<$jml_halaman){ ?>
         <a href="customer_backend.php?halaman=<?php echo $halaman+1; ?>" style="text-decoration:none; font-size:11pt;">next&#8677;</a>
         <a href="customer_backend.php?halaman=<?php echo $jml_halaman; ?>" style="text-decoration:none;">Last&#8611;</a>
         <?php }?></div>
            </div>
          </div>  
     </div>
     </div>
     
	<div id="footer">
    	<img src="../images/FOOTERwaffle&co.png" />
    </div> 
</html>        