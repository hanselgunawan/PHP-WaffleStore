<?php
	
	if(isset($_GET['data']))
	{
		$halo2=unserialize($_GET['data']);
		
		for($x=0;$x<count($halo2);$x++)
		{
			echo $halo2[$x];
			echo "<br/>";
		}
		
	}

?>