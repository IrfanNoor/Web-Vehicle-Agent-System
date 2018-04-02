<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
session_start();
 include("header.php");
 include("fancybox.php");
 include("connection.php");

?>
    
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
 include("sidebar.php");
            
				$sqla = "SELECT * FROM vehicle where vehicle_id='$_GET[vehid]'";
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
					
					
 ?>        </div>
      <div id="content" class="float_r">
        	
            <h1><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetch2[name]; ?></h1>

<h2>Vehicle Images</h2>
            <p>
   				<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
   					//Code to retrieve image
					$sqla1 = "SELECT * FROM images where status='Enabled' AND vehicle_id='$rsfetch[vehicle_id]'";
					$qresulta1 = mysqli_query($con,$sqla1);
					while($rsfetch1 = mysqli_fetch_array($qresulta1))
					{
						?>
                        <a  class="fancybox fancybox.iframe"  href="fancyimage.php?imgid=<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetch1[image_id] ; ?>">
                        <img src="uploads/<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetch1[image_path] ; ?>" alt="Image 01" width="157" height="95" /></a>
                        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
					}
   				?>
            </p>	
            
            <div class="cleaner h30"></div>
            
            <h3>Vehicle Details</h3>
            <p>
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
        
            </p>	
            
          <h3>Vehicle Description</h3>
        <table class="tftable" width="447" border="2" >
        <tr>
        	<td height="23" colspan="2" align="left" valign="top">&nbsp;<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetch[vehicle_description]; ?></td>
          </tr>
        </table>     
            </p>	

       

       <table width="117" border="0" align="center" >
        <tr>
        	<td height="23" colspan="2" align="left" valign="top">
           <div class="product_box" > <a href="purchasevehicleform.php?vehid=<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetch[vehicle_id]; ?>" class="add_to_card"><strong>Purchase vehicle</strong></a></div>
            </td>
            </tr>
            </table>


          <div class="cleaner h50"></div>
      </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
 <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
 include("footer.php");
 ?>