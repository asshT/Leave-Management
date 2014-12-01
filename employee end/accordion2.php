<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Accordion - Default functionality</title>
   <link rel="stylesheet" href="jquery-ui.css">
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  <link rel="stylesheet" href="style.css">
  <script>
  $(function() {
    $( "#accordion" ).accordion();
  });
  </script>
</head>
<body>
<style>
.head{ background-color:#FFFFFF;
width:100%;
height:100%;
}
.below{  border: 1px solid gray;
   
   text-align: left;
    width: 30%;
    background-color:#E8E8E8; 
    padding: 18px;
}

</style>
</head>
<body>
<?php include("leaveheader.php");
?>
 
 
 <div class="head">
 
 
<div id="accordion">
  <h3>Personal Details</h3>
  <div>
    <p>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
	Name : <input type="text" name= "name2" > <br>
   Age:<input type="text" name="emp_age" size="3"><br>
Address :<textarea rows="5" cols="50" name="emp_add"> </textarea><br>                   
Phone No.:<input type="text" name="emp_phone" size="30"></center> <br>       

Email ID:<input type="text" name= "emp_mail" size="30">  <br>                            
Gender:<input type="radio" name="emp_gen" value="m" checked="checked"/> Male &nbsp; &nbsp; &nbsp; <input type="radio" name="emp_gen" value="f"/> Female                <input type="submit" name="submit" value="AddPersonalDetails"  /></form> 
   
    </p>
  </div>
  <h3>Professional Details</h3>
  <div>
    <p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" accept-charset="utf-8"><br>Qualification<input type="text" name="qual" value=""  />Designation<input type="text" name="designation" value=""  /><label for="date">Date of joining</label><input type="text" name="date" value="" id="date"  /><br><input type="submit" name="submit" value="AddDetails"  /></form> 
    </p>
  </div>
  <h3>Registration Details</h3>
  <div>
    <p>
     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >Name :<input type="text" name= "emp_name" size="30"><br>Department:<input type="text" name="emp_dept" size="3"><br>Category:<input type="radio" name="emp_cat" value="t" checked="checked"/> Teaching &nbsp; &nbsp; &nbsp; <input type="radio" name="emp_cat" value="n"/> Non-teaching<br>
	 Password:<input type="password" name="pass">
	<input type="submit" name="submit" value="register"  /></form> 
    </p>
   
  </div>
  <h3>Section 4</h3>
  <div>
    <p>
    
   <a href="form0.php">Login Here!</a>
	
    </p>
  </div>
</div>
 
 </div>
</body>
</html>

<?php
static $c;
$conn = mysql_connect("localhost","root","") or die("error");
$db = mysql_select_db("leavedb",$conn);?>
<font color="#FFFFFF" size="+2">
<?php
$message = 'Please enter a valid UserID';
$done = 'Sign Up Successful ';
if (isset($_POST['submit'])) {
//$b = $_POST['submit']; }
 if($_POST['submit'] == "register")
{
//case "register" : 
 $done = "You have registered successfully.";
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
 $fetch = mysql_query($sql);
 if(!$fetch){
  echo mysql_error();
  }

 else
{ 
  $result = mysql_query("UPDATE  login2 set result = CONCAT(department,category,e_id)") or die("error");
   //echo "query 2 done";

   
	$a= mysql_result(mysql_query("SELECT max(e_id) from login2"),0);

	 //echo $a;
  
  $qr= mysql_query("SELECT * from login2 where e_id = '$a'") or die("error");
 //echo "query 3 done"; 
  while ($row = mysql_fetch_array($qr)){
   
	
    echo "your employee ID is";
    $c = $row['result'];
	 echo $c;
	 echo"<br><br>";
     }
//echo '<a href="form0.php">Login Here</a>';
  }
  
 }

else if($_POST['submit'] == "AddDetails") {
 
 //$emp_id = $_SESSION['emp_id'];

 $qual = $_POST['qual'];
 $desig = $_POST['designation'];
 $dat = $_POST['date']; 
//$pass = $_POST['pass'];

//$sql = "SELECT * from login2 where _id = '$emp_id'";
//$row = mysql_query($sql);
//$count = mysql_num_rows($row);
//if(!$count)
 $e= mysql_result(mysql_query("SELECT max(e_id) from login2"),0);

	 //echo $a;
  
  $qry1= mysql_query("SELECT * from login2 where e_id = '$e'") or die("error");
 //echo "query 3 done"; 
  while ($row = mysql_fetch_array($qry1)){
   
	
    echo "your employee ID is";
    $f = $row['result'];
	 echo $f;
	 echo"<br><br>";
     }
 $sql = "INSERT into employee_professional (emp_id,date_of_joining,designation,qual) values ('$f','$dat','$desig','$qual')" or die("error");
 $fetch = mysql_query($sql);
 if(!$fetch){
  echo mysql_error();
  }
//echo"<script> alert ('$done');";
 else
{ echo"Details added successfully.";
  }
}
else if($_POST['submit'] == "AddPersonalDetails"){
 
 $name2 = $_POST['name2'];
 $age = $_POST['emp_age'];
 $address = $_POST['emp_add']; 
 $mail = $_POST['emp_mail'];
 $phn = $_POST['emp_phone'];
 $gen = $_POST['emp_gen'];
//echo $c;
//$sql = "SELECT * from login2 where _id = '$emp_id'";
//$row = mysql_query($sql);
//$count = mysql_num_rows($row);
//if(!$count)
 $b= mysql_result(mysql_query("SELECT max(e_id) from login2"),0);

	 //echo $a;
  
  $qry= mysql_query("SELECT * from login2 where e_id = '$b'") or die("error");
 //echo "query 3 done"; 
  while ($row = mysql_fetch_array($qry)){
   
	
    echo "your employee ID is";
    $d = $row['result'];
	 echo $d;
	 echo"<br><br>";
     }
 $sql = "INSERT into employee_personal (emp_id,emp_name,address,age,gender,contact,email_id) values ('$d','$name2','$address','$age','$gen','$phn','$mail')" or die("error");
  echo "query 3 done";
 $fetch = mysql_query($sql);
 if(!$fetch){
  echo mysql_error();
  }
//echo"<script> alert ('$done');";
 else
{ echo"Details added successfully.";
  }
  
 }
 }
?>
