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
<tr><td>Username :</td><td><input type="text" name= "adminame" size="10">  </td></tr>                                          
<tr><td>Password :</td><td><input type="text" name= "adminpass" size="10">  </td></tr></table><br>
<center><input type="submit" name="submit" value="Submit">  <input type="Reset" name="reset" value="Reset"></center>

</form>
</div>
<br><br>

<?php
$conn = mysql_connect("localhost","root","") or die("error");
$db = mysql_select_db("leavedb",$conn);
$message = 'Please enter a valid AdminID';
$done = 'Sign Up Successful ';
if(isset($_POST['submit']))
{

//$emp_id = $_SESSION['emp_id'];
$aname = $_POST['adminame'];
$apass = $_POST['adminpass'];

//$sql = "SELECT * from login2 where _id = '$emp_id'";
//$row = mysql_query($sql);
//$count = mysql_num_rows($row);
//if(!$count)
$sql = "INSERT into adminlogin (adminame,adminpass) values ('$aname','$apass')";
$fetch = mysql_query($sql);
if(!$fetch){
  echo mysql_error();
  echo "error";
  }
  else
    echo"You have registered successfully.";
/* echo"<script> alert ('$done');";
else
{ 
 $result = mysql_query("UPDATE  adminlogin set result = CONCAT(department,category,e_id)") or die("error");
  //echo "query 2 done";

   
	 $a= mysql_result(mysql_query("SELECT max(e_id) from login2"),0);

	 //echo $a;
  
  $qr= mysql_query("SELECT * from login2 where e_id = '$a'") or die("error");
 //echo "query 3 done"; 
  while ($row = mysql_fetch_array($qr)){
    echo "your emploee ID is";
    echo $row['result'];
     }
echo '<a href="form0.php">Login Here</a>';
 }
*/
} 

?>
<a href="form0.php">Login Now</a>
</div>
  
<?php include("leavefooer.php");
?>


</body>
</html>
