<?php
mysql_connect("localhost", "root", "") or die (mysql_error());
//echo "Connected to Mysql<br/><hr/>";
mysql_select_db("leave_management") or die (mysql_error());
//echo"Connected to Database<br/><hr>";
?>
<html>
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
background-color: #FF8080;
}

.below{  border: 1px solid gray;
   
   text-align: left;
    width: 30%;
    background-color:#E8E8E8; 
    padding: 18px;
}

</style>

<link rel="stylesheet" type="text/css" href="calendar.css">
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
<?php
if(isset($_GET['add'])){
$title =$_POST['txttitle'];
$detail =$_POST['txtdetail'];
$eventdate = $month."/".$day."/".$year;
$sqlinsert = "INSERT into leave_holiday1(Title,Detail,eventDate,dateAdded) values ('".$title."','".$detail."','".$eventdate."',now())";
$resultinginsert = mysql_query($sqlinsert);
if($resultinginsert ){
echo "Event was successfully Added...";
}else{
echo "Event Failed to be Added....";
}
}
?>
<center>
<table id="calendar">

<tr>
<th><input style='width:50px;' type='button' value='<'name='previousbutton' onclick ="goLastMonth(<?php echo $month.",".$year?>)"></th>
<th colspan='5'><center><?php echo $monthName.", ".$year; ?></center></th>
<th><input style='width:50px;' type='button' value='>'name='nextbutton' onclick ="goNextMonth(<?php echo $month.",".$year?>)"></th>
</tr>
<tr>
<td width='50px'>Sun</td>
<td width='50px'>Mon</td>
<td width='50px'>Tue</td>
<td width='50px'>Wed</td>
<td width='50px'>Thu</td>
<td width='50px'>Fri</td>
<td width='50px'>Sat</td>
</tr>
<?php
echo "<tr style=\"background-color:#e8e8e8\">";
for($i = 1; $i < $numDays+1; $i++, $counter++){
$timeStamp = strtotime("$year-$month-$i");
if($i == 1) {
$firstDay = date("w", $timeStamp);
for($j = 0; $j < $firstDay; $j++, $counter++) {
echo "<td>&nbsp;</td>";
}
}
if($counter % 7 == 0) {
echo"</tr><tr style=\"background-color:#e8e8e8\">";
}
$monthstring = $month;
$monthlength = strlen($monthstring);
$daystring = $i;
$daylength = strlen($daystring);
if($monthlength <= 1){
$monthstring = "0".$monthstring;
}
if($daylength <=1){
$daystring = "0".$daystring;
}
$todaysDate = date("m/d/Y");
$dateToCompare = $monthstring. '/' . $daystring. '/' . $year;
echo "<td align='center' ";
if ($todaysDate == $dateToCompare){
echo "class ='today'";
} else{
$sqlCount = "select * from leave_holiday1 where eventDate='".$dateToCompare."'";
$noOfEvent = mysql_num_rows(mysql_query($sqlCount));
if($noOfEvent >= 1){
echo "class='event'";
}
}
echo "><a href='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true'>".$i."</a></td>";
}
echo "</tr>";
?>
</table></center><br><br>
<?php
if(isset($_GET['v'])) {

?>

<center>
<div class="below">
<font style="font-size:21px"><a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day."&year=".$year."&v=true&f=true'><b>Add Holiday</b></a></font> <hr />


<?php

if(isset($_GET['f'])) {
include("eventform.php");
}
$sqlEvent = "select * FROM leave_holiday1 where eventDate='".$month."/".$day."/".$year."'";
$resultEvents = mysql_query($sqlEvent);

while ($events = mysql_fetch_array($resultEvents)){
echo"<center><table>
	<tr><td>";
echo "Name: </td><td>".$events['Title']."</td></tr>";
echo "<tr><td>Type: </td><td>".$events['Detail']."</td></tr></table></center>";
}
}
?>
</body>
</html> 