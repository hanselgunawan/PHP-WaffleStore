<?php
	
	include('header2.php');
	
	if(isset($_FILES['edit__venue_image'])){
	$file=$_FILES['edit_venue_image'];
	
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
					$file_destination='../images/venue/'.$file_name_new;
					
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
	
								if(isset($_POST['edit_venue_name']))
							{
								$id=$_GET['id'];
								$name=$_POST['edit_venue_name'];
								$description=mysql_real_escape_string($_POST['edit_venue_desc']);
	
						$query="UPDATE venue SET gambar_venue='$gambar', nama_venue='$name', desc_venue='$description' WHERE venueid='$id'";
	
								$result=mysql_query($query);
	
						if($result)
							{
								header('Location:success_edit_venue.php');
							}
						else
							{
								echo "error upload".mysql_error();
							}
	
						}
}
else
{
						if(isset($_POST['edit_venue_name']))
							{
								$id=$_GET['id'];
								$name=$_POST['edit_venue_name'];
								$description=$_POST['edit_venue_desc'];
	
						$query="UPDATE venue SET nama_venue='$name', desc_venue='$description' WHERE venueid='$id'";
	
								$result=mysql_query($query);
	
						if($result)
							{
								header('Location:success_edit_venue.php');
							}
						else
							{
								echo "error upload".mysql_error();
							}
	
						}
}
?>