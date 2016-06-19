<?php
	include('header2.php');
?>	
	<!--<meta http-equiv="refresh" content="5"> UNTUK REFRESH PAGE-->
	<?php
	$batas=15;
	$tampil1=mysql_query("SELECT * FROM reservation");
	$jml_data=mysql_num_rows($tampil1);
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
			case "View Done Status":
					$query="SELECT * FROM reservation WHERE reserve_status='DONE' LIMIT $halaman1,$batas";
					$result=mysql_query($query);
					?><p style="margin-left:35%; margin-top:6%; color:#c30; font-size:16pt; font-family:rockwell; position:absolute;"><?php echo "VIEW DONE STATUS";?></p><?php break;
			
			case "Order Done by Date":
					$query="SELECT * FROM reservation WHERE reserve_status='DONE' ORDER BY reserve_date DESC LIMIT $halaman1,$batas";
					$result=mysql_query($query);
					?><p style="margin-left:35%; margin-top:6%; color:#c30; font-size:16pt; font-family:rockwell; position:absolute;"><?php echo "Order Done by Date";?></p><?php break;
			
			case "Order All by Date":
					$query="SELECT * FROM reservation ORDER BY reserve_date DESC LIMIT $halaman1,$batas";
					$result=mysql_query($query);
					?><p style="margin-left:35%; margin-top:6%; color:#c30; font-size:16pt; font-family:rockwell; position:absolute;"><?php echo "VIEW ALL STATUS";?></p><?php break;
					
			case "View All Status":
					$query="SELECT * FROM reservation LIMIT $halaman1,$batas";
					$result=mysql_query($query);
					?><p style="margin-left:35%; margin-top:6%; color:#c30; font-size:16pt; font-family:rockwell; position:absolute;"><?php echo "Order All by Date";?></p><?php break;
			
			case "View Cancel Status":
					$query="SELECT * FROM reservation WHERE reserve_status='CANCEL' LIMIT $halaman1,$batas";
					$result=mysql_query($query);
					?><p style="margin-left:35%; margin-top:6%; color:#c30; font-size:16pt; font-family:rockwell; position:absolute;"><?php echo "VIEW CANCEL STATUS";?></p><?php break;	
					
			case "Order Cancel by Date":		
					$query="SELECT * FROM reservation WHERE reserve_status='CANCEL' ORDER BY reserve_date DESC LIMIT $halaman1,$batas";
					$result=mysql_query($query);
					?><p style="margin-left:35%; margin-top:6%; color:#c30; font-size:16pt; font-family:rockwell; position:absolute;"><?php echo "Order Cancel by Date";?></p><?php break;			
			
			case "View Waiting Status":		
					$query="SELECT * FROM reservation WHERE reserve_status='WAITING' LIMIT $halaman1,$batas";
					$result=mysql_query($query);
					?><p style="margin-left:35%; margin-top:6%; color:#c30; font-size:16pt; font-family:rockwell; position:absolute;"><?php echo "VIEW WAITING STATUS";?></p><?php break;	
			
			case "Order Waiting by Date":		
					$query="SELECT * FROM reservation WHERE reserve_status='WAITING' ORDER BY reserve_date DESC LIMIT $halaman1,$batas";
					$result=mysql_query($query);
					?><p style="margin-left:35%; margin-top:6%; color:#c30; font-size:16pt; font-family:rockwell; position:absolute;"><?php echo "Order Waiting by Date";?></p><?php break;
			}
		}
		else
		{
			$query="SELECT * FROM reservation ORDER BY reserve_date DESC LIMIT $halaman1,$batas";
			$result=mysql_query($query);
		}
	
 ?>
        <div id="content_reservation_backend">
        	<div id="reservation_backend">
            	
            	<h1>Reservation</h1>
                <form method="post" action="">
                	<select name="sort">
                    	<optgroup label="All">
                            <option selected="selected">Order All by Date</option>
                            <option>View All Status</option>
                        </optgroup>
                        <optgroup label="Done">
                			<option>View Done Status</option>
                            <option>Order Done by Date</option>
                        </optgroup>
                        <optgroup label="Cancel">
                			<option>View Cancel Status</option>
                            <option>Order Cancel by Date</option>
                        </optgroup>
                        <optgroup label="Waiting">
                			<option>View Waiting Status</option>
                            <option>Order Waiting by Date</option>
                        </optgroup>
                    </select>
                    <input type="submit" value="Go" style="width:50px;">
                </form>
                <table>
                  <tr>	
                	<th style="padding:3px;">Cust No.</th>
                    <th>Cust Name</th>
                    <th>Cust Email</th>
                    <th>Cust Ctc Num.</th>
                    <th style="padding:3px;">Adult(s)</th>
                    <th style="padding:3px;">Child(s)</th>
                    <th>Event</th>
                    <th>Reserve Date</th>
                    <th>Reserve Time</th>
                    <th>Status</th>
                    <th style="padding:20px;">Done / Cancel</th>                   
                  </tr>
                  <?php
				  	while($row=mysql_fetch_array($result)){
						$reserve_date=$row['reserve_date'];
						$newDate=date("d-m-20y",strtotime($reserve_date));
				   ?>
                  <tr>
                  	<td><?php echo $row['reservationid']; ?></td>
                    <td><?php echo $row['reserve_name']; ?></td>
                    <td><?php echo $row['reserve_email']; ?></td>
                    <td><?php echo $row['reserve_contact']; ?></td>
                    <td><?php echo $row['reserve_adult']; ?></td>
                    <td><?php echo $row['reserve_child']; ?></td>
                    <td><?php echo $row['reserve_event']; ?></td>
                    <td><?php echo $newDate; ?></td>
                    <td><?php echo $row['reserve_time']; ?></td>
                    <td><?php echo $row['reserve_status']; ?></td>
                    <td><a href="done_reserve.php?id=<?php echo $row['reservationid']; ?>&hal=<?php echo $halaman; ?>"><img src="../images/done_button.png" style="width:25px;height:25px;border:none"></a>
                    &nbsp;<a href="cancel_reserve.php?id=<?php echo $row['reservationid']; ?>&hal=<?php echo $halaman; ?>"><img src="../images/delete_button.png" style="width:25px;height:25px;border:none"></a></td>
                  </tr>
                  <?php } ?> 
                  </table>
                  
                  
                   <?php
			$tampil2=mysql_query("SELECT * FROM reservation");
			$jml_data=mysql_num_rows($tampil2);
			$jml_halaman=ceil($jml_data/$batas);
		?>
        <div style="margin-left:60%; margin-top:20px;" id="pagination">
                
                <?php if($jml_halaman>1 && $halaman>1)
                {?>
                <a href="reservation_backend.php?halaman=1" style="text-decoration:none;">&#8610;First</a>
                <a href="reservation_backend.php?halaman=<?php echo $halaman-1; ?>" style="text-decoration:none; font-size:11pt">&#8676;previous</a>
                <?php } ?>
                <?php
				for($b=1;$b<=$jml_halaman;$b++)
						{
							if($jml_halaman>1)
							{
									?><a href="reservation_backend.php?halaman=<?php echo $b; ?>" style="text-decoration:none;" class="paging">
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
         <a href="reservation_backend.php?halaman=<?php echo $halaman+1; ?>" style="text-decoration:none; font-size:11pt;">next&#8677;</a>
         <a href="reservation_backend.php?halaman=<?php echo $jml_halaman; ?>" style="text-decoration:none;">Last&#8611;</a>
         <?php }?></div>
            </div>
          </div>  
     </div>
     </div>
     
	<div id="footer">
    	<img src="../images/FOOTERwaffle&co.png" />
    </div> 
</html>        