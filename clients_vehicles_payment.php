<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");
?>


<script type="application/javascript">
	function validate()
{
	
	if(document.payment.paid_amount.value == "")
	{
		alert("Please enter the paid amount..");
		document.payment.paid_amount.focus();
		return false;
	}
	else if(document.payment.paiddate.value == "")
	{
		alert("Please select the date..");
		document.payment.paiddate.focus();
		return false;
	}
	
	else
	{
		return true;
	}
}
</script>

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.

$pagename =  basename($_SERVER['PHP_SELF']);
 if(!isset($_SESSION[client_id]))
{
	if(!isset($_SESSION[empid]))
	{
	header("Location: client_login.php?logpage=$pagename");
	}
}
?>
<script type="application/javascript">
 		var x = 0;
        var y = 0;
        var z = 0;
		var tot =0;
        function calc() {
			
				x= Number(document.getElementById('sellingprice2').value);
                y = Number(document.getElementById('paidamount2').value);
				z = Number(document.getElementById('paid_amount').value);

            tot = x -(y + z);
            document.getElementById('balance').value = tot;
        }
  </script>  
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if(isset($_POST[submit]))
{
	
$qvehorder = mysqli_query($con,"UPDATE vehicle_order SET vehicle_cost =  '$_POST[sellingprice2]' WHERE order_id ='$_GET[order_id]'");
	if(mysqli_affected_rows($con) == 1)
	{
?>
	<script type="application/javascript">
			alert("Payable amount updated sucessfully");
	</script>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.	
	}
	
}

if($_SESSION[setid] == $_POST[setid])
{
	
	if(isset($_POST[btnpayment]))
	{
		
		$sql="insert into payment (order_id,date,paid_amount,payment_type,status)
			values('$_GET[order_id]','$_POST[paiddate]','$_POST[paid_amount]','$_POST[payment_type]','Paid')";
			$sqlquery = mysqli_query($con,$sql);
			if(!$sqlquery)
			{
				echo $msg=  "<br><font color='red'>Problem in SQL Query</font>". mysqli_query($sqlquery);
			}
			else
			{
				header("Location: vehicle_payment_billing.php?order_id=$_GET[order_id]&paiddate=$_POST[paiddate]&paid_amount=$_POST[paid_amount]&paymenttype=$_POST[payment_type]");
			}
	}
}

$_SESSION[setid] = rand();

$vehrec = mysqli_query($con,"SELECT * FROM vehicle_order WHERE order_id='$_GET[order_id]'");
$rsvehrec = mysqli_fetch_array($vehrec);

$_SESSION["session"] = rand();

include("header.php");
 ?>
    
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
 include("sidebar.php");
 ?>
        </div>
<div id="content" class="float_r">

<h1>Vehicle order</h1>

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
$qresult = mysqli_query($con,"SELECT     vehicle_order.*, vehicle.*, clients.*, vehicle_company.*
FROM         vehicle_order INNER JOIN
                      vehicle ON vehicle_order.vehicle_id = vehicle.vehicle_id INNER JOIN
                      clients ON vehicle_order.client_id = clients.client_id INNER JOIN
                      vehicle_company ON vehicle.company_id = vehicle_company.company_id where vehicle_order.order_id='$_GET[order_id]'");
	$recs = mysqli_fetch_array($qresult);				  
?>
<form name=payment method="post" enctype="multipart/form-data" onSubmit="return validate()">

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.

    ?>  
        <table width="410" border="1" class="tftable">
          <tr>
            <td width="152" scope="row"><strong>&nbsp;Name: </strong></td>
            <td width="242">&nbsp;<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[first_name]. " ". $recs[last_name]; ?></td>
          </tr>
          <tr>
            <td scope="row"><strong>&nbsp;Email ID: </strong></td>
            <td>&nbsp;<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[email_id]; ?></td>
          </tr>
          <tr>
            <td scope="row"><strong>&nbsp;Mobile No.</strong></td>
            <td>&nbsp;<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[mobile_no]; ?></td>
          </tr>
        </table>
    	<hr />       
<p>

<input type="hidden" name="session" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_SESSION["session"]; ?>" />

<table width="656" border="2"  class="tftable">
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
			//Vehicle name
			$qresultveh_comname = mysqli_query($con,"SELECT * FROM vehicle_company WHERE company_id='$recs[company_id]'");
			$rsvehcomname = mysqli_fetch_array($qresultveh_comname);
			//Vehicle company
			$qresultveh_comp = mysqli_query($con,"SELECT * FROM vehicle_company WHERE company_id='$rsvehcomname[mainid]'");
			$rsvehcomp = mysqli_fetch_array($qresultveh_comp);
?>	
	<tr>
	  <td width="178"><strong>Vehicle type:</strong></td><td width="460">
     <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[vehicle_type];	?>
    </td></tr>
    <tr>
      <td><strong>Vehicle company:</strong></td>
      <td>
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsvehcomp[name];	?>
	</td></tr>
    <tr>
      <td><strong>Vehicle name:</strong></td>
      <td>
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsvehcomname[name];	?>
        </td></tr>
    <tr><td><strong>Vehicle number:</strong></td><td><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[vehicle_number]; ?></td></tr>     
    </table>
<hr />
<table width="656" border="2"  class="tftable">
	
	<tr>
	  <td colspan="3" align="center"><strong>Vehicle payment details</strong></td></tr>
    <tr>
      <td width="178"><div align="center"><strong>Date</strong></div></td>
      <td width="229"><div align="center"><strong>Paid Amount</strong></div></td>
      <td width="229"><div align="center"><strong>Payment type</strong></div></td>
      </tr>
 <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
$qpayments= mysqli_query($con,"SELECT * FROM payment WHERE order_id='$_GET[order_id]'");
while($rspayments = mysqli_fetch_array($qpayments))
{
?>     
<tr>
      <td>&nbsp;<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rspayments[date]; ?> </td>
      <td>&nbsp;Rs. <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rspayments[paid_amount]; ?></td>
      <td>&nbsp;<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rspayments[payment_type]; ?></td>
</tr>    
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
}
?>
    </table>

  
<table width="653" border="1"  class="tftable">
  <tr>
    <td width="355" scope="row"><strong>Total amount</strong></td>
    <td width="282"><label for="sellingprice2"></label>
      <input type="hidden" name="setid" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_SESSION[setid]; ?>" />
      Rs. 
      
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsvehrec[vehicle_cost]; ?></td>
  </tr>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
$paidamt = 0;
$qresultpaidamt = mysqli_query($con,"SELECT SUM(paid_amount) FROM payment WHERE order_id='$_GET[order_id]'");
$rspaidamt = mysqli_fetch_array($qresultpaidamt);
$paidamt = $rspaidamt[0];
?>  
  <tr>
    <td scope="row"><strong>Total Paid Amount</strong></td>
    <td>Rs. <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $paidamt; ?></td>
  </tr>
  <tr>
    <td height="23" scope="row"><strong>Remaining Balance</strong></td>
    <td>Rs. <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rembalance = $rsvehrec[vehicle_cost] - $paidamt; ?></td>
  </tr>
  </table>
<hr />

<p>&nbsp;</p>

</form>
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