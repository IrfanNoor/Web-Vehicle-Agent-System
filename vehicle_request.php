<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();

include("connection.php");

if(isset($_SESSION[empid]))
{
	if(!isset($_GET[clientid]))
	{
	header("Location: view_vehreq_clients.php");
	}
}

?>




<script type="application/javascript">
function validate()
{
	if(document.request.vehicle_type.value == "Select" && document.request.vehicle_company.value == "" && document.request.vehicle_name.value == "")
	{
		alert("Please Enter all the fields..");
		document.request.vehicle_type.focus();
		return false;
	}
	else if(document.request.vehicle_type.value == "Select")
	{
		alert("Please select the vehicle type..");
		document.request.vehicle_type.focus();
		return false;
	}
	else if(document.request.vehicle_company.value == "")
	{
		alert("Please enter the company name..");
		document.request.vehicle_company.focus();
		return false;
	}
	else if(document.request.vehicle_name.value == "")
	{
		alert("Please enter the vehicle name..");
		document.request.vehicle_name.focus();
		return false;
	}
	else if(isNaN(document.request.model.value))
	{
		alert("Invalid year..");
		document.request.model.value = "";
		document.request.model.focus();
		return false;
	}
	else if(document.request.model.value != "" && document.request.model.value <= 1950)
	{
		alert("Invalid yearsd..");
		document.request.model.value = "";
		document.request.model.focus();
		return false;
	}
else if(document.request.model.value != "" && (document.request.model.value.length <= 3 || document.request.model.value.length >4))
	{
		alert("Invalid year..");
		document.request.model.value = "";
		document.request.model.focus();
		return false;
	}
	else if(isNaN(document.request.min_cost.value))
	{
		alert("Invalid price..");
		document.request.min_cost.value = "";
		document.request.min_cost.focus();
		return false;
	}
	else if(isNaN(document.request.max_cost.value))
	{
		alert("Invalid price..");
		document.request.max_cost.value = "";
		document.request.min_cost.focus();
		return false;
	}
	else if(document.request.min_cost.value <=9999 && document.request.min_cost.value != "")
	{
		alert("Invalid price..");
		document.request.min_cost.value = "";
		document.request.min_cost.focus();
		return false;
	}
	else if(document.request.max_cost.value <=9999 && document.request.max_cost.value != "")
	{
		alert("Invalid price..");
		document.request.max_cost.value = "";
		document.request.max_cost.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.

$pagename =  basename($_SERVER['PHP_SELF']);

if(!isset($_SESSION[client_id]) && !isset($_SESSION[empid]))
{
	header("Location: client_login.php?logpage=$pagename");
}

if($_SESSION[setid] == $_POST[setid])
{

	if(isset($_POST[submit]))
	{
		if(isset($_GET[editid]))
		{
			$sql= mysqli_query($con,"UPDATE vehicle_request set vehicle_type='$_POST[vehicle_type]',vehicle_company='$_POST[vehicle_company]',vehicle_name='$_POST[vehicle_name]',model='$_POST[model]',min_cost='$_POST[min_cost]',max_cost='$_POST[max_cost]',description='$_POST[description]',status='$_POST[status]'  WHERE request_id = '$_GET[editid]'");
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
			if(isset($_SESSION[client_id]))
			{
				$clientid= $_SESSION[client_id];
			}
			else
			{
				$clientid= $_GET[clientid];				
			}
			$date = date("Y-m-d");
			$sql="insert into vehicle_request (client_id,vehicle_type,vehicle_company,vehicle_name,model,min_cost,max_cost,description,status)  values('$clientid','$_POST[vehicle_type]','$_POST[vehicle_company]','$_POST[vehicle_name]','$_POST[model]','$_POST[min_cost]','$_POST[max_cost]','$_POST[description]','Enabled')";
			$qri = mysqli_query($con,$sql);
			if(!$qri)
			{
				echo  mysqli_error($con);
			}
			else
			{
				$msgi = 1;
				$msg= "<br>
				<h2>Your Vehicle request ID is ". mysqli_insert_id($con) . "</h2>
				<br>
				<h3><font color='green'>
				Vehicle request has been sent to the admin.. <br><br>
				Admin will verify your request and contact you soon...</font>
				
				</h3>";
			}
		}
	}
}

$_SESSION[setid] = rand();

if(isset($_GET[editid]))
{
$sqleditvrequest = mysqli_query($con,"SELECT * FROM vehicle_request WHERE request_id = '$_GET[editid]'");
$recvrequest = mysqli_fetch_array($sqleditvrequest);
}


 include("header.php");

 ?>
    
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
 include("sidebar.php");
 ?>
        </div>
        <div id="content" class="float_r">
<h1>Client details</h1>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if(isset($_SESSION[empid]))
{

	$qresult = mysqli_query($con,"SELECT * FROM clients where client_id='$_GET[clientid]'");

	$arrfetch = mysqli_fetch_array($qresult);
?> 
        <table width="410" border="1" class="tftable">
          <tr>
            <th width="152" scope="row">&nbsp;Name: </th>
            <td width="242">&nbsp;<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $arrfetch[first_name]. " ". $arrfetch[last_name]; ?></td>
          </tr>
          <tr>
            <th scope="row">&nbsp;Email ID: </th>
            <td>&nbsp;<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $arrfetch[email_id]; ?></td>
          </tr>
          <tr>
            <th scope="row">&nbsp; Mobile No.</th>
            <td>&nbsp;<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $arrfetch[mobile_no]; ?></td>
          </tr>
        </table>
    	<hr />
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
}
?>
        <h1>Vehicle request</h1>
        <p>
<form name="request" method="post" action="" onSubmit="return validate()">
<input type="hidden" name="setid" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_SESSION[setid]; ?>" />
<input type="hidden" name="clientid" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_GET[clientid]; ?>"  />

<table width="571" height="342" border="1" class="tftable">
   <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
   if($msgi == 1)
   {
	echo "<tr align='center'>   <td>".$msg. "   </td>   </tr>";
   }
   else
   {
   ?>
   <tr>
    <td><strong>&nbsp; Vehicle type:</strong></td>
    <td>&nbsp; <select name="vehicle_type" id="vehicle_type">
        	<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
			$arr = array("Select","2 Wheeler","4 Wheeler");
			foreach($arr as $value)
			{
				if($value == $recvrequest[vehicle_type])
				{
				echo "<option value='$value' selected>$value</option>";
				}
				else
				{
				echo "<option value='$value'>$value</option>";
				}
			}
			?>
        </select></td>
  </tr>
  <tr>
    <td><strong>&nbsp; Vehicle company:</strong></td>
    <td>&nbsp; <input type="text" name="vehicle_company" id="vehicle_company" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recvrequest[vehicle_company]; ?>" /></td>
  </tr>
  <tr>
    <td><strong>&nbsp; Vehicle name:</strong></td>
    <td>&nbsp; <input type="text" name="vehicle_name" id="vehicle_name" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recvrequest[vehicle_name]; ?>" />
  </tr>
  <tr>
    <td><strong>&nbsp; Model:</strong></td>
    <td>&nbsp; <input type="text" name="model" id="model" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recvrequest[model]; ?>" /></td>
  </tr>
  <tr>
    <td><strong>&nbsp; Cost range:</strong></td>
    <td>&nbsp; <strong>From rs
        <input type="text" name="min_cost" id="min_cost" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recvrequest[min_cost]; ?>" />
       to rs</strong>      <input type="text" name="max_cost" id="max_cost" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recvrequest[max_cost]; ?>" /></td>
  </tr>
  <tr>
    <td><strong>&nbsp; Description:</strong></td>
    <td>&nbsp; <textarea name="description" id="description" ><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recvrequest[description]; ?></textarea></td>
  </tr>
 <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
 if(isset($_SESSION[empid])) 
 {
 ?>
  <tr>
    <td><strong>&nbsp; Status:</strong></td>
    <td>&nbsp;
      <select name="status" id="status">
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
				$arr=array("Select","Enabled","Dissabled");
				foreach($arr as $value)
				{
					if($value == $recvrequest[status])
					{
						echo "<option value='$value' selected>$value</option>";
					}
					else
					{
						echo "<option value='$value'>$value</option>";
					}
				}
			?>
    </select></td>
  </tr>
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
 }
 ?>
  <tr>
    <td colspan="2" align="center">
    <input type="submit" name="submit" value="Send Request" /></td>
   
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

	