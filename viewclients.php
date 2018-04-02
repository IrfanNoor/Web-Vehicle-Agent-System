<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
include("connection.php");

$qresult = mysqli_query($con,"SELECT * FROM clients");

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
<table width="829" border="1">
  <tr>
    <th width="43" scope="col">Name</th>
    <th width="63" scope="col">Email ID</th>
    <th width="81" scope="col">Address</th>
    <th width="84" scope="col">Contact No.</th>
    <th width="136" scope="col">Created date</th>
    <th width="125" scope="col">Status</th>
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
    <td>&nbsp;$rs[first_name] $rs[last_name]</td>
    <td>&nbsp;$rs[email_id]</td>
    <td>&nbsp;$rs[address],<br>
	$rs[city],<br>
	$rs[state] 
	</td>
    <td>&nbsp; $rs[phone_no] <br>
	$rs[mobile_no]
	</td>
    <td>&nbsp;$rs[created_date]</td>
    <td>&nbsp;$rs[status]</td>
	<td>&nbsp; <a href='clients.php?editid=$rs[client_id]'>Edit</a> | Delete </td>
  </tr>";
 }
 ?>
</table>
