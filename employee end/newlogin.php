<?php
$conn = mysqli_connect("localhost","root","") or die("error");
//$db = mysql_select_db("leave_management",$conn);
?>
<?php
session_start();
$message = 'Please enter a valid UserID';
$done = 'Sign Up Successful ';
if(!isset($_POST['emp_id'],$_POST['pass']))
{ 
 echo "<script> alert ('$message');</script>";
}
$emp_ID = $_POST['emp_id'];
$user_id = $_POST['user_id'];
$Password = $_POST['pass'];
$sql = "SELECT * from login where emp_id = '$emp_ID'";
$row = mysqli_query($conn,$sql);
$count = mysql_num_rows($row);
if(!$count)
{$sql = "INSERT into login (emp_id , user_id, password) values ('$emp_ID','$user_id','$Password')";
$fetch = mysqli_query($conn,$sql);
if(!$fetch)
  {echo mysql_error();}
echo"<script> alert ('$done');window.location.href='form0.php';</script>";
}
else
{echo "<script> alert ('$message');window.location.href='form.php';</script>";}
?>