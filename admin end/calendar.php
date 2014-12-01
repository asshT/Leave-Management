<?php
$conn = mysqli_connect("localhost","root","","leavedb") or die("error"); //new

?>
<html>
<head>

<link rel="stylesheet" type="text/css" href="calendar.css">
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

</style>
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
//echo $title; 
$detail =$_POST['txtdetail'];
//echo $detail;
$eventdate = $month."/".$day."/".$year;
$sqlinsert = "INSERT into leave_holiday1(Title,Detail,eventDate,dateAdded) values ('".$title."','".$detail."','".$eventdate."',now())";
$resultinginsert = mysqli_query($conn,$sqlinsert);
if($resultinginsert ){
echo "Event ".$title." was successfully Added...";

}else{
echo "Event Failed to be Added....";
}
}
?>
<table align="right" style="border-collapse: collapse;border: 1px solid #030303">
<tr><td style="background-color:#00ff00; width:40px"></td><td>Today</td></tr>
<tr><td style="background-color:#FF8080"></td><td>Holiday</td></tr></table>

<center>
<table id="calendar">
<tr>
<th><input style='width:50px;' type='button' value='<'name='previousbutton' onclick ="goLastMonth(<?php echo $month.",".$year?>)"></th>
<th colspan='5'><?php echo $monthName.", ".$year; ?></th>
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
$noOfEvent = mysqli_num_rows(mysqli_query($conn,$sqlCount));
if($noOfEvent >= 1){
echo "class='event'";
}
}
echo "><a href='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true'>".$i."</a></td>";
}
echo "</tr>";
?>

</table></center>
<?php
if(isset($_GET['v'])) {
echo "<hr>";
echo "<a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day."&year=".$year."&v=true&f=true'>Add Holiday</a>";
if(isset($_GET['f'])) {
include("eventform.php");
}
$sqlEvent = "select * FROM leave_holiday1 where eventDate='".$month."/".$day."/".$year."'";
$resultEvents = mysqli_query($conn,$sqlEvent) or die("error");
echo "<hr>";
while ($events = mysqli_fetch_array($resultEvents)){
echo "Name: ".$events['Title']."<br>";
echo "Type: ".$events['Detail']."<br>";
}
}

?>
</body>
</html> 