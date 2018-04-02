<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");
?>
<script type="application/javascript">
function validate()
{
	//!this.form.checkbox.checked

	
	if(document.vehicles.vehicle_type.value == "Select" && document.vehicles.km_status.value == "" && document.vehicles.model.value == "" && document.vehicles.vehicle_used_status.value == "select" && document.vehicles.min_price.value == "" && document.vehicles.max_price.value == "")
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
	else if(document.vehicles.model.value == "")
	{
		alert("Please enter vehicle year of purchase..");
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
	else if(document.vehicles.model.value.length <= 3 || document.vehicles.model.value.length >4)
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
	else if(isNaN(document.vehicles.hp.value))
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
			$sql = "UPDATE vehicle SET company_id='$_POST[vehiclenameid]',vehicle_type='$_POST[vehicle_type]',vehicle_number='$_POST[vehicle_number]',km_status='$_POST[km_status]',model='$_POST[model]',vehicle_used_status='$_POST[vehicle_used_status]',price='$_POST[price]',hp='$_POST[hp]',extra='$_POST[extra]',min_price='$_POST[min_profit]',max_price='$_POST[max_profit]',vehicle_description='$_POST[vehicle_description]',status='$_POST[status]' where vehicle_id='$_GET[editid]'";
	
			if(!mysqli_query($con,$sql))
			{
				echo mysqli_error($con);
			}
			else
			{
				$resi=1;
				$res ="<h3><font color='green'>Vehicle has been approved and it has been displayed on the website.</font></h3>";
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
			
$sql="insert into vehicle (client_id,company_id,vehicle_type,vehicle_number,km_status,model,vehicle_used_status,price,hp,extra,min_price,max_price,vehicle_description,status) 	values('$clientid','$_POST[vehiclenameid]', '$_POST[vehicle_type]','$_POST[vehicle_number]','$_POST[km_status]','$_POST[model]','$_POST[vehicle_used_status]','$_POST[price]','$_POST[hp]','$_POST[extra]','$_POST[min_profit]','$_POST[max_profit]','$_POST[vehicle_description]','$status')";
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
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
}
?>
       
        <p>

<input type="hidden" name="session" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_SESSION["session"]; ?>" />

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