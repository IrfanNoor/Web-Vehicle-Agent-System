<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
session_start();

include("connection.php");
?>

<script type="application/javascript">
function validate()
{
	if(document.salary.employee.value == "")
	{
		alert("Please select employee");
		document.salary.employee.focus();
		return false;
	}
	else if(document.salary.payment_date.value == "")
	{
		alert("Please select payment month");
		document.salary.payment_date.focus();
		return false;
	}
	
	else if(isNaN(document.salary.working_days.value))
	{
		alert("Invalid days");
		document.salary.working_days.value = "";
		document.salary.working_days.focus();
		return false;
	}
	else if(isNaN(document.salary.leaves_taken.value))
	{
		alert("Invalid days");
		document.salary.leaves_taken.value = "";
		document.salary.leaves_taken.focus();
		return false;
	}
	else if(isNaN(document.salary.deductions.value))
	{
		alert("Invalid deduction amount");
		document.salary.deductions.value = "";
		document.salary.deductions.focus();
		return false;
	}
	else if(isNaN(document.salary.bonus.value))
	{
		alert("Invalid bonus amount");
		document.salary.bonus.value = "";
		document.salary.bonus.focus();
		return false;
	}
	else
	{
		return true;
	}
}
	
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  
xmlhttp.open("GET","ajaxsalary.php?empsalid="+str,true);
xmlhttp.send();
}
</script>
<script type="application/javascript">
 		var x = 0;
        var y = 0;
        var z = 0;
		var tot =0;
		var workdy = 0;
		var totded;
		var bonus=0;
		var totsal = 0;
        function calc() {
			
				x= Number(document.getElementById('salary').value);
                y = Number(document.getElementById('working_days').value);
				z = Number(document.getElementById('leaves_taken').value);
				workdy = x/y;
				totded = z * workdy;
				document.getElementById('deductions').value = totded;	
        }
		
		function calcsal() {
				x= Number(document.getElementById('salary').value);
                y = Number(document.getElementById('deductions').value);
				z = Number(document.getElementById('bonus').value);
				totsal = x + z - y;
				document.getElementById('total_salary').value = Number(totsal).toFixed(2);;

		}
		
</script>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
if($_SESSION[setid] == $_POST[setid])
{
	 $pdt = $_POST[payment_date]. "-01";
	if(isset($_POST[submit]))
	{
		if(isset($_GET[editid]))
		{
			$sql= mysqli_query($con,"UPDATE salary set salary='$_POST[salary]',working_days='$_POST[working_days]',leaves_taken='$_POST[leaves_taken]',payment_date='$pdt',deductions='$_POST[deductions]',bonus='$_POST[bonus]',total_salary='$_POST[total_salary]'");
			if(!$sql)
			{
				$msg=  "<br><font color='red'>Problem in SQL Query  </font>".mysqli_error($con);
			}
			else
			{
				$msg= "<br><font color='green'>salary Updated</font>";
			}
		}
		else
		{
			$sql="insert into salary (salary,emp_id,working_days,leaves_taken,payment_date,deductions,bonus)
		values('$_POST[salary]','$_POST[employee]','$_POST[working_days]','$_POST[leaves_taken]','$pdt','$_POST[deductions]','$_POST[bonus]')";
			$sqlquery = mysqli_query($con,$sql);
			if(!$sqlquery)
			{
				$msg=  "<br><font color='red'>Problem in SQL Query</font>";
				echo mysqli_error($con);
			}
			else
			{
?>
				<script type="application/javascript">
                	alert("Salary details inserted successfully..");
				</script>
<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
			}
		}
	}
}

$_SESSION[setid] = rand();

if(isset($_GET[editid]))
{
$sqledit = mysqli_query($con,"SELECT * FROM salary WHERE salary_id = '$_GET[editid]'");
$rec = mysqli_fetch_array($sqledit);
}
?>

<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
 include("header.php");
 ?>
    
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
    <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
 include("sidebar.php");
 ?>
        </div>
        <div id="content" class="float_r">
        <h1>Generate New salary record</h1>
        <p>
<form name=salary method="post" action="" onSubmit="return validate()">
<input type="hidden" name="setid" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $_SESSION[setid]; ?>" />

<table width="533" border="1">
  <tr>
    <td>&nbsp;  Employee name    <td>&nbsp;
      <select name="employee" id="employee" onchange="showUser(this.value)">
      <option value="">Select</option>
        <?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page.
		$sqlemployee = "SELECT * FROM  employee where status='Enabled' AND designation!='Admin' ";
		$queryemployee = mysqli_query($con,$sqlemployee);
		while($rsemployee = mysqli_fetch_array($queryemployee))
		{
				echo "<option value='$rsemployee[emp_id]'>$rsemployee[employee_name] - $rsemployee[login_id]</option>";
		}
        ?>
      </select>
      </tr>
  <tr>
    <td width="68">&nbsp; Salary:</td>
    <td width="255">&nbsp;
    <span id="txtHint">
    <input type="text" name="salary" id="salary" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[salary]; ?>" />
    </span>
    </td>
  </tr>
  <tr>
    <td>&nbsp; Salary Month: </td>
    <td>&nbsp; <input type="month" name=payment_date id="payment_date" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[payment_date]; ?>" /></td>
  </tr>
  <tr>
    <td>&nbsp; Working days:</td>
    <td>&nbsp; <input type="text" name="working_days" id="working_days" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[working_days]; ?>" /></td>
  </tr>
  <tr>
    <td>&nbsp; Leaves taken:</td>
    <td>&nbsp; <input type="text" name=leaves_taken id="leaves_taken" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[leaves_taken]; ?>"  onkeyup="calc()"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp; Deductions:</td>
    <td>&nbsp; <input type="text" name=deductions id="deductions" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[deductions]; ?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;  Bonus:</td>
    <td>&nbsp; <input type="text" name=bonus id="bonus" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[bonus]; ?>"  onkeyup="calcsal()" /></td>
  </tr>
  <tr>
    <td>&nbsp; Total salary </td>
    <td>&nbsp; <input type="text" name=total_salary id="total_salary" value="<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. echo $rec[total_salary]; ?>" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="Submit" name=submit /></td>
    
  </tr>
 
</table>
</form>

</p>
        <div class="cleaner"></div>
    
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
