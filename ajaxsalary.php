<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
include("connection.php");
$sqlemployee = "SELECT * FROM  employee where emp_id='$_GET[empsalid]' ";
$queryemployee = mysqli_query($con,$sqlemployee);
$rs = mysqli_fetch_array($queryemployee);
echo "<input type='text' name='salary' id='salary' value='$rs[salary]' readonly />";
?>