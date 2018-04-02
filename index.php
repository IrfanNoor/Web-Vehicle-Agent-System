<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("header.php");

include("connection.php");

$sql = "SELECT * FROM vehicle INNER JOIN images ON vehicle.vehicle_id = images.vehicle_id order by vehicle.vehicle_id desc limit 0,3";
$qresult = mysqli_query($con,$sql);
$i =0;
while($rsfetch = mysqli_fetch_array($qresult))
{
$img[$i] = $rsfetch[image_path];
$vehname[$i] = $rsfetch[vehicle_name];
$vehdesc[$i] = $rsfetch[image_description];
$i++;
}
?>
    <div id="templatemo_middle" class="carousel">
    	<div class="panel">
				
				<div class="details_wrapper">
					
					<div class="details">
					
						<div class="detail">
							<h2><a href="#"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehname[0]; ?></a></h2>
                            <p><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehdesc[0]; ?></p>
							<a href="#" title="Read more" class="more">Read more</a>
						</div><!-- /detail -->
						
						<div class="detail">
							<h2><a href="#"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehname[1]; ?></a></h2>
                            <p><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehdesc[1]; ?></p>
							<a href="#" title="Read more" class="more">Read more</a>
						</div><!-- /detail -->
						
						<div class="detail">
							<h2><a href="#"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehname[2]; ?></a></h2>
                            <p><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehdesc[2]; ?></p>
							<a href="#" title="Read more" class="more">Read more</a>
						</div><!-- /detail -->
						
					</div><!-- /details -->
					
				</div><!-- /details_wrapper -->
				
				<div class="paging">
					<div id="numbers"></div>
					<a href="javascript:void(0);" class="previous" title="Previous" >Previous</a>
					<a href="javascript:void(0);" class="next" title="Next">Next</a>
				</div><!-- /paging -->
				
				<a href="javascript:void(0);" class="play" title="Turn on autoplay">Play</a>
				<a href="javascript:void(0);" class="pause" title="Turn off autoplay">Pause</a>
				
			</div><!-- /panel -->
	
			<div class="backgrounds">
				
				<div class="item item_1">
					<img src="images/slider/Backup_of_godwin.jpg" height="340" width="660" alt="Slider 01"  />
				</div><!-- /item -->
				
				<div class="item item_2">
					<img  src="images/slider/Backup_of_godwin.jpg" height="340" width="660" alt="Slider 02" />
				</div><!-- /item -->
				
				<div class="item item_3">
					<img  src="images/slider/Backup_of_godwin.jpg" height="340" width="660" alt="Slider 03"  />
				</div><!-- /item -->
				
			</div><!-- /backgrounds -->
    </div> <!-- END of templatemo_middle -->
    
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		include("sidebar.php");
		?>
        </div>
        <div id="content" class="float_r">
        	<h1>New Vehicles</h1>
            <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
            $sqla = "SELECT     vehicle.*, vehicle_order.*, vehicle.status AS Expr1 FROM         vehicle LEFT OUTER JOIN                       vehicle_order ON vehicle.vehicle_id = vehicle_order.vehicle_id WHERE     (vehicle.status = 'Approved') ";
				$qresulta = mysqli_query($con,$sqla);
				$i =0;
				while($rsfetch = mysqli_fetch_array($qresulta))
				{

					if($rsfetch[20] != "Blocked" && $rsfetch[20] != "Approved" && $rsfetch[20] != "Hide")
					{
							
						//Code to retrieve image
						$sqla1 = "SELECT * FROM images where status='Enabled' AND vehicle_id='$rsfetch[0]'";
						$qresulta1 = mysqli_query($con,$sqla1);
						$rsfetch1 = mysqli_fetch_array($qresulta1);
	
					//Code to retrieve Vehicle name
					$sqla2 = "SELECT * FROM vehicle_company where company_id='$rsfetch[company_id]' ";
					$qresulta2 = mysqli_query($con,$sqla2);
					$rsfetch2 = mysqli_fetch_array($qresulta2);
			?>

                <div class="product_box 
                    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
                    if($i==2)
                    {
                        echo " no_margin_right";
                    }
                    ?>
                  " >
                  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
				  if(mysqli_num_rows($qresulta1) == 0)
				  {
				  ?>
    					<a href="vehicledetail.html?vehid=<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetch[0]; ?>"><img src="images/imagenotavailable.png" width="200" height="150" /></a>
                  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
				  }
				  else
				  {			
				  ?>
                       <a href="vehicledetail.html?vehid=<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetch[0]; ?>"><img src="uploads/<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetch1[image_path]; ?>" width="200" height="150" /></a>       
                  <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
				  }
				  ?>
                    <p class="product_price"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetch2[name]; ?></p>
                    <p><strong>Price : Rs. <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetch[min_price] . " to " . $rsfetch[max_price]; ?></strong></p>
                    <a href="purchasevehicleform.php?vehid=<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetch[0]; ?>" class="add_to_card">Buy vehicle</a>
                    <a href="vehicledetail.php?vehid=<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetch[0]; ?>" class="detail">Detail</a>
                    
                    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
                    if($i==2)
                    {
                       $i=0;
                    }
                    else
                    {
                        $i++;					
                    }
					?>
                </div>   
               <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
					}
				}
               ?>

        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
   <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. include("footer.php");
   ?>