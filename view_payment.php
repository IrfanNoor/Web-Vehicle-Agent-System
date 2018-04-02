<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
include("connection.php");

$qresult = mysqli_query($con,"SELECT * FROM payment");

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
        <h1>About Us</h1>
        <p>
<table width="939" border="1">
  <tr>
    <th width="133" scope="col">Vehicle type</th>
    <th width="129" scope="col">vehicle company</th>
    <th width="136" scope="col">Vehicle name</th>
    <th width="144" scope="col">Paid amount</th>
    <th width="160" scope="col">Payment type</th>
    <th width="221" scope="col">Status</th>
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
 while($rs = mysqli_fetch_array($qresult))
 {
	echo " <tr>
    <td>&nbsp;$rs[vehicle_type]</td>
    <td>&nbsp;$rs[vehicle_company]</td>
    <td>&nbsp;$rs[vehicle_name]</td>
    <td>&nbsp; $rs[paid_amount]</td>
    <td>&nbsp;$rs[payment_type]</td>
    <td>&nbsp;$rs[status]</td>
	<td>&nbsp; <a href='payment.php?editid=$rs[payment_id]'>Edit</a> | Delete </td>
  </tr>";
 }
 ?>
</table>
