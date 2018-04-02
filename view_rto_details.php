<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");
?>
<script type="application/javascript">
	var agentcost = 0;
	var transfercost = 0;
	var officecharge = 0;
	var bextract = 0;
	var insurance = 0;
	var extra = 0;
	var tot =0;
	function calc(obj) {
				var agentcost = document.payment.agent_cost.value;
				var transfercost = document.payment.transfer_cost.value;
				var officecharge = document.payment.office_charge.value;
				var bextract = document.payment.B_extract.value;
				var insurance = document.payment.Insurance.value;
				var extra = document.payment.Extra.value;
				tot = parseFloat(agentcost) + parseFloat(transfercost) + parseFloat(officecharge) + parseFloat(bextract) + parseFloat(insurance) + parseFloat(extra) ;
				//tot = parseFloat(agentcost) + parseFloat(transfercost) ;
				 document.payment.total.value = tot;
				
	}
</script>
    
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		if(isset($_POST[submit]))	
		{
			$sql ="UPDATE rto SET `status`='$_POST[status]' where rto_id='$_POST[rtoid]'";
						if(!mysqli_query($con,$sql))
						{
							echo mysqli_error($con);
						}	
						else
						{
							if($_POST[status] == "Cleared")
							{
								
						?>
							<script type="application/javascript">
								var r = confirm("Do you want to send message to the clients..?");
								if (r == true)
								  {
								  	window.open("sms.php");
								  }

							</script>
						<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
							}
						}
		}


$sqledit = mysqli_query($con,"SELECT * FROM vehicle WHERE vehicle_id = '$_GET[editid]'");
			$recs = mysqli_fetch_array($sqledit);

$sqledit = mysqli_query($con,"SELECT * FROM vehicle WHERE vehicle_id = '$_GET[viewid]'");
			$recs = mysqli_fetch_array($sqledit);

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

<h2>RTO details</h2>

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
$qresult = mysqli_query($con,"SELECT     vehicle_order.*, vehicle.*, clients.*, vehicle_company.*
FROM         vehicle_order INNER JOIN
                      vehicle ON vehicle_order.vehicle_id = vehicle.vehicle_id INNER JOIN
                      clients ON vehicle_order.client_id = clients.client_id INNER JOIN
                      vehicle_company ON vehicle.company_id = vehicle_company.company_id");
					  
?>


<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.

    ?>
<hr />       
<p>


<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
//if(isset($_GET[viewid]))
{
?>

<p>
<table width="656" border="2" class="tftable">
    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if(isset($_SESSION[empid]))
{
?>
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



<p>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
$_SESSION["session"] = rand();
?>
<table width="656" border="2" class="tftable">

    <tr>
      <th>
      <form id="form1" name="form1" method="GET" action="">
        <input type="text" name="vehno" id="vehno" placeholder="Vehicle Number" />
        <input type="submit" name="searchsubmit" id="searchsubmit" value="Search"   />
      </form></th>
      </tr>
</table>
<hr />

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if(isset($_GET[vehno]))
{
$qrto = mysqli_query($con,"SELECT     rto.*, vehicle_order.*, vehicle.*
FROM         rto INNER JOIN
                      vehicle_order ON vehicle_order.order_id = rto.order_id INNER JOIN
                      vehicle ON vehicle_order.vehicle_id = vehicle.vehicle_id  where vehicle.vehicle_number like '%$_GET[vehno]%'");
}
else
{
$qrto = mysqli_query($con,"SELECT     * FROM         rto  ");
}
if(mysqli_num_rows($qrto) >= 1)
{
?>

<table width="656" border="2" class="tftable">

    <tr>
      <th width="183">Vehicle details</th>
      <th width="174">Agent details</th>
      <th width="211">Cost</th>
      <th width="54">Status</th>
      </tr>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.

while($rsrto = mysqli_fetch_array($qrto))
{
	$sqlorder = mysqli_query($con,"SELECT * FROM vehicle_order WHERE order_id = '$rsrto[order_id]'");
	$rsorder = mysqli_fetch_array($sqlorder);
	
	$sqlvehicle = mysqli_query($con,"SELECT * FROM vehicle WHERE vehicle_id = '$rsorder[vehicle_id]'");
	$rsvehicle = mysqli_fetch_array($sqlvehicle);
	
	$sqlvehiclename = mysqli_query($con,"SELECT * FROM vehicle_company WHERE company_id = '$rsvehicle[company_id]'");
	$rsvehiclename = mysqli_fetch_array($sqlvehiclename);

	
?>	      
    <tr>
      <td>
	<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.

	
	echo "<strong>Vehicle name :</strong> ".$rsvehiclename[name];
	echo "<br><strong>Vehicle No. :</strong> <br>".$rsvehicle[vehicle_number];
	echo "<br><strong>Vehicle used status :</strong> ".$rsvehicle[vehicle_used_status];	
	?> 
      </td>
      <td>Date : <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[date]; ?>
      <hr /><strong>Agent name:</strong> Rs.<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[agent_name]; ?><br />        
	  <strong>Contact No.</strong> Rs.<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[agent_contact_no]; ?></td>
      <td><strong>Agent cost:</strong> Rs.<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[agent_cost]; ?><br />        
	  <strong>Transfer cost :</strong> Rs.<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[transfer_cost]; ?><br />
      <strong>Office charge :</strong> Rs.<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[office_charge]; ?><br />        
		<strong>B Extract :</strong> Rs. <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[b_extract]; ?><br />
       <strong>Insurance</strong> Rs.<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[insurance]; ?><br />
      <strong>Extra :</strong>  Rs.<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[extra]; ?><br />
    <strong> Total: </strong>  Rs.<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[agent_cost]+ $rsrto[transfer_cost] + $rsrto[office_charge] + $rsrto[b_extract] + $rsrto[insurance]+ $rsrto[extra]; ?><br />
        <br />        
        <br /></td>
      <td>
      <form method="post" action="">
      <input type="hidden" name="rtoid" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[rto_id]; ?>" />
      <select name="status" id="status">
        <option value="">Select</option>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		$array = array("Pending","Cleared");
		foreach($array as $value)
		{
			if($rsrto[status] == $value )
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
        <input type="submit" name="submit" value="Update" />
        </form>
        <br /></td>
    </tr>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	
}
?>
    </table>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
}
else
{
	echo "<h2>No records to display..</h2>";
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