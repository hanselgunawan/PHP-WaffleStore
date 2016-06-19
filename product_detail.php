<script>
function info()
{
	alert("Your item has been ADDED to your SHOPPING CART");
}
</script>
<?php

	include('header.php');

?>
<li><a href="index.php">Home</a></li>
    		<li><a href="menu_all.php" style="color:purple;">Menu</a></li>
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
?>
        <img src="images/kayu_menu.jpg" class="kayu_menu">

<?php

	if(isset($_GET['id']))
	{
		$id_product=$_GET['id'];
	}

$query="SELECT * FROM product WHERE productid='$id_product'";
$result=mysql_query($query);

$row=mysql_fetch_array($result);

	function buatrp($angka){
		$jadi="Rp ".number_format($angka,0,',','.').',-';//BUAT BIKIN ANGKA TERPISAH
		return $jadi;
	}

?>
        <h6>menu &#10148; <a href="menu_<?php echo $row['kategori_product']; ?>.php" class="breadcrumb"><?php echo $row['kategori_product'] ?></a> &#10148; <?php echo $row['nama_product'] ?></h6>
        <div id="product_detail">
         <!-- SEPERTI DI WEB WWW.PHD.CO.ID -->
           <a href="#img"><img src="images/product/<?php echo $row['gambar_product']; ?>" class="gambar_samping"></a>
           <a href="#" class="lightbox" id="img"><img src="images/product/<?php echo $row['gambar_product']; ?>" class="gambar_popup"><img src="images/close_button.png" style="border:none; cursor:pointer; width:50px; height:50px; float:right;position:relative;"></a>
           <div id="nama_product"><h1><?php echo $row['nama_product']; ?></h1></div> <!-- dikasih div biar semua tulisan jadi center -->
        	  <div id="product_desc">
              <?php 
			  if($row['kategori_product']=='dessert' || $row['kategori_product']=='drink')
			  {
				  echo "<br/><br/>";
			  }
			  else
			  {
			  ?>
            	<h3>Content</h3>
                <img src="images/productdetail/<?php
													if($row['content_product']=='--')
													{
														echo "blank";
													}
													else
													{
														echo $row['content_product'];
													}?>.jpg" class="komposisi">
              <?php
			  }
			  ?>
                <p>Composition&nbsp;&nbsp;&nbsp;<span class="deskripsi"><?php echo $row['komposisi_product']; ?></span></p>
                <h3>Price<span style="font-size:11pt;">(tax included)</span><span class="deskripsi_harga"><?php echo buatrp($row['harga_product']); ?></span></h3>
                <a href="cart.php?action=add&amp;id=<?php echo $id_product; ?>&amp;ref=product_detail.php?id=<?php echo $id_product; ?>" onClick="info()"><img src="images/addtocart_logo.jpg" class="addtocart_button"></a>
        	  </div>
              <h3 class="back_to"><a href="menu_<?php echo $row['kategori_product']; ?>.php">&#8678; back to menu</a></h3>        
        </div>
        		
        </div>
</div>

    <?php

	include('footer.php');
	
?>