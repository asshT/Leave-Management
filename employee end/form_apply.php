<?php session_start();
include('leaveheader.php');
$conn= mysqli_connect("localhost","root","","leavedb") or die("error");
//echo "Connected to Mysql<br/><hr/>";
//mysql_select_db("leavedb") or die (mysql_error());
//echo"Connected to Database<br/><hr>";
$sql="Select leave_Name from leave_types;";
$result=mysqli_query($conn,$sql);
$a;
$i=0;
while($row=mysqli_fetch_array($result))
 { $a[$i]=$row['leave_Name'];
     $i++;
 }
 
 
?>
<div class="head">
<br /><br>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>HR Management System</title>
  <style>.head{ background-color:#FFFFFF;
}
.below{  border: 1px solid gray;
   
   text-align: left;
    width: 50%;
    background-color:#E8E8E8; 
    padding: 18px;
}
</style>
<link rel="stylesheet" href="jquery-ui.css" />
  <script src="jquery-1.9.1.js"></script>
  <script src="jquery-ui.js"></script>
 <script>
  $(function() {
    $( "#datepicker" ).datepicker({
           defaultDate: "+1w",
           dateFormat:"yy-mm-dd",
           showOn:"button",
           buttonImage:"calendar.gif",
           buttonImageOnly:true          
     });
	 $( "#datepicker1" ).datepicker({
           defaultDate: "+1w",
           dateFormat:"yy-mm-dd",
           showOn:"button",
           buttonImage:"calendar.gif",
           buttonImageOnly:true
           
  });
 });
  </script>
  <link rel="stylesheet" type="text/css" href="table.css">
</head>
<body>
<?php
include ('emp_navbar.php');
?>
<?php
$empid= $_SESSION['emp_id'];

$query="select * from employee_leave where emp_id ='$empid'";
$result=mysqli_query($conn,$query)
or die("No leaves to be viewed"); ?>
<br>
<div style="float: right">    <center><h7>Your Leave Stats </h7>
	<table id="leaves" border=1>
	<tr><th> Leave Type </th>
        <th> Leaves Left </th></tr>
<?php 
while($row= mysqli_fetch_array($result))
{	
$l_id = $row['leave_id'];

	$query1="select leave_name from leave_types where leave_id ='$l_id'";
	$result1=mysqli_query($conn,$query1)
	or die("error no 1");
		while($row1= mysqli_fetch_array($result1))
		echo "<tr><td> ".$row1['leave_name']."</td>";
		
		echo " <td> ";
		if($row['leave_remaining']>0)
		echo $row['leave_remaining'];
		else
		echo "0";
		echo "</td></tr>";
}
?>
</table></center>
</div>

<br><br><center>
<div class="below">
<font style="font-size:21px"><b>Leave Application Form</b></font> <hr />

<form action="add_leave.php" method = "post">
<table>
	<tr><td>Employee id:</td><td><?php echo $_SESSION['emp_id']; ?></td></tr>
	<tr><td>Leave type:</td>
	    <td><select name="leavetype"> <option><?php echo $a[0]; ?></option>
<option><?php echo $a[1]; ?></option>
<option><?php echo $a[2]; ?></option>
<option>Earned leave+Medical leave</option>


</select></td></tr>

    <tr><td> Reason:</td><td><textarea name="reason" rows=4 cols=50></textarea></td></tr>
	<tr><td> Type:</td><td>Full Day<input type="radio" name="type" value="Fullday"> Half Day<input type="radio" name="type" value="Halfday"></td></tr>
	<tr><td>From:</td><td><input type="text" id="datepicker" name="date1"/></td></tr>
    <tr><td>To:</td><td><input type="text" id="datepicker1" name="date2"/></td></tr>

</table>

<center>

<input type="submit"  name="submit" value="Submit"> </center>
	</form></div><br /><br />


</div>

<?php include("leavefooer.php"); ?>
</body>
</html>
