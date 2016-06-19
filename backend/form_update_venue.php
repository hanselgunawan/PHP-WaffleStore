<?php
	include('header2.php');
				
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		
		$query="SELECT * FROM venue WHERE venueid='$id'";
		$result=mysql_query($query);
		$row=mysql_fetch_array($result);
		
	}
	
 ?>
        <div id="add_product">
        		<h1>Update Product</h1>
                <div id="kotak_add_product">
                <form method="post" action="update_venue_process.php?id=<?php echo $id; ?>">
                	<ul class="ul_insertproduct">
                    	<img src="../images/venue/<?php echo $row['gambar_venue']; ?>" width="150px" height="100px" style="margin-left:25%;"><p style="font-size:10pt;text-align:center;width:150px;margin-left:25%;color:red;">Previous Image</p>
                		<li class="insert_product">New Image <input type="file" name="edit_venue_image" autofocus="autofocus"></li>
                    	<li class="insert_product">Name <input type="text" name="edit_venue_name" size="34" value="<?php echo $row['nama_venue']; ?>" ></li>
                      <li class="insert_product">Description<textarea cols="25" rows="5" name="edit_venue_desc" placeholder="Description of the product"><?php echo $row['desc_venue']; ?></textarea></li>                                                                  
                </ul>
                		<a href="update_venue.php" style="position:absolute; margin-top:80px;margin-left:-30px;">< Back to Update Venue</a>
                		<input type="reset" value="RESET" class="tombol_reset_add"></input>
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