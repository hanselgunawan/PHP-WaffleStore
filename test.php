<?php
	
	include('connectdb.php');
	
	$result=mysql_query("SELECT * FROM product");
	$_SESSION['aku']=array();
	$i=0;
	while($row=mysql_fetch_array($result))
	{	
		$_SESSION['aku'][$i]=$row['nama_product'];
		$i++;
	}
	
	/*for($x=0;$x<$i;$x++)
	{
		echo $_SESSION['aku'][$x];
		echo "<br/>";
	}*/
	
	$halo=serialize($_SESSION['aku']);
	$url=urlencode($halo);
	//print $url;
	
	?>
    
    <a href="test2.php?data=<?php echo $url; ?>">CLICK HERE!</a>
    
    <?php
	
	//$halo3=unserialize($halo);
	
	//echo count($halo3);
	
	/*$halo3=unserialize($halo);
	
	for($x=0;$x<count($halo3);$x++)
	{
		echo $halo3[$x];
		echo "<br/>";
	}*/
	
?>