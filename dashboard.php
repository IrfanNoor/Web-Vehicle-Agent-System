<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
session_start();
include("connection.php");
if(!isset($_SESSION[empid]))
{
	header("Location: staff_login.php");
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
        <h1>Admin Dashboard</h1>  
        <blockquote>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		$sqlclients = mysqli_query($con,"SELECT * FROM clients");
		echo "Number of Clients: ". mysqli_num_rows($sqlclients);
		?>
        </blockquote>
        
        <blockquote>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		$sqlclients = mysqli_query($con,"SELECT * FROM employee");
		echo "Number of Employees: ". mysqli_num_rows($sqlclients);
		?>
        </blockquote>
        
        <blockquote>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		$sqlclients = mysqli_query($con,"SELECT * FROM vehicle_order");
		echo "Number of Vehicle orders received: ". mysqli_num_rows($sqlclients);
		?>
        </blockquote>
        <blockquote>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		$sqlclients = mysqli_query($con,"SELECT * FROM vehicle_request");
		echo "Number of Vehicle request: ". mysqli_num_rows($sqlclients);
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