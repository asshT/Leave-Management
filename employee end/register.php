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
a:hover{ text-decoration:underline;
font-weight:bold;}
</style>

<link rel="stylesheet" type="text/css" href="file:///G|/emp_tabs.css">

</head>
<body>

<?php include('leaveheader.php');
$conn = mysqli_connect("localhost","root","","leavedb") or die("error");
 
$sql5="Select * from department;";
$result=mysqli_query($conn,$sql5);
$a;
$i=0;
while($row=mysqli_fetch_array($result))
 { $a[$i]=$row['dept_name'];
     $i++;
 }?>

<div class="head">
<br><br>
<center>
<div class="below">
<font style="font-size:21px"><b> Enter the Details</b></font> <hr />


<form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post">



<table>                                   
<tr><td>Name :</td><td><input type="text" name= "emp_name" size="30">  </td></tr>                           
<tr><td>Department :</td><td><select name="emp_dept"> <option><?php echo $a[0]; ?></option>
<option><?php echo $a[1]; ?></option>
<option><?php echo $a[2]; ?></option>
<option><?php echo $a[3]; ?></option>
<option><?php echo $a[4]; ?></option>

</select> </td></tr>                                                     
<tr><td>Category:</td><td><input type="radio" name="emp_cat" value="t" checked="checked"/> Teaching &nbsp; &nbsp; &nbsp; <input type="radio" name="emp_cat" value="n"/> Non-teaching</td></tr>                 
<tr><td>Password :</td><td><input type="password" name= "pass" size="30">  </td></tr></table><br>
<center><input type="submit" name="submit" value="Submit">  <input type="Reset" name="reset" value="Reset"></center>

</form>
</div>
<br>

<?php

$message = 'Please enter a valid UserID';
$done = 'Sign Up Successful ';
if(isset($_POST['submit']))
{ 
 

//echo"You have registered successfully.";
//$emp_id = $_SESSION['emp_id'];
$name = $_POST['emp_name'];
$dept = $_POST['emp_dept'];
$cat = $_POST['emp_cat']; 
$pass = $_POST['pass'];

//$sql = "SELECT * from login2 where _id = '$emp_id'";
//$row = mysql_query($sql);
//$count = mysql_num_rows($row);
//if(!$count)
$sql = "INSERT into login2 (name,department,category,password) values ('$name','$dept','$cat','$pass')";
$fetch=mysqli_query($conn,$sql);
//$fetch = mysql_query($sql);
if(!$fetch){
  echo mysql_error();
  }
//echo"<script> alert ('$done');";
else
{ 
 $result = mysqli_query($conn,"UPDATE  login2 set result = CONCAT(department,category,e_id)");
  //echo "query 2 done";

   
$quer= "SELECT * from login2 where e_id IN(select max(e_id) from login2)";
$result=mysqli_query($conn,$quer)
or die("No leaves to be viewed");
  //$qr= mysqli_query($conn,"SELECT * from login2 where e_id = '$a'");
 //echo "query 3 done"; 
  while ($row = mysqli_fetch_array($result)){
   ?>
   <font size="+2">
   <?php echo "Your Employee ID is ";
    echo "<b>".$row['result']."</b><br>";
     } 
echo '<a href="form0.php" >Login Here>></a>';
 }

  }
?> </font>
<br><br>
</div>
  
<?php include("leavefooer.php");
?>


</body>
</html>