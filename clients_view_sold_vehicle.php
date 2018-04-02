<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");


$qresult = mysqli_query($con,"SELECT     vehicle.*, vehicle_company.*, clients.* FROM vehicle LEFT OUTER JOIN vehicle_company ON vehicle.company_id = vehicle_company.company_id LEFT OUTER JOIN clients ON vehicle.client_id = clients.client_id where clients.client_id = '$_SESSION[client_id]'");

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
        <h1>Sales details</h1>
<table width="690" border="1">
  <tr>
    <th width="195" scope="col">Vehicle details</th>
    <th width="222" scope="col">Vehicle status</th>
    <th width="174" scope="col">price</th>
    <th width="71" scope="col">Action</th>
    </tr>
 <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.

 while($rs = mysqli_fetch_array($qresult))
 {
	echo " <tr><td>";
    
	 $qresultveh_comname = mysqli_query($con,"SELECT * FROM vehicle_company WHERE company_id='$rs[mainid]'");
	 $rsvehcomname = mysqli_fetch_array($qresultveh_comname);
	     echo "&nbsp;<strong>Vehicle name:</strong> $rs[name]<br>";
  	echo "&nbsp;<strong>Vehicle type:</strong>$rs[vehicle_type]<br>
";  
echo "&nbsp;<strong>Company name:</strong> $rsvehcomname[name]<br>";

	 echo "</td>
	
    <td>
	&nbsp;<strong>KM Status:</strong> $rs[km_status] <br>
	&nbsp;<strong>Model :</strong> $rs[model] <br>
	&nbsp;<strong>Used status:</strong><br />&nbsp;$rs[vehicle_used_status]
	</td>";
	echo "<td>
	&nbsp; <strong>Price -</strong> Rs. $rs[price]<br />
	</td>	
	<td align='center'>&nbsp;
	<strong>$rs[14]</strong><br><hr>
	 <a href='clients_sold_vehicle.php?viewid=$rs[vehicle_id]'><strong>More</strong></a>
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