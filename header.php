<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
$pagename =  basename($_SERVER['PHP_SELF']);
 include("connection.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Vehicle Dealer</title>
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "top_nav", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

<link rel="stylesheet" type="text/css" media="all" href="css/jquery.dualSlider.0.2.css" />

<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="js/jquery.timers-1.2.js" type="text/javascript"></script>
<script src="js/jquery.dualSlider.0.3.min.js" type="text/javascript"></script>

<script type="text/javascript">
    
    $(document).ready(function() {
        
        $(".carousel").dualSlider({
            auto:true,
            autoDelay: 6000,
            easingCarousel: "swing",
            easingDetails: "easeOutBack",
            durationCarousel: 1000,
            durationDetails: 600
        });
        
    });
    
</script>

</head>

<body>

<div id="templatemo_wrapper">
	<div id="templatemo_header">
	  <div id="header_right">
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		 if(!isset($_SESSION[client_id]))
            {
		?>
          <a href="client_login.php">Log In</a> | 
          <a href="clients.php">Sign Up</a>  | 
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
			}
			 if(isset($_SESSION[client_id]))
            {
		  ?>  
          <a href="account.php">My Account</a>  |
           <a href="logout.php">Logout</a> 
           <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
			}
			?>
		</div>
        
        <div class="cleaner"></div>
</div> <!-- END of templatemo_header -->
    
    <div id="templatemo_menu">
    	<div id="top_nav" class="ddsmoothmenu">
        
          <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
			 if(isset($_SESSION[empid]))
            {
		  ?> 
          <ul>
                <li><a href="index.php"><strong>Home</strong></a></li>
                <li><a href="displayvehicles.php"><strong>Buy Vehicle</strong></a></li>
               <li><a href="vehicles.php"><strong>Sell Vehicle</strong></a></li>
               <li><a href="vehicle_request.php"><strong>Vehicle Request</strong></a></li>
                <li><a href="dashboard.php" class="selected">Account</a>
                     <ul>
                            <li><a rel="nofollow" href="profile.php">View Profile</a></li>
                            <li><a rel="nofollow" href="edit_staff_profile.php">Edit Profile</a></li>                        
                            <li><a rel="nofollow" href="change_password.php">Change Password</a></li>
                            <li><a rel="nofollow" href="logout.php">Logout</a></li>
                      </ul>
                </li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
			}
			else
			{
			?>        
                <ul>
                    <li><a href="index.php" class="selected">Home</a></li>
                    <li><a href="displayvehicles.php">Buy Vehicle</a>
                        <ul>
                            <li><a rel="nofollow" href='displayvehicles.php?Vehtype=2 Wheeler'>2 Wheeler</a></li>
                            <li><a rel="nofollow" href="displayvehicles.php?Vehtype=4 Wheeler">4 Wheeler</a></li>
                      </ul>
                    </li>
                   <li><a href="vehicles.php">Sell Vehicle</a>
       <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		 if(isset($_SESSION[client_id]))
            {
		?>
                      <ul>
                            <li><a rel="nofollow" href="clients_view_sold_vehicle.php">Uploaded vehicles</a></li>
                      </ul>
		<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
			}
		?>
                   </li>
                   <li><a href="vehicle_request.php">Vehicle Request</a>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		 if(isset($_SESSION[client_id]))
            {
		?>                  
                     <ul>
                         <li><a rel="nofollow" href="view_vehicle_request.php">View Vehicle Request</a></li>
                      </ul>
		<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
			}
		?>                      
                   </li>
                    <li><a href="account.php">Account</a>
               <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
               if(isset($_SESSION[client_id]))
               {
                ?>  
                        <ul>
                            <li><a rel="nofollow" href="profile.php">View Profile</a></li>
                            <li><a rel="nofollow" href="editprofile.php">Edit Profile</a></li>                        
                            <li><a rel="nofollow" href="change_password.php">Change Password</a></li>
                            <li><a rel="nofollow" href="view_clients_purchased_vehicle.php">Order details</a></li>
                            <li><a rel="nofollow" href="clients_view_sold_vehicle.php">Sales details</a></li>
                            <li><a rel="nofollow" href="logout.php">Logout</a></li>
                      </ul>
                <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
                }
                ?>
                    </li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/">Support page</a></li>
                </ul>
            <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
			}
			?>
            <br style="clear: left" />
        </div> <!-- end of ddsmoothmenu -->
        <div id="menu_second_bar">
        	<div id="top_shopping_cart">
            <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
			$sqledit = mysqli_query($con,"SELECT * FROM clients WHERE client_id = '$_SESSION[client_id]'");
			$rec = mysqli_fetch_array($sqledit);
            if(isset($_SESSION[client_id]))
            {
            	echo "Welcome  $rec[first_name] $rec[last_name]  ";
			}
			else
			{
				echo "Visit <a href='www.freestudentprojects.com'>www.freestudentprojects.com</a>";
			}
			?>
            </div>
        	<div id="templatemo_search">
            
                <form action="displayvehicles.php" method="get">
                  <input type="text" value="search" name="sVehtype" id="sVehtype" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                  <input type="submit" name="search" value="search" alt="Search" id="searchbutton" title="search" class="sub_btn"  />
                </form>
            </div>
            <div class="cleaner"></div>
    	</div>
    </div> <!-- END of templatemo_menu -->