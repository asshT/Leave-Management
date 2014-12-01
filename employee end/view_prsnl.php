<?php session_start();
?>
<html>
<head>
<title>Personal Details</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
.head{ background-color:#FFFFFF;
}
.below{  border: 1px solid gray;
   
   text-align: left;
    width: 50%;
    background-color:#E8E8E8; 
    padding: 18px;
}
td.tabletd{ 
    width: 250px; 
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
<font style="font-size:21px"><b>Your Personal Data</b></font> <hr />


<?php
$conn =mysqli_connect("localhost","root","","leavedb") or die("error");
//$db = mysql_select_db("leavedb",$conn);
$result = mysqli_query($conn,"SELECT * FROM employee_personal WHERE (emp_id = '" . $_SESSION['emp_id'] ."')");
//$result = mysql_query("SELECT * FROM employee_personal WHERE (emp_id = '" . $_POST['empl_id'] ."')"); 
if($result) {
?>
<?php
echo "<table><tr><td>Employee ID</td>";
echo "<td class=\"tabletd\">";
echo $_SESSION['emp_id'];
echo "</td></tr>";}?>

<?php   while($row = mysqli_fetch_array($result)){
        echo  "<tr><td class=\"tabletd\">Employee Name</td><td class=\"tabletd\">" . $row['emp_name'] . "</td></tr>";
        echo "<tr><td class=\"tabletd\">Address</td><td class=\"tabletd\">" . $row['address'] . "</td></tr>";
		echo "<tr><td class=\"tabletd\">Age</td><td class=\"tabletd\">" . $row['age'] . "</td></tr>";
		echo "<tr><td class=\"tabletd\">Contact No.</td><td class=\"tabletd\">" . $row['contact'] . "</td></tr>";
		echo "<tr><td class=\"tabletd\">Email ID</td><td class=\"tabletd\">" . $row['email_id'] . "</td></tr>";
		echo "<tr><td class=\"tabletd\">Gender</td><td class=\"tabletd\">" . $row['gender'] . "</td></tr>";}
		echo"</table><center>";
        echo "<tr><td><a href=\"edit_prsnl.php\">"."Edit"."</a></center>"; 
   

      ?>

     
</div></center>
<br><br>
</div>
  
<?php include("leavefooer.php");
?>
</body>

</html>
