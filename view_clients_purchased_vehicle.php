<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("connection.php");


 include("header.php");
 ?>
    
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
 include("sidebar.php");
 ?>
        </div>
        <div id="content" class="float_r">

        <h1>Vehicle orders     </h1>
        
        <table width="690" border="1" class="tftable" >
        <tr  valign="middle">
        <td width="338" height="38">
        <form method="get" action="">
          <label for="orderid"></label>
          <select name="vehiclestatus" id="vehiclestatus">
            <option value="Select">Select Order status</option>
          <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
				$arr = array("Pending","Approved","Rejected","Blocked");
				foreach($arr as $value)
				{
					if($_GET[vehiclestatus] == $value)
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
          <input type="submit" name="submit2" id="submit2" value="Submit" />
          </form>
        </td>
        <td width="336">
        <form method="get" action="">
        <input type="text" name="orderid" id="orderid" placeholder="Enter Order ID" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_GET[orderid]; ?>"/>
        <input type="submit" name="submit" id="submit" value="Submit" />
       </form>        
        </td>
        </tr>
        </table>
        <br>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.        

					  
if(isset($_GET[submit2]))
{
$qresult = mysqli_query($con,"SELECT     vehicle_order.*, vehicle.*, clients.*, vehicle_company.*
FROM         vehicle_order INNER JOIN
                      vehicle ON vehicle_order.vehicle_id = vehicle.vehicle_id INNER JOIN
                      clients ON vehicle_order.client_id = clients.client_id INNER JOIN
                      vehicle_company ON vehicle.company_id = vehicle_company.company_id where vehicle_order.status='$_GET[vehiclestatus]'");
}
else if(isset($_GET[submit]))
{
$qresult = mysqli_query($con,"SELECT     vehicle_order.*, vehicle.*, clients.*, vehicle_company.*
FROM         vehicle_order INNER JOIN
                      vehicle ON vehicle_order.vehicle_id = vehicle.vehicle_id INNER JOIN
                      clients ON vehicle_order.client_id = clients.client_id INNER JOIN
                      vehicle_company ON vehicle.company_id = vehicle_company.company_id where vehicle_order.order_id='$_GET[orderid]'");
}
else
{
 $qresult = mysqli_query($con,"SELECT     vehicle_order.*, vehicle.*, clients.*, vehicle_company.*
FROM         vehicle_order INNER JOIN
                      vehicle ON vehicle_order.vehicle_id = vehicle.vehicle_id INNER JOIN
                      clients ON vehicle_order.client_id = clients.client_id INNER JOIN
                      vehicle_company ON vehicle.company_id = vehicle_company.company_id where  vehicle_order.status='Null'") ;
}


if(mysqli_num_rows($qresult) == 0)
{
		if( isset($_GET[submit2]) || isset($_GET[submit]) )
		{
			echo "<h2>No records to display.</h2>";
		}
		else
		{
			echo "<h2>Please select Order ID or Order status</h2>";
		}
}
else
{
?>        
<table width="690" border="1" class="tftable" >
  <tr>
  <th width="117" scope="col">Order ID</th>
  <th width="117" scope="col">Buyer details</th>
    <th width="139" scope="col">Vehicle details</th>
    <th width="210" scope="col">Charges</th>
    <th width="134" scope="col">Sold price</th>
    <th width="56" scope="col">Action</th>
    </tr>
 <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		 while($rs = mysqli_fetch_array($qresult))
		 {
			echo " <tr>
			<td align='center'>$rs[order_id]</td>
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
		
			 echo "</td>";
			$totalprice = $rs[price] + $rs[hp] + $rs[extra];
			echo "<td>
			&nbsp; <strong>Price -</strong> Rs. $rs[price]<br />
			&nbsp; <strong>HP -</strong> Rs. $rs[hp]<br />
			&nbsp; <strong>Extra -</strong> Rs. $rs[extra]<br />
			&nbsp; <strong>Total price:  -</strong> Rs. " . $totalprice . "<br />
			&nbsp; <strong>Display price -</strong> <br />
			&nbsp; Rs. $rs[min_price] to  Rs. $rs[max_price]<br />
			</td>";
			echo "<td>$rs[3]</td>";
			echo "<td align='center'>&nbsp;
			<strong>$rs[5]</strong><br>
			  <hr>
			 <a href='view_clients_purchased_vehicle_more.php?order_id=$rs[order_id]'><strong>More</strong></a>
			
			  </td>
		  </tr>";
		 }
 ?>
</table>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
}
?>
 </p>
        <div class="cleaner"></div>
    
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
 include("footer.php");
 ?>