<?php

$myServ="localhost";//"mysql2.000webhost.com";
$myUser="root";//"a3856901_waffle";
$myPass="";//"1234abc";
$myDB="waffleco";//"a3856901_waffle";

$sql=mysql_connect($myServ,$myUser,$myPass);

	if(!$sql)
	{
		echo "cannot connect mysql".mysql_error() or die;
	}

$database=mysql_select_db($myDB);
	
	if(!$database)
	{
		echo "cannot connect to database".mysql_error();
	}

?>