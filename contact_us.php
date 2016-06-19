<?php 
	include('connectdb.php');
	include('header.php');
?>
<li><a href="index.php">Home</a></li>
    		<li><a href="menu_all.php">Menu</a></li>
    		<li><a href="reservation.php">Reservation</a></li>
    		<li class="li_about"><a href="about_us.php">About Us</a>
            <ul class="ul_mouseover">
            	<li class="li_mouseover"><a href="about_us.php#video_aboutus">Video</a></li>
                <li class="li_mouseover"><a href="about_us.php#floorplan_aboutus">Sections</a></li>
            </ul></li>
    		<li class="li_contactus2"><a href="contact_us.php" style="color:purple;">Contact Us</a>
            	<ul class="ul_mouseover_contactus2">
                	<li class="li_mouseover_contactus2"><a href="contact_us.php#comment">Comments</a></li>
                </ul></li>
 		</ul>
        <img src="images/garismenu.jpg" height="8px" class="garismenu">
        </div> 
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script> 
    <script>
		var myCenter=new google.maps.LatLng(-6.257344,106.79958899999997);
		var marker;

		function initialize()
		{
		var mapProp = {
  		center:myCenter,
  		zoom:15,
  		mapTypeId:google.maps.MapTypeId.ROADMAP
  		};

		var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

		marker=new google.maps.Marker({
  		position:myCenter,
  		animation:google.maps.Animation.BOUNCE
  		});

		marker.setMap(map);

		var infowindow = new google.maps.InfoWindow({
  		content:"Waffle & Co         "
  		});

		infowindow.open(map,marker);
		}

		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
     
<!------------------------------------------------------------------------>
        <img src="images/kayu_contactus.jpg" class="kayu_contact_us">
     <div id="container_contactus">
        <div id="contact_us">
        	<p class="p_atas">Got something to say? Please drop us a line</p>
            	<p class="p_atas2">Drop us a line and we will get back to you in 2 Business days.</p>
                <p class="p_atas2">Please let us know if we can be any assistance </p>
                <p class="p_atas2">and we'd be happy to help.</p>
        	<div id="kiri_contact">
            	<h3>Address & Contact Info</h3>
            	<img src="images/logo_telepon.jpg" class="logo_contactkiri">
        		<p>021.594.2270</p>
                <img src="images/logo_email.jpg" class="logo_contactkiri">
            	<p>Waffle&Co@gmail.com</p>
                <img src="images/logo_location.jpg" class="logo_contactkiri">
            	<p>Jl.Dharmawangsa III No.11,<br/>Kebayoran baru, Jakarta Selatan</p>
                <div id="googleMap">
				</div>
           </div>
           
           <div id="kanan_contact">
           		<p>All fields are required to be filled</p>
           		<form method="post" action="contactus_confirmation.php">
                	<ul class="contactus">
                    	<li>Name  <input type="text" maxlength="32" placeholder="Your Name" required="required" name="customer_name"></li>
                        <li>Email  <input type="text" maxlength="32" placeholder="Your Email" required="required" name="customer_email"></li>
                        <li>Title  <input type="text" maxlength="32" placeholder="The Title" required="required" name="customer_title"></li>
                        <li>Message<textarea type="text" cols="30" rows="8" placeholder="Your Message..." required="required" name="customer_comment"></textarea></li>
                    </ul>
                    
                    <input type="reset" value="Reset" class="tombol_reset_contact">
                    <input type="submit" value="Submit" class="tombol_submit_contact">
                </form>
                
           </div>
            </div>
        		
                <a name="#comment"><div id="comment"></a>
                <?php
				
				$batas=3;//UBAH SINI AJA 
					$tampil3=mysql_query("SELECT * FROM contactus WHERE comment_status='good'");//buat cari jumlah page doang, BUAT ERROR HANDLING AJA!
					$jml_data=mysql_num_rows($tampil3);
					$jml_halaman=ceil($jml_data/$batas);//untuk tahu jumlah halaman secara keseluruhan!
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
				
				$query="SELECT * FROM contactus WHERE comment_status='good' LIMIT $halaman1,$batas";
				$result=mysql_query($query);
				$nomor=$halaman1+1;
				?>
                <img src="images/kayu_comment.jpg" class="kayu_comment">
                <table>
                	<tr>
                    	<th>Cust.</th>
                		<th class="nama">Name</th>
                    	<th class="comment">Comment</th>
                        <th class="date">Date</th>
                    </tr>
                    <?php
						while($row=mysql_fetch_array($result))
						{
				  			$join=$row['contactdate'];
						$newDate=date("d-m-20y",strtotime($join));
					?>
                    <tr>
                    	<td><?php echo $nomor; ?></td>
                    	<td><?php echo $row['contactname']; ?></td>
                        <td><?php echo $row['contactcomment'] ?></td>
                        <td><?php echo $newDate;?></td>
                    </tr>
                    <?php
						$nomor++;
						}?>
                </table>
                <?php
			$tampil2=mysql_query("SELECT * FROM contactus WHERE comment_status='good'");
			$jml_data=mysql_num_rows($tampil2);
			$jml_halaman=ceil($jml_data/$batas);
		?>
        <div style="margin-left:70%; margin-top:20px;" id="pagination">
                
                <?php if($jml_halaman>1 && $halaman>1)
                {?>
                <a href="contact_us.php?halaman=1" style="text-decoration:none;">&#8610;First</a>
                <a href="contact_us.php?halaman=<?php echo $halaman-1; ?>" style="text-decoration:none; font-size:11pt">&#8676;previous</a>
                <?php } ?>
                <?php
				for($b=1;$b<=$jml_halaman;$b++)
						{
							if($jml_halaman>1)
							{
									?><a href="contact_us.php?halaman=<?php echo $b; ?>" style="text-decoration:none;" class="paging">
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
         <a href="contact_us.php?halaman=<?php echo $halaman+1; ?>" style="text-decoration:none; font-size:11pt;">next&#8677;</a>
         <a href="contact_us.php?halaman=<?php echo $jml_halaman; ?>" style="text-decoration:none;">Last&#8611;</a>
         <?php }?>
         </div>
                	</div>
                </div>
       
    </div>
    </div>
  </div>

	<?php

	include('footer.php');
	
?>