<?php
	include('header2.php');
 ?>
        <div id="content_update_product">
        	<div id="update_product">
            	<h1>Update Product</h1>
                <?php
				function buatrp($angka){
				$jadi="Rp ".number_format($angka,0,',','.').',-';
				return $jadi;
				}
				$batas=12;
					$tampil3=mysql_query("SELECT * FROM product");
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
					$query="SELECT * FROM product LIMIT $halaman1,$batas";
					$result=mysql_query($query);
				 
				?>
                <table>
                  <tr>	
                	<th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Content</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Recommend Status</th>
                    <th>Action</th>
                  </tr>
                 <?php while($row=mysql_fetch_array($result)){ ?>
                  <tr>
                  	<td><?php echo $row['productid']; ?></td>
                    <td><img src="../images/product/<?php echo $row['gambar_product']; ?>" class="table_update_product"></td>
                    <td><?php echo $row['nama_product']; ?></td>
                    <td><?php echo $row['kategori_product']; ?></td>
                    <td><?php echo $row['content_product']; ?></td>
                    <td><?php echo $row['komposisi_product']; ?></td>
                    <td><?php echo buatrp($row['harga_product']); ?></td>
                    <td><?php echo $row['recommend_status']; ?></td>
                    <td><a href="form_update_product.php?id=<?php echo $row['productid']; ?>">update</a></td>
                  </tr>
                  <?php } ?>                                    
                </table>
                <?php
			$tampil2=mysql_query("SELECT * FROM product");
			$jml_data=mysql_num_rows($tampil2);
			$jml_halaman=ceil($jml_data/$batas);
		?>
        <div style="margin-left:60%; margin-top:20px;" id="pagination">
                
                <?php if($jml_halaman>1 && $halaman>1)
                {?>
                <a href="update_product.php?halaman=1" style="text-decoration:none;">&#8610;First</a>
                <a href="update_product.php?halaman=<?php echo $halaman-1; ?>" style="text-decoration:none; font-size:11pt">&#8676;previous</a>
                <?php } ?>
                <?php
				for($b=1;$b<=$jml_halaman;$b++)
						{
							if($jml_halaman>1)
							{
									?><a href="update_product.php?halaman=<?php echo $b; ?>" style="text-decoration:none;" class="paging">
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
         <a href="update_product.php?halaman=<?php echo $halaman+1; ?>" style="text-decoration:none; font-size:11pt;">next&#8677;</a>
         <a href="update_product.php?halaman=<?php echo $jml_halaman; ?>" style="text-decoration:none;">Last&#8611;</a>
         <?php }?></div>
            </div>
            
          </div>  
     </div>
     </div>
     
	<div id="footer">
    	<img src="../images/FOOTERwaffle&co.png" />
    </div> 
</html>        