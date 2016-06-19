        <!---------------------------------------------------------------->
        <img src="images/kayu_shopcart.jpg" class="kayu_shopcart">
        <div id="container_cart">
        	<div id="cart_list">
        <!--<form method="post"><!-- BUAT UPDATE INPUT TYPE NYA -->
        <?php
  function buatrp($angka){
		$jadi="Rp ".number_format($angka,0,',','.').',-';//BUAT BIKIN ANGKA TERPISAH
		return $jadi;
	}?>     
    <script>
		function info(){
			alert("please add some item(s)!");
		}
	</script>
    <h6 class="breadcrumb_shopcart">menu &#10148;shopping cart</h6>
        	<table>
            	<tr bordercolor="#FF0000">
                	<th>Image</th>
                    <th>Item</th>
                    <th>Item Type</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Subtotal</th>
                    <th>Action</th>
              	</tr>
                <?php
				$total=0;
				$i=0;
				$_SESSION['current_product']=array();
				$_SESSION['current_value']=array();
					if(isset($_SESSION['items']))
					{
						foreach($_SESSION['items'] as $key => $val){
							$query=mysql_query("SELECT * FROM product WHERE productid='$key'");
							$result=mysql_fetch_array($query);
							$jml_harga=$result['harga_product'] * $val;
							$total=$total+$jml_harga;
							$_SESSION['current_price']=$total;
							
							$_SESSION['current_product'][$i]=$result['nama_product'];
							$_SESSION['current_value'][$i]=number_format($val);
							/*if($result['nama_product']=="")
							{
								echo "";
							}
							else
							{
							$product[$i]=array($result['nama_product']);
							$_SESSION['current_product'][$i]=implode(" ",$product[$i]);
							$i++;
							}*/
							
							/*$_SESSION['current_product']=array();
							$_SESSION['current_value']=array();
							array_push($_SESSION['current_value'],number_format($val));
							array_push($_SESSION['current_product'],$result['nama_product']);
							$product=implode(",",$_SESSION['current_product']);
							$value=implode($_SESSION['current_value']);*/
							
							//$_SESSION['haha']="- $product ($value)<br/> ";
							
								?>
										
                <tr>
                	<td><img src="images/product/<?php echo $result['gambar_product']; ?>" class="image_shopcart"></td>
                	<td><?php echo $result['nama_product']; ?></td>
                    <td><?php echo $result['kategori_product']; ?></td>
                    <td><?php echo number_format($val); ?></td>
                    <td style="width:400px"><?php echo buatrp($result['harga_product']); ?></td>
                    <td><?php echo buatrp($jml_harga); ?></td>
                    <td style="width:700px;"><a href="cart.php?action=plus&amp;id=<?php echo $key; ?>&amp;ref=menu_all.php?page=shopping_cart"><img src="images/up_button.png" class="tombol_up"></a><a href="cart.php?action=minus&amp;id=<?php echo $key; ?>&amp;ref=menu_all.php?page=shopping_cart"><img src="images/up_button.png" class="tombol_down"></a><a href="cart.php?action=delete&amp;id=<?php echo $key; ?>&amp;ref=menu_all.php?page=shopping_cart"><img src="images/close_button.png" class="tombol_delete"></a></td>
                </tr>
                <?php
						$i++;
					mysql_free_result($query);
						}
						
						
						/*for($x=0;$x<$i;$x++)
						{
							echo $_SESSION['current_product'][$x];
							echo $_SESSION['current_value'][$x];
							echo "<br/>";
						}*/
					}
				?>
            </table>
             <p>TOTAL PRICE : <span><?php echo buatrp($total); ?></span></p>
             <?php
             if(number_format($total)==0)//KALAU GA ADA ITEMS DI SHOPPING CART!
									{ 
        								?><h1>Your shopping cart is <span style="color:red;">EMPTY</span>, please add some item</h1>
										<a href="menu_all.php"><p class="tombol_pada_shopcart" style="margin-top:95px; margin-left:200px;">Back To Menu</p></a>
       		<a href="menu_all.php?page=shopping_cart" onclick="info()"><p class="tombol_pada_shopcart2" style="margin-top:40px;">Checkout</p></a> <?php
									}
									else//KALAU ADA ITEMS!
									{
									
								$_SESSION['current_price']=$total;?>
         </div>
         <div id="tombol_shopcart">
         <?php
		
							$arr_awal=serialize($_SESSION['current_product']);
							$arr_value=serialize($_SESSION['current_value']);
							$url=urlencode($arr_awal);
							$url2=urlencode($arr_value);
						?>
            <a href="cancel_order.php"><p class="tombol_cancel_shopcart">Cancel Order</p></a>
       		<a href="menu_all.php"><p class="tombol_pada_shopcart">Back To Menu</p></a>
       		<a href="checkout_validation.php?data=<?php echo $url; ?>&data2=<?php echo $url2; ?>"><p class="tombol_pada_shopcart2">Checkout</p></a> 
            
       	 </div>
         <?php } ?>
	  </div>
    </div>
    
</div>
    
    <?php

	include('footer.php');
	
?>