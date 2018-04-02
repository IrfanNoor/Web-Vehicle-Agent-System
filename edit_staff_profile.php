<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
session_start();
include("connection.php");
?>
<script type="application/javascript">
function validate()
{
	var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i
	var b=emailfilter.test(document.editpofile.email_id.value);
	
	var alphaExp = /^[a-zA-Z]+$/;
	if(document.editpofile.first_name.value == "")
	{
		alert("please enter your first name..");
		document.editpofile.first_name.focus();
		return false;
	}
	else if(!editpofile.first_name.value.match(alphaExp))
	{
		alert("Invalid First name..");
		document.editpofile.first_name.value = "";
		document.editpofile.first_name.focus();
		return false;
	}
	else if(!editpofile.first_name.value.match(alphaExp)  && document.editpofile.last_name.value != "")
	{
		alert("Invalid last name..");
		document.editpofile.last_name.value = ""
		document.editpofile.last_name.focus();
		return false;
	}
	else if(document.editpofile.email_id.value == "")
	{
		alert("Please enter your email id");
		document.editpofile.email_id.focus();
		return false;
	}
	else if(b == false)
	{
		alert("Invalid email");
		document.editpofile.email_id.value = "";
		document.editpofile.email_id.focus();
		return false;
	}
	else if(document.editpofile.address.value == "")
	{
		alert("Please enter your address..");
		document.editpofile.address.focus();
		return false;
	}
	else if(document.editpofile.city.value == "")
	{
		alert("Please enter your city..");
		document.editpofile.city.focus();
		return false;
	}
	else if(!editpofile.city.value.match(alphaExp))
	{
	alert("Invalid city name...");
	editpofile.city.value = "";
	editpofile.city.focus();
	return false;
	}
	else if(document.editpofile.state.value == "")
	{
		alert("Please enter your state..");
		document.editpofile.state.focus();
		return false;
	}
	else if(!editpofile.state.value.match(alphaExp))
	{
	alert("Invalid State name...");
	editpofile.state.value = "";
	editpofile.state.focus();
	return false;
	}
	else if(document.editpofile.mobile_no.value == "" && document.editpofile.phone_no.value == "")
	{
		alert("Please enter your mobile number or a phone number..");
		document.editpofile.mobile_no.focus();
		return false;
	}
	else if(isNaN(document.editprofile.phone_no.value) && document.editprofile.phone_no.value != "")
	{
		alert("Invalid phone Number..");
		document.editprofile.phone_no.value = "";
		document.editprofile.phone_no.focus();
		return false;
	}
	else if(isNaN(document.editpofile.mobile_no.value))
	{
		alert("Invalid Mobile Number..");
		document.editpofile.mobile_no.value = "";
		document.editpofile.mobile_no.focus();
		return false;
	}
	else if(document.editpofile.mobile_no.value.length <= 9  || document.editpofile.mobile_no.value.length > 12)
	{
		alert("Invalid Mobile Number..");
		document.editpofile.mobile_no.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
 
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
 
 include("header.php");

 



			//Update query to update employee record
			$sql = mysqli_query($con,"UPDATE employee SET employee_name='$_POST[employee_name]',login_id='$_POST[login_id]',address='$_POST[address]',contact_no='$_POST[contact_no]',designation='$_POST[designation]', where emp_id='$_GET[editid]'");
			if(!$sql)
			{
				$msg=  "<br><font color='red'>Problem in SQL Query  </font>".mysqli_error($con);
			}
			else
			{
				$msg= "<br><font color='green'>Values Updated</font>";
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
    
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
 include("sidebar.php");
 ?>
        </div>
        <div id="content" class="float_r">
        <h1 align="center">Edit Profile</h1>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $msg; ?>


 <form name="editpofile" method="post" action=""  onSubmit="return validate()">
     <table width="392" border="1" class="tftable">
      <tr>
        <td bgcolor="#D6D6D6" >&nbsp;</td>
        <td bgcolor="#D6D6D6" ><strong>&nbsp;Employee name:</strong></td>
        <td bgcolor="#666666">&nbsp; <input type="text" name="employee_name" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[employee_name]; ?>" ></td>
      </tr>
      <tr>
        <td bgcolor="#D6D6D6" scope="row">&nbsp;</td>
        <td bgcolor="#D6D6D6" scope="row"><strong>&nbsp;Login id:</strong></td>
        <td bgcolor="#666666">&nbsp; <input type="text" name="login_id" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[login_id]; ?>" ></td>
      </tr>
      <tr>
        <td bgcolor="#D6D6D6" scope="row">&nbsp;</td>
        <td bgcolor="#D6D6D6" scope="row"><strong>&nbsp; Address:</strong></td>
        <td bgcolor="#666666">&nbsp; <textarea name="address"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[address]; ?></textarea></td>
      </tr>
      <tr>
        <td bgcolor="#D6D6D6" scope="row">&nbsp;</td>
        <td bgcolor="#D6D6D6" scope="row"><strong>&nbsp;contact no.:</strong></td>
        <td bgcolor="#666666">&nbsp; <input type="text" name="contact_no" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[contact_no]; ?>" ></td>
      </tr>
      <tr>
        <td bgcolor="#D6D6D6" scope="row">&nbsp;</td>
        <td bgcolor="#D6D6D6" scope="row"><strong>&nbsp;Designation:</strong></td>
        <td bgcolor="#666666">&nbsp; <input type="text" name="designation" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[designation]; ?>" ></td>
      </tr>
      <tr>
        <td bgcolor="#D6D6D6" scope="row">&nbsp;</td>
        <td bgcolor="#D6D6D6" scope="row"><strong>&nbsp;Salary:</strong></td>
        <td bgcolor="#666666">&nbsp; <input type="text" name="salary" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[salary]; ?>" ></td>
      </tr>
     
      <tr>
        <td colspan="3" scope="row" align="center"><input type="submit" name="submit" id="submit" value="Update profile" /></td>
        </tr>
      
     </table>

 </form>

        <div class="cleaner h20"></div>
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