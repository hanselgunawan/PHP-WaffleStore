<?php
	include('header2.php');
	if(!isset($_SESSION['current_name2']))
	{
		header('index.php');
	}
	else
	{
?>
       										 <!-- BATAS HEADER -->
         <div id="content_home_backend">
         		<h1>Welcome, <?php echo $_SESSION['current_name2']; ?>!</h1>
                <p>What do you want to <span style="font-weight:bold;">see</span> OR <span style="font-weight:bold;">manage</span> ?</p>
         </div>
       
     </div> 
     	</div>
     <div id="footer">
    <img src="../images/FOOTERwaffle&co.png" />
    </div>  
</html>
<?php
	}
	?>