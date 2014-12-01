<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin - Manage Leaves </title>
<style>
.head{ background-color:#FFFFFF;
}
.below{  border: 1px solid gray;
   
   text-align: left;
    width: 50%;
    background-color:#E8E8E8; 
    padding: 18px;
}

</style>
<link rel="stylesheet" type="text/css" href="table.css">
<link rel="stylesheet" type="text/css" href="top.css">

</head>

<body>

<name id="top"></name>
<?php include('leaveheader.php'); ?>

<a class="top" href="#top" style="text-decoration:none"><font color="#FFFFFF">TOP</font></a>

<?php 
$conn = mysqli_connect("localhost","root","","leavedb") or die("error");
?>

<div class="head">
<br />
<?php include('admin_navbar.php');?>
<p style="clear:both"></p>
<br />

<?php
$query= "select * from leave_types";
$result=mysqli_query($conn,$query)
or die("No leaves to be viewed");
echo"<center><table id=\"leaves\"><tr><th>Leave Name</th><th colspan=\"2\">Leaves assigned(monthly)</th><th colspan=\"2\"> Leaves assigned(annually)</th></tr>";
echo"<tr><td></td><td>teaching</td><td>non teaching</td><td>teaching</td><td>non teaching</td><td></td></tr>";


while($row= mysqli_fetch_array($result))
{$ln= $row['leave_name'];
$lt=  $row['teaching'];
$lnt=  $row['nteaching'];
$lta=  ($lt)*12;
$lnta=  ($lnt)*12;

echo "<tr><td>";
echo $ln;
echo"</td><td>";
echo $lt;
echo"</td><td>";
echo $lnt;
echo"</td><td>";
echo $lta;
echo"</td><td>";
echo $lnta;
echo"</td><td>";

echo '<a href="edit.php?leavename='.$ln.'&amp;leavet='.$lt.'&amp;leavent='.$lnt.'">Edit             </a>';
echo "</td></tr>";
}
echo"</table></center>";
echo"<br><br>";
?>

<?php
//------------1. This piece adds form data to database--------
if(isset($_POST['submit']))
{ 
	$dur=$_POST['dur'];
	$str=$_POST['leave_name'];
	$leave_name=ucwords($str);
	$leaves_t = $_POST['leaves_t'];
	$leaves_nt = $_POST['leaves_nt'];

	if($dur=='Monthly')
	{
		$query = "insert into leave_types values (0,'$leave_name','$leaves_t','$leaves_nt')";
		$result=mysqli_query($conn,$query);
			
			if(!$result)
			echo"<center><font size=\"+2\">Leave type already exists.</font></center>";
			
			if($result)
			echo"<center><font size=\"+2\">Leave successfully added.</font></center>";
			header("Refresh:0");
			
	}
	else
	{
	$leavest = ($leaves_t)/12;
	$leavesnt = ($leaves_nt)/12;
	$query = "insert into leave_types values (0,'$leave_name','$leavest','$leavesnt')";
	$result=mysqli_query($conn,$query);
	
		if(!$result)
		echo"<center><font size=\"+2\">Leave Type already exists.</font></center>";	
		if($result)
		echo"<center><font size=\"+2\">Leave successfully added.</font></center>";
	     header("Refresh:0");
		
	}
}

//--------------1.end of this peace----------------
?>


<?php
//-------------2. This form checks which new leave you wanna enter-------------

if(!isset($_POST['submit']))
{
?>

<center>
<div class="below">
<font style="font-size:21px"><b>Add new Leave type</b></font> <hr />

	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
	<table>
	<tr><td>Leave Name:</td><td><input type="text" name= "leave_name" /></td></tr>
	<tr><td>Duration:</td>
	    <td><input type="radio" name="dur" value="Monthly"/>Monthly &nbsp;<input type="radio" name="dur" value="Annually" checked="checked"/>Annually</td></tr>
    <tr><td> No. of Leaves alotted(teaching):</td><td><input type="text" name= "leaves_t" /></td></tr>
	<tr><td> No. of Leaves alotted(non teaching):</td><td><input type="text" name= "leaves_nt" /></td></tr>

		



</table>
<center>		
        <input type="submit" name="submit" value="Submit" />
	</form></div><br /><br /></center></div>
	

<?php
//-------------------2. End of form---------------------
}
?>


</div></center>
<?php include('leavefooer.php'); ?>	
</div>

</body>
</html>