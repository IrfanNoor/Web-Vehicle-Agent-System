<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");
/*
if(isset($_SESSION[empid]))
{
	if(!isset($_GET[selid]))
	{
	header("Location: vehicles.php");
	}
}
*/
?>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	

$pagename =  basename($_SERVER['PHP_SELF']);
 if(!isset($_SESSION[client_id]))
{
	if(!isset($_SESSION[empid]))
	{
	header("Location: client_login.php?logpage=$pagename");
	}
}
?>
<script type="application/javascript">
function validate()
{
	var vehimg =  document.getElementsByName('uploadimage[]');

		if(document.vehicles.vehicle_type.value == "Select" && document.vehicles.km_status.value == "" && document.vehicles.model.value == "" && document.vehicles.vehicle_used_status.value == "select" && document.vehicles.price.value == "")
	{
		alert("Please enter all the fields..");
		document.vehicles.vehicle_type.focus();
		return false;
	}
	else if(document.vehicles.vehicle_type.value == "Select")
	{
		alert("Please select the vehicle type..");
		document.vehicles.vehicle_type.focus();
		return false;
	}
	else if(document.vehicles.companyid.value == "")
	{
		alert("Please select the vehicle company..");
		document.vehicles.companyid.focus();
		return false;
	}
	else if(document.vehicles.vehiclenameid.value == "")
	{
		alert("Please select the vehicle name..");
		document.vehicles.vehiclenameid.focus();
		return false;
	}
	else if(document.vehicles.km_status.value == "")
	{
		alert("Please enter how much km the vehicle has run..");
		document.vehicles.km_status.focus();
		return false;
	}
	else if(isNaN(document.vehicles.km_status.value))
	{
		alert("Invalid Km Status	..");
		document.vehicles.km_status.value = "";
		document.vehicles.km_status.focus();
		return false;
	}
	else if(document.vehicles.km_status.value <= 0)
	{
		alert("Invalid Km Status	..");
		document.vehicles.km_status.value = "";
		document.vehicles.km_status.focus();
		return false;
	}
	else if(document.vehicles.model.value == "")
	{
		alert("Please enter vehicle year of purchase..");
		document.vehicles.model.focus();
		return false;
	}
	else if(document.vehicles.model.value >  document.vehicles.year.value)
	{
		alert("Invalid year entered..");
		document.vehicles.model.focus();
		return false;
	}
	else if(isNaN(document.vehicles.model.value))
	{
		alert("Invalid year..");
		document.vehicles.model.value = "";
		document.vehicles.model.focus();
		return false;
	}
	else if(document.vehicles.model.value != "" && document.vehicles.model.value <= 1950)
	{
		alert("Invalid year..");
		document.vehicles.model.value = "";
		document.vehicles.model.focus();
		return false;
	}
	else if(document.vehicles.vehicle_used_status.value == "select")
	{
		alert("Please select the vehicle used status..");
		document.vehicles.vehicle_used_status.focus();
		return false;
	}
	else if(isNaN(document.vehicles.price.value))
	{
		alert("Invalid price..");
		document.vehicles.price.value = "";
		document.vehicles.price.focus();
		return false;
	}
	else if(document.vehicles.price.value <= 4999 && document.vehicles.price.value != "")
	{
		alert("Invalid price..");
		document.vehicles.price.value = "";
		document.vehicles.price.focus();
		return false;
	}
	else if(vehimg[0].value=="")
	{
	alert("Please upload atleast one image");
	vehimg[0].focus();
	return false;            
	}
	else if(document.vehicles.min_price.value == "" && document.vehicles.max_price.value == "")
	{
		alert("Please enter the price for the vehicle..");
		document.vehicles.min_price.focus();
		return false;
	}
	else if(document.vehicles.min_price.value > document.vehicles.max_price.value)
	{
		alert("Minimum price should not be greater than maximum price..");
		document.vehicles.min_price.focus();
		return false;
	}
	else if(document.vehicles.min_price.value <= 4999)
	{
		alert("Invalid price..");
		document.vehicles.min_price.focus();
		return false;
	}
	else if(document.vehicles.max_price.value <= 4999)
	{
		alert("Invalid price..");
		document.vehicles.max_price.focus();
		return false;
	}
	else if(isNaN(document.vehicles.hp.value))
	{
		alert("Invalid hp price..");
		document.vehicles.hp.value = "";
		document.vehicles.hp.focus();
		return false;
	}
	else if(document.vehicles.hp.value < 0)
	{
		alert("Invalid hp price..");
		document.vehicles.hp.value = "";
		document.vehicles.hp.focus();
		return false;
	}
	else if(isNaN(document.vehicles.extra.value))
	{
		alert("Invalid price..");
		document.vehicles.extra.value = "";
		document.vehicles.extra.focus();
		return false;
	}
	else if(document.vehicles.extra.value < 0)
	{
		alert("Invalid price..");
		document.vehicles.extra.value = "";
		document.vehicles.extra.focus();
		return false;
	}
	else if(isNaN(document.vehicles.min_price.value))
	{
		alert("Invalid price..");
		document.vehicles.min_price.value = "";
		document.vehicles.min_price.focus();
		return false;
	}
	else if(isNaN(document.vehicles.max_price.value))
	{
		alert("Invalid price..");
		document.vehicles.max_price.value = "";
		document.vehicles.max_price.focus();
		return false;
	}
	else if(document.vehicles.confirmapproval.checked == false)
	{
		alert("Please confirm before approval..");
		document.vehicles.confirmapproval.focus();
		return false;		
	}
	else
	{
		return true;
	}
}
</script>

<script>
function showvehiclecompany(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  
			xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","ajaxvehiclecompany.php?vehtype="+str,true);
		xmlhttp.send();
}

function showvehiclename(str)
{
	if (str=="")
	  {
	  document.getElementById("txtHint1").innerHTML="";
	  return;
	  } 
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  
			xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","ajaxvehiclename.php?companyid="+str,true);
		xmlhttp.send();
}

</script>

    <script>
        var x = 0;
        var y = 0;
        var z = 0;
		var tot =0;
        function calc(obj) {
            var e = obj.id.toString();
            if (e == 'price') {
                x = Number(obj.value);
                y = Number(document.getElementById('hp').value);
				z = Number(document.getElementById('extra').value);
            } 
			else if (e == 'hp') {
                x = Number(document.getElementById('price').value);
                y = Number(obj.value);
				z = Number(document.getElementById('extra').value);
            } 
			else {
                x = Number(document.getElementById('price').value);
                y = Number(document.getElementById('hp').value);
				z = Number(obj.value);
            }
            tot = x + y + z;
            document.getElementById('totalamt').value = tot;
        }
    </script>
    
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if($_SESSION[session]==$_POST[session])
{
	if(isset($_POST[submit]))
	{

		if(isset($_GET[editid]))
		{
			//Update query to update vehicles record 
			$sql = "UPDATE vehicle SET company_id='$_POST[vehiclenameid]',vehicle_type='$_POST[vehicle_type]',vehicle_number='$_POST[vehicle_number]',km_status='$_POST[km_status]',model='$_POST[model]',vehicle_used_status='$_POST[vehicle_used_status]',price='$_POST[price]',hp='$_POST[hp]',extra='$_POST[extra]',min_price='$_POST[min_price]',max_price='$_POST[max_price]',vehicle_description='$_POST[vehicle_description]',status='$_POST[status]' where vehicle_id='$_GET[editid]'";
	
			if(!mysqli_query($con,$sql))
			{
				echo mysqli_error($con);
			}
			else
			{
				$resi=1;
				if($_POST[status] == "Hide")
				{
					$res ="<h3><font color='green'>Vehicle has been hidden from the site..</font></h3>";
				}
				else
				{
					$res ="<h3><font color='green'>Vehicle has been approved and it has been displayed on the website.</font></h3>";
				}
			}
		}
		else
		{
			if(isset($_SESSION[client_id]))
			{
				$clientid = $_SESSION[client_id];
				$status= "Pending";
			}
			else if(isset($_SESSION[empid]))
			{
				$clientid = $_POST[clientid];		
				$status= $_POST["status"];						
			}
			
$sql="insert into vehicle (client_id,company_id,vehicle_type,vehicle_number,km_status,model,vehicle_used_status,price,hp,extra,min_price,max_price,vehicle_description,status) 	values('$clientid','$_POST[vehiclenameid]', '$_POST[vehicle_type]','$_POST[vehicle_number]','$_POST[km_status]','$_POST[model]','$_POST[vehicle_used_status]','$_POST[price]','$_POST[hp]','$_POST[extra]','$_POST[min_price]','$_POST[max_price]','$_POST[vehicle_description]','$status')";
			if(!mysqli_query($con,$sql))
			{
				echo mysqli_error($con);
			}
			else
			{
				$resi=1;
				if(isset($_GET[selid]))
				{
					$res ="<h3><font color='green'>
					<a href='vehicles.php?selid=$_GET[selid]'>Click here to add another vehicle</a>
					</font></h3>";
				}
				else
				{
					$res ="<h3><font color='green'>Your vehicle detailes has been sent to the admin...<br>
					Admin will verify your request and contact you soon...<br><br>
					<a href='vehicles.php'>Click here to sell another vehicle</a>
					</font></h3>";
				}
			}
			
			$sqlquery = mysqli_insert_id($con);
			
			$imagecount = count($_FILES["uploadimage"]["name"]);
			for($k=0; $k<$imagecount; $k++)
			{
						
				$imgnm = rand().$_FILES["uploadimage"]["name"][$k];
				move_uploaded_file($_FILES["uploadimage"]["tmp_name"][$k],"uploads/" . $imgnm);
				
				$sql1="insert into images (vehicle_id,image_path,status) values ('$sqlquery','$imgnm','Enabled')";
				if(!mysqli_query($con,$sql1))
					{
						echo mysqli_error($con);
					}
			}
		}		
	}
}

$_SESSION["session"] = rand();

if(isset($_GET[editid]))
		{
			$sqledit = mysqli_query($con,"SELECT * FROM vehicle WHERE vehicle_id = '$_GET[editid]'");
			$recs = mysqli_fetch_array($sqledit);
		}

if(isset($_GET[viewid]))
		{
			$sqledit = mysqli_query($con,"SELECT * FROM vehicle WHERE vehicle_id = '$_GET[viewid]'");
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



<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if(isset($_GET[viewid]))
{
?>
<form name=vehicles method="post" enctype="multipart/form-data">

<h1>Client details</h1>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if(isset($_SESSION[empid]))
{
	if(isset($_GET[selid]))
	{
	$qresult = mysqli_query($con,"SELECT * FROM clients where client_id='$_GET[selid]'");
	}
	else
	{
	$qresult = mysqli_query($con,"SELECT * FROM clients where client_id='$recs[client_id]'");
	}
	$arrfetch = mysqli_fetch_array($qresult);
?>
	<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
    if(isset($_SESSION[empid]))
    {
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
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
}
?>
        
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		if(isset($_GET[approvalid]))
		{
        echo "<h1>Vehicle approval form :</h1>";
		}
		else
		{
        echo "<h1>Vehicle details</h1>";
		}
		?>

<p>

<input type="hidden" name="session" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_SESSION["session"]; ?>" />

<table width="656" border="2" class="tftable">
	<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
        if($resi==1)
        {
			?>
<tr>
	<td colspan="2">
	<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
            echo $res;
        ?>
    </td>
</tr>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		}
		else
		{
			//Vehicle name
			$qresultveh_comname = mysqli_query($con,"SELECT * FROM vehicle_company WHERE company_id='$recs[company_id]'");
			$rsvehcomname = mysqli_fetch_array($qresultveh_comname);
			//Vehicle company
			$qresultveh_comp = mysqli_query($con,"SELECT * FROM vehicle_company WHERE company_id='$rsvehcomname[mainid]'");
			$rsvehcomp = mysqli_fetch_array($qresultveh_comp);
?>
	<tr>
	  <td width="178"><strong>Vehicle type:</strong></td><td width="460">
     <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[vehicle_type];	?>
    </td></tr>
    <tr>
      <td><strong>Vehicle company:</strong></td>
      <td>
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
	  echo $rsvehcomp[name];	?>
	</td></tr>
    <tr>
      <td><strong>Vehicle name:</strong></td>
      <td>
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsvehcomname[name];	?>
        </td></tr>
    <tr><td><strong>Vehicle number:</strong></td><td><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[vehicle_number]; ?></td></tr>
    <tr>
      <td><strong>KM status:</strong></td>
      <td><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[km_status]; ?></td></tr>
    <tr>
      <td><strong>Model:</strong></td>
      <td><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[model]; ?></td></tr>
    <tr>
      <td><strong>Vehicle used status:</strong></td>
      <td> <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[vehicle_used_status]; ?>
   </td></tr>
    <tr>
      <td><strong>Price:</strong></td>
      <td>Rs- <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[price]; ?></td></tr>
    <tr><td><strong>Vehicle Description:</strong></td><td><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[vehicle_description]; ?></td></tr>
    <tr>
      <td><strong>Image:</strong></td>
      <td><p>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if(isset($_GET[viewid]))
{
      $sqleditimg = mysqli_query($con,"SELECT * FROM images WHERE vehicle_id = '$_GET[viewid]'");
		while($recsimg = mysqli_fetch_array($sqleditimg))
		{
         echo "<div class='product_box'>
            <img src='uploads/". $recsimg[image_path] . "' width='175' height='125' />
          </div>";  
		}
}
?>
    </p>
         </td></tr>  

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if(isset($_SESSION[empid]))
{
?>   
 <tr><td colspan="2"></td></tr> 
    <tr><td><strong>HP:</strong></td><td><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[hp]; ?></td></tr>
   <tr><td><strong> Extra:</strong></td><td><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[extra]; ?></td></tr>
   <tr><td><strong> Minimmum price:</strong></td><td><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[min_profit]; ?></td></tr>
   <tr><td><strong> Maximum price:</strong></td><td><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[max_profit]; ?></td></tr>     
            <tr><td><strong> Status:</strong></td><td>
           <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[status];
		?>
    </select>
            </td></tr>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
}
?>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if($recs[status] == "Pending")
{
?>    
    <tr><td colspan="2" align=center>
    <strong><a href='vehicles.php?editid=<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_GET[viewid] ;?>&approvalid=<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_GET[viewid] ;?>'>Approve this vehicle</a>  |
    <a href='view_vehicles.php'>Back</a></strong>
    </td></tr>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		}
?>    
    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		}
	?>
    </table>

</form>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
}
else
{
?>
<form name=vehicles method="post" enctype="multipart/form-data" onSubmit="return validate()">
<input type="hidden" name="year" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo date(Y); ?>" />
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if(isset($_SESSION[empid]))
{
	//$qresult = mysqli_query($con,"SELECT * FROM clients where client_id='$_GET[selid]'");
	//$arrfetch = mysqli_fetch_array($qresult);
			if(isset($_GET[selid]))
	{
	$qresult = mysqli_query($con,"SELECT * FROM clients where client_id='$_GET[selid]'");
	}
	else
	{
	$qresult = mysqli_query($con,"SELECT * FROM clients where client_id='$recs[client_id]'");
	}
	$arrfetch = mysqli_fetch_array($qresult);
?>
<input type="hidden" name="clientid" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $arrfetch[client_id];?>" />
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
        <h1>Vehicle details</h1>
        <p>

<input type="hidden" name="session" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_SESSION["session"]; ?>" />

<table width="656" border="2" class="tftable">
	<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
        if($resi==1)
        {
			?>
<tr>
	<td colspan="2">
	<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
            echo $res;
        ?>
    </td>
</tr>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		}
		else
		{
?>
	<tr>
	  <td width="178"><strong>Vehicle type:</strong><font color='red'> *</font></td><td width="460">
     <select name="vehicle_type" id="vehicle_type" onchange="showvehiclecompany(this.value)" >
        	<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
			$arr = array("Select","2 Wheeler","4 Wheeler");
			foreach($arr as $value)
			{
				if($value == $recs[vehicle_type])
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
    <tr>
      <td><strong>Vehicle company:</strong> <font color='red'>*</font></td><td>
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	 	$qresult = mysqli_query($con,"SELECT * FROM vehicle_company where company_id='$recs[company_id]'");
		$arrfetch = mysqli_fetch_array($qresult); 	  
	  ?>
     <div id="txtHint">
     <select name="companyid" id="companyid">
     <option value="">Select Company Name</option>
     <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	
     	$qresult1 = mysqli_query($con,"SELECT * FROM vehicle_company where mainid='0'");
		while($arrfetch1 = mysqli_fetch_array($qresult1))
		{
			if($arrfetch1[0] == $arrfetch[1])
			{
			echo "<option value='$arrfetch1[company_id]' selected>$arrfetch1[name]</option>";
			}
			else
			{
			echo "<option value='$arrfetch1[company_id]'>$arrfetch1[name]</option>";
			}
		}
	?>
        </select>
        </div>
	</td></tr>
    <tr>
      <td><strong>Vehicle name:</strong><font color='red'> *</font></td>
      <td>
      <div id="txtHint1">
     <select name="vehiclenameid" id="vehiclenameid">
			<option value="">Select Vehicle Name</option>
			 <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
            
                $qresult2 = mysqli_query($con,"SELECT * FROM vehicle_company where company_id ='$arrfetch[0]'");
                while($arrfetch2 = mysqli_fetch_array($qresult2))
                {
                    echo "<option value='$arrfetch2[company_id]' selected>$arrfetch2[name]</option>";
                }
            ?>
        </select>
        </div>
        </td></tr>
    <tr><td><strong>Vehicle number:</strong></td><td><input name=vehicle_number type="text" id="vehicle_number" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[vehicle_number]; ?>" size="30"/></td></tr>
    <tr><td><strong>KM status:</strong><font color='red'> *</font></td><td><input name=km_status type="text" id="km_status" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[km_status]; ?>" size="30"/></td></tr>
    <tr><td><strong>Model: </strong><font color='red'>*</font></td><td><input type="text" name=model id="model" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[model]; ?>"/></td></tr>
    <tr><td><strong>Vehicle used status:</strong><font color='red'> *</font></td><td>
    <select name="vehicle_used_status" id="vehicle_used_status">
		<option value="select">Select</option>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		$array = array("First owner","Second owner","Third owner","Above");
		foreach($array as $value)
		{
			if($recs[vehicle_used_status] == $value )
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
    
    <tr><td><strong>Vehicle Description:</strong></td><td><textarea name="vehicle_description" id="vehicle_description"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[vehicle_description]; ?></textarea></td></tr>
    <tr>
      <td><strong>Expected Price: </strong></td><td>
    <input type="text" name="price" id="price" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[price]; ?>"  onkeyup="calc(this)"/></td></tr>
    <tr><td><strong>Image:</strong><font color='red'> *</font></td><td><p>
      <input type="file" name="uploadimage[]" multiple="multiple"  >
      <br />(Hold Ctrl button to choose multiple images..)
      <br />
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if(isset($_GET[editid]))
{
      $sqleditimg = mysqli_query($con,"SELECT * FROM images WHERE vehicle_id = '$_GET[editid]'");
		while($recsimg = mysqli_fetch_array($sqleditimg))
		{
         echo "<div class='product_box'>
            <img src='uploads/". $recsimg[image_path] . "' width='175' height='125' />
          </div>";  
		}
}
?>
    </p>
<p>
   
</p>
         </td></tr>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if(!isset($_SESSION[empid]))
{
?>
    <tr>
      <td colspan="2"> <strong> <font color="#FF0000"> NOTE: We buy only KARNATAKA passing vehicle!! i.e only "KA" and not any other state vehicle..<br /> Please do not not send any request for non karnataka passing vehicles!!! </font></strong></td>
     </tr>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
}
?>

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if(isset($_SESSION[empid]))
{
?>   
 <tr><td colspan="2"><strong>For Administrators:</strong> </td></tr> 
    <tr><td><strong>HP:</strong></td><td><input type="text" name=hp id="hp" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[hp]; ?>"  onkeyup="calc(this)"/></td></tr>
   <tr><td> <strong>Extra:</strong></td><td><input type="text" name=extra id="extra" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[extra]; ?>"  onkeyup="calc(this)"/></td></tr>
   <tr><td><strong> Total amount including HP AND Extra:</strong></td><td><input type="text" name=totalamt id="totalamt" readonly="readonly" /></td></tr>
   <tr><td><strong> Minimmum price:</strong></td><td><input type="text" name=min_price id="min_price" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[min_profit]; ?>" /></td></tr>
   <tr><td><strong> Maximum price:</strong></td><td><input type="text" name=max_price id="max_price" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[max_profit]; ?>"/></td></tr>     

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if(isset($_GET[approvalid]))
{
?>
<tr><td colspan="2">
<input type="checkbox" name="confirmapproval" value="confirmation" /> <strong>Check this to confirm</strong><br />
<input type="hidden" name="status" value="Approved" />
</td></tr>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.	
}
else
{
	
?>
            <tr><td> <strong>Status:</strong></td><td>
            <select name="status" id="status">
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		$array = array("Approved","Hide");
		foreach($array as $value)
		{
			if($recs[status] == $value )
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
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
}
?>
            
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
}
?>
    <tr><td colspan="2" align=center><strong>
      <input type="submit" name="submit" value="Submit"   />
    </strong></td></tr>
    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		}
	?>
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