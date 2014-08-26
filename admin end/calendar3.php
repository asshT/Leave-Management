<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
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
<link rel="stylesheet" type="text/css" href="calendar.css">

</head>

<body>
<?php include('leaveheader.php'); ?>

<div class="head">
<br />
<div class="list">
<ul><center>
<li><a class="list" href="admin1.php">Manage leave types</a></li>
<li><a class="list" href="admin2.php">Approve/Deny leaves</a></li>
<li><a class="list" href="newleavedate.php">Manage holidays</a></li>
<li><a class="list" href="logout.php">Leave Status</a></li>
<li><a class="list" href="logout.php">Logout</a></li></center></ul>
</div>
<p style="clear:both"></p>
<br />



<?php
mysql_connect("localhost", "root", "") or die (mysql_error());
//echo "Connected to Mysql<br/><hr/>";
mysql_select_db("leavedb") or die (mysql_error());
//echo"Connected to Database<br/><hr>";
?>

<head>
<script>
function goLastMonth(month, year){
if(month == 1) {
--year;
month = 13;
}
--month
var monthstring= ""+month+"";
var monthlength = monthstring.length;
if(monthlength <=1){
monthstring = "0" + monthstring;
}
document.location.href ="<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
}
function goNextMonth(month, year){
if(month == 12) {
++year;
month = 0;
}
++month
var monthstring= ""+month+"";
var monthlength = monthstring.length;
if(monthlength <=1){
monthstring = "0" + monthstring;
}
document.location.href ="<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
}
</script>
<style>
.today{
background-color: #00ff00;
}
.event{
background-color:#FFFF00;
vertical-align:text-top;
}


.eve1
{
vertical-align:text-top;
}
</style>
<link rel="stylesheet" type="text/css" href="admin_tabs.css">
<link rel="stylesheet" type="text/css" href="table.css">

</head>
<body>
<?php
if (isset($_GET['day'])){
$day = $_GET['day'];
} else {
$day = date("j");
}
if(isset($_GET['month'])){
$month = $_GET['month'];
} else {
$month = date("n");
}
if(isset($_GET['year'])){
$year = $_GET['year'];
}else{
$year = date("Y");
}
$currentTimeStamp = strtotime( "$day-$month-$year");
$monthName = date("F", $currentTimeStamp);
$numDays = date("t", $currentTimeStamp);
$counter = 0;
?>
<table align="right" style="border-collapse: collapse;border: 1px solid #030303"><tr><td style="background-color:#00ff00; width:40px"></td><td>Today</td></tr>
<tr><td style="background-color:#FFFF00"></td><td>Leave request day</td></tr></table>
<center>
<table id="calendar">
<tr>
<th><input style='width:50px;' type='button' value='<'name='previousbutton' onclick ="goLastMonth(<?php echo "    ".$month.",".$year?>)"></th>
<th colspan='5'><center><?php echo $monthName.", ".$year; ?></center></th>
<th><input style='width:50px;' type='button' value='>'name='nextbutton' onclick ="goNextMonth(<?php echo "    ".$month.",".$year?>)"></th>
</tr>

<tr>
<td width='100px' >Sun</td>
<td width='100px' >Mon</td>
<td width='100px' >Tue</td>
<td width='100px' >Wed</td>
<td width='100px' >Thu</td>
<td width='100px' >Fri</td>
<td width='100px' >Sat</td>
</tr>
<?php
echo "<tr style=\"background-color:#e8e8e8\">";
$a=" ";
$b=" ";
for($i = 1; $i < $numDays+1; $i++, $counter++){
$timeStamp = strtotime("$year-$month-$i"); 
$d=$year."-".$month."-".$i;
$sqlCount = "select * from leave_application where date_from='$d'";
$result=mysql_query($sqlCount);
while ($events = mysql_fetch_array($result))
{$a=" ".$events['emp_id'].", ";
 echo $a;
}
if($i == 1) {
$firstDay = date("w", $timeStamp);
for($j = 0; $j < $firstDay; $j++, $counter++) {
echo "<td>&nbsp;</td>";
}
}
if($counter % 7 == 0) {
echo"<td width='150px' height='100'></td></tr><tr style=\"background-color:#e8e8e8\">";
}
$monthstring = $month;
$monthlength = strlen($monthstring);
$daystring = "".$i;
$daylength = strlen($daystring);
if($monthlength <= 1){
$monthstring = "0".$monthstring;
}
if($daylength <=1){
$daystring = "0".$daystring;
}
$todaysDate = date("Y-m-d");
$dateToCompare = $year.'-'.$monthstring. '-' . $daystring ;
echo "<td align='center' ";
//echo "class='eve1'";
if ($todaysDate == $dateToCompare){
echo "class ='today'";
} else{
$sqlCount = "select * from leave_application where date_from='".$dateToCompare."'";
$result=mysql_query($sqlCount);
$noOfEvent = mysql_num_rows(mysql_query($sqlCount));
$f=0;
if($noOfEvent >= 1){

echo "class='event'";
//$b=" "." Emp_ID : ".$a." ";
}
while($events=mysql_fetch_array($result))
{$e[$f]=$events['emp_id'];
 $sql="select * from employee_personal,leave_application where employee_personal.emp_id=".$events['emp_id']."";
 $res=mysql_query($sql);
 $n=mysql_fetch_row($res);
 echo $n['1'];
 $f=$f+1;
 echo "><font size=1> Emp ID : </font>";
 echo " <font size=1>"; ?>
 
 <?php echo "<a href ='' title ='".$n[1]."'>".$events['emp_id']."</a></font>";
}
/*$noOfEvent = mysql_num_rows(mysql_query($sqlCount));
if($noOfEvent >= 1){

echo "class='event'";
//$b=" "." Emp_ID : ".$a." ";
}
else
{//$b="";
}*/
}

echo "<br><center><a href='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true' title = 'date'>".$i."</a></center></td>";
}
echo "</tr>";
?>
</table>
</center>
<br /><br />

<center><table id="leaves">
<tr>
<th>SNo</th>
<th>Emp_ID</th>
<th>Leave_ID</th>
<th>Status</th>
<th>Reason</th>
<th>Number of Days</th>
<th>From</th>
<th>To</th>
<th>Approve/Deny</th>
</tr>
<?php
if(isset($_GET['v'])) {
$daystring=$_GET['day'];
$monthstring=$_GET['month'];
$year=$_GET['year'];
$d=$year.'-'.$monthstring. '-' . $daystring ;
$d="".$d."";
$sqlEvent = "select * FROM leave_application where date_from <= '$d' and date_to >='$d'";
$resultEvents = mysql_query($sqlEvent);
if(!$resultEvents)
{echo mysql_error();
}
while ($events = mysql_fetch_array($resultEvents)){
$sno=$events['sno'];
echo "<tr>";
echo "<td>".$events['sno']."</td>";
echo "<td>".$events['emp_id']."</td> ";
echo "<td>".$events['leave_id']."</td> ";
echo "<td>".$events['status']."</td> ";
echo "<td>".$events['reason']." </td>";
echo "<td>".$events['nod']."</td> ";
echo "<td>".$events['date_from']."</td> ";
echo "<td>".$events['date_to']."</td> ";
echo"</td><td>";
echo '<a href="approve.php?sno='.$sno.'"><img style="border:0; padding-left:40px;padding-right:20px;" src="images/approve.png" alt="Approve" width="25" height="25" ></a>';
 echo '<a href="deny.php?sno='.$sno.'"><img style="border:0;" src="images/deny.png" alt="Deny" width="23" height="23"></a>';
echo "</tr>";
}
}
?>
</table>
</body>
</html>
<?php 
include('leavefooer.php');
?> 