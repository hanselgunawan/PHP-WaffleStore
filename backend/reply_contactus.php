<?php
	include('header2.php');
	
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$query="SELECT * FROM contactus WHERE contactusid='$id'";
		$result=mysql_query($query);
		$row=mysql_fetch_array($result);
	}
	
 ?>
 
 <script type="text/javascript">
 	function info(){
	alert("Your message has been sent to <?php echo $row['contactname']; ?>");
	}
 </script>
        
        <div id="content_reply">
        	<h1>Reply Contact Us</h1>
            	<div id="cust_message">
                <form method="post" action="success_reply.php?id=<?php echo $id; ?>">
                	<p>From: <span id="nama_kontak"><?php echo $row['contactname']; ?></span></p>
                    <p>Title: <span><?php echo $row['contacttitle']; ?></span></p>
                    <p>Message: <span><?php echo $row['contactcomment']; ?></span></p>
                    <p style="margin-top:10px;">Comment Status?</p>
                    	<select name="status_comment">
                        	<option>neutral</option>
                            <option>good</option>
                            <option>bad</option>
                        </select>
                </div>
                <p class="reply_message">Your reply message:</p>
                	<textarea cols="50" rows="8" placeholder="Your reply message..." name="reply_message" required="required"></textarea><br/>
                    <input type="reset" value="Reset" style="margin-left:30%;margin-top:20px; width:50px;">
                    <input type="submit" value="Reply" onclick="info()" style="margin-left:25%;margin-top:20px; width:50px;">
                 </form>
        </div>
        
    </div>
    </div>
    
    <div id="footer">
    	<img src="../images/FOOTERwaffle&co.png" />
    </div> 
    
</html>