<?php
	include('header2.php');
	
	$query="SELECT * FROM venue";
	
	$res=mysql_query($query);
	
 ?>
        <div id="content_update_venue">
        	<div id="update_venue">
            	<h1>Update Section</h1>
                <table>
                  <tr>	
                	<th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  <?php 
				  	while($row=mysql_fetch_array($res)){
				  ?>
                  <tr>
                  	<td><?php echo $row['venueid']; ?></td>
                    <td><img src="../images/venue/<?php echo $row['gambar_venue']; ?>" class="table_update_venue"></td>
                    <td><?php echo $row['nama_venue']; ?></td>
                    <td><?php echo $row['desc_venue']; ?></td>
                    <td><a href="form_update_venue.php?id=<?php echo $row['venueid']; ?>">update</a></td>
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