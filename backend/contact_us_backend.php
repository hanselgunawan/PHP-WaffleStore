<?php
	include('header2.php');
	
	$batas=10;
	$tampil3=mysql_query("SELECT * FROM contactus");
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
	
	if(isset($_GET['order']))
	{
		switch($_GET['order'])
		{
			case "asc":
			$query="SELECT * FROM contactus ORDER BY contactdate ASC LIMIT $halaman1,$batas";
			$result=mysql_query($query);break;
			
			case "desc":
			$query="SELECT * FROM contactus ORDER BY contactdate DESC LIMIT $halaman1,$batas";
			$result=mysql_query($query);break;
		}
	}
	else
	{
	$query="SELECT * FROM contactus LIMIT $halaman1,$batas";
	$result=mysql_query($query);
	}
	
 ?>
        <div id="content_contactus_backend">
        	<div id="contactus_backend">
            	<h1>Contact Us</h1>
                <a href="contact_us_backend.php?order=desc">Order By Date (Descending)</a>
                <a href="contact_us_backend.php?order=asc" style="margin-left:10%;">Order By Date (Ascending)</a>
                <table>
                  <tr>	
                	<th style="padding:3px;">Cust No.</th>
                    <th>Cust Name</th>
                    <th>Cust Email</th>
                    <th>Title</th>
                    <th style="width:15%;">Message</th>
                    <th style="width:800px;">Date</th>
                    <th>Message Status</th>
                    <th>Comment Status</th>
                    <th>Action</th>                 
                  </tr>
                  <?php 
				  while($row=mysql_fetch_array($result)) {
				  			$join=$row['contactdate'];
						$newDate=date("d-m-20y",strtotime($join));
					  ?>
                  <tr>
                  	<td><?php echo $row['contactusid']; ?></td>
                    <td><?php echo $row['contactname']; ?></td>
                    <td><?php echo $row['contactemail']; ?></td>
                    <td><?php echo $row['contacttitle']; ?></td>
                    <td><?php echo $row['contactcomment']; ?></td>
                    <td><?php echo $newDate; ?></td>
                    <td><?php echo $row['contactstatus']; ?></td>
                    <td><?php echo $row['comment_status']; ?></td>
                    <td><a href="reply_contactus.php?id=<?php echo $row['contactusid']; ?>&hal=<?php echo $halaman; ?>">reply</a></td>
                  </tr>
                  <?php } ?>                                  
                </table>
                
                <?php
				$tampil2=mysql_query("SELECT * FROM contactus");
				$jml_data=mysql_num_rows($tampil2);
				$jml_halaman=ceil($jml_data/$batas);
				?>
        		<div style="margin-left:60%; margin-top:20px;" id="pagination">                
                <?php if($jml_halaman>1 && $halaman>1)
                {?>
                
                <a href="contact_us_backend.php?halaman=1" style="text-decoration:none;">&#8610;First</a>
                <a href="contact_us_backend.php?halaman=<?php echo $halaman-1; ?>" style="text-decoration:none; font-size:11pt">&#8676;previous</a>
                <?php } ?>
                <?php
				for($b=1;$b<=$jml_halaman;$b++)
						{
							if($jml_halaman>1)
							{
									?><a href="contact_us_backend.php?halaman=<?php echo $b; ?>" style="text-decoration:none;" class="paging">
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
         <a href="contact_us_backend.php?halaman=<?php echo $halaman+1; ?>" style="text-decoration:none; font-size:11pt;">next&#8677;</a>
         <a href="contact_us_backend.php?halaman=<?php echo $jml_halaman; ?>" style="text-decoration:none;">Last&#8611;</a>
         <?php }?></div>
                
            </div>
          </div>  
     </div>
     </div>
     
	<div id="footer">
    	<img src="../images/FOOTERwaffle&co.png" />
    </div> 
</html>        