<?php
	include('header2.php');
	?>
    <!--<meta http-equiv="refresh" content="5"> UNTUK REFRESH PAGE-->
    <?php
	
	function buatrp($angka){
				$jadi="Rp ".number_format($angka,0,',','.').',-';
				return $jadi;
				}
	
	
	
	$batas=10;
	$tampil3=mysql_query("SELECT * FROM history");
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
	
	if(isset($_POST['sort_days']))
	{
		switch($_POST['sort_days'])
		{
			case "Last 7 Days":
			$date = date("Y-m-d", mktime(0,0,0, date("m"), date("d")-7, date("Y")));
			$query="SELECT * FROM history WHERE date_buy>='".$date."' ORDER BY date_buy DESC LIMIT $halaman1,$batas";break;
			
			case "Last 30 Days":
			$date = date("Y-m-d", mktime(0,0,0, date("m"), date("d")-30, date("Y")));
			$query="SELECT * FROM history WHERE date_buy>='".$date."' ORDER BY date_buy DESC LIMIT $halaman1,$batas";break;
			
			case "All days":
			$query="SELECT * FROM history ORDER BY date_buy DESC LIMIT $halaman1,$batas";
		}
	}
	else
	{ 
	$query="SELECT * FROM history ORDER BY date_buy DESC LIMIT $halaman1,$batas";
	}
	$result=mysql_query($query);
	
 ?>
        <div id="content_history_backend">
        	<div id="history_backend">
            	<h1>Customer's History</h1>
                <form method="post" action="">
                		<select name="sort_days">
                        	<option>All days</option>
                        	<option>Last 7 Days</option>
                        	<option>Last 30 Days</option>
                        </select>
                        <input type="submit" value="Go!">
                </form>
                <table>
                  <tr>	
                	<th style="padding:3px;">Cust ID</th>
                    <th>Cust Name</th>
                    <th>Username</th>
                    <th style="width:20%;">Item</th>
                    <th>Qty</th>
                    <th style="width:10000px;">Date of buy</th>
                    <th>Time of buy</th>
                    <th style="width:15%;">Total Price</th>
                    <th>Payment Status</th> 
                    <th>Action</th>       
                  </tr>
                  <?php while($row=mysql_fetch_array($result)) {
						$date_buy=$row['date_buy'];
						$newDate=date("d-m-20y",strtotime($date_buy));?>
                  <tr>
                  	<td><?php echo $row['customer_id']; ?></td>
                    <td><?php echo $row['customer_name']; ?></td>
                    <td><?php echo $row['customer_username']; ?></td>
                    <td><?php echo $row['customer_item']; ?></td>
                    <td><?php echo $row['customer_qty']; ?></td>
                    <td style="width:800px;"><?php echo $newDate; ?></td>
                    <td><?php echo $row['time_buy']; ?></td>
                    <td><?php echo buatrp($row['total_price']); ?></td>
                    <td><?php echo $row['payment_status']; ?></td>
                    <td><a href="paid.php?id=<?php echo $row['history_id']; ?>"><img src="../images/done_button.png" style="width:30px; height:30px; border:none;"></td>
                  </tr>
                  <?php } ?>              
                </table>
                <?php
			$tampil2=mysql_query("SELECT * FROM history ");
			$jml_data=mysql_num_rows($tampil2);
			$jml_halaman=ceil($jml_data/$batas);
		?>
        <div style="margin-left:60%; margin-top:20px;" id="pagination">
                
                <?php if($jml_halaman>1 && $halaman>1)
                {?>
                <a href="customer_history.php?halaman=1" style="text-decoration:none;">&#8610;First</a>
                <a href="customer_history.php?halaman=<?php echo $halaman-1; ?>" style="text-decoration:none; font-size:11pt">&#8676;previous</a>
                <?php } ?>
                <?php
				for($b=1;$b<=$jml_halaman;$b++)
						{
							if($jml_halaman>1)
							{
									?><a href="customer_history.php?halaman=<?php echo $b; ?>" style="text-decoration:none;" class="paging">
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
         <a href="customer_history.php?halaman=<?php echo $halaman+1; ?>" style="text-decoration:none; font-size:11pt;">next&#8677;</a>
         <a href="customer_history.php?halaman=<?php echo $jml_halaman; ?>" style="text-decoration:none;">Last&#8611;</a>
         <?php }?></div>
            </div>
          </div>  
     </div>
     </div>
     
	<div id="footer">
    	<img src="../images/FOOTERwaffle&co.png" />
    </div> 
</html>        