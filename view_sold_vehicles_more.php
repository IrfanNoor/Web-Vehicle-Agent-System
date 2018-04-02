<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");

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
if(isset($_POST[submit]))
{
$qvehorder = mysqli_query($con,"UPDATE vehicle_order SET vehicle_cost =  '$_POST[sellingprice]',comments =  '$_POST[comment]',
status =  '$_POST[vehiclestatus]' WHERE order_id ='$_GET[order_id]'");
	if(mysqli_affected_rows($con) == 1)
	{
		if($_POST[vehiclestatus] == "Approved")
		{
?>
	<script type="application/javascript">
	
		var r=confirm("The vehicle has been approved.. Press OK button to make payment...");
		if (r==true)
		  {
		 	window.location="vehicles_payment.php?order_id=<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_GET[order_id]; ?>";
		  }
		else
		  {
		  	window.location="view_sold_vehicles.php";
		  }
	</script>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		}
		else
		{
?>
<script type="application/javascript">
		alert("Sales record updated sucessfully");
		window.location="view_sold_vehicles.php";
</script>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		}
	}
	
}

$vehrec = mysqli_query($con,"SELECT * FROM vehicle_order WHERE order_id='$_GET[order_id]'");
$rsvehrec = mysqli_fetch_array($vehrec);

$_SESSION["session"] = rand();

include("header.php");
 ?>
    
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
 include("sidebar.php");
 ?>
        </div>
<div id="content" class="float_r">

<h1>Vehicle order</h1>

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
$qresult = mysqli_query($con,"SELECT     vehicle_order.*, vehicle.*, clients.*, vehicle_company.*
FROM         vehicle_order INNER JOIN
                      vehicle ON vehicle_order.vehicle_id = vehicle.vehicle_id INNER JOIN
                      clients ON vehicle_order.client_id = clients.client_id INNER JOIN
                      vehicle_company ON vehicle.company_id = vehicle_company.company_id where vehicle_order.order_id='$_GET[order_id]'");
	$recs = mysqli_fetch_array($qresult);				  
?>
<form name=vehicles method="post" enctype="multipart/form-data">

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.

    ?>  
        <table width="410" border="1" class="tftable">
          <tr>
            <td width="152" scope="row"><strong>&nbsp;Name: </strong></td>
            <td width="242">&nbsp;<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[first_name]. " ". $recs[last_name]; ?></td>
          </tr>
          <tr>
            <td scope="row"><strong>&nbsp;Email ID: </strong></td>
            <td>&nbsp;<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[email_id]; ?></td>
          </tr>
          <tr>
            <td scope="row"><strong>&nbsp;Mobile No.</strong></td>
            <td>&nbsp;<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[mobile_no]; ?></td>
          </tr>
        </table>
    	<hr />       
<p>

<input type="hidden" name="session" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_SESSION["session"]; ?>" />

<table width="656" border="2"  class="tftable">
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
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
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsvehcomp[name];	?>
	</td></tr>
    <tr>
      <td><strong>Vehicle name:</strong></td>
      <td>
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsvehcomname[name];	?>
        </td></tr>
    <tr><td><strong>Vehicle number:</strong></td><td><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[vehicle_number]; ?></td></tr>
    <tr>
      <td><strong>Price:</strong></td>
      <td>Rs- <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[price]; ?></td></tr>
    <tr><td><strong>HP:</strong></td><td>Rs- <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[hp]; ?></td></tr>
   <tr><td><strong> Extra:</strong></td><td>Rs- <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[extra]; ?></td></tr>
   <tr><td><strong> Display price:</strong></td><td> Rs- <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[min_price]; ?> - Rs- <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[max_price]; ?></td>
   </tr>
   <tr>
     <td><strong>Total cost: </strong></td><td>&nbsp;Rs-  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $totcost = $recs[price] +  $recs[hp] +  $recs[extra];?></td></tr>     
    </table>
<hr />
<table width="653" border="1"  class="tftable">

  <tr>
    <td colspan="2" scope="row" align="center"><strong>Vehicle order status</strong></td>
    </tr>	
  <tr>
    <td width="183" scope="row">Selling price</td>
    <td width="454"><label for="sellingprice"></label>
      <input name="sellingprice" type="text" id="sellingprice" size="20" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsvehrec[vehicle_cost]; ?>" /></td>
  </tr>
  <tr>
    <td scope="row">Comments</td>
    <td><textarea name="comment" id="comment"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsvehrec[comments]; ?></textarea></td>
  </tr>
  <tr>
    <td scope="row">Status</td>
    <td><select name="vehiclestatus" id="vehiclestatus">
      
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
				$arr = array("Pending","Approved","Rejected","Blocked");
				foreach($arr as $value)
				{
					if($rsvehrec[status] == $value)
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
    <td colspan="2" scope="row" align="center"><input type="submit" name="submit" id="submit" value="Submit" /></td>
  </tr>
  <tr>
    <td colspan="2" scope="row" align="center"><a href='vehicles_payment.php?order_id=<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_GET[order_id]; ?>'><strong>Click here to make the payment</strong></a></td>
  </tr>
  </table>

</form>
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