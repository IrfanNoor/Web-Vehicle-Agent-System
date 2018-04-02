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
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
			if(isset($_GET[compid]))
			{
			$sqla = "SELECT * FROM vehicle INNER JOIN vehicle_company ON `vehicle`.`vehicle_id` = vehicle_company.company_id where vehicle.status='Approved' and vehicle_company.company_id='$_GET[compid]'";
			}
			else if(isset($_GET[Vehtype]))
			{
				$sqla = "SELECT * FROM vehicle where status='Approved' AND vehicle_type='$_GET[Vehtype]'";
			}
			else if(isset($_GET[sVehtype]))
			{
				$sqla = "SELECT * FROM vehicle INNER JOIN vehicle_company ON vehicle.company_id = vehicle_company.company_id where vehicle.status='Approved' and vehicle_company.name like '$_GET[sVehtype]%'";
			}
			else
			{
            $sqla = "SELECT * FROM vehicle where status='Approved'";
			}
			$qresulta = mysqli_query($con,$sqla);
		if(mysqli_num_rows($qresulta) == 0 )
		{
		?>
             <h1>No vehicles found</h1>       	
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		}
		else
		{
		?>
            <h1>New Vehicles</h1>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		}
		?>
            <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.


			
				
				$i =0;
				while($rsfetch = mysqli_fetch_array($qresulta))
				{
		$sqla1 = "SELECT * from vehicle_order WHERE (vehicle_id = '$rsfetch[vehicle_id]') and (status = 'Approved'  || status = 'Hide' ||status = 'Blocked'  )";
					$qresulta1 = mysqli_query($con,$sqla1);
					if(mysqli_num_rows($qresulta1) == 0)
					{
						//Code to retrieve image
				$sqla1 = "SELECT * FROM images where status='Enabled' AND vehicle_id='$rsfetch[vehicle_id]'";
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
                    <a href="purchasevehicleform.php?vehid=<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsfetch[0]; ?>" class="add_to_card"><strong>Purchase vehicle</strong></a>
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
   <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
   include("footer.php");
   ?>