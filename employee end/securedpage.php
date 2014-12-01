<?php

// Inialize session
session_start();
$conn = mysqli_connect("localhost","root","","leavedb") or die("error"); //new
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['emp_id'])) {
header('Location: form0.php');
}

?>
<html>

<head>
<title>Home Page</title>
<style>
.head{ background-color:#FFFFFF;
}

</style>
<link rel="stylesheet" type="text/css" href="table.css">

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

<p style="padding-left:20px"><font size="+1">   Hello <b><?php echo $_SESSION['emp_id']; ?>!</b></font></p>


<?php
$empid= $_SESSION['emp_id'];

$query="select * from leave_application where emp_id ='$empid'";
$result=mysqli_query($conn,$query)
or die("No leaves to be viewed");
	echo "<h2 style=\"padding-left:20px\">Your Leave List</h2>";
	
	 ?>
<?php
if (mysqli_num_rows($result) == 0) {
 echo '<font size="+1"><center>No leaves to be viewed.</center></font>';
 }
 else 
 echo"<center><table id=\"leaves\" border=1><tr>

 
    		<th> Leave Type </th>
            <th> Date From </th>
            <th> Date To </th>
            <th> Number Of Days </th>
            <th> Status </th>
            </tr>";
{	
 
 
while($row= mysqli_fetch_array($result))
{	
$l_id = $row['leave_id'];

	$query1="select leave_name from leave_types where leave_id ='$l_id'";
	$result1=mysqli_query($conn,$query1)
	or die("error no 1");
		while($row1= mysqli_fetch_array($result1))
		echo "<tr><td> ".$row1['leave_name']."</td>";
		
		echo " <td> ".$row['date_from']."</td>";
	echo " <td> ".$row['date_to']."</td>";
	echo " <td> ".$row['nod']."</td>";
	if($row['status'] == 'p')
	echo " <td> "."Pending"."</td> </tr>";
	else if($row['status'] == 'a')
	echo  "<td> "."Approved"."</td></tr>";
	;
}}

?> </table></center>
<br>
<hr>


<h2><marquee>Important Announcements!</marquee></h2>
<?php
//$limit_word = 200;

$query = "SELECT * FROM announcement ORDER BY date DESC";
$result=mysqli_query($conn,$query)
or die("Error querying database");
?>
<style>
#notice{ border:thick #000000 solid;
margin-left:25%;
margin-right:25%;
padding-left:20px;
padding-right:20px;}
</style>
<div id="notice">
<?php while($row=mysqli_fetch_array($result))
{	 
 $topic = $row['topic'];
      $content = $row['content'];
      $date =  $row['date'];
    ?>
	<br><b>
	<?php echo $date;
	echo "</b><br>";
	echo $topic;
	  //echo substr( $content,0,$limit_word);
	  echo $content;
	  echo "<br>";
	//  echo '<a href="read_more.php?id=$id">Click Here to Read More</a>';
	  echo "<br><hr>";
}

?>
</div>  <?php // announcement ends?>
<br>

</div>

  <?php include("leavefooer.php");
?>

</body>

</html>