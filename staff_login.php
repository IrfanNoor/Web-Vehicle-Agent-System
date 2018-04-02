<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");
?>


<script type="application/javascript">
	function validate()
{
	if(document.stafflogin.login_id.value == "" && document.stafflogin.password.value == "")
	{
		alert("Please enter both the fields");
		document.stafflogin.login_id.focus();
		return false;
	}
	else if(document.stafflogin.login_id.value == "")
	{
		alert("Please enter your email id..");
		document.stafflogin.login_id.focus();
		return false;
	}
	else if(document.stafflogin.password.value == "")
	{
		alert("Please enter the password");
		document.stafflogin.password.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.


if(isset($_SESSION[empid]))
{
		if($_SESSION[designation] =="Admin")
		{
			header("Location: dashboard.php");
		}
		else
		{
			header("Location: employeepanel.php");
		}
}

if(isset($_POST[submit]))
{
	$sql = "SELECT * FROM employee where login_id='$_POST[login_id]' AND password='$_POST[password]'";
	$qresult = mysqli_query($con,$sql);
	if(mysqli_num_rows($qresult) == 1)
	{
		$rsrec = mysqli_fetch_array($qresult);
		
		$_SESSION[empid] =  $rsrec[emp_id];
		$_SESSION[designation] = $rsrec[designation];
		
		if($rsrec[designation] =="Admin")
		{
			header("Location: dashboard.php");
		}
		else
		{
			header("Location: employeepanel.php");
		}
	}
	else
	{
		$msg =  "<font color='red'><strong><u>INCORRECT USERNAME OR PASSWORD</u></strong></font>";
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
        <h1>Employee Login Panel</h1>
        <p>
<form name="stafflogin" method="post" action="" onSubmit="return validate()">
<table width="329" height="140" border="1" class="tftable">
  <tr>
    <td colspan="2" align="center">&nbsp;<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $msg; ?></td>
    </tr>
  <tr>
    <td width="85"><strong>&nbsp; Username:</strong></td>
    <td width="160">&nbsp;<input type="text" name="login_id" /></td>
  </tr>
  <tr>
    <td><strong>&nbsp; Password:</strong></td>
    <td>&nbsp;<input type="password" name="password"></td>
  </tr>
  <tr>
    <td colspan="2" align="center"> <input type="submit" name="submit" value="Log In"></td>
    
  </tr>
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