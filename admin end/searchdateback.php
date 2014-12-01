<?php session_start(); error_reporting(E_ERROR);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Form</title>
<style>
.head{ background-color:#FFFFFF;
}
</style>
</head>
<link rel="stylesheet" type="text/css" href="table.css">
<body>
<?php include('leaveheader.php'); ?>

<div class="head">
<br />

<?php include('admin_navbar.php'); ?>
<p style="clear:both"></p>
<center>
<font style="font-size:24px"><b>Report</b></font>
<br /><br />

<?php
$conn= mysqli_connect("localhost","root","","leavedb") or die("error");

if(isset($_POST['submit'])){
$_SESSION['emp_name']= $_POST['emp_name'];
$_SESSION['emp_id']= $_POST['emp_id'];
$_SESSION['date_from']= $_POST['date_from'];
$_SESSION['date_to']= $_POST['date_to'];
$b=$_SESSION['emp_id'];
$c=$_SESSION['date_from'];
$d=$_SESSION['date_to'];

if($_SESSION['emp_name']!="" or $_SESSION['emp_id']!="")
{
if($_SESSION['emp_name']!="")
{
$a=$_SESSION['emp_name'];
$query1="select emp_id from employee_personal where emp_name ='$a' ";
$result1 = mysqli_query($conn,$query1);
while($row1=mysqli_fetch_array($result1))
$emp_id1=$row1['emp_id'];
}
$query="select * from leave_application where emp_id in ('$b','$emp_id1')";
if($_SESSION['date_from']!="" and $_SESSION['date_to']!="")
$query .="and date_from >= '$c' and date_to <= '$d'";
}
else
$query="select * from leave_application where date_from >= '$c' and date_to <= '$d'";

$result = mysqli_query($conn,$query);
?>
<table id="leaves"><tr><th> Employee id </th><th> Leave ID </th><th> Status </th><th> Reason </th><th> No. of days </th><th> Date From </th><th> Date To </th>
<?php 
while($row=mysqli_fetch_array($result))
{
	echo"<tr><td>".$row['emp_id']."</td>";
	echo"<td>". $row['leave_id']."</td>";
	echo"<td>". $row['status']."</td>";
	echo"<td>". $row['reason']."</td>";
	echo"<td>". $row['nod']."</td>";
	echo"<td>". $row['date_from']."</td>";
	echo"<td>". $row['date_to']."</td></tr>";
}
echo "</table><br>";

}
echo '<a href="getpdf.php">Download the report as PDF</a><center><br>';
?>
</div>
<?php include('leavefooer.php'); ?>	
</div>
</body>
</html>