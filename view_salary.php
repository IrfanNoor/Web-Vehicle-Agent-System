<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
include("connection.php");
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
        <h1>View salary        </h1>
        <table width="939" border="1">
          <tr>
      <th width="133" scope="col">Name</th>
          <th width="133" scope="col">Login ID</th>
    <th width="133" scope="col">Salary</th>
    <th width="129" scope="col">Working days</th>
    <th width="136" scope="col">Leaves taken</th>
    <th width="144" scope="col">Payment date </th>
    <th width="160" scope="col">Deductions</th>
    <th width="221" scope="col">Bonus</th>
    <th width="221" scope="col">Total salary</th>
    <th width="221" scope="col">Action</th>    
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
 $qresult = mysqli_query($con,"SELECT salary.*,employee.employee_name,employee.login_id FROM salary INNER JOIN employee ON salary.emp_id = employee.emp_id");

 while($rs = mysqli_fetch_array($qresult))
 {
	 $paymentdate = date("d-m-Y", strtotime($rs[payment_date]));
	 $totalsal = ($rs[salary] + $rs[bonus]) - $rs[deductions] ;
	echo " <tr>
	<td>&nbsp;$rs[employee_name]</td>
	<td>&nbsp;$rs[login_id]</td>
    <td>&nbsp;$rs[salary]</td>
    <td>&nbsp;$rs[working_days]</td>
    <td>&nbsp;$rs[leaves_taken]</td>
    <td>&nbsp;$paymentdate</td>
    <td>&nbsp;$rs[deductions]</td>
    <td>&nbsp;$rs[bonus]</td>
	 <td>&nbsp;$totalsal</td>
	<td>&nbsp; <a href='salary.php?editid=$rs[salary_id]'>Edit</a> | Delete </td>
  </tr>";
 }
 ?>
</table>
