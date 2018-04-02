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
 if(!isset($_SESSION[client_id]))
 {
	 header("location: client_login.php");
 }
 include("header.php");
 include("connection.php");
 
  if(isset($_POST[submit]))
	{
		
		$sql= mysqli_query($con,"UPDATE clients set first_name='$_POST[first_name]',last_name='$_POST[last_name]',email_id='$_POST[email_id]',address='$_POST[address]',city='$_POST[city]',state='$_POST[state]',phone_no='$_POST[phone_no]',mobile_no='$_POST[mobile_no]' where client_id='$_SESSION[client_id]'");
		if(mysqli_affected_rows($con) == 1)
		{
?>
			<script type="application/javascript">
				alert("Records updated successfully...");
				window.location="profile.php";
			</script>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
		}
		else
		{
?>
			<script type="application/javascript">
				alert("No records to udate...");
				window.location="profile.php";
			</script>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
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
        <h1 align="center">Edit Profile</h1>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $msg; ?>
 <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.      
	$sqledit = mysqli_query($con,"SELECT * FROM clients WHERE client_id = '$_SESSION[client_id]'");
$rec = mysqli_fetch_array($sqledit);
?>

 <form name="editpofile" method="post" action=""  onSubmit="return validate()">
     <table width="392" border="1" class="tftable">
      <tr>
        <td bgcolor="#D6D6D6" ><strong>&nbsp; First name:</strong></td>
        <td bgcolor="#666666">&nbsp; <input type="text" name="first_name" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[first_name]; ?>" ></td>
      </tr>
      <tr>
        <td bgcolor="#D6D6D6" scope="row"><strong>&nbsp; Last name:</strong></td>
        <td bgcolor="#666666">&nbsp; <input type="text" name="last_name" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[last_name]; ?>" ></td>
      </tr>
      <tr>
        <td bgcolor="#D6D6D6" scope="row"><strong>&nbsp; Email ID</strong></td>
        <td bgcolor="#666666">&nbsp; <input type="text" name="email_id" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[email_id]; ?>" ></td>
      </tr>
      <tr>
        <td bgcolor="#D6D6D6" scope="row"><strong>&nbsp; Address:</strong></td>
        <td bgcolor="#666666">&nbsp; <textarea name="address"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[address]; ?></textarea></td>
      </tr>
      <tr>
        <td bgcolor="#D6D6D6" scope="row"><strong>&nbsp; City:</strong></td>
        <td bgcolor="#666666">&nbsp; <input type="text" name="city" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[city]; ?>" ></td>
      </tr>
      <tr>
        <td bgcolor="#D6D6D6" scope="row"><strong>&nbsp; State:</strong></td>
        <td bgcolor="#666666">&nbsp; <input type="text" name="state" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[state]; ?>" ></td>
      </tr>
      <tr>
        <td bgcolor="#D6D6D6" scope="row"><strong>&nbsp; Phone no:</strong></td>
        <td bgcolor="#666666">&nbsp; <input type="text" name="phone_no" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[phone_no]; ?>" ></td>
      </tr>
      <tr>
        <td bgcolor="#D6D6D6" scope="row"><strong>&nbsp; Mobile no:</strong></td>
        <td bgcolor="#666666">&nbsp; <input type="text" name="mobile_no" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[mobile_no]; ?>" ></td>
      </tr>
      <tr>
        <td colspan="2" scope="row" align="center"><input type="submit" name="submit" id="submit" value="Update profile" /></td>
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