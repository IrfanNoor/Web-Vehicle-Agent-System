<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");

if($_SESSION[setid] == $_POST[setid])
{
	if(isset($_POST[btnpayment]))
	{
		
			$sql="insert into payment (vehicle_type,vehicle_company,vehicle_name,paid_amount,payment_type,status)
			values('$_POST[vehicle_type]','$_POST[vehicle_company]','$_POST[vehicle_name]','$_POST[paid_amount]','$_POST[payment_type]','$_POST[status]')";
			$sqlquery = mysqli_query($con,$sql);
			if(!$sqlquery)
			{
				$msg=  "<br><font color='red'>Problem in SQL Query</font>";
			}
			else
			{
				$msg= "<br><font color='green'>Values inserted</font>";
			}
	}
}

$_SESSION[setid] = rand();

if(isset($_GET[editid]))
{
$sqledit = mysqli_query($con,"SELECT * FROM payment WHERE payment_id = '$_GET[editid]'");
$rec = mysqli_fetch_array($sqledit);
}
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
<form name=clients method="post" action="">
<input type="hidden" name="setid" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_SESSION[setid]; ?>" />
<table width="348" height="232" border="1" class="tstable">
  <tr>
    <td width="143">&nbsp; Vehicle Type:</td>
    <td width="189"><select name=vehicle_type id=vehicle_type>
        	<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
				$arr=array("Select","2 wheeler","4 wheeler");
				foreach($arr as $value)
				{
					if($value == $rec[vehicle_type])
					{
						echo "<option value='$value' selected>$value</option>";
					}
					else
					{
						echo "<option value='$value'>$value</option>";
					}
				}
			?>
        </select></td>
  </tr>
  <tr>
    <td>&nbsp;Vehicle company:</td>
    <td>&nbsp;  <input type="text" name=vehicle_company id="vehicle_company" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[vehicle_company]; ?>" /></td>
  </tr>
  <tr>
    <td>&nbsp; Vehicle name:</td>
    <td>&nbsp; <input type="text" name=vehicle_name id="vehicle_name" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[vehicle_name]; ?>"/></td>
  </tr>
  <tr>
    <td>&nbsp; Paid amount:</td>
    <td>&nbsp; <input type="text" name=paid_amount id="paid_amount" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[paid_amount]; ?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;  Payment type:</td>
    <td>&nbsp; <input type="text" name="payment_type" id="payment_type" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[payment_type]; ?>" />  </td>
  </tr>
  <tr>
    <td>&nbsp; Status:</td>
    <td>&nbsp; <input type="text" name=status id="status" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[status]; ?>" /></td>
  </tr>
  <tr>
  	<td colspan="2" align="center">   <input name=btnpayment type="submit" id="btnpayment" value=submit /></td>
  </tr>
</table>
</form>

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