<?php
$conn=mysqli_connect("localhost","root","","leavedb") or die("error");

$name=$_POST['name'];
$type=$_POST['type'];
$date=$_POST['date'];
$query="Insert into leave_holiday1 (name,type,date) values ('$name','$type','$date');";
mysqli_query($conn,$query);
//mysqli_real_escape_string($sql);
//$fetch=mysqli_query($query);
if($query)
 {echo "<script> alert ('Successfully Added!!');window.location.href='newleavedate.php';</script>";}
?>