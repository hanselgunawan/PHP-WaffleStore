<?php
	include('header2.php');
?>
    
		
        <div id="add_product">
        		<h1>Add Product</h1>
                <h3>* is required to be filled</h3>
                <div id="kotak_add_product">
                <form method="post" enctype="multipart/form-data" action="upload_product.php">
                	<ul class="ul_insertproduct">
                		<li class="insert_product">Image*<input type="file" name="file" required="required"></li>
                    	<li class="insert_product">Name* <input type="text" required="required" name="add_product_name" size="34" placeholder="Name of the Product"></li>
                    	<li class="insert_product">Product Category* <select name="add_cat">
                        											<option>asianfood</option>
                                                                    <option>westernfood</option>
                                                                    <option>dessert</option>
                                                                    <option>drink</option>
                                                                    </select></li>
                       <li class="insert_product">Product Content <select style="width:110px;" name="add_content">
                        											<option>--</option>
                                                                    <option>ayam</option>
                                                                    <option>sapi</option>
                                                                    <option>udang</option>
                                                                    <option>cumi</option>
                                                                    </select></li>
                      <li class="insert_product">Description*<textarea required="required" cols="25" rows="5" name="add_desc" placeholder="Description of the product"></textarea></li>
                      <li class="insert_product" style="margin-top:60px;">Recommend Status <select name="recommend_status">
                        											<option>normal</option>
                                                                    <option>recommended</option>
                                                                    </select></li>                      
                      <li class="insert_product" style="margin-right:10%;">Price* <input required="required" size="25" type="text" name="add_price" placeholder="Price in Rupiah (e.g 500000)"></li>                                                                     
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