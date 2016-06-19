<?php
	include('header2.php');
?>
        <div id="add_product">
        		<h1>Add Section</h1>
                <h3>All fields are required to be filled</h3>
                <div id="kotak_add_product">
                <form method="post" enctype="multipart/form-data" action="upload_venue.php">
                	<ul class="ul_insertproduct">
                		<li class="insert_product">Image<input type="file" name="file" required="required"></li>
                    	<li class="insert_product">Name <input type="text" required="required" name="add_venue_name" size="34" placeholder="Name of the Section"></li>
                      <li class="insert_product">Description<textarea required="required" cols="25" rows="5" name="add_venue_desc" placeholder="Description of the section..."></textarea></li>                                                                                        
                </ul>
                		<input type="reset" value="RESET" class="tombol_reset_add"></input>
                        <input type="submit" value="INSERT" class="tombol_submit_add"></input>
                </form>
                </div>
        </div>
        
   </div>
   </div>
   
   	<div id="footer">
    	<img src="../images/FOOTERwaffle&co.png" />
    </div> 
   
</html>     