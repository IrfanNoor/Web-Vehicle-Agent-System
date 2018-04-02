<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
session_start();
 if(!isset($_SESSION[client_id]))
 {
	 header("location: client_login.php");
 }
 include("header.php");
 include("connection.php");
 
  if(isset($_POST[submit]))
	{
		
		$sql= mysqli_query($con,"UPDATE clients set first_name='$_POST[first_name]',last_name='$_POST[last_name]',email_id='$_POST[email_id]',address='$_POST[address]',city='$_POST[city]',state='$_POST[state]',phone_no='$_POST[phone_no]',mobile_no='$_POST[mobile_no]' where client_id='$_SESSION[client_id]'");
		if(mysqli_affected_rows($con) == 1)
		{
			$msg= "<br><font color='green'>Profile Records Updated</font>";
		}
		else
		{
			$msg=  "<br><font color='red'>No records to update...</font>".mysqli_error($con);
		}
	}
 ?>
    
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
 include("sidebar.php");
 ?>
        </div>
        <div id="content" class="float_r">
        <h1>Profile details</h1>
        <h2><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $msg; ?></h2>
 <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.      
	$sqledit = mysqli_query($con,"SELECT * FROM clients WHERE client_id = '$_SESSION[client_id]'");
$rec = mysqli_fetch_array($sqledit);
?>

 <form method="post" action="" class="tftable">
     <table width="533" height="299" border="1">

      <tr>
        <th width="204" height="35" >&nbsp; First name:</th>
        <td width="313">&nbsp; <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[first_name]; ?></td>
      </tr>
      <tr>
        <th height="38" scope="row">&nbsp; Last name:</th>
        <td>&nbsp; <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[last_name]; ?></td>
      </tr>
      <tr>
        <th height="36" scope="row">&nbsp; Email ID</th>
        <td>&nbsp; <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[email_id]; ?></td>
      </tr>
      <tr>
        <th height="38" scope="row">&nbsp; Address:</th>
        <td>&nbsp; <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[address]; ?></td>
      </tr>
      <tr>
        <th height="34" scope="row">&nbsp; City:</th>
        <td>&nbsp; <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[city]; ?></td>
      </tr>
      <tr>
        <th height="30" scope="row">&nbsp; State:</th>
        <td>&nbsp;

            <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		 echo $rec[state];
		 ?>
        </td>
      </tr>
      <tr>
        <th height="32" scope="row">&nbsp; Phone no:</th>
        <td>&nbsp; <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[phone_no]; ?></td>
      </tr>
      <tr>
        <th height="33" scope="row">&nbsp; Mobile no:</th>
        <td>&nbsp; <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[mobile_no]; ?></td>
      </tr>
        <tr>
       
        <td colspan="2" align="center"><a href="editprofile.php"> <strong>Edit Profile...</strong></td>
      </tr>
      
     </table>

 </form>

        <div class="cleaner h20"></div>
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