<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");
if(!isset($_SESSION[client_id]) && !isset($_SESSION[empid]))
{
	header("Location: client_login.php?logpage=$pagename");
}

if(isset($_GET[delid]))
		{
		$sql = "DELETE FROM `webvehicledealer`.`vehicle_request` WHERE `vehicle_request`.`request_id` ='$_GET[delid]' ";
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
        <h1>Vehicle Requests</h1>
        <p>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
 while($rs = mysqli_fetch_array($qresult))
 {

	 ?>
	 <table width="688" border="1">
  <tr>
    <th width="47" scope="col">vehicle type</th>
    <th width="121" scope="col">vehicle details</th>
    <th width="79" scope="col">model</th>
    <th width="133" scope="col">Cost range</th>
    <th width="133" scope="col">Status</th>
    </tr>
	 <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.

	echo " <tr>


    <td>&nbsp;$rs[vehicle_type]</td>
    <td>&nbsp;
	Company: $rs[vehicle_company]<br>
	Vehicle name: $rs[vehicle_name]
	&nbsp;</td>
    <td>&nbsp;$rs[model]</td>
	<td>&nbsp; Rs. $rs[min_cost] - Rs. $rs[max_cost]</td>
	<td>&nbsp;$rs[status] <br>
	&nbsp; <a href='vehicle_request.php?editid=$rs[request_id]'>Edit</a> | <a href='view_vehicle_request.php?delid=$rs[request_id]'>Delete</a> </td>
    </tr>";
	
	echo "  <tr>
    <td colspan='6' scope='col'>&nbsp; 
	<strong>Description : </strong>
    &nbsp;$rs[description]</th>
  </tr> ";
  ?>
  </table><hr />
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
 
