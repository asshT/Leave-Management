<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Leave Search Page</title>
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
  </script><style>
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
<?php include('leaveheader.php'); ?>

<div class="head">
<br />

<?php include('admin_navbar.php'); ?>
<p style="clear:both"></p>
<br />
<center>
<div class="below">
<font style="font-size:21px"><b>Enter the constraints</b></font> <hr />

<form action="searchdateback.php" method="post">
<table>
	<tr><td>Employee Name:</td><td><input type="text" name= "emp_name" /></td></tr>
    <tr><td>Employee ID:</td><td><input type="text" name= "emp_id" /></td></tr>
    <tr><td>From: </td><td><input type="text" id="datepicker" name="date_from"/></td></tr>
    <tr><td>To: </td><td><input type="text" id="datepicker1" name="date_to"/>  </td></tr>  
</table>
<center><input type="submit" name="submit" /></center>
</form><br />
</div><br /></div>
<?php include('leavefooer.php'); ?>	
</div>

</body>
</html>