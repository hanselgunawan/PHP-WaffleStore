<?php
	include('header2.php');
				
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		
		$query="SELECT * FROM product WHERE productid='$id'";
		$result=mysql_query($query);
		$row=mysql_fetch_array($result);
		
	}
	
 ?>
        <div id="add_product">
        		<h1>Update Product</h1>
                <div id="kotak_add_product">
                <form method="post" action="update_product_process.php?id=<?php echo $id; ?>">
                	<ul class="ul_insertproduct">
                    	<img src="../images/product/<?php echo $row['gambar_product']; ?>" width="150px" height="100px" style="margin-left:25%;"><p style="font-size:10pt;text-align:center;width:150px;margin-left:25%;color:red;">Previous Image</p>
                		<li class="insert_product">New Image <input type="file" name="edit_image" autofocus="autofocus"></li>
                    	<li class="insert_product">Name <input type="text" name="edit_product_name" size="34" value="<?php echo $row['nama_product']; ?>" ></li>
                    	<li class="insert_product">Product Category <select name="edit_cat" style="width:110px;"><?php
										if($row['kategori_product']=='asianfood')
										{
											?>
                                            	
                        											<option selected="selected">asianfood</option>
                                                                    <option>westernfood</option>
                                                                    <option>dessert</option>
                                                                    <option>drink</option>
                                                                    
                                            <?php
										}
										else if($row['kategori_product']=='westernfood')
										{
											?>
                                            	
                        											<option>asianfood</option>
                                                                    <option selected="selected">westernfood</option>
                                                                    <option>dessert</option>
                                                                    <option>drink</option>
                                                                    
                                            <?php
										}
										else if($row['kategori_product']=='dessert')
										{
											?>
                                            	
                        											<option>asianfood</option>
                                                                    <option>westernfood</option>
                                                                    <option selected="selected">dessert</option>
                                                                    <option>drink</option>
                                                                    
                                            <?php
										}
										else
										{
											?>
                                            	
                        											<option>asianfood</option>
                                                                    <option>westernfood</option>
                                                                    <option >dessert</option>
                                                                    <option selected="selected">drink</option>
                                                                    
                                            <?php
										}
						 ?></select></li>
                         <?php
						 if($row['kategori_product']=='dessert' || $row['kategori_product']=='drink')
						 {
						 }
						 else
						 {
						 ?>
                       <li class="insert_product">Product Content <select style="width:110px;" name="edit_content">
                        								<?php
															if($row['content_product']=="--")
															{
																?>
                                                                	<option selected="selected">--</option>
                                                                    <option>ayam</option>
                                                                    <option>sapi</option>
                                                                    <option>udang</option>
                                                                    <option>cumi</option>
                                                                <?php
															}
															else if($row['content_product']=="ayam")
															{
																?>
                                                                	<option>--</option>
                                                                    <option selected="selected">ayam</option>
                                                                    <option>sapi</option>
                                                                    <option>udang</option>
                                                                    <option>cumi</option>
                                                                <?php
															}
															else if($row['content_product']=="sapi")
															{
																?>
                                                                	<option>--</option>
                                                                    <option>ayam</option>
                                                                    <option selected="selected">sapi</option>
                                                                    <option>udang</option>
                                                                    <option>cumi</option>
                                                                <?php
															}
															else if($row['content_product']=="udang")
															{
																?>
                                                                	<option>--</option>
                                                                    <option>ayam</option>
                                                                    <option >sapi</option>
                                                                    <option selected="selected">udang</option>
                                                                    <option>cumi</option>
                                                                <?php
															}
															else
															{
																?>
                                                                	<option>--</option>
                                                                    <option>ayam</option>
                                                                    <option >sapi</option>
                                                                    <option>udang</option>
                                                                    <option selected="selected">cumi</option>
                                                                <?php
															}
															
															
														
                                                                    ?></select></li><?php } ?>
                      <li class="insert_product">Description<textarea cols="25" rows="5" name="edit_desc" placeholder="Description of the product"><?php echo $row['komposisi_product']; ?></textarea></li>      
                      
                      <li class="insert_product" style="margin-top:8%;margin-right:10%;">Recommend Status 
                      <select style="width:110px;position:absolute; margin-left:8px;" name="recommend_status">
                      <?php
															if($row['recommend_status']=='recommended')
															{
																?>
                      		<option selected="selected">recommended</option>
                            <option>normal</option>
                      <?php
															}
															else
															{
					  ?>
                      	<option>recommended</option>
                            <option selected="selected">normal</option>
                       <?php
															}
					   ?>     
                       
                      </select></li>                
                      
                      <li class="insert_product" style="margin-top:1%;margin-right:10%;">Price <input size="25" type="text" name="edit_price" value="<?php echo $row['harga_product']; ?>"></li>
                                                                                           
                </ul>
                		<a href="update_product.php" style="position:absolute; margin-top:80px;margin-left:-30px;">< Back to Update Product</a>
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