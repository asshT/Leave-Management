<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit leave</title>
<style>
.head{ background-color:#FFFFFF;
}
.below{  border: 1px solid gray;
   
   text-align: left;
    width: 40%;
    background-color:#E8E8E8; 
    padding: 18px;
}

</style>
<link rel="stylesheet" type="text/css" href="table.css">

</head>

<body>
<?php include('leaveheader.php'); ?>



<?php
$conn = mysqli_connect("localhost","root","","leavedb") or die("error");?>


<div class="head">
<br />

<?php include('admin_navbar.php'); ?>
<p style="clear:both"></p>
<br />


<center>

<div class="below">
<font style="font-size:21px"><b>Edit Leave</b></font> <hr />

	
<?php //-----------------1. Basic Form where you enter the edited info----------------------
if(!isset($_POST['submit']))
{
	$leave_name=$_GET['leavename']; 
	$leaves_t=$_GET['leavet'];
	$leaves_nt=$_GET['leavent'];
	
	

	$query= "select * from leave_types where leave_name='$leave_name'";
	$result = mysqli_query($conn,$query)
	or die("Error querying Database");
	
	
		while($row=mysqli_fetch_array($result))
		{
			
?>

			<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
			<table>
			<tr><td>Leave Name: </td>
			<td><input type="text" name= "leave_name" value="<?php echo $leave_name?>" /></td></tr>
            <tr><td>Duration:</td>
	        <td><input type="radio" name="dur" value="Monthly"/>Monthly &nbsp;<input type="radio" name="dur" value="Annually" checked="checked"/>            Annually</td></tr>
           <tr><td> No. of Leaves alotted(teaching):</td><td><input type="text" name= "leaves_t" value="<?php echo $leaves_t ?>" /></td></tr>
	       <tr><td> No. of Leaves alotted(non teaching):</td><td><input type="text" name= "leaves_nt" value="<?php echo $leaves_nt ?>" /></td></tr>

</table>

<center>	

 				<input type="submit" name="submit" value="Make changes" /></center></form>
				</div><br /><br /></center>

<?php
		}
	}

	//--------------------------if form is submitted then edit the database using query---------------------------	

	if(isset($_POST['submit']))
	{	
		$x=$_POST['leaves_t'];
		$y=$_POST['leave_name'];
		$z=$_POST['leaves_nt'];
		
		if($_POST['dur']=='Monthly')
     	{
		$query2 = "UPDATE leave_types SET teaching='$x',nteaching='$z'  WHERE leave_name='$y';" ;
		$result2=mysqli_query($conn,$query2)
		or die("Error querying Database2");
		header( "Location: admin1.php" );
	    }
	    else
	    {
	    $x1 = ($x)/12;
	    $z1 = ($z)/12;
		$query2 = "UPDATE leave_types SET teaching='$x1',nteaching='$z1' WHERE leave_name='$y';" ;
		$result2 = mysqli_query($conn,$query2)
		or die("Error querying Database2");
		header( "Location: admin1.php" );
	
	    }
}

?>
</div>
<?php include('leavefooer.php'); ?>	

</body>
</html>