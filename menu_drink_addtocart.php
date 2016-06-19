<script>
function info()
{
	alert("Your item has been ADDED to your SHOPPING CART");
}
</script>
<?php
	include('connectdb.php');
	
	function buatrp($angka){
		$jadi="Rp ".number_format($angka,0,',','.').',-';
		return $jadi;
	}
		$batas=9;
		$tampil3=mysql_query("SELECT * FROM product WHERE kategori_product='drink' AND product_status='available'");
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
	$query="SELECT * FROM product WHERE kategori_product='drink' AND product_status='available' LIMIT $halaman1,$batas";
	$result=mysql_query($query);
?>


       										 <!-- BATAS HEADER -->
		
        <img src="images/kayu_menu.jpg" class="kayu_menu">
        <h6>menu &#10148; drink</h6>
        <div id="submenu">
        	<ul>
        		<li><a href="menu_all.php">All</a></li>
        		<li><a href="menu_asianfood.php" >Asian Food</a></li>
            	<li><a href="menu_westernfood.php" >Western Food</a></li>
            	<li><a href="menu_dessert.php" >Dessert</a></li>
            	<li ><a href="menu_drink.php" style="color:purple">Drink</a></li>
       		</ul>
            
        </div>
        
        
       <div id="menu_all">
       
     	<ul>
        <?php
			while($row=mysql_fetch_array($result))
			{
		?>
        	<li><a href="product_detail.php?id=<?php echo $row['productid']; ?>&cat=<?php echo $row['kategori_product']; ?>"><img src="images/product/<?php echo $row['gambar_product']; ?>" class="gambar_menu" alt="<?php echo $row['gambar_product']; ?>"></a>
            <?php
			if($row['recommend_status']=='recommended'){
			 ?>	
            <img src="images/recommend_logo.gif" class="logo_recommend_menu">
            <?php } ?>
            <p class="rekom"><?php echo $row['nama_product']; ?></p>
            <p class="rekom"><?php echo buatrp($row['harga_product']);?></p>
            <a href="cart.php?action=add&amp;id=<?php echo $row['productid']; ?>&amp;ref=menu_drink.php?halaman=<?php echo $halaman; ?>" onClick="info()"><img src="images/addtocart_logo.jpg" class="addtocart_button"></a></li>
            <?php } ?>
        </ul>
        <?php
			$tampil2=mysql_query("SELECT * FROM product WHERE kategori_product='dessert' AND product_status='available'");
			$jml_data=mysql_num_rows($tampil2);
			$jml_halaman=ceil($jml_data/$batas);
		?>
        <div style="margin-left:60%;" id="pagination">
                
                <?php if($jml_halaman>1 && $halaman>1)
                {?>
                <a href="menu_drink.php?halaman=1" style="text-decoration:none;">&#8610;First</a>
                <a href="menu_drink.php?halaman=<?php echo $halaman-1; ?>" style="text-decoration:none; font-size:11pt">&#8676;previous</a>
                <?php } ?>
                <?php
				for($b=1;$b<=$jml_halaman;$b++)
						{
							if($jml_halaman>1)
							{
									?><a href="menu_drink.php?halaman=<?php echo $b; ?>" style="text-decoration:none;" class="paging">
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
         <a href="menu_drink.php?halaman=<?php echo $halaman+1; ?>" style="text-decoration:none; font-size:11pt;">next&#8677;</a>
         <a href="menu_drink.php?halaman=<?php echo $jml_halaman; ?>" style="text-decoration:none;">Last&#8611;</a>
         <?php }?></div>
        <p id="back-top"><a href="#header" class="back_to_top">&#8613;back to top</a></p>	
     </div>
     
     </div> 
     	</div>
     <?php

	include('footer.php');
	
?>