<script>
function info()
{
	alert("Your item has been ADDED to your SHOPPING CART");
}
</script>

<?php

if(isset($_POST['search_query']))
{
	$search_que=$_POST['search_query'];
	
	function buatrp($angka){
		$jadi="Rp ".number_format($angka,0,',','.').',-';
		return $jadi;
	}
		$batas=9;
		$tampil3=mysql_query("SELECT * FROM product WHERE nama_product LIKE '%$search_que%'");
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
	$query="SELECT * FROM product WHERE nama_product LIKE '%$search_que%' LIMIT $halaman1,$batas";
	$result=mysql_query($query);
	$jml_data2=mysql_num_rows($result);
	
?>		
        <img src="images/kayu_search.jpg" class="kayu_menu">
        <h6>menu &#10148; search</h6>
        <div id="submenu">
        <?php
			if($jml_data2>0)
	{
	
			?>
        </div>
        
        
       <div id="menu_all">
     	<ul>
        <?php
		
			while($row=mysql_fetch_array($result))
			{
		?>
        	<li><a href="product_detail.php?id=<?php echo $row['productid']; ?>&cat=<?php echo $row['kategori_product']; ?>"><img src="images/product/<?php echo $row['gambar_product']; ?>" class="gambar_menu" alt="<?php echo $row['gambar_product']; ?>"></a><p class="rekom"><?php echo $row['nama_product']; ?></p>
            <p class="rekom"><?php echo buatrp($row['harga_product']);?></p>
            <a href="cart.php?action=add&amp;id=<?php echo $row['productid']; ?>&amp;ref=menu_all.php?halaman=<?php echo $halaman; ?>" onClick="info()"><img src="images/addtocart_logo.jpg" class="addtocart_button"></a></li>
            <?php } ?>
        </ul>
        <?php
			$tampil2=mysql_query("SELECT * FROM product WHERE nama_product LIKE '%$search_que%'");
			$jml_data=mysql_num_rows($tampil2);
			$jml_halaman=ceil($jml_data/$batas);
		?>
        <div style="margin-left:70%;" id="pagination">
                
                <?php if($jml_halaman>1 && $halaman>1)
                {?>
                <a href="menu_all.php?halaman=1" style="text-decoration:none;">&#8610;First</a>
                <a href="menu_all.php?halaman=<?php echo $halaman-1; ?>" style="text-decoration:none; font-size:11pt">&#8676;previous</a>
                <?php } ?>
                <?php
				for($b=1;$b<=$jml_halaman;$b++)
						{
							if($jml_halaman>1)
							{
									?><a href="menu_all.php?halaman=<?php echo $b; ?>" style="text-decoration:none;" class="paging">
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
         <a href="menu_all.php?halaman=<?php echo $halaman+1; ?>" style="text-decoration:none; font-size:11pt;">next&#8677;</a>
         <a href="menu_all.php?halaman=<?php echo $jml_halaman; ?>" style="text-decoration:none;">Last&#8611;</a>
         <?php }
		 
		?></div>
        <p id="back-top"><a href="#header" class="back_to_top">&#8613;back to top</a></p>	
     </div>
     
     </div> 
     	</div>
        <?php
	
	include('footer.php');
		}
		else
		{
			?>
            </div>
            <div id="search_not_found">
            	<h3><i>Item(s) not found</i></h3>
                <a href="menu_all.php" class="search_backto_menu">&#8610; Back to Menu</a>
                <a href="index.php" class="search_backto_home">&#8610; Back to Home</a>
            </div>
            </div>
            
            <div id="footer" style="position:relative;">
	
    		<img src="images/footer_gapakesocialmedia.png">
    			<a href="https://www.facebook.com/WaffleAndCoMoved?ref=profile"><img src="images/facebook_logo.png" style="position:absolute; color:red; width:35px; height:35px; margin-top:-40px; margin-left:90%;"></a>
    			<a href="http://instagram.com/waffleandco"><img src="images/instagram_logo.png" style="position:absolute; color:red; width:35px; height:35px; margin-top:-40px; margin-left:93%;">
    			<a href="https://twitter.com/wafflenco"><img src="images/twitter_logo.png" style="position:absolute; color:red; width:35px; height:35px; margin-top:-40px; margin-left:96.3%;">
    
    	</div>  
    
	</html>
            <?php
			
		}
	}
?>