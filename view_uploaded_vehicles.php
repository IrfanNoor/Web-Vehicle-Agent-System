<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");

if(!isset($_SESSION[client_id]))
{
	header("Location: client_login.php?logpage=$pagename");
}

if(isset($_GET[delid]))
		{
		$sql = "DELETE FROM `webvehicledealer`.`vehicle` WHERE `vehicle`.`vehicle_id` ='$_GET[delid]' ";
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
				}
		}
		
if(isset($_SESSION[client_id]))
{
$qresult = mysqli_query($con,"SELECT * FROM vehicle_request where client_id='$_SESSION[client_id]'");
}
else
{
$qresult = mysqli_query($con,"SELECT * FROM vehicle_request");
}


$qresult = mysqli_query($con,"SELECT * FROM vehicles");

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
        <h1>About Us</h1>
        <p>
<table width="500" height="37" border="1">
  <tr>
    <th width="43" scope="col">Vehicle Type</th>
    <th width="63" scope="col">Vehicle Name</th>
    <th width="81" scope="col">Vehicle Company</th>
    <th width="84" scope="col">Vehicle Number</th>
    <th width="136" scope="col">Km Status</th>
    <th width="125" scope="col">Model</th>
    <th width="125" scope="col">Vehicle Used Status</th>
    <th width="125" scope="col">Price</th>
    <th width="125" scope="col">Vehicle Description</th>
    <th width="125" scope="col">Status</th>
    </tr>
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
 <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
 while($rs = mysqli_fetch_array($qresult))
 {
	echo " <tr>
    <td>&nbsp;$rs[vehicle_type]</td>
    <td>&nbsp;$rs[vehicle_name]</td>
    <td>&nbsp;$rs[vehicle_company]</td>
    <td>&nbsp; $rs[vehicle_number]</td>
    <td>&nbsp;$rs[km_status]</td>
    <td>&nbsp;$rs[model]</td>
	<td>&nbsp;$rs[vehicle_used_status]</td>
	<td>&nbsp;$rs[price]</td>
	<td>&nbsp;$rs[vehicle_description]</td>
	<td>&nbsp;$rs[Status]</td>
	<td>&nbsp; <a href='vehicles.php?editid=$rs[vehicle_id]'>Edit</a> | Delete </td>
  </tr>";
 }
 ?>
</table>
