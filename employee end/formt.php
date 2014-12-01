<?php session_start(); ?>
<html>
<head>
<title>
Employee Personal Details Form
</title>
<style>
.head{ background-color:#FFFFFF;
}
.below{  border: 1px solid gray;
   
   text-align: left;
    width: 50%;
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
<font style="font-size:21px"><b> Enter Personal Details</b></font> <hr />


<form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post">



<table>  
<tr><td>Employee ID:</td><td><?php echo $_SESSION['emp_id']; ?></td></tr>                                    
<tr><td>Name :</td><td><input type="text" name="naam"> </td></tr>                           
<tr><td>Age:</td><td><input type="text" name="emp_age" size="3"></center></td></tr>
<tr><td>Address :</td><td><textarea rows="5" cols="50" name="emp_add"> </textarea>  </td></tr>                    
<tr><td>Phone No.:</td><td><input type="text" name="emp_phone" size="30"></center> <br></td></tr>        

<tr><td>Email ID:</td><td> <input type="text" name= "emp_mail" size="30"></td></tr>                               
<tr><td>Gender:</td><td><input type="radio" name="emp_gen" value="m" checked="checked"/> Male &nbsp; &nbsp; &nbsp; <input type="radio" name="emp_gen" value="f"/> Female</td></tr>                  
</table><br>
<center><input type="submit" name="submit" value="Submit">  <input type="Reset" name="reset" value="Reset"></center>

</form>
</div>
<br><br>
</div>
  
<?php include("leavefooer.php");
?>


</body>
</html>
<?php
$conn = mysqli_connect("localhost","root","","leavedb") or die("error");


if(isset($_POST['submit'])){
//echo $_SESSION['emp_id'];
$emp_id = $_SESSION['emp_id'];
$name = $_POST['naam'];
$age = $_POST['emp_age'];
$address = $_POST['emp_add'];
$phone = $_POST['emp_phone'];
$email = $_POST['emp_mail'];
$gender = $_POST['emp_gen']; 



$sql1 = "INSERT into employee_personal values ('$emp_id','$name','$address','$age','$gender','$phone','$email')";
$fetch = mysqli_query($conn,$sql1);
if(!$fetch)
{ echo 'failed to add';
//include('formt.php');
}
  
  else
echo "<script>alert ('Record added!!');window.location.href='securedpage.php';</script>";
}

?>
