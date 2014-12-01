<?php session_start();
$conn = mysqli_connect("localhost","root","","leavedb") or die("error");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"

"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Form Edit Data</title>
<style>
.head{ background-color:#FFFFFF;
}
.below{  border: 1px solid gray;
   
   text-align: left;
    width: 40%;
    background-color:#E8E8E8; 
    padding: 18px;
}

</style>

</head>
<body>


<?php include('leaveheader.php'); ?>

<div class="head">
<br />
<?php
include ('emp_navbar.php');
?>
<p style="clear:both"></p>
<br />

<?php
if(isset($_POST['submit'])){
$id = $_SESSION['emp_id'];
?>
<center>
<div class="below">
<font style="font-size:21px"><b>Your Application</b></font> <hr />


<table><tr>        
<td>Employee ID: </td>
<td>
<?php
echo $id;
echo "</td></tr>";
echo "<tr><td> Reason: </td><td>"; 
$leavetype = $_POST['leavetype'];
$reason = $_POST['reason'];
$type = $_POST['type'];
$from = $_POST['date1'];
$to = $_POST['date2'];

}
$nod = e_days($to,$from);
$nod = $nod + 1;
function e_days($end,$start) {
/************************************************************************/
/* Purpose: To get the elapsed days of date diff as integer.            */
/************************************************************************/
$dtS = new DateTime($start);
$dtE = new DateTime($end);
$int = $dtE->diff($dtS);
$ret = (integer) $int->format('%d');
return $ret;
}  // end function
 
echo $reason."</td></tr>";
if( $leavetype == 'Earned leave+Medical leave')
{
 $sql3 = "select * from employee_leave where emp_id='$id' and leave_id = '1'";
  $result3=mysqli_query($conn,$sql3);
 while($row=mysqli_fetch_array($result3))
 	{$lrem=$row['leave_remaining']; }
$sql4 = "Select * from employee_leave where emp_id = '$id' and leave_id = '2' ";
 $result4=mysqli_query($conn,$sql4);
 while($row=mysqli_fetch_array($result4))
 	{$lrem += $row['leave_remaining'];}
	//$lrem = $lrem1+ $lrem2;
	echo "<tr><td>Remaining leaves:</td><td>";
	echo $lrem."</td></tr>";
	echo "<tr><td>No. of days asked:</td><td>"; echo $nod."</td></tr></table></div>";
	 if($nod <= $lrem ) { 
$sql5 = "INSERT into leave_application (emp_id,leave_id,status,reason,nod,date_from,date_to) values ('$id','4','p','$reason','$nod','$from','$to')";
$fetch4 = mysqli_query($conn,$sql5);
if(!$fetch4)
  {echo mysql_error();}
 else
 {echo "<script>alert ('Request added!!');window.location.href='form_apply.php';</script>";
  }
  }
   else
{ echo 'Leave request denied. You have only '.$lrem.' leaves remaining of this leave type.<br>'; 
 echo '<a href="permission.php">Seek special permission</a>'; 
}   
  
}
	
else 
{
$sql = "select leave_id from leave_types where leave_name = '$leavetype'";
$result = mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result))
$leaveid=$row['leave_id'];
echo "<tr><td>Leave ID:</td><td>";
echo $leaveid."</td></tr>";
if(!$result)
  {echo "Cannot fetch leave id"; }
 $sql2="select * from employee_leave where emp_id='$id' and leave_id = '$leaveid'";
 $result1=mysqli_query($conn,$sql2);
 while($row=mysqli_fetch_array($result1))
 	{$lrem=$row['leave_remaining'];
	
echo "<tr><td>Remaining leaves:</td><td>";
	echo $lrem."</td></tr>";
	}
	
	echo "<tr><td>No. of days asked:</td><td>"; echo $nod."</td></tr></table></div>";
	
 if($nod <= $lrem ) { 
$sql3 = "INSERT into leave_application (emp_id,leave_id,status,reason,nod,date_from,date_to) values ('$id','$leaveid','p','$reason','$nod','$from','$to')";
$fetch2 = mysqli_query($conn,$sql3);
if(!$fetch2)
  {echo mysql_error();}
 else
 {echo "<script>alert ('Request added!!');window.location.href='subs.php';</script>";
  }
  }
 else
{ echo 'Leave request denied. You only have '.$lrem.' leaves remaining of this leave type.<br>'; 
 echo '<a href="permission.php">Seek special permission</a>'; 
   

 } } 
 ?>
 <br /><br /><br />
 </div>
 
<?php include("leavefooer.php");
?>
 </body></html>