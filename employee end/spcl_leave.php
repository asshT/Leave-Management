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
echo "<tr><td>Leave Type:</td><td>Special Leave</td></tr>";
echo "<tr><td> Reason: </td><td>"; 
//$leavetype = $_POST['leavetype'];
$reason = $_POST['reason'];
//$type = $_POST['type'];
$from = $_POST['date1'];
$to = $_POST['date2'];
$leavetype = $_POST['leavetype'];
}
$nod = e_days($to,$from);
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

///insertion///
$sql5 = "INSERT into leave_application (emp_id,leave_id,status,reason,nod,date_from,date_to,permission) values ('$id','$leavetype = $leavetype;','p','$reason','$nod','$from','$to','special')";
$fetch4 = mysqli_query($conn,$sql5);
if(!$fetch4)
  {echo mysql_error();}
 else
 {echo "<script>alert ('Special Request added!!');window.location.href='securedpage.php';</script>";
  }