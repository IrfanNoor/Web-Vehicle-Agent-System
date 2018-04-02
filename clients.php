<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");
?>
<script type="application/javascript">
function validate()
{
	var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i
	var b=emailfilter.test(document.clients.email_id.value);
	
	var alphaExp = /^[a-zA-Z]+$/;
	if(document.clients.first_name.value == "" && document.clients.last_name.value == "" && document.clients.email_id.value == "" && document.clients.password.value == "" && document.clients.confirm_password.value == "" && document.clients.city.value == "" && document.clients.state.value == "" && document.clients.mobile_no.value == "" )
	{
		alert("Please enter all the details..");
		document.clients.first_name.focus();
		return false;
	}
	else if(document.clients.first_name.value == "")
	{
		alert("Please enter your first name..");
		document.clients.first_name.focus();
		return false;
	}
	else if(!clients.first_name.value.match(alphaExp))
	{
	alert("Invalid First name...");
	clients.first_name.value = "";
	clients.first_name.focus();
	return false;
	}
	
else if(!clients.last_name.value.match(alphaExp) && document.clients.last_name.value != "")
	{
	alert("Invalid last name...");
	clients.last_name.value = "";
	clients.last_name.focus();
	return false;
	}
	else if(document.clients.email_id.value == "")
	{
		alert("Please enter your email id..");
		document.clients.email_id.focus();
		return false;
	}
	else if(b == false)
	{
		alert("Invalid Email id");
		document.clients.email_id.value = "";
		document.clients.email_id.focus();
		return false;
	}
	else if(document.clients.password.value == "")
	{
		alert("Pease enter your password..");
		document.clients.password.focus();
		return false;
	}
	else if(document.clients.password.value.length  <= 9)
	{
		alert("Password should be more than 9 characters..");
		document.clients.password.value = "";
		document.clients.password.focus();
		return false;
	}
	else if(document.clients.password.value != document.clients.confirm_password.value)
	{
		alert("Password  not matching..");
		document.clients.password.value = "";
		document.clients.confirm_password.value ="";
		document.clients.password.focus();
		return false;
	}
	else if(document.clients.address.value == "")
	{
		alert("Pease enter your Address..");
		document.clients.address.focus();
		return false;
	}
	else if(document.clients.city.value == "")
	{
		alert("Pease enter your City..");
		document.clients.city.focus();
		return false;
	}
	else if(!clients.city.value.match(alphaExp))
	{
	alert("Invalid city name...");
	clients.city.value = "";
	clients.city.focus();
	return false;
	}
	else if(document.clients.state.value == "")
	{
		alert("Pease enter your State..");
		document.clients.state.focus();
		return false;
	}
	else if(!clients.state.value.match(alphaExp))
	{
	alert("Invalid State name...");
	clients.state.value = "";
	clients.state.focus();
	return false;
	}
	else if(document.clients.mobile_no.value == "" && document.clients.phone_no.value == "")
	{
		alert("Please enter your mobile number or a phone number..");
		document.clients.mobile_no.focus();
		return false;
	}
	else if(isNaN(document.clients.mobile_no.value))
	{
		alert("Invalid Mobile Number..");
		document.clients.mobile_no.value = "";
		document.clients.mobile_no.focus();
		return false;
	}
	else if(isNaN(document.clients.phone_no.value))
	{
		alert("Invalid phone Number..");
		document.clients.phone_no.value = "";
		document.clients.phone_no.focus();
		return false;
	}
	else if(document.clients.phone_no.value.length < 10  && document.clients.phone_no.value != "")
	{
		alert("Invalid phone Number..");
		document.clients.phone_no.value = "";
		document.clients.phone_no.focus();
		return false;
	}
	else if(document.clients.mobile_no.value.length <= 9 || document.clients.mobile_no.value.length > 12)
	{
		alert("Invalid Mobile Number..");
		document.clients.mobile_no.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if($_SESSION[setid] == $_POST[setid])
{
	if(isset($_POST[submit]))
	{
		$qresult = mysqli_query($con,"SELECT * FROM clients where email_id='$_POST[email_id]'");	
		if(mysqli_num_rows($qresult) == 1)
		{
			$msg = "Email ID already Exists";
			$msgi=1;
		}
		else
		{
			if(isset($_GET[editid]))
			{
				$sql= mysqli_query($con,"UPDATE clients set first_name='$_POST[first_name]',last_name='$_POST[last_name]',email_id='$_POST[email_id]',password='$_POST[password]',address='$_POST[address]',city='$_POST[city]',state='$_POST[city]',phone_no='$_POST[phone_no]',mobile_no='$_POST[mobile_no]',status='$_POST[status]' where client_id='$_GET[editid]'");
					if(!$sql)
				{
					$msg=  "<br><font color='red'>Problem in SQL Query  </font>".mysqli_error($con);
				}
				else
				{
	?>
				<script type="application/javascript">
					alert("Records updated successfully...");
					window.location="profile.php";
				</script>
	<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.    
				}
			}
			else
			{
				
				$date = date("Y-m-d");
				$sql="insert into clients (first_name,last_name,email_id,password,address,city,state,phone_no,mobile_no,created_date,status)  values('$_POST[first_name]','$_POST[last_name]','$_POST[email_id]','$_POST[password]','$_POST[address]','$_POST[city]','$_POST[state]','$_POST[phone_no]','$_POST[mobile_no]','$date','Enabled')";
				$sqlquery = mysqli_query($con,$sql);
				if(!$sqlquery)
				{
					$msg=  "<br><font color='red'>Problem in INSERT SQL Query</font>";
				}
				else
				{
		?>
				<script type="application/javascript">
					alert("User registered successfully...");
					window.location="client_login.php";
				</script>
	<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.    
				}
			}
		}
	}
}

$_SESSION[setid] = rand();

if(isset($_GET[editid]))
{
$sqledit = mysqli_query($con,"SELECT * FROM clients WHERE client_id = '$_GET[editid]'");
$rec = mysqli_fetch_array($sqledit);
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
        <h1>New  Registration..</h1>
        <form name="clients" method="post" action="" onSubmit="return validate()">
<input type="hidden" name="setid" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_SESSION[setid]; ?>" />
<table width="371" border="2" class="tftable">
    <tr>
      <td colspan="2" align="center">
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  if(isset($_GET[editid]))
	  {
      echo "";
	  }
	  else
	  {
      echo "";
	  }
	  ?>
      &nbsp;<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $msg; ?></td>
    </tr>
    <tr><td><strong>First name: <font color='red'>*</font></strong></td><td><input type="text" name=first_name id="first_name" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[first_name]; ?>"  /></td>    </tr>
   <tr> <td><strong>Last name:</strong></td><td><input type=text name=last_name id="last_name" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[last_name]; ?>"/></td>    </tr>
    <tr><td><strong>Email id: <font color='red'>*</font></strong></td><td><input type=text name=email_id id="email_id" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[email_id]; ?>" /></td>    </tr>
    <tr>  <td><strong>Password: <font color='red'>*</font></strong></td> <td><input type="password" name="password" id="password" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[password]; ?>" /></td> </tr>
    <tr>  <td><strong>Confirm password: <font color='red'>*</font></strong></td><td><input type="password" name=confirm_password id="confirm_password" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[password]; ?>"/></td>    </tr>
    <tr>
      <td><strong>Address: <font color='red'>*</font></strong></td><td><textarea name="address" id="address" ><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[address]; ?></textarea></td>    </tr>
   <tr>
     <td><strong> City: <font color='red'>*</font></strong></td><td><input type=text name=city id="city" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[city]; ?>"/></td>    </tr>
   <tr>
     <td><strong> State: <font color='red'>*</font></strong></td><td><input type=text name=state id="state" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[state]; ?>"/></td>    </tr>
   <tr> <td><strong>Phone no.:</strong></td><td><input type=text name=phone_no id="phone_no" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[phone_no]; ?>" /></td>    </tr>
   <tr> <td><strong>Mobile no.: <font color='red'>*</font></strong></td><td><input type=text name=mobile_no id="mobile_no" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[mobile_no]; ?>"/></td>    </tr>
 <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
 		if($rec[status] != "")
		{
?>
   <tr>
     <td><strong> Status:</strong></td><td>
    	<select name=status id=status>
        	<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
				$arr=array("Select","Enabled","Dissabled");
				foreach($arr as $value)
				{
					if($value == $rec[status])
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
					
   <tr>
   <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
   
		}
	?>
   <td colspan="2" align="center"><input type="submit" name=submit value=Register..></td>    </tr>
</table>
</form>
        <div class="cleaner"></div>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
include("footer.php");
?>