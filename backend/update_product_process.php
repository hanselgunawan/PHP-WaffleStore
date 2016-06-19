<?php
	
	include('header2.php');
	
	if(isset($_FILES['edit_image'])){
	$file=$_FILES['edit_image'];
	
	//file properties
	$file_name=$file['name'];
	$file_tmp=$file['tmp_name'];
	$file_size=$file['size'];
	$file_error=$file['error'];
	
	//WORK OUT THE FILE EXTENTION
	$file_ext=explode('.',$file_name);//buat misahin nama gambar dari extension nya!
	$file_ext=strtolower(end($file_ext));//error handling supaya bisa upload ext tertentu aja!
	
	$allowed=array('txt','jpg','jpeg','png');
	
	if(in_array($file_ext,$allowed)){//error handling
		if($file_error==0){//kalau 0 berarti ga ada error!
			if($file_size<=2097152){//harus lebih kecil dari 2MB
					$file_name_new=uniqid('',true).'.'.$file_ext;
					$file_destination='../images/product/'.$file_name_new;
					
					if(move_uploaded_file($file_tmp,$file_destination)){
						 $gambar=$file_name_new;
					}
					
			}
			else
			{
				echo "FILE SIZE EXCEEDED!";
			}
			
		}
		else
		{
			echo "ERROR UPLOAD!";
		}
	}
	
								if(isset($_POST['edit_product_name']))
							{
								$id=$_GET['id'];
								$name=$_POST['edit_product_name'];
								$category=$_POST['edit_cat'];
								if($_POST['edit_content']=="")
								{
									$content="--";
								}
								else
								{
									$content=$_POST['edit_content'];
								}
								$composition=mysql_real_escape_string($_POST['edit_desc']);
								$price=$_POST['edit_price'];
								$recommendation=$_POST['recommend_status'];
	
								$query="UPDATE product SET gambar_product='$gambar', nama_product='$name', kategori_product='$category', content_product='$content', komposisi_product='$composition', harga_product='$price', recommend_status='$recommendation' WHERE productid='$id'";
	
								$result=mysql_query($query);
	
						if($result)
							{
								header('Location:success_edit.php');
							}
						else
							{
								echo "error upload".mysql_error();
							}
	
						}
}
else
{
						if(isset($_POST['edit_product_name']))
							{
								$id=$_GET['id'];
								$name=$_POST['edit_product_name'];
								$category=$_POST['edit_cat'];
								if($_POST['edit_content']=="")
								{
									$content="--";
								}
								else
								{
									$content=$_POST['edit_content'];
								}
								$composition=$_POST['edit_desc'];
								$price=$_POST['edit_price'];
								$recommendation=$_POST['recommend_status'];
	
								$query="UPDATE product SET nama_product='$name', kategori_product='$category', content_product='$content', komposisi_product='$composition', harga_product='$price', recommend_status='$recommendation' WHERE productid='$id'";
	
								$result=mysql_query($query);
	
						if($result)
							{
								header('Location:success_edit.php');
							}
						else
							{
								echo "error upload".mysql_error();
							}
	
						}
}
?>