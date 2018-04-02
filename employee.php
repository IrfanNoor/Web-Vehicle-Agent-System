<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();

include("connection.php");
?>


<script type="application/javascript">
	function validate()
{
	var alphaExp = /^[a-zA-Z]+$/;
	
	if(document.employee.employee_name.value == "" && document.employee.employee_name.value == "" && document.employee.login_id.value == "" && document.employee.password.value == "" && document.employee.confirm_password.value == "" && document.employee.address.value == "" && document.employee.contact_no.value == "" &&  document.employee.designation.value == "" && document.employee.salary.value == "")
	{
		alert("Please enter all the fields");
		document.employee.employee_name.focus();
		return false;
	}
	else if(document.employee.employee_name.value == "")
	{
		alert("Please enter employee name");
		document.employee.employee_name.focus();
		return false;
	}
	else if(!employee.employee_name.value.match(alphaExp))
	{
		alert("Invalid name");
		document.employee.employee_name.value = ""
		document.employee.employee_name.focus();
		return false;
	}
	else if(document.employee.login_id.value == "")
	{
		alert("Please login id..");
		document.employee.login_id.focus();
		return false;
	}
	else if(document.employee.password.value == "")
	{
		alert("Please enter the password");
		document.employee.password.focus();
		return false;
	}
	else if(document.employee.password.value.length <10)
	{
		alert("Password should be minimum of 10 characters");
		document.employee.password.value = "";
		document.employee.password.focus();
		return false;
	}
	else if(document.employee.password.value != document.employee.confirm_password.value)
	{
		alert("Password  not matching..");
		document.employee.password.value = "";
		document.employee.confirm_password.value = "";
		document.employee.password.focus();
		return false;
	}
	else if(document.employee.address.value == "")
	{
		alert("Please enter the address");
		document.employee.address.focus();
		return false;
	}
	else if(document.employee.contact_no.value == "")
	{
		alert("Please enter the contact no");
		document.employee.contact_no.focus();
		return false;
	}
	else if(document.employee.contact_no.value.length < 10)
	{
		alert("Invalid contact number");
		document.employee.contact_no.value = "";
		document.employee.contact_no.focus();
		return false;
	}
	else if(isNaN(document.employee.contact_no.value))
	{
		alert("Invalid contact number");
		document.employee.contact_no.value = "";
		document.employee.contact_no.focus();
		return false;
	}
	else if(document.employee.designation.value == "")
	{
		alert("Please enter the desgnation");
		document.employee.designation.focus();
		return false;
	}
	else if(document.employee.salary.value == "")
	{
		alert("Please enter the salary");
		document.employee.salary.focus();
		return false;
	}
	else if(isNaN(document.employee.salary.value))
	{
		alert("Invalid salary entered");
		document.employee.salary.value = "";
		document.employee.salary.focus();
		return false;
	}
	else if(document.employee.status.value == "Select")
	{
		alert("Please select the status");
		document.employee.status.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.

if($_SESSION[session] ==$_POST[session] )
{
	if(isset($_POST[Submit]))
	{

		if(isset($_GET[editid]))
		{
			//Update query to update employee record
			$sql = mysqli_query($con,"UPDATE employee SET employee_name='$_POST[employee_name]',login_id='$_POST[login_id]',password='$_POST[password]',address='$_POST[address]',contact_no='$_POST[contact_no]',designation='$_POST[designation]', salary='$_POST[salary]',status='$_POST[status]' where emp_id='$_GET[editid]'");
			if(!$sql)
			{
				$msg=  "<br><font color='red'>Problem in SQL Query  </font>".mysqli_error($con);
			}
			else
			{
				$msg= "<br><font color='green'>Values Updated</font>";
			}
		}
		else
		{
		$sql=mysqli_query($con,"insert into employee (employee_name,login_id,password,address,contact_no,designation,salary,status)
		values('$_POST[employee_name]','$_POST[login_id]','$_POST[password]','$_POST[address]','$_POST[contact_no]','$_POST[designation]','$_POST[salary]','$_POST[status]')");
			if(!$sql)
			{
				$msg=  "<br><font color='red'>Problem in INSERT SQL Query</font>";
			}
			else
			{
				$msg= "<br><font color='green'>Values inserted</font>";
			}
		}
	}
}
$_SESSION["session"] = rand();

//Edit code: Retrieve records from database
if(isset($_GET[editid]))
{
$sqledit = mysqli_query($con,"SELECT * FROM employee WHERE emp_id = '$_GET[editid]'");
$recs = mysqli_fetch_array($sqledit);
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
        <h1>Add New Employee</h1>
		
<form name="employee" method="post" action="" onSubmit="return validate()">
<input type="hidden" name="session" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_SESSION["session"]; ?>" />
<table border=2 height="400" width="400" class="tftable" >
	<tr>
	  <td colspan="2" align="center">&nbsp;<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $msg; ?></td>
    </tr>
	<tr><td>Employee name:</td><td><input type="text" name=employee_name id="employee_name" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[employee_name]; ?>" /></td></tr>
    <tr><td>Login id:</td><td><input type="text" name=login_id id="login_id" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[login_id]; ?>" /></td></tr>
    <tr><td>Password:</td><td><input type="password" name=password id="password"  value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[password]; ?>"/></td></tr>
    <tr><td> Confirm password:</td><td><input type="password" name="confirm_password" id="comfirm_password"  value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[password]; ?>"/></td></tr>
    <tr><td>Address:</td><td><textarea name="address" id="address"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[address]; ?></textarea></td></tr>
    <tr><td>contact no.:</td><td><input type="text" name=contact_no id="contact_no"  value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[contact_no]; ?>" /></td></tr>
    <tr><td>Designation:</td><td><input type="text" name=designation id="designation"  value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[designation]; ?>"  /></td></tr>
    <tr><td>Salary:</td><td><input type="text" name=salary  value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[salary]; ?>" /></td></tr>
    <tr><td>Status:</td><td>   
        <select name="status" id="status">
        	<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
			$arr = array("Select","Enabled","Disabled");
			foreach($arr as $value)
			{
				if($value == $recs[status])
				{
				echo "<option value='$value' selected>$value</option>";
				}
				else
				{
				echo "<option value='$value'>$value</option>";
				}
			}
			?>
        </select>
  </td></tr>
    <tr><td colspan="2" align="center"><input type="submit" value=Submit name="Submit" /></td></tr>

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
