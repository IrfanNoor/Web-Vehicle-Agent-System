<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");
	
	$result = mysqli_query($con,"SELECT * from employee");
if(isset($_GET[delid]))
{
		$qresult = mysqli_query($con,"DELETE FROM employee WHERE emp_id = '$_GET[delid]'");	
		if(!$qresult)
		{
			echo mysqli_error($qresult);
		}
		else
		{
		?>
        <script type="application/javascript">
			alert("Employee record deleted successfully...");
		</script>
		<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
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
        <h1>View Employees</h1>
        <table width="767" border="1" class="tftable">
  <tr>
    <th width="97">Name</th>
    <th width="89">Login_id</th>
    <th width="93">Address</th>
    <th width="116">Contact No.</th>
    <th width="74">Designation</th>
    <th width="43">Salary</th>
    <th width="64">Status</th>
    <th width="64">Action</th>
  </tr>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
while($rs = mysqli_fetch_array($result))
{
?>
  <tr>
    <td width="97"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rs[employee_name]; ?></td>
    <td width="89"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rs[login_id]; ?></td>
    <td width="93"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rs[address]; ?></td>
    <td width="116"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rs[contact_no]; ?></td>
    <td width="74"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rs[designation]; ?></td>
    <td width="43"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rs[salary]; ?></td>
    <td width="64"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rs[status]; ?></td>
    <td width="64">
    <a href="employee.php?editid=<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rs[emp_id]; ?>">Edit</a> | 
    <a href="view_employee.php?delid=<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rs[emp_id]; ?>">Delete</a>
    </td>
  </tr>  
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
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
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
  	while($rs = mysqli_fetch_array($result))
	{
		 echo "<tr>
			<td>&nbsp; $rs[employee_name]</td>
			<td>&nbsp; $rs[login_id]</td>
			<td>&nbsp; $rs[address]</td>
			<td>&nbsp; $rs[contact_no]</td>
			<td>&nbsp $rs[designation];</td>
			<td>&nbsp; $rs[salary]</td>
			<td>&nbsp; $rs[status]</td>
			<td>&nbsp; <a href='employee.php?editid=$rs[emp_id]'>Edit</a> | Delete </td>
		  </tr>";
	}
  ?>
</table>
