<?php
	include('header2.php');
	$batas=10;	
	$tampil3=mysql_query("SELECT * FROM venue WHERE venue_status='available'");
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
	$query="SELECT * FROM venue WHERE venue_status='available' LIMIT $halaman1,$batas";
	$result=mysql_query($query);
 ?>
 <script>
	function info(){
		alert("The section has been deleted!");
	}

</script>
        <div id="content_update_venue">
        	<div id="update_venue">
            	<h1>Delete Section</h1>
                <table>
                  <tr>	
                	<th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  <?php
				  	while($row=mysql_fetch_array($result))
					{ ?>
                  <tr>
                  	<td><?php echo $row['venueid']; ?></td>
                    <td><img src="../images/venue/<?php echo $row['gambar_venue']; ?>" class="table_update_venue"></td>
                    <td><?php echo $row['nama_venue']; ?></td>
                    <td><?php echo $row['desc_venue']; ?></td>
                  <td><a href="deletion_venue.php?id=<?php echo $row['venueid']; ?>&hal=<?php echo $halaman; ?>" onClick="info()"><img src="../images/delete_button.png" style="width:40px;height:40px;border:none"></a></td>
                  </tr>
                  <?php } ?>
                </table>
            </div>
          </div>  
     </div>
     </div>
     
	<div id="footer">
    	<img src="../images/FOOTERwaffle&co.png" />
    </div> 
</html>        