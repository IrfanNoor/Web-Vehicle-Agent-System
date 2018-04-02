<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");
?>

<script type="application/javascript">
function validate()
{
	if(document.addcompany.vehicle_company.value == "" && document.addcompany.vehicle_type.value == "")
	{
		alert("Please enter the fields..");
		document.addcompany.vehicle_company.focus();
		return false;
	}
	else if(document.addcompany.vehicle_company.value == "")
	{
		alert("Please enter the company name..");
		document.addcompany.vehicle_company.focus();
		return false;
	}
	else if(document.addcompany.vehicle_type.value == "")
	{
		alert("Please enter the company name..");
		document.addcompany.vehicle_type.focus();
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
		$sql = "UPDATE vehicle_company SET name='$_POST[vehicle_company]',vehicle_type='$_POST[vehicletype]',status='$_POST[status]' WHERE company_id='$_GET[editid]' ";
				if(!mysqli_query($con,$sql))
				{
					echo mysqli_error($con);
				}		
				else
				{
?>
				<script>
                alert("Company name updated successfully...");
                </script>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
				}
		}
		else
		{
		$sql = "INSERT INTO vehicle_company (name,vehicle_type,status) VALUES ('$_POST[vehicle_company]','$_POST[vehicletype]','Enabled') ";
			if(!mysqli_query($con,$sql))
			{
				echo mysqli_error($con);
			}
			else
			{
?>
		<script>
		alert("Company name inserted successfully...");
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
        <h1>Add New Vehicle Company</h1>
        <p>
<form method="post" name="addcompany" action="" onSubmit="return validate()">
<input type="hidden" name="session" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_SESSION["session"]; ?>" />
<table width="315" border="1" class="tftable">
  <tr>
    <td><strong>Vehicle Company:</strong></td>
    <td><input type="text" name="vehicle_company" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[name]; ?>"></td>
  </tr>
  
  <tr>
    <td><strong>Vehicle type:</strong></td>
    <td><select name="vehicletype" id="vehicletype">
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
      <option value="Both"
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  if($recs[vehicle_type] == "Both")
	  {
		  echo "selected";
	  }
      ?>>Both</option>
    </select></td>
  </tr>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if(isset($_GET[editid]))
{
?>  
  <tr>
    <td><strong>Status:</strong></td>
    <td>
    <select name="status" id="status">
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