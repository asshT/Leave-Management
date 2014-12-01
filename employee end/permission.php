
<?php session_start();
include('leaveheader.php');
$conn= mysqli_connect("localhost","root","","leavedb") or die("error");
include ('emp_navbar.php'); ?>
<div class="head">
<br /><br>

<html>
<title> Special Permission Page</title>
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

<head>
<body>
<?php
$sql="Select leave_Name from leave_types;";
$result=mysqli_query($conn,$sql);
$a;
$i=0;
while($row=mysqli_fetch_array($result))
 { $a[$i]=$row['leave_Name'];
     $i++;
 }
 ?>
<br><br>
<center>
<div class="below">
<font style="font-size:21px"><b>Leave Application Form</b></font> <hr />
<form action="spcl_leave.php" method = "post">
<table>
	<tr><td>Employee id:</td><td><?php echo $_SESSION['emp_id']; ?></td></tr>
    <tr><td>Leave type:</td>
	    <td><select name="leavetype"> <option><?php echo $a[0]; ?></option>
<option><?php echo $a[1]; ?></option>
<option><?php echo $a[2]; ?></option>
<option>Earned leave+Medical leave</option>


</select></td></tr>
	

    <tr><td> Reason:</td><td><textarea name="reason" rows=4 cols=50></textarea></td></tr>

	<tr><td>From:</td><td><input type="text" id="datepicker" name="date1"/></td></tr>
    <tr><td>To:</td><td><input type="text" id="datepicker1" name="date2"/></td></tr>

</table>
<center>

<input type="submit"  name="submit" value="Submit"> 
	</form></div><br /><br /></center></div>
	</body>
	</html>