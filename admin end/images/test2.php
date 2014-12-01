<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$conn = mysqli_connect("localhost","root","","leavedb") or die("error");
$query = "CREATE EVENT testevent7
    ON SCHEDULE EVERY 1 MONTH
    STARTS '2014-08-20 23:28:30'
     DO
     UPDATE `leave_types` SET teaching=teaching+3";

$result = mysqli_query($conn,$query)
or die("Error querying Database0");
?>

<?php
$query= "select * from leave_types";
$result = mysqli_query($conn,$query)
or die("Error querying Database1");	

while($row= mysqli_fetch_array($result))
{
	echo $row['leave_name'];
	echo $row['teaching'];
	echo "<br> ";
}

?>
</body>
</html>