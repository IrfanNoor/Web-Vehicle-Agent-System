<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
include("connection.php");
session_start();


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
        <h1>Approved vehicles        </h1>
<table width="690" border="1">
  <tr>
  <th width="117" scope="col">Seller details</th>
    <th width="139" scope="col">Vehicle details</th>
    <th width="119" scope="col">Vehicle status</th>
    <th width="225" scope="col">price</th>
    <th width="56" scope="col">Action</th>
    </tr>
 <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if(isset($_GET[status]))
{
$qresult = mysqli_query($con,"SELECT     vehicle.*, vehicle_company.*, clients.* FROM vehicle LEFT OUTER JOIN vehicle_company ON vehicle.company_id = vehicle_company.company_id LEFT OUTER JOIN clients ON vehicle.client_id = clients.client_id where vehicle.status = 'Hide' ");
}
else
{
$qresult = mysqli_query($con,"SELECT     vehicle.*, vehicle_company.*, clients.* FROM vehicle LEFT OUTER JOIN vehicle_company ON vehicle.company_id = vehicle_company.company_id LEFT OUTER JOIN clients ON vehicle.client_id = clients.client_id where vehicle.status = 'Hide' ");
}
 while($rs = mysqli_fetch_array($qresult))
 {
	echo " <tr>
	<td>&nbsp;". ucfirst($rs[first_name]) . " ". ucfirst($rs[last_name]) . "
	<hr>
	&nbsp;<strong>Email ID:</strong><br />
 &nbsp; $rs[email_id] <br />
	&nbsp;<strong>Mobile No.:</strong><br />
 &nbsp; $rs[mobile_no] 
	</td><td>";
    

	
	 $qresultveh_comname = mysqli_query($con,"SELECT * FROM vehicle_company WHERE company_id='$rs[mainid]'");
	 $rsvehcomname = mysqli_fetch_array($qresultveh_comname);
	     echo "&nbsp;<strong>Vehicle name:</strong> $rs[name]<br>";
  	echo "&nbsp;<strong>Vehicle type:</strong><br />
 $rs[vehicle_type]<br>
";  
echo "&nbsp;<strong>Company name:</strong> $rsvehcomname[name]<br>";

	 echo "</td>
	
    <td>
	&nbsp;<strong>KM Status:</strong> $rs[km_status] <br>
	&nbsp;<strong>Model :</strong> $rs[model] <br>
	&nbsp;<strong>Used status:</strong><br />&nbsp;$rs[vehicle_used_status]
	</td>";
	$totalprice = $rs[price] + $rs[hp] + $rs[extra];
	echo "<td>
	&nbsp; <strong>Price -</strong> Rs. $rs[price]<br />
	&nbsp; <strong>HP -</strong> Rs. $rs[hp]<br />
	&nbsp; <strong>Extra -</strong> Rs. $rs[extra]<br />
	&nbsp; <strong>Total price:  -</strong> Rs. " . $totalprice . "<br />
	&nbsp; <strong>Display price -</strong> <br />
	&nbsp; Rs. $rs[min_price] to  Rs. $rs[max_price]<br />
	</td>	
	<td align='center'>&nbsp;
	<strong>$rs[14]</strong><br><hr>
	 <a href='vehicles.php?editid=$rs[vehicle_id]'><strong>Edit</strong></a>
	  <hr>
	 <a href='vehicles.php?viewid=$rs[vehicle_id]'><strong>More</strong></a>
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
	<td>&nbsp;$rs[hp]</td>
	<td>&nbsp;$rs[extra]</td>
	<td>&nbsp;$rs[min_price]</td>
	<td>&nbsp;$rs[max_price]</td>
	<td>&nbsp;$rs[vehicle_description]</td>
	<td>&nbsp;$rs[Status]</td>
	<td>&nbsp; <a href='vehicles.php?editid=$rs[vehicle_id]'>Edit</a> | Delete </td>
  </tr>";
 }
 ?>
</table>
