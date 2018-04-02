<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
include("header.php");
?>
<script type="application/javascript">
	function validate()
	{
			var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i
	var b=emailfilter.test(document.contact.email.value);
	if(document.contact.author.value == "")
		{
			alert("Please enter your name..");
			document.contact.author.focus();
			return false;
		}
		else if(document.contact.email.value == "")
		{
			alert("Please enter your email id..");
			document.contact.email.focus();
			return false;
		}
		else if(document.contact.author.value == "")
		{
			alert("Please enter your name..");
			document.contact.author.focus();
			return false;
		}
		else if(b == false)
		{
			alert("Please enter valid email id..");
			document.contact.email.value = "";
			document.contact.email_id.focus();
			return false;	
		}
		else if(document.contact.text.value == "")
		{
			alert("Please enter your message	..");
			document.contact.text.focus();
			return false;
		}
		else
		{
			return true;
		}
	}
</script>
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
        	<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
 include("sidebar.php");
 ?>
        </div>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
        if(isset($_POST[submit]))
			{
				
					
					$msg = "<font color='black'><strong>Your Message details has been sent to the admin</strong></font>";
					$message = "Name : ".$_POST[author];
					$message = $message . " \n Message : ".$_POST[text];					
					$subject = $_POST[subject];
					$from = $_POST[email];
					mail("freestudentprojects.com@gmail.com",$subject,$message,"From: $from\n");
				
			}
		?>
        <div id="content" class="float_r">
        	
            <h1>Contact Information</h1>
            <div class="content_half float_l">
				<h4>Send us a message now!</h4>
                <p>&nbsp;</p>
                <div id="contact_form">
                <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
				if(isset($_POST[submit]))
				{
					echo $msg;
				}
				else
				{
				?>
                   <form method="post" name="contact" action="" onSubmit="return validate()">
                        
                        <label for="author">Name:</label> <input type="text" id="author" name="author" class="required input_field" />
                        <div class="cleaner h10"></div>
                        <label for="email">Email:</label> <input type="text" id="email" name="email" class="validate-email required input_field" />
                        <div class="cleaner h10"></div>
                        
						<label for="subject">Subject:</label> <input type="text" name="subject" id="subject" class="input_field" />

						<div class="cleaner h10"></div>
        
                        <label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                        <div class="cleaner h10"></div>
                        
                        <input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" />
						<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />
                        
            		</form>
                <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
				}
				?>
                </div>
            </div>
        <div class="content_half float_r">
        	<h4>&nbsp;</h4>
        	<h6>&nbsp;</h6>
        	<p><strong><font size="+1" color="#000000">RM Auto Consultants</font><br />
        	<font color="#000000">3 cross, main road ,<br />
        	  Near AKL home bus stop ,
Bangalore-575003</font> </strong></p><br /><br />
            
				<strong><font color="#000000">Phone:</font></strong>
          <p>&nbsp; &nbsp; &nbsp; &nbsp;<strong> 080-4343454(office)<br />
                        &nbsp; &nbsp; &nbsp; &nbsp; 080-454234(office)<br />
                       &nbsp; &nbsp; &nbsp; &nbsp; 080-2423234(P)<br />
                       &nbsp; &nbsp; &nbsp; &nbsp; 9343345407</strong><br />
                       </p>
       	  <strong><font color="#000000">Email:</font></strong> <br />
          <a href="mailto:info@yoursite.com">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;nirmalautobazar@yahoo.co.in</a><br />
                
            <div class="cleaner h20"></div>
            <h6><br />
        </h6>
        </div>
        
        <div class="cleaner h40"></div>
        
         <iframe width="680" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Gokarnatheswara+temple+main+road+mangalore&amp;aq=&amp;sll=12.885441,74.8423&amp;sspn=0.101909,0.169086&amp;ie=UTF8&amp;hq=Gokarnatheshwara+temple+main+road&amp;hnear=Mangalore,+Dakshina+Kannada,+Karnataka&amp;ll=12.892886,74.843996&amp;spn=0.051014,0.030126&amp;t=m&amp;output=embed"></iframe><br /><small>View <a href="https://www.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Gokarnatheswara+temple+main+road+mangalore&amp;aq=&amp;sll=12.885441,74.8423&amp;sspn=0.101909,0.169086&amp;ie=UTF8&amp;hq=Gokarnatheshwara+temple+main+road&amp;hnear=Mangalore,+Dakshina+Kannada,+Karnataka&amp;ll=12.892886,74.843996&amp;spn=0.051014,0.030126&amp;t=m" style="color:#0000FF;text-align:left">Untitled</a> in a larger map</small>
            
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
 include("footer.php");
 ?>