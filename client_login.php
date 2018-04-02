<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");
?>


<script type="application/javascript">
	function validate()
{
	var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i
	var b=emailfilter.test(document.login.email_id.value);
	
	if(document.login.email_id.value == "" && document.login.password.value == "")
	{
		alert("Please enter both the fields");
		document.login.email_id.focus();
		return false;
	}
	else if(document.login.email_id.value == "")
	{
		alert("Please enter your email id..");
		document.login.email_id.focus();
		return false;
	}
	else if(b == false)
	{
		alert("Invalid Email id");
		document.login.email_id.value = "";
		document.login.email_id.focus();
		return false;
	}
	else if(document.login.password.value == "")
	{
		alert("Please enter your password");
		document.login.password.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.


if(isset($_SESSION[client_id]))
{		
	header("Location: account.php");		
}

if(isset($_POST[submit]))
{
	$sql = "SELECT * FROM clients where email_id='$_POST[email_id]' AND password='$_POST[password]'";
	$qresult = mysqli_query($con,$sql);
	if(mysqli_num_rows($qresult) == 1)
	
	{
		$rsrec = mysqli_fetch_array($qresult);
		
		$_SESSION[client_id] =  $rsrec[client_id];
		
		if(isset($_GET[logpage]))
		{
			header("Location: $_GET[logpage]");
		}
		 
		else
		{
				header("Location: account.php");	
		}
	}
	else
	{
		$msg =  "<font color='red'><strong>Invalid Email id or Password</strong></font>";
	}
}
?>

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
 include("header.php");
 ?>
    
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
 include("sidebar.php");
 ?>
        </div>
        <div id="content" class="float_r">
        <h1>User Login..</h1>
        <p>
<form name="login" method="post" action="" onSubmit="return validate()">
<table width="396" height="189" border="1" class="tftable">
  <tr>
    <td colspan="2" align="center">&nbsp;<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $msg; ?></td>
    </tr>
  <tr>
    <td width="85">&nbsp; Email ID:      </td>
    <td width="160">&nbsp;<input type="email" name="email_id" type="text"  placeholder="Email ID" size="30" /></td>
  </tr>
  <tr>
    <td>&nbsp; Password:</td>
    <td>&nbsp;<input name="password" type="password" placeholder="Password" size="30"  /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"> <input type="submit" name="submit" value="       LOGIN       "></td>
    
  </tr>
  <tr>
    <td colspan="2" align="center"><strong><a href="forgotpassword.php">Forgot Password?</a></strong></td>
  </tr>
</table>
</form>

</p>
<hr />
        <h1>New User..</h1>
        
        
        
        <div class="cleaner"><a href="clients.php"><img src="images/register.gif" width="400" height="179" /></a></div>
    
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
