<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
session_start();
 include("header.php");
 include("connection.php");
 
 ?>


<script type="application/javascript">
function validate()
{
	var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
	var b=emailfilter.test(document.change_password.email_id.value);
	
	if(document.change_password.email_id.value == "" && document.change_password.old_password.value == "" && document.change_password.new_password.value == "" && document.change_password.confirm_password.value == "")
	{
		alert("Please enter all the fields..");
		document.change_password.email_id.focus();
		return false;
	}
	else if(document.change_password.email_id.value == "")
	{
		alert("Please enter your email id");
		document.change_password.email_id.focus();
		return false;
	}
	else if(b == false)
	{
		alert("Invalid email id");
		document.change_password.email_id.value ="";
		document.change_password.email_id.focus();
		return false;
	}
	else if(document.change_password.old_password.value == "")
	{
		alert("Please enter your old pssword");
		document.change_password.old_password.focus();
		return false;
	}
	else if(document.change_password.new_password.value == "")
	{
		alert("Please enter your new pssword");
		document.change_password.new_password.focus();
		return false;
	}
	else if(document.change_password.new_password.value.length <10)
	{
		alert("Password must be minimum of 10 characters");
		document.change_password.new_password.value = "";
		document.change_password.new_password.focus();
		return false;
	}
	else if(document.change_password.new_password.value != document.change_password.confirm_password.value)
	{
		alert("Password  not matching..");
		document.change_password.new_password.value = "";
		document.change_password.confirm_password.value ="";
		document.change_password.new_password.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
 
if(isset($_POST[submit]))
{ 

 $sql = "UPDATE clients SET password='$_POST[new_password]' where email_id='$_POST[email_id]' AND password='$_POST[old_password]' AND client_id='$_SESSION[client_id]'";
 
$qresult =  mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		$updresult = "Password updated successfully...";
		
		$updi = 1;
	}
	else
	{
		$updresult = "Failed to change password";
	}
}
 ?>
    
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
 include("sidebar.php");
 ?>
        </div>
        <div id="content" class="float_r">
        <h1>Change password</h1>
        <p>
        <strong><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $updresult; ?></strong>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
		if($updi != 1)
		{
		?>
<form name="change_password" method="post" action="" onSubmit="return validate()">
	<table width="440" height="212" border="1" class="tftable">
	  <tr>
	    <td width="153">&nbsp; Email id:</td>
	    <td width="174"><input name=email_id type="text" size="35" /></td>
      </tr>
	  <tr>
	    <td>&nbsp; Old Password:</td>
	    <td><input name=old_password type="password" size="35" /></td>
      </tr>
	  <tr>
	    <td>&nbsp; New password:</td>
	    <td><input name=new_password type="password" size="35" /></td>
      </tr>
      <tr>
	    <td>&nbsp; Confirm password:</td>
	    <td><input type="password" name=confirm_password size="35" /></td>
      </tr>
	  <tr>
	    <td colspan="2" align="center"><input type="submit" value="Change password" name=submit /></td>
	   
      </tr>
</table>
</form>

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		}
		?>
</p>
        <div class="cleaner"></div>
    
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
 include("footer.php");
 ?>
</div> <!-- END of templatemo_wrapper -->


<script type='text/javascript' src='js/logging.js'></script>
</body>
</html>

	
    
    
    
