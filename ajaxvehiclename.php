<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
include("connection.php");
$sql="SELECT * FROM vehicle_company WHERE mainid='$_GET[companyid]' and status='Enabled'";
$result = mysqli_query($con,$sql);

echo "<select name='vehiclenameid'>";
echo "<option value=''>Select Vehicle Name</option>";
while($row = mysqli_fetch_array($result))
  {
echo "<option value='$row[company_id]'>$row[name]</option>";
  }
echo "</select>";
?>