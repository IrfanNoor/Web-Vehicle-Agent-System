<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");
?>


<script type="application/javascript">
	function validate()
	{
			var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i
	var b=emailfilter.test(document.login.email_id.value);
		if(document.login.email_id.value == "")
		{
			alert("Please enter your email id..");
			document.login.email_id.focus();
			return false;
		}
		else if(b == false)
		{
			alert("Please enter valid email id..");
			document.login.email_id.focus();
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
	$sql = "SELECT * FROM clients where email_id='$_POST[email_id]'";
	$qresult = mysqli_query($con,$sql);
	if(mysqli_num_rows($qresult) == 1)
	{
		$rsrec = mysqli_fetch_array($qresult);
		$msg = "<font color='black'><strong>Your login details has been sent to $_POST[email_id] Email ID</strong></font>";
		$msgi =1;
		$message = " Email ID :" . $_POST[email_id];
		$message = $message. "\n Password :" . $rsrec[password];
		 $from = "aravinda@technopulse.in";
		mail($_POST[email_id],"Web Vehicle dealer account details",$message,"From: $from\n");
	}
	else
	{
		$msg =  "<font color='red'><strong>Email ID not exist in database</strong></font>";
		$msgi =1;
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
          <form name="login" method="post" action="" onSubmit="return validate()">
  <table width="100%" height="170" border="1" class="tftable">
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if($msgi == 1)
{
?>
  <tr>
    <td height="68" align="center">&nbsp;<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $msg; ?></td>
    </tr>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
}
else
{
?>	
 <tr>
 <td width="160" height="50" align="center">&nbsp;<input name="email_id" type="text"  placeholder="Enter your  Email ID" size="40" /></td>
  </tr>
  <tr>
    <td height="42" align="center"> <input type="submit" name="submit" value="   Submit   "></td>
    
  </tr>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
}
?>
  </table>
</form>

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
