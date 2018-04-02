<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
include("connection.php");
?>	

    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	if(isset($_SESSION[empid]))
	{
	?>
    <div class="sidebar_box"><span class="bottom"></span>
            	<h3>Add</h3>   
                <div class="content"> 
                	<ul class="sidebar_list">
						<li><a href='dashboard.php'>Home</a></li>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
if($_SESSION[designation] =="Admin")
		{
?>                    
						<li><a href='add_vehicle_company.php'>Add Company</a></li>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		}
?>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
if($_SESSION[designation] =="Admin")
		{
?>                    

						<li><a href='add_vehicle_name.php'>Add Vehicle name</a></li>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		}
?>
						<li><a href='view_clients.php?selveh=set'>Add Vehicles</a></li>  
                        <li><a href='view_vehreq_clients.php'>Add Vehicle request</a></li>                        
                        <li><a href='clients.php'>Add Clients</a></li> 
 <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
if($_SESSION[designation] =="Admin")
		{
?>                                                                   
						<li><a href='employee.php'>Add Employees</a></li>    
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		}
?>
 <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
if($_SESSION[designation] =="Admin")
		{
?>     
                          <li><a href='salary.php'>Add New Salary</a></li>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		}
?>                                                                  
                     </ul>
                </div>
            </div>
     <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	}
	?>            


    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	if(isset($_SESSION[empid]))
	{
	?>
    <div class="sidebar_box"><span class="bottom"></span>
            	<h3>View</h3>   
                <div class="content"> 
                	<ul class="sidebar_list">
						<li><a href='dashboard.php'>Home</a></li>
						<li><a href='view_vehicle_company.php'>View Company</a></li>
						<li><a href='view_vehicle_name.php'>View Vehicle name</a></li>        
						<li><a href='view_vehicles.php?status=Pending'>View Pending Vehicles</a></li>
                        <li><a href='view_approved_vehicles.php'>View Approved Vehicles</a></li>
						<li><a href='view_hidden_vehicles.php'>View Hidden Vehicles</a></li>                        
                        <li><a href='view_vehicles.php?status=Rejected'>View Rejected Vehicles</a></li>
                        <li><a href='view_sold_vehicles.php'>View Orders</a></li>  
                        <li><a href='view_vehicle_request.php'>View Vehicle request</a></li>                        
                        <li><a href='view_rto_details.php'>View RTO</a></li>
						<li><a href='view_clients.php'>View clients</a></li> 

 <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
if($_SESSION[designation] =="Admin")
		{
?>     
						<li><a href='view_employee.php'>View Employees</a></li>  
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		}
?>     
                        <li><a href='view_salary.php'>View Salary</a></li>                                                             
                     </ul>
                </div>
            </div>
     <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	}
	?>  

    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	if(!isset($_SESSION[empid]))
	{
	?>
<div class="sidebar_box"><span class="bottom"></span>
            	<h3>2 Wheeler</h3>   
                <div class="content"> 
                	<ul class="sidebar_list">
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
$sql = "SELECT * FROM vehicle_company where mainid='0' AND (vehicle_type='2 Wheeler' OR vehicle_type='Both') AND status='Enabled'";
$resultq = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($resultq))
{
echo "<li><a href='displayvehicles.php?compid=$rs[company_id]'>$rs[name]</a></li>";
}
?>                        
                    </ul>
                </div>
            </div>
            
<div class="sidebar_box"><span class="bottom"></span>
            	<h3>4 Wheeler<a href="http://pt.hiresimage.com" title="Hiresimage from pt.hiresimage.com" class="more_link"  ></a></h3>   
                <div class="content"> 
                	<ul class="sidebar_list">
    
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
$sql = "SELECT * FROM vehicle_company where mainid='0' AND (vehicle_type='4 Wheeler' OR vehicle_type='Both') AND status='Enabled'";
$resultq = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($resultq))
{
echo "<li><a href='displayvehicles.php?compid=$rs[company_id]'>$rs[name]</a></li>";
}
?>                        
                    </ul>
                </div>
            </div>
     <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
	}
	?>