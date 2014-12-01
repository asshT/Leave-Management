<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$sno=$_GET['sno'];
$conn = mysqli_connect("localhost","root","","leavedb") or die("error");

$query= "select * from leave_application where status='p' ";
$result = mysqli_query($conn,$query)
or die("Error querying Database");

$query2 = "UPDATE leave_application SET status='a'  WHERE sno='$sno';" ;
	$result2 = mysqli_query($conn,$query2)
	or die("Error querying Database2");

$query3= "select emp_id, leave_id from leave_application where sno='$sno' ";
$result = mysqli_query($conn,$query)
or die("Error querying Database");
while($row= mysqli_fetch_array($result))
{
	$chooseEmp=$row['emp_id'];
	$leaveId=$row['leave_id'];
}
$query4 = "	UPDATE employee_leave SET leave_remaining = leave_remaining - (SELECT nod from leave_application X where X.sno = '$sno') where (emp_id = $chooseEmp) and (leave_id = $leaveId) ";
$result4 = mysqli_query($conn,$query4)
	or die("Error querying Database4");
	
header( "Location: calendar3.php" );

?>

</body>
</html>