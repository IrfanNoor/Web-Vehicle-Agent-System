<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();
 include("connection.php");
	$resultphoto = mysqli_query($con, "SELECT * FROM  images WHERE image_id ='$_GET[imgid]'");
	$rsphoto = mysqli_fetch_array($resultphoto);
?>
<div style="max-width:610px;">    
  <p>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
    $imagedata = getimagesize("uploads/".$rsphoto[image_path]);
	$imgwidth = $imagedata[0];
	$imgheight =$imagedata[1];
?>
<table width="610" height="400">
<tr>
<td width="610" align="center" style="vertical-align: middle;" bgcolor="#333333" >
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if($imgwidth>600)
{
?>
<img src='uploads/<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsphoto[image_path]; ?>'  style="width:600px;"  />
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
}
else if($imgheight>400)
{
?>
<img src='uploads/<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsphoto[image_path]; ?>'  style="height:400px;"  />
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
}
else
{
?>
<img src='uploads/<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rsphoto[image_path]; ?>' />
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
}
?>
</td>
</tr>
<tr>
  <td >&nbsp;
  
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if($rsphoto[image_description] != "")
{
echo "<strong>Image description:</strong> <br />";
echo $rsphoto[image_description];
}
?>
</td>
</tr>
<tr>
</tr>
</table>
</div>