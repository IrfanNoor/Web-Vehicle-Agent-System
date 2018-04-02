<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");

if(isset($_GET[delid]))
{
$sql = "DELETE FROM vehicle WHERE vehicle_id = '$_GET[delid]'";
				if(!mysqli_query($con,$sql))
				{
					echo mysqli_error($con);
				}		
				else
				{
?>
				<script>
                alert("Vehicle request deleted successfully...");
                </script>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
header("Location: view_vehicles.php");
				}
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
        <h1>Pending vehicle details</h1>
        <p>
<table width="690" border="1">
  <tr>
  <th width="192" scope="col">Client details</th>
    <th width="156" scope="col">Vehicle details</th>
    <th width="112" scope="col">Vehicle status</th>
    <th width="74" scope="col">price</th>
    <th width="122" scope="col">Action</th>
    </tr>
 <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if(isset($_GET[status]))
{
$qresult = mysqli_query($con,"SELECT     vehicle.*, vehicle_company.*, clients.* FROM vehicle LEFT OUTER JOIN vehicle_company ON vehicle.company_id = vehicle_company.company_id LEFT OUTER JOIN clients ON vehicle.client_id = clients.client_id where vehicle.status = '$_GET[status]' ");
}
else
{
$qresult = mysqli_query($con,"SELECT     vehicle.*, vehicle_company.*, clients.* FROM vehicle LEFT OUTER JOIN vehicle_company ON vehicle.company_id = vehicle_company.company_id LEFT OUTER JOIN clients ON vehicle.client_id = clients.client_id  ");
}
 while($rs = mysqli_fetch_array($qresult))
 {
	echo " <tr>
	<td>&nbsp;". ucfirst($rs[first_name]) . " ". ucfirst($rs[last_name]) . "
	<hr>
	&nbsp;<strong>Email ID:</strong> $rs[email_id] 
	<hr>
	&nbsp;<strong>Mobile No.:</strong> $rs[mobile_no] 
	</td>
    
	<td>&nbsp;<strong>Vehicle type:</strong> $rs[vehicle_type]<br>
";
	
	 $qresultveh_comname = mysqli_query($con,"SELECT * FROM vehicle_company WHERE company_id='$rs[mainid]'");
	 $rsvehcomname = mysqli_fetch_array($qresultveh_comname);
    echo "&nbsp;<strong>Company name:</strong> $rsvehcomname[name]<br>";

    echo "&nbsp;<strong>Vehicle name:</strong> $rs[name]
	</td>
	
    <td>
	&nbsp;<strong>KM Status:</strong> $rs[km_status] <br>
	&nbsp;<strong>Model :</strong> $rs[model] <br>
	&nbsp;<strong>Used status:</strong><br />&nbsp;$rs[vehicle_used_status]
	</td>
	<td>&nbsp;Rs. $rs[price]</td>	
	<td align='center'>&nbsp;
	$rs[14]<br>
	 <a href='vehicles.php?editid=$rs[vehicle_id]'><strong>Edit</strong></a>
	  | 
	 <a href='view_vehicles.php?delid=$rs[vehicle_id]'><strong>Delete</strong></a> 
	  <hr>
	 <a href='vehicles.php?viewid=$rs[vehicle_id]'><strong>View More</strong></a>
	  </td>
  </tr>";
 }
 ?>
</table>

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