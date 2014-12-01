<?php session_start(); ?>
<html>
<head>
<title>
Registration Form
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

<link rel="stylesheet" type="text/css" href="file:///G|/emp_tabs.css">

</head>
<body>

<?php include('leaveheader.php'); ?>

<div class="head">
<br><br>
<center>
<div class="below">
<font style="font-size:21px"><b> Enter the Details</b></font> <hr />


<form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post">



<table>                                   
<tr><td>AdminId :</td><td><input type="text" name= "adm_id" size="30">  </td></tr>                           
<tr><td>Password :</td><td><input type="password" name= "pass" size="30">  </td></tr></table><br>
<center><input type="submit" name="submit" value="Submit">  <input type="Reset" name="reset" value="Reset"></center>

</form>
</div>
<br><br>

<?php
$conn = mysqli_connect("localhost","root","","leavedb") or die("error");

$message = 'Please enter a valid UserID';
$done = 'Sign Up Successful ';
if(isset($_POST['submit']))
{
echo"You have registered successfully.";
//$emp_id = $_SESSION['emp_id'];
$name = $_POST['adm_id'];
$pass = $_POST['pass'];

//$sql = "SELECT * from login2 where _id = '$emp_id'";
//$row = mysql_query($sql);
//$count = mysql_num_rows($row);
//if(!$count)
$sql = "INSERT into adminlogin (admin_id,password) values ('$name','$pass')";
$fetch=mysqli_query($conn,$sql);
if(!$fetch)
  {echo mysql_error();}
 else
 {echo "<script>alert ('Record added!!');window.location.href='form_adm.php';</script>";
  }
  
} 

?>

</div>
  
<?php include("leavefooer.php");
?>


</body>
</html>
