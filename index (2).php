<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
include("header.php");

include("connection.php");

$sql = "SELECT * FROM vehicle INNER JOIN images ON vehicle.vehicle_id = images.vehicle_id order by vehicle.vehicle_id desc limit 0,9";
				$qresult = mysqli_query($con,$sql);
				$i =0;
				while($rsfetch = mysqli_fetch_array($qresult))
				{
				$img[$i] = $rsfetch[image_path];
				$vehname[$i] = $rsfetch[vehicle_name];
				$vehminprice[$i] = $rsfetch[min_price];
				$vehmaxprice[$i] = $rsfetch[max_price];
				$i++;
				}
 
?>
    <div id="templatemo_middle" class="carousel">
    	<div class="panel">
				
				<div class="details_wrapper">
					
					<div class="details">
					
						<div class="detail">
							
							<a href="#" title="Read more" class="more">Read more</a>
						</div><!-- /detail -->
						
						<div class="detail">
							
							<a href="#" title="Read more" class="more">Read more</a>
						</div><!-- /detail -->
						
						<div class="detail">
							
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
					
				</div><!-- /item -->
				
				<div class="item item_2">
					
				</div><!-- /item -->
				
				<div class="item item_3">
					
				</div><!-- /item -->
				
			</div><!-- /backgrounds -->
    </div> <!-- END of templatemo_middle -->
    
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. include("sidebar.php");
		?>
        </div>
        
        <div id="content" class="float_r">
        	<h1>Vehicles</h1>
		    <div class="vehicle">
            
            
			<div class="vehicle">
                <a href="productdetail.html"><img  src="uploads/<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $img[0]; ?>" alt="Image 01" height="200" width="150" /></a>
                <h2><a href="#"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehname[0]; ?></a></h2>
                <p class="vehicle price"></p> Rs.<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehminprice[0]; ?> . to Rs. <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehmaxprice[0]; ?>
                <a href="shoppingcart.html" class="add_to_card">Add to Cart</a>
                <a href="productdetail.html" class="detail">Detail</a>
            </div> 
            
            <div class="vehicle">
                <a href="productdetail.html"><img  src="uploads/<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $img[1]; ?>" alt="Image 02" height="200" width="150" /></a>
                <h2><a href="#"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehname[1]; ?></a></h2>
                <p class="vehicle price"> Rs.<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehminprice[1]; ?> to Rs. <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehmaxprice[1]; ?>< ?></p>
                <a href="shoppingcart.html" class="add_to_card">Add to Cart</a>
                <a href="productdetail.html" class="detail">Detail</a>
            </div> 
            
            <div class="vehicle">
                <a href="productdetail.html"><img  src="uploads/<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $img[2]; ?>" alt="Image 03" /></a>
                <h2><a href="#"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehname[2]; ?></a></h2>
                <p class="vehicle price"> Rs.<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehminprice[2]; ?> to Rs. <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehmaxprice[2]; ?>< ?></p>
                <a href="shoppingcart.html" class="add_to_card">Add to Cart</a>
                <a href="productdetail.html" class="detail">Detail</a>
            </div> 
            
            <div class="vehicle">
                <a href="productdetail.html"><img  src="uploads/<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $img[3]; ?>" alt="Image 04" /></a>
                <h2><a href="#"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehname[3]; ?></a></h2>
                <p class="vehicle price"> Rs.<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehminprice[3]; ?> to Rs. <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehmaxprice[3]; ?>< ?></p>
                <a href="shoppingcart.html" class="add_to_card">Add to Cart</a>
                <a href="productdetail.html" class="detail">Detail</a>
            </div> 
            
            <div class="vehicle">
                <a href="productdetail.html"><img  src="uploads/<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $img[4]; ?>" alt="Image 05" /></a>
                <h2><a href="#"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehname[4]; ?></a></h2>
                <p class="vehicle price"> Rs.<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehminprice[4]; ?> to Rs. <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehmaxprice[4]; ?>< ?></p>
                <a href="shoppingcart.html" class="add_to_card">Add to Cart</a>
                <a href="productdetail.html" class="detail">Detail</a>
            </div> 
            
            <div class="vehicle">
                <a href="productdetail.html"><img  src="uploads/<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $img[5]; ?>" alt="Image 06" /></a>
                <h2><a href="#"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehname[5]; ?></a></h2>
                <p class="vehicle price"> Rs.<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehminprice[5]; ?> to Rs. <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehmaxprice[5]; ?>< ?></p>
                <a href="shoppingcart.html" class="add_to_card">Add to Cart</a>
                <a href="productdetail.html" class="detail">Detail</a>
            </div> 
            
            <div class="vehicle">
                <a href="productdetail.html"><img  src="uploads/<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $img[6]; ?>" alt="Image 07" /></a>
                <h2><a href="#"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehname[6]; ?></a></h2>
                <p class="vehicle price"> Rs.<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehminprice[6]; ?> to Rs. <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehmaxprice[6]; ?>< ?></p>
                <a href="shoppingcart.html" class="add_to_card">Add to Cart</a>
                <a href="productdetail.html" class="detail">Detail</a>
            </div> 
            
            <div class="vehicle">
                <a href="productdetail.html"><img  src="uploads/<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $img[7]; ?>" alt="Image 08" /></a>
                <h2><a href="#"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehname[7]; ?></a></h2>
                <p class="vehicle price"> Rs.<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehminprice[7]; ?> to Rs. <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehmaxprice[7]; ?>< ?></p>
                <a href="shoppingcart.html" class="add_to_card">Add to Cart</a>
                <a href="productdetail.html" class="detail">Detail</a>
            </div> 
            
            <div class="vehicle">
                <a href="productdetail.html"><img  src="uploads/<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $img[8]; ?>" alt="Image 09" /></a>
                <h2><a href="#"><?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehname[8]; ?></a></h2>
                <p class="vehicle price"> Rs.<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehminprice[8]; ?> to Rs. <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $vehmaxprice[8]; ?>< ?></p>
                <a href="shoppingcart.html" class="add_to_card">Add to Cart</a>
                <a href="productdetail.html" class="detail">Detail</a>
            </div> 
            	  
            
             
             
              	
           
           
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
   <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. include("footer.php");
   ?>