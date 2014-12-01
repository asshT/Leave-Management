<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
// A php script to show the Employee details and all the leaves he has taken so far.
// echo '<a href="empDetailByHyperlink.php?emp_id='.$emp_id.'&amp;leavet='.$lt.'&amp;leavent='.$lnt.'">Edit             </a>';
//<table><tr><td> </tr></td></table>
$conn = mysqli_connect("localhost","root","","leavedb") or die("error");
//$emp_id=$_GET['emp_id'];
$emp_id=11;
$query= "select emp_name from employee_personal where emp_id='$emp_id'";
$result=mysqli_query($conn,$query)
or die("Error Executing Query");

while($row= mysqli_fetch_array($result))
	$emp_name=$row['emp_name'];



$query= "select * from employee_leave where emp_id='$emp_id'";
$result=mysqli_query($conn,$query)
or die("Error Executing Query");


$i=0;
$leave_id=array();
$carry_over=array();
$leave_approved=array();
$leave_pending=array();
$leave_remaining=array();
while($row= mysqli_fetch_array($result))
{
	$leave_id[$i]=$row['leave_id'];
	$carry_over[$i]=$row['carry_over'];
	$leave_pending[$i]=$row['leave_pending'];
	$leave_remaining[$i]=$row['leave_remaining'];
	
	$i=$i+1;
}

//Leave Taken so Far
$query= "select * from leave_application where emp_id='$emp_id'";
$result=mysqli_query($conn,$query)
or die("Error Executing Query");

$leave_id_1=array();
$status=array();
$reason=array();
$reply=array();
$nod=array();
$date_from=array();
$date_to=array();

$j=0;
while($row= mysqli_fetch_array($result))
{//<table><tr><td> </tr></td></table>
	$leave_id_1[$j]=$row['leave_id'];
	$status[$j]=$row['status'];//<table><tr><td> </tr></td></table>
	$reason[$j]=$row['reason'];
	$reply[$j]=$row['reply'];//<table><tr><td> </tr></td></table>
	$nod[$j]=$row['nod'];
	$date_from[$j]=$row['date_from'];//<table><tr><td> </tr></td></table>
	$date_to[$j]=$row['date_to'];
	$j=$j+1;//<table><tr><td> </tr></td></table>
}

//Showing Employee name:
echo "Employee Name:".$emp_name;

//showing leave remaining
for ($x=0; $x<sizeof($leave_id_1); $x++)
{
	echo $leave_id[$x];//<table><tr><td> </tr></td></table>
	echo $carry_over[$x];
	echo $leave_pending[$x];//<table><tr><td> </tr></td></table>
	echo $leave_remaining[$x];
	//<table><tr><td> </tr></td></table>
	echo "<br>";
}
//Showing leaves taken so far 
for ($x=0; $x<sizeof($leave_id); $x++)
{//<table><tr><td> </tr></td></table>
	echo $leave_id_1[$x];
	echo $status[$x];
	echo $reason[$x];
	echo $reply[$x];//<table><tr><td> </tr></td></table>
	echo $nod[$x];
	echo $date_from[$x];
	echo $date_to[$x];//<table><tr><td> </tr></td></table>
	echo "<br>";
}



?>

</body>
</html>