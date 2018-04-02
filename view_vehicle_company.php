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
        <h1>Vehicle details</h1>
        <p>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
 $qresultcomp = mysqli_query($con,"DELETE from vehicle_company where company_id='$_GET[delid]'");
?>
        
<table width="585" border="1">
  <tr>
      <th width="177" scope="col">Company Name</th>
          <th width="222" scope="col">Vehicle Type</th>
    <th width="164" scope="col">Status</th>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		if($_SESSION[designation] =="Admin")
		{
?>
         <th width="164" scope="col">Action</th>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		}
?>
  </tr>

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
 $qresult = mysqli_query($con,"SELECT company_id,name,vehicle_type,status from vehicle_company WHERE mainid='0'");

 while($rs = mysqli_fetch_array($qresult))
 {
	 
	echo "<tr>
	<td>&nbsp;$rs[name]</td>
	<td>&nbsp;$rs[vehicle_type]</td>
    <td>&nbsp;$rs[status]</td>";
	if($_SESSION[designation] =="Admin")
	{
	echo "<td>&nbsp; 
		<a href='add_vehicle_company.php?editid=$rs[company_id]'>Edit</a> | 
		<a href='view_vehicle_company.php?delid=$rs[company_id]'>Delete</a>
	</td>";
	}
  echo "</tr>";
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