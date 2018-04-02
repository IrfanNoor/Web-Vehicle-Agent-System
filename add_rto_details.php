<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");
?>
<script type="application/javascript">
	var agentcost = 0;
	var transfercost = 0;
	var officecharge = 0;
	var bextract = 0;
	var insurance = 0;
	var extra = 0;
	var tot =0;
	function calc(obj) {
				var agentcost = document.payment.agent_cost.value;
				var transfercost = document.payment.transfer_cost.value;
				var officecharge = document.payment.office_charge.value;
				var bextract = document.payment.B_extract.value;
				var insurance = document.payment.Insurance.value;
				var extra = document.payment.Extra.value;
				tot = parseFloat(agentcost) + parseFloat(transfercost) + parseFloat(officecharge) + parseFloat(bextract) + parseFloat(insurance) + parseFloat(extra) ;
				//tot = parseFloat(agentcost) + parseFloat(transfercost) ;
				 document.payment.total.value = tot;
				
	}
</script>
    
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if($_POST[session] == $_SESSION[session])
{
	if(isset($_POST[submit]))
	{	
		if(isset($_GET[editid]))	
		{
			$sql ="UPDATE rto SET `agent_name`='$_POST[agent_name]' ,`agent_contact_no`='$_POST[agent_contact_no]' ,`date`='$_POST[date]' ,`agent_cost`='$_POST[agent_cost]' ,`transfer_cost`='$_POST[transfer_cost]' ,`office_charge`='$_POST[office_charge]' ,`b_extract`='$_POST[B_extract]' ,`insurance`='$_POST[Insurance]' ,`extra`='$_POST[Extra]' ,`status`='$_POST[status]' where rto_id='$_GET[editid]'";
						if(!mysqli_query($con,$sql))
						{
							echo mysqli_error($con);
						}	
						else
						{
						?>
							<script type="application/javascript">
								alert("RTO details updated successfully");
								window.location = "add_rto_details.php?order_id=<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_GET[order_id]; ?>";
							</script>
						<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.		
						}
		}
		else
		{
			$sql="INSERT INTO  rto (`order_id` ,`agent_name` ,`agent_contact_no` ,`date` ,`agent_cost` ,`transfer_cost` ,`office_charge` ,`b_extract` ,`insurance` ,`extra` ,`status`)VALUES (
'$_POST[order_id]',  '$_POST[agent_name]',  '$_POST[agent_contact_no]',  '$_POST[date]',  '$_POST[agent_cost]',  '$_POST[transfer_cost]',  '$_POST[office_charge]',  '$_POST[B_extract]',  '$_POST[Insurance]',  '$_POST[Extra]',  '$_POST[status]'
)";
		if(!mysqli_query($con,$sql))
		{
			echo mysqli_error($con);
		}	
		else
		{
		?>
        	<script type="application/javascript">
				alert("RTO details inserted successfully");
			</script>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.		
		}
		}
	}
}


$qrto = mysqli_query($con,"SELECT * FROM rto WHERE order_id='$_GET[order_id]'");
$rsrto = mysqli_fetch_array($qrto);

$sqledit = mysqli_query($con,"SELECT * FROM vehicle WHERE vehicle_id = '$_GET[editid]'");
			$recs = mysqli_fetch_array($sqledit);

$sqledit = mysqli_query($con,"SELECT * FROM vehicle WHERE vehicle_id = '$_GET[viewid]'");
			$recs = mysqli_fetch_array($sqledit);

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

<h2>Client details</h2>

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
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
//if(isset($_GET[viewid]))
{
?>

<p>
<table width="656" border="2" class="tftable">
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
			//Vehicle name
			$qresultveh_comname = mysqli_query($con,"SELECT * FROM vehicle_company WHERE company_id='$recs[company_id]'");
			$rsvehcomname = mysqli_fetch_array($qresultveh_comname);
			//Vehicle company
			$qresultveh_comp = mysqli_query($con,"SELECT * FROM vehicle_company WHERE company_id='$rsvehcomname[mainid]'");
			$rsvehcomp = mysqli_fetch_array($qresultveh_comp);
?>
	<tr>
	  <td width="261"><strong>Vehicle type:</strong></td><td width="403">
     <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[vehicle_type];	?>
    </td></tr>
    <tr>
      <td><strong>Vehicle company:</strong></td>
      <td>
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
	  echo $rsvehcomp[name];	?>
	</td></tr>
    <tr>
      <td><strong>Vehicle name:</strong></td>
      <td>
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsvehcomname[name];	?>
        </td></tr>
    <tr><td><strong>Vehicle number:</strong></td><td><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[vehicle_number]; ?></td></tr>
    <tr>
      <td><strong>Vehicle used status:</strong></td>
      <td> <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $recs[vehicle_used_status]; ?>
      </td></tr>
    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if(isset($_SESSION[empid]))
{
?>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
}
?>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if($recs[status] == "Pending")
{
?>    
    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		}
?>    
    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		}
	?>
    </table>



<p>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
$_SESSION["session"] = rand();
?>
<form name=rtodetails method="post" enctype="multipart/form-data">  
  <input type="hidden" name="session" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_SESSION["session"]; ?>" />
   <input type="hidden" name="order_id" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_GET[order_id]; ?>" />
<table width="656" border="2" class="tftable">

    <tr>
	<td colspan="2" align="center">&nbsp; <strong>Add rto details</strong></td>
</tr>
	<tr>
	  <td width="178"><strong>Agent name:</strong><font color='red'> *</font></td>
      <td width="460">
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  if(mysqli_num_rows($qrto) == 1 && !isset($_GET[editid]) )
	  {
  ?>
     <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[agent_name]; ?>
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
	  else if(isset($_GET[editid]) || mysqli_num_rows($rsrto) == 0)
	  {
   ?>		  
	<input type="text" name="agent_name" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[agent_name]; ?>" />
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
  ?>
    </td></tr>
    <tr>
      <td><strong>Agent contact no:</strong> <font color='red'>*</font></td>
      <td>
       <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  if(mysqli_num_rows($qrto) == 1 && !isset($_GET[editid]) )
	  {
  ?>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[agent_contact_no]; ?>
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
	  else if(isset($_GET[editid]) || mysqli_num_rows($rsrto) == 0)
	  {
   ?>		  
<input type="text" name="agent_contact_no"  value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[agent_contact_no]; ?>" />
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
  ?> 
       
      
	  </td></tr>
    <tr>
      <td><strong>Date:</strong><font color='red'> *</font></td>
      <td>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  if(mysqli_num_rows($qrto) == 1 && !isset($_GET[editid]) )
	  {
  ?>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[date]; ?>   
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
	  else if(isset($_GET[editid]) || mysqli_num_rows($rsrto) == 0)
	  {
   ?>		  
        <input type="date" name="date"  value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[date]; ?>" />
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
  ?>

  
        </td></tr>   
    <tr>
      <td><strong>Agent cost</strong></td><td>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  if(mysqli_num_rows($qrto) == 1 && !isset($_GET[editid]) )
	  {
  ?>
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[agent_cost]; ?>
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
	  else if(isset($_GET[editid]) || mysqli_num_rows($rsrto) == 0)
	  {
   ?>		  
      <input type="text" name="agent_cost"  value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[agent_cost]; ?>"   onkeyup="calc(this)" />
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
  ?>


      </td></tr>
    <tr>
      <td><strong>Transfer cost:</strong></td><td>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  if(mysqli_num_rows($qrto) == 1 && !isset($_GET[editid]) )
	  {
  ?>
       <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[transfer_cost]; ?>
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
	  else if(isset($_GET[editid]) || mysqli_num_rows($rsrto) == 0)
	  {
   ?>		  
      <input type="text" name="transfer_cost"  value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[transfer_cost]; ?>"   onkeyup="calc(this)" />
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
  ?>

	</td></tr>
    <tr>
      <td><strong>Office charge: </strong></td><td>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  if(mysqli_num_rows($qrto) == 1 && !isset($_GET[editid]) )
	  {
  ?>
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[office_charge]; ?>
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
	  else if(isset($_GET[editid]) || mysqli_num_rows($rsrto) == 0)
	  {
   ?>		  
      <input type="text" name="office_charge"  value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[office_charge]; ?>"    onkeyup="calc(this)" />
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
  ?>


      </td></tr>
    <tr>
      <td><strong>B_extract:</strong></td><td>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  if(mysqli_num_rows($qrto) == 1 && !isset($_GET[editid]) )
	  {
  ?>
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[b_extract]; ?>
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
	  else if(isset($_GET[editid]) || mysqli_num_rows($rsrto) == 0)
	  {
   ?>		  
      <input type="text" name="B_extract"  value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[b_extract]; ?>"   onkeyup="calc(this)" />
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
  ?>


      </td></tr>
    
    <tr>
      <td><strong>Insurance:</strong></td><td>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  if(mysqli_num_rows($qrto) == 1 && !isset($_GET[editid]) )
	  {
  ?>
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[insurance]; ?>
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
	  else if(isset($_GET[editid]) || mysqli_num_rows($rsrto) == 0)
	  {
   ?>		  
      <input type="text" name="Insurance"  value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[insurance]; ?>"    onkeyup="calc(this)"/>
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
  ?>


      </td></tr>
    <tr>
      <td><strong>Extra: </strong></td><td>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  if(mysqli_num_rows($qrto) == 1 && !isset($_GET[editid]) )
	  {
  ?>
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[extra]; ?>
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
	  else if(isset($_GET[editid]) || mysqli_num_rows($rsrto) == 0)
	  {
   ?>		  
 <input type="text" name="Extra"  value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[extra]; ?>"    onkeyup="calc(this)"/>
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
  ?>
     
   </td></tr>
       <tr>
      <td><strong>Total </strong></td>
      <td>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  if(mysqli_num_rows($qrto) == 1 && !isset($_GET[editid]) )
	  {
  ?>
      <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[agent_cost]+ $rsrto[transfer_cost] + $rsrto[office_charge] + $rsrto[b_extract] + $rsrto[insurance]+ $rsrto[extra]; ?>
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
	  else if(isset($_GET[editid]) || mysqli_num_rows($rsrto) == 0)
	  {
   ?>		  
<input name="total" type="text"  value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[agent_cost]+ $rsrto[transfer_cost] + $rsrto[office_charge] + $rsrto[b_extract] + $rsrto[insurance]+ $rsrto[extra]; ?>" readonly="readonly" />
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
  ?>
      
     
      </td></tr>  
<tr><td> <strong>Status:</strong></td><td>
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  if(mysqli_num_rows($qrto) == 1 && !isset($_GET[editid]) )
	  {
  ?>
     <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[status]; ?>
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
	  else if(isset($_GET[editid]) || mysqli_num_rows($rsrto) == 0)
	  {
   ?>		  
	<select name="status" id="status">
		<option value="">Select</option>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		$array = array("Pending","Cleared");
		foreach($array as $value)
		{
			if($rsrto[status] == $value )
			{
				echo "<option value='$value' selected>$value</option>";	
			}
			else
			{
				echo "<option value='$value'>$value</option>";
			}
		}
		?>
    </select>
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
  ?>
        
    
            </td></tr>

    <tr><td colspan="2" align=center><strong>
     <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  if(mysqli_num_rows($qrto) == 1 && !isset($_GET[editid]) )
	  {
  ?>
  <a href='add_rto_details.php?order_id=<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_GET[order_id]; ?>&editid=<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsrto[rto_id]; ?>'><strong>Edit</strong><a/>
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
	  else if(isset($_GET[editid]) || mysqli_num_rows($rsrto) == 0)
	  {
   ?>		  
  <input type="submit" name="submit" value="Submit"   />
  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	  }
  ?>
    
      
    </strong></td></tr>
   
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