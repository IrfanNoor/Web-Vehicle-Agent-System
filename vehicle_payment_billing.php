<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");

$pagename =  basename($_SERVER['PHP_SELF']);
 if(!isset($_SESSION[client_id]))
{
	if(!isset($_SESSION[empid]))
	{
	header("Location: client_login.php?logpage=$pagename");
	}
}
?>
<script language="javascript">
function PrintMe(DivID) {
var disp_setting="toolbar=yes,location=no,";
disp_setting+="directories=yes,menubar=yes,";
disp_setting+="scrollbars=yes,width=650, height=600, left=100, top=25";
   var content_vlue = document.getElementById(DivID).innerHTML;
   var docprint=window.open("","",disp_setting);
   docprint.document.open();
   docprint.document.write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"');
   docprint.document.write('"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">');
   docprint.document.write('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">');
   docprint.document.write('<head><title>Vehicle Billing</title>');
   docprint.document.write('<style type="text/css">body{ margin:0px;');
   docprint.document.write('font-family:verdana,Arial;color:#000;');
   docprint.document.write('font-family:Verdana, Geneva, sans-serif; font-size:12px;}');
   docprint.document.write('a{color:#000;text-decoration:none;} </style>');
   docprint.document.write('</head><body onLoad="self.print()"><center>');
   docprint.document.write(content_vlue);
   docprint.document.write('</center></body></html>');
   docprint.document.close();
   docprint.focus();
}
</script>
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

<h1>Vehicle Billing</h1>

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
$qresult = mysqli_query($con,"SELECT     vehicle_order.*, vehicle.*, clients.*, vehicle_company.*
FROM         vehicle_order INNER JOIN
                      vehicle ON vehicle_order.vehicle_id = vehicle.vehicle_id INNER JOIN
                      clients ON vehicle_order.client_id = clients.client_id INNER JOIN
                      vehicle_company ON vehicle.company_id = vehicle_company.company_id where vehicle_order.order_id='$_GET[order_id]'");
	$recs = mysqli_fetch_array($qresult);				  
?>
<form name=vehicles method="post" enctype="multipart/form-data">

<div id="divid"> 
        <table width="654" border="1" class="tftable">
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
  
<table width="653" border="1"  class="tftable">
  <tr>
    <td colspan="2" scope="row" align="center"><strong>Payment details</strong></td>
  </tr>
  <tr>
    <td width="183" scope="row"><strong>Payable amount</strong></td>
    <td width="454"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsvehrec[vehicle_cost]; ?></td>
  </tr>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
$paidamt = 0;
$qresultpaidamt = mysqli_query($con,"SELECT SUM(paid_amount) FROM payment WHERE order_id='$_GET[order_id]'");
$rspaidamt = mysqli_fetch_array($qresultpaidamt);
$paidamt = $rspaidamt[0];
?>  
    <td scope="row"><strong>Paid Amount</strong></td>
    <td><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_GET[paid_amount]; ?></td>
  </tr>
  <tr>
    <td scope="row"><strong>Remaining Balance</strong></td>
    <td><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rembalance = $rsvehrec[vehicle_cost] - $paidamt; ?></td>
  </tr>
  <tr>
    <td scope="row"><strong>Payment type</strong></td>
    <td>
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
			echo $_GET[paymenttype];
	?>
</td>
  </tr>
  <tr>
    <td width="183" scope="row"><strong>Date</strong></td>
    <td width="454">      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
			echo $_GET[paiddate];
	?></td>
  </tr>


  <tr>
    <td colspan="2" scope="row" align="center">

</td>
  </tr>
  <tr>
    <td colspan="2" scope="row" align="center">


    </td>
  </tr>
</table>
</div>
    <input type="button" name="btnprint" value="Print" onclick="PrintMe('divid')"/>
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