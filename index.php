<?php

	include('header.php');

?>

<script>
function info()
{
	alert("Your item has been ADDED to your SHOPPING CART");
}
</script>
<li><a href="index.php" style="color:purple;">Home</a></li>
    		<li><a href="menu_all.php">Menu</a></li>
    		<li><a href="reservation.php">Reservation</a></li>
    		<li class="li_about"><a href="about_us.php">About Us</a>
            <ul class="ul_mouseover">
            	<li class="li_mouseover"><a href="about_us.php#video_aboutus">Video</a></li>
                <li class="li_mouseover"><a href="about_us.php#floorplan_aboutus">Sections</a></li>
            </ul></li>
    		<li class="li_contactus2"><a href="contact_us.php">Contact Us</a>
            	<ul class="ul_mouseover_contactus2">
                	<li class="li_mouseover_contactus2"><a href="contact_us.php#comment">Comments</a></li>
                </ul></li>
 		</ul>
        <img src="images/garismenu.jpg" height="8px" class="garismenu">
        </div>

<?php
	
	include('connectdb.php');
	
	function buatrp($angka){
		$jadi="Rp ".number_format($angka,0,',','.').',-';
		return $jadi;
	}
	
?>

<?php
	 
	 	$query="SELECT * FROM product LIMIT 0,6";
		$result=mysql_query($query);
	 
	 ?>
        
     <div id="sliderFrame">
        <div id="slider">
                <a href="product_detail.php?id=5"><img src="images/product/waffle9_slider.jpg" alt="Welcome to Waffle & Co." /></a>
            <a href="product_detail.php?id=1"><img src="images/product/waffle_coklat2.jpg" alt="" /></a>
            <a href="product_detail.php?id=8"><img src="images/product/nasi_ayam_slider.jpg" alt="" /></a>
            <a href="product_detail.php?id=17"><img src="images/product/coconut_juice_slider.jpg" alt="" /></a>
            <a href="product_detail.php?id=19"><img src="images/product/pizza_mushroom_slider.jpg" /></a>
        </div>
        
     </div>
     
     <img src="images/kayu_recommendation.jpg" class="kayu">
     
     
     
     <div id="recommendation">
     	<ul>
        	<?php
			while($row=mysql_fetch_array($result))
			{
			?>
        	<li><a href="product_detail.php?id=<?php echo $row['productid'];?>"><img src="images/product/<?php echo $row['gambar_product']; ?>" class="gambar_rekom" alt="nasi goreng"></a>
            <?php
			if($row['recommend_status']=='recommended'){
			 ?>	
            <img src="images/recommend_logo.gif" class="gambar_logo_recommend">
            <?php } ?>
            <p class="rekom"><?php echo $row['nama_product']; ?></p>
            <p class="rekom"><?php echo buatrp($row['harga_product']); ?></p>
            <a href="cart.php?action=add&amp;id=<?php echo $row['productid']; ?>&amp;" onclick="info()"><img src="images/addtocart_logo.jpg" class="addtocart_button"></a></li>
            <?php
			}
			?>
            
        </ul>
     </div>
	</div>
    </div>
    
<?php

	include('footer.php');
	
?>
