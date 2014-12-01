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
	
header( "Location: calendar3.php" );

?>
</body>
</html>