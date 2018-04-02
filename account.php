<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
session_start();
 if(!isset($_SESSION[client_id]))
 {
	 header("location: client_login.php");
 }
 include("header.php");
 

 
 ?>
    
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
 include("sidebar.php");
 ?>
        </div>
        <div id="content" class="float_r">
        <h1>Account</h1>
        <blockquote>
        No. of sold vehicles : 
		<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		$qresult = mysqli_query($con,"SELECT * FROM vehicle_request where client_id='$_SESSION[client_id]' "); 
		echo mysqli_num_rows($qresult); 
		?>
        </blockquote>
        <blockquote>
        No. of orders : 
		<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		$qresult = mysqli_query($con,"SELECT * FROM vehicle_order where client_id='$_SESSION[client_id]'"); 
		echo mysqli_num_rows($qresult); 
		?>
        </blockquote>
         <blockquote>
         No. of vehicle reuest : 
		<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		$qresult = mysqli_query($con,"SELECT * FROM vehicle_request where client_id='$_SESSION[client_id]'"); 
		echo mysqli_num_rows($qresult); 
		?>
         </blockquote>    
                 
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