<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Manage Holidays</title>
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
 });
  </script>
  <style>
.head{ background-color:#FFFFFF;
}
</style>

<link rel="stylesheet" type="text/css" href="admin_tabs.css">
<link rel="stylesheet" type="text/css" href="table.css">

</head>
<body>

<?php include('leaveheader.php'); ?>
<div class="head">
<br />
<?php include('admin_navbar.php');?>
<p style="clear:both"></p>
<br />

<?php
/*<form action="addleave.php" method ="post" >
<table><tr><td>
Holiday name: </td><td><input type="text" id="name1" name="name"></td></tr>
<tr><td>Type: </td><td>Full Day<input type="radio" name="type" value="Fullday">		Half Day<input type="radio" name="type" value="Halfday"></td></tr>
<tr><td>	  
Date: </td><td><input type="text" id="datepicker" name="date"/>

</td></tr></table>
<center>
<input type="submit" value="Add holiday"> </center></form></div><br /><br /></center>*/
include('calendar.php');
?>
<br><br>
</div>
<?php include('leavefooer.php'); ?>	
</body>
</html>