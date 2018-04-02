<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");
?>


<script type="application/javascript">
function validate()
{
	if(document.addvehicle.vehicle_name.value == "")
	{
		alert("Please enter the vehicle name..");
		document.addvehicle.vehicle_company.focus();
		return false;
	}
	else if(document.addvehicle.vehicletype.value == "Select")
	{
		alert("Please enter the company name..");
		document.addvehicle.vehicletype.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.

			
if($_SESSION[session]==$_POST[session])
{
	if(isset($_POST[submit]))
	{
		if(isset($_GET[editid]))
		{
		$sql = "UPDATE vehicle_company SET mainid='$_POST[vehicle_company]',name='$_POST[vehicle_name]',vehicle_type='$_POST[vehicletype]',status='$_POST[status]' WHERE company_id='$_GET[editid]' ";
				if(!mysqli_query($con,$sql))
					{
						echo mysqli_error($con);
					}
				else
					{
	?>
					<script>
					alert("Vehicle Name updated successfully...");
					</script>
	<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
					}		
		}
		else
		{
		$sql = "INSERT INTO vehicle_company (mainid,name,vehicle_type,status) VALUES ('$_POST[vehicle_company]','$_POST[vehicle_name]','$_POST[vehicletype]','Enabled') ";
				if(!mysqli_query($con,$sql))
					{
						echo mysqli_error($con);
					}
					else
					{
		?>
				<script>
				alert("Vehicle Added Successfully...");
				</script>
		<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
					}
		}
	}
}

$sqledit = mysqli_query($con,"SELECT * FROM vehicle_company WHERE company_id = '$_GET[editid]'");
$recs = mysqli_fetch_array($sqledit);

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
        <h1>Vehicle Name</h1>
        <p>
<form method="post" name="addvehicle" action=""  onSubmit="return validate()">
<input type="hidden" name="session" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_SESSION["session"]; ?>" />
<table width="409" border="1" class="tftable">
   <tr>
    <td>Vehicle Name:</td>
    <td><input type="text" name="vehicle_name" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[name]; ?>"></td>
  </tr>
  <tr>
    <td width="154">Vehicle type:</td>
    <td width="239"><select name="vehicletype" id="vehicletype">
         <option value="">Select</option>
      <option value="2 Wheeler" 
	  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  if($recs[vehicle_type] == "2 Wheeler")
	  {
		  echo "selected";
	  }
      ?>>2 Wheeler</option>
      <option value="4 Wheeler"
       <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  if($recs[vehicle_type] == "4 Wheeler")
	  {
		  echo "selected";
	  }
      ?>
      >4 Wheeler</option>
    </select></td>
  </tr>
  <tr>
    <td>Vehicle Company:</td>
    <td>
     <select name="vehicle_company" id="vehicle_company">
     <option value="">Select</option>
		<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		$sqlcompany = "SELECT * FROM  vehicle_company where status='Enabled' AND mainid='0' ";
		$querycompany = mysqli_query($con,$sqlcompany);
		while($rscompany = mysqli_fetch_array($querycompany))
		{
			if($rscompany[company_id] == $recs[mainid])
			{
				echo "<option value='$rscompany[company_id]' selected>$rscompany[name]</option>";
			}
			else
			{
				echo "<option value='$rscompany[company_id]'>$rscompany[name]</option>";	
			}
		}
        ?>
       </select>
         </td>
  </tr>
 
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if(isset($_GET[editid]))
{
?> 
  <tr>
    <td>Status:</td>
    <td><select name="status" id="status">
      		<option value="">Select</option>    
        	<option value="Enabled"
       <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  if($recs[status] == "Enabled")
	  {
		  echo "selected";
	  }
      ?>>Enabled</option>
            <option value="Disabled"
       <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  if($recs[status] == "Disabled")
	  {
		  echo "selected";
	  }
      ?>>Disabled</option>
	   </select>
     </td>
  </tr>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
}
?>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
    
  </tr>
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