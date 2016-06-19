<?php

	include('header.php');
?>
<li><a href="index.php">Home</a></li>
    		<li><a href="menu_all.php">Menu</a></li>
    		<li><a href="reservation.php">Reservation</a></li>
    		<li class="li_about"><a href="about_us.php" style="color:purple;">About Us</a>
            <ul class="ul_mouseover">
            	<li class="li_mouseover"><a href="about_us.php#video_aboutus">Video</a></li>
                <li class="li_mouseover"><a href="about_us.php#floorplan_aboutus">Sections</a></li>
            </ul></li>
    		<li class="li_contactus2"><a href="contact_us.php">Contact Us</a>
            	<ul class="ul_mouseover_contactus2">
                	<li class="li_mouseover_contactus2"><a href="contact_us.php#comment">Comments</a></li>
                </ul></li>
 		</ul>
        <img src="images/garismenu.jpg" height="8px" class="garismenu">
        </div> 
        <?php
	include('connectdb.php');
	$query="SELECT * FROM venue WHERE venue_status='available'";
	$result=mysql_query($query);

?>

<script>
$(document).ready(function(){

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
</script>
        <img src="images/kayu_aboutus.jpg" class="kayu_menu_about">
        
        	<div id="about_us">
            	<img src="images/ABOUTUSwaffle&co.jpg">
                
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Waffle&Co is a family restaurant that was built in 2012. This restaurant has got a lot of rewards, such as sphagetti with the most delicious sauce in Indonesia. Many customers do not want to leave this restaurant quickly because the atmosphere in this restaurant are safe and cool, making customers feel like they in a luxury home.</p>
				<img src="images/line.png" class="garis_about">
                <a name="video_aboutus"><img src="images/kayu_video.jpg" class="kayu_video"></a>
             	<video width="560" height="315" controls="controls">
                	<source src="video/waffleandco.mp4" type="video/mp4">
                </video>
                
                <p class="judul_video">~ The Overview Of Waffle & Co. ~</p>
                <img src="images/line.png" class="garis_about">
                <a name="floorplan_aboutus"><img src="images/kayu_section.jpg" class="kayu_video">
                
                <div id="venues">
                	<ul>
                    <?php while($row=mysql_fetch_array($result))
					{ ?>
                    	<li class="about"><div class="gambar"><a href="images/venue/<?php echo $row['gambar_venue']; ?>" target="_blank"><img src="images/venue/<?php echo $row['gambar_venue']; ?>"></a><div class="info"><h4 class="headline"><?php echo $row['desc_venue']; ?></h4></div></div><h1><?php echo $row['nama_venue']; ?></h1></li><?php } ?>
                    </ul>    
                
                </div>
                	      <p id="back-top"><a href="#header" class="back_to_top">&#8613;back to top</a></p>	         
            </div>
        
    </div>
    
</div>
	
<?php

	include('footer.php');
	
?>