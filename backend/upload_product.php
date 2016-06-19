<?php

include('connectdb.php');

if(isset($_FILES['file'])){
	$file=$_FILES['file'];
	
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
	
								if(isset($_POST['add_product_name']))
							{
								$name=$_POST['add_product_name'];
								$category=$_POST['add_cat'];
								$content=$_POST['add_content'];
								$recommend_status=$_POST['recommend_status'];
								$product_status="available";
								$composition=mysql_real_escape_string($_POST['add_desc']);//supaya bisa baca ''
								$price=$_POST['add_price'];
	
								$query="INSERT INTO product(`gambar_product`,`nama_product`,`kategori_product`,`content_product`,`komposisi_product`,`recommend_status`,`harga_product`,`product_status`) VALUES('$gambar','$name','$category','$content','$composition','$recommend_status','$price','$product_status')";
	
								$result=mysql_query($query);
	
						if($result)
							{
								header('Location:success_upload.php');
							}
						else
							{
								echo "error upload".mysql_error();
							}
	
			}
}




?>