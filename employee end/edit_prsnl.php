<?php session_start();
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

<center>
<div class="below">
<font style="font-size:21px"><b>Edit Personal Data</b></font> <hr />


<?php
$conn = mysqli_connect("localhost","root","","leavedb") or die("error");
//$db = mysql_select_db("leavedb",$conn)
$result = mysqli_query($conn,"SELECT * FROM employee_personal WHERE (emp_id = '" . $_SESSION['emp_id'] ."')");
//$qry = mysql_query("SELECT * FROM employee_personal WHERE (emp_id = '" . $_POST['empl_id'] ."')");
//$result = mysql_query("SELECT * FROM employee_personal WHERE (emp_id = '" . $_POST['empl_id'] ."')");
if($result){

echo "<br>";}
 while($row = mysqli_fetch_array($result)){
?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

<table><tr>        
<td>Name: </td>
<td>
<input type="text" name="name" size="40" value="<?php echo $row['emp_name']; ?>">

</td>
</tr>
<tr>
<td>Address: </td>
<td>
<input type="text" name="address" size="40" value="<?php echo $row['address'];?>">
</td>
</tr>
<tr>
<td>Age: </td>
<td>
<input type="text" name="age" size="40" value="<?php echo $row['age'];?>">
</td>
</tr>
<tr>
<td>Contact: </td>
<td>
<input type="text" name="contact" size="40" value="<?php echo $row['contact'];?>">
</td>
</tr>
<tr>
<td>Email Id: </td>
<td>
<input type="text" name="email" size="40" value="<?php echo $row['email_id'];?>">
</td>
</tr>
<tr>
<td>Gender: </td>
<td>
<input type="text" name="gender" size="40" value="<?php echo $row['gender'];?>">
</td>
</tr>

</table>
<center>
<input type="submit" name="submit" value="Make Changes">
</center>
</form>

<?php 
}
?>
</div></center>
<br><br>
</div>
<?php
if(isset($_POST['submit'])){
$id = $_SESSION['emp_id'];
$name = $_POST['name'];
$address = $_POST['address'];
$age = $_POST['age'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$gender = $_POST['gender'];

$conn = mysqli_connect("localhost","root","","leavedb") or die("error");
$qry = "UPDATE employee_personal SET emp_name='$name', address='$address',age='$age',contact='$contact',email_id='$email',gender='$gender' WHERE emp_id='$id'";
$result=mysqli_query($conn,$qry);


if(!$result)
echo "error";
else
echo "<script>alert ('Record updated!!');window.location.href='view_prsnl.php';</script>";

}
 ?>
  
<?php include("leavefooer.php");
?>
 
</body>

</html>
