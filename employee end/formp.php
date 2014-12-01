<?php session_start(); ?>
<html>
<head><meta charset="utf-8" />
<title>
Employee Professional Details Form
</title>
<link rel="stylesheet" href="jquery-ui.css" />
  <script src="jquery-1.9.1.js"></script>
  <script src="jquery-ui.js"></script>
 <script>
  $(function() {
    $( "#datepicker" ).datepicker({
           defaultDate: "+1w",
           dateFormat:"yy-mm-dd",
           showOn:"button",
           buttonImage:"calendar.gif",
           buttonImageOnly:true          
     });
	 $( "#datepicker1" ).datepicker({
           defaultDate: "+1w",
           dateFormat:"yy-mm-dd",
           showOn:"button",
           buttonImage:"calendar.gif",
           buttonImageOnly:true
           
  });
 });
  </script>
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

<?php include('leaveheader.php');
$conn = mysqli_connect("localhost","root","","leavedb") or die("error");
 ?>

<div class="head">
<br />

<?php
include ('emp_navbar.php');
?>
<p style="clear:both"></p>
<br />

<center>
<div class="below">
<font style="font-size:21px"><b> Enter Professional Details</b></font> <hr />
<?php $sql="Select * from designation;";
$result=mysqli_query($conn,$sql);
$a;
$i=0;
while($row=mysqli_fetch_array($result))
 { $a[$i]=$row['name'];
     $i++;
 }
?>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post">

<table>  
<tr><td>Employee ID:</td><td><?php echo $_SESSION['emp_id']; ?></td></tr>                                    
<tr><td>Designation :</td><td><select name="desig"> <option><?php echo $a[0]; ?></option>
<option><?php echo $a[1]; ?></option>
<option><?php echo $a[2]; ?></option>
<option><?php echo $a[3]; ?></option>

</select> </td></tr>                           
<tr><td>Date of Joining:</td> <td><input type="text" id="datepicker" name="date1"/></td></tr>
<tr><td>Qualification:</td> <td><input type="text"  name="qual"/></td></tr>

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
$desig = $_POST['desig'];
$date1 = $_POST['date1'];
$qual = $_POST['qual'];
 echo $desig;



$sql1 = "INSERT into employee_professional values ('$emp_id','$date1','$desig','$qual')";
$fetch = mysqli_query($conn,$sql1);
if(!$fetch)
  {echo mysql_error();}
 else
 {echo "<script>alert ('Record added!!');window.location.href='securedpage.php';</script>";
  }
}
?>
