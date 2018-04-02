<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();

$pagename =  basename($_SERVER['PHP_SELF']);
if(isset($_GET[vehid]))
{
$_SESSION[vehid] =$_GET[vehid];
}
if(!isset($_SESSION[client_id]))
{
	
	header("Location: client_login.php?logpage=$pagename");
}
include("header.php");
include("connection.php");


$sqlclient = "SELECT * FROM clients where client_id='$_SESSION[client_id]' ";
$qresultclient = mysqli_query($con,$sqlclient);
$rsfetchclient = mysqli_fetch_array($qresultclient);

				$sqla = "SELECT * FROM vehicle where vehicle_id='$_SESSION[vehid]'";
				$qresulta = mysqli_query($con,$sqla);
				$rsfetch = mysqli_fetch_array($qresulta);
				


					//Code to retrieve Vehicle name
					$sqla2 = "SELECT * FROM vehicle_company where company_id='$rsfetch[company_id]' ";
					$qresulta2 = mysqli_query($con,$sqla2);
					$rsfetch2 = mysqli_fetch_array($qresulta2);
					
					//Code to retrieve Vehicle company
					$sqla3 = "SELECT * FROM vehicle_company where company_id='$rsfetch2[mainid]' ";
					$qresulta3 = mysqli_query($con,$sqla3);
					$rsfetch3 = mysqli_fetch_array($qresulta3);
					

?>
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
        	 <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		include("sidebar.php");
		?>
   		</div>
        <div id="content" class="float_r">
        
        <h1 align="center">Vehicle order Form</h1>

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if(isset($_GET[confirm]))
{
	$sqlcheck = "SELECT * FROM vehicle_order where vehicle_id='$_SESSION[vehid]' AND client_id='$_SESSION[client_id]'";
	$qresultcheck = mysqli_query($con,$sqlcheck);
	$rsfetchcheck = mysqli_fetch_array($qresultcheck);
	
	if(mysqli_num_rows($qresultcheck) == 0)
	{
	$sql=mysqli_query($con,"insert into vehicle_order (vehicle_id,client_id,status)values('$_SESSION[vehid]','$_SESSION[client_id]','Pending')");
	}

			if(mysqli_insert_id($con) !=0)
			{
			echo "<table class='tftable' width='447' height='197' border='2' >
				<tr>
					<td>";
			?>
							<script>
						alert("Your Vehicle order ID is : <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo mysqli_insert_id($con); ?> ");
						</script>
			<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
			echo "<h2>Thanks for sending vehicle order request</h2>";
			echo "<h2>Your Vehicle order ID is : ". mysqli_insert_id($con) . "</h2> ";	
			echo "<h2>Please wait for the admin to contact you..</h2>";
			echo "</td>
				</tr>
			</table>";
			unset($_SESSION[vehid]);
			}
			else
			{
				?>
						<script>
						alert("Sorry your vehicle order could not be processed..");
						</script>
				<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
					echo "<table class='tftable' width='447' height='197' border='2' >
					<tr>
					<td>";
					echo "<h2>You have already sent request for the vehicle  order.. <br><br> Please wait for the admin to contact you..</h2>";	
					echo "
					</td>
					</tr>
					</table>";
			}

}
else
{
?>
     <hr>   
 <h2>Client details:</h2>        
   <table class="tftable" width="447" height="197" border="2" >
        <tr>
        	<td width="140"><strong>Name:</strong></td>
            <td width="289"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo ucfirst($rsfetchclient[first_name]). " ".  ucfirst($rsfetchclient[last_name]) ; ?> </td>
        </tr>
        <tr>
            <td><strong>Address:</strong></td>
            <td><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetchclient[address]; ?> <br>
City: <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetchclient[city]; ?> <br>
State:  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetchclient[state]; ?> 
  </td>
        </tr> 
        <tr> 
            <td><strong>Contact No.:</strong></td>
            <td>Phone No - <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetchclient[phone_no]; ?> <br>
            	Mobile No - <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetchclient[mobile_no]; ?> 
          </td>
        </tr> 
        <tr>
            <td><strong>Email ID:</strong></td>
            <td><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetchclient[email_id]; ?>   </td>
        </tr>
    </table>       
<hr>


<h2>Vehicle details:</h2>
   <table class="tftable" width="447" height="197" border="2" >
        <tr>
        	<td width="140"><strong>Vehicle Name:</strong></td>
            <td width="289"> &nbsp; <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetch2[name]; ?> </td>
        </tr>
        <tr>
            <td><strong>Vehicle Company:</strong></td>
            <td>&nbsp; <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetch3[name]; ?>   </td>
        </tr> 
        <tr> 
            <td><strong>Model:</strong></td>
            <td>&nbsp; <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetch[model]; ?>   </td>
        </tr> 
        <tr>
            <td><strong>km status</strong></td>
            <td>&nbsp; <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetch[km_status]; ?>   </td>
        </tr>
        <tr>
            <td><strong>Used Status:</strong></td>
            <td>&nbsp; <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetch[vehicle_used_status] ; ?>  </td>
        </tr>
        <tr>
            <td><strong>Price:</strong></td>
            <td>&nbsp; <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo " Rs. ". $rsfetch[min_price] ." -  Rs. ". $rsfetch[max_price]; ?>   </td>
        </tr>
    </table>   
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
$_SESSION[setid] = rand();
?>     
<br>
           <table width="200" border="0" align="center" >
        <tr>
        	<td height="23" colspan="2" align="left" valign="top">
           <div class="product_box" > <a href="purchasevehicleform.php?confirm=<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_SESSION[setid]; ?>" class="add_to_card1"><strong>Confirm to Purchase vehicle</strong></a></div>
            </td>
            </tr>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
}
?>
          </table>   
            
      </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
 <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
 include("footer.php");
 ?>