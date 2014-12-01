<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Announcements</title>
  <meta charset="utf-8" />
  <title>Leave Management System</title>
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
</head>
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

<body>
<?php include('leaveheader.php'); ?>
<?php $conn= mysqli_connect("localhost","root","","leavedb") or die("error");
?>
<div class="head">
<br />

<?php include('admin_navbar.php'); ?>
<p style="clear:both"></p>

<center>
<div class="below">
<center><font style="font-size:21px"><b>Notice Board</b></font> <hr />


<h4> Add new announcement </h4>
<hr />
<form method=post action="announcement.php">
<b>Topic:</b><br><input type=text name="topic" ><br><br>

<b>Date:<br> </b><input type="text" id="datepicker" name="date"/><br /><br>

<b>Message:</b><br><textarea cols=50 rows=9 name="content"></textarea><br><br>

<b>Designation:</b><br><input type=text name="designation" ><br><br>

<input type="submit" name="submit" value="submit">
</form>
</center>
</div>
</center>
<?php
if(isset($_POST['submit']))
{
	$date=$_POST['date'];
	$topic=$_POST['topic'];
	$content=$_POST['content'];
	$designation=$_POST['designation'];

	$query= "insert into announcement values ('$date','$topic','$content','$designation')";
$result=mysqli_query($conn,$query)
or die("Error querying database");

}
?><br />
</div>
<?php include('leavefooer.php'); ?>	
</div>

</body>
</html>