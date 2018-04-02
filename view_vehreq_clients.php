<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");

if(isset($_GET[delid]))
{
		$qresult = mysqli_query($con,"DELETE FROM clients WHERE client_id = '$_GET[delid]'");	
		if(!$qresult)
		{
			echo mysqli_error($qresult);
		}
		else
		{
			$res = "<font color='red'><strong>Clients record deleted successfully...</strong></font>";
		}
			
}

if(isset($_POST[Search]))
{
	$qresult = mysqli_query($con,"SELECT * FROM  `clients` WHERE  `first_name` LIKE  '%$_POST[keyword]%' or  `last_name` LIKE  '%$_POST[keyword]%' or  `email_id` LIKE  '%$_POST[keyword]%' or  `phone_no` LIKE  '%$_POST[keyword]%' or  `mobile_no` LIKE  '%$_POST[keyword]%' ");	
	
}
else
{
	$qresult = mysqli_query($con,"SELECT * FROM clients");
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
        <h1>Client Details...</h1>
        <p><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $res; ?></p>
        <table width="385" border="0" >
          <tr>
            <th scope="col" align="left">
            <div id="templatemo_search">
            <form action="" method="post">
                  <input type="text" value="Enter name or Contact No. or Email ID" name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                  <input type="submit" name="Search" value=" Search " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                </form>
                </div>
            </th>
            </th>
          </tr>
        </table>
        <hr>
        <table width="687" border="1">
  <tr>
    <th width="178" scope="col">Name</th>
    <th width="245" scope="col">Contact details</th>
    <th width="176" scope="col">Status</th>
    <th width="60" scope="col">Action</th>
  </tr>

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
 while($rs = mysqli_fetch_array($qresult))
 {
	echo " <tr>
    <td>&nbsp;". ucfirst($rs[first_name]) . " ". ucfirst($rs[last_name]) ;
	echo "<hr>	
	&nbsp; <strong>Phone No.</strong> $rs[phone_no] <br>
	<strong>&nbsp; Mobile No.</strong> $rs[mobile_no]
	</td>
    <td>&nbsp; <strong>Email ID:</strong> $rs[email_id]<br><br>
	<strong>&nbsp; Address:</strong><br>
 	&nbsp; ". ucfirst($rs[address]) . ",<br>
	&nbsp; " .  ucfirst($rs[city]) . ",<br>
	&nbsp; " . ucfirst($rs[state]) . "
	<br>
	</td>
    <td>
	&nbsp; <strong>Created date :</strong> $rs[created_date] <br>
	&nbsp; <strong>Status:</strong> &nbsp;$rs[status]</td>
	<td>";
	echo "&nbsp; <a href='vehicle_request.php?clientid=$rs[client_id]'>Select</a> <br><br>";
  	echo "</tr>";
 }
 ?>
</table>

</p>
        <div class="cleaner"></div>
    
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    

</div> <!-- END of templatemo_wrapper -->
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
 include("footer.php");
 ?>
 