<?php session_start(); ?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" name="form" onSubmit="MM_validateForm('user_id','','R','pass','','R');return document.MM_returnValue" >

<table>
<tr><td>Admin ID </td><td> :<input type="text" name="aname" size="30"></td></tr>
<tr><td>Password </td><td>:<input type="password" name ="apass" size="30"></td></tr></table>
<center><input type="submit" name="submit2" value="Submit">    <input type="reset" name="reset" value="Reset"></center>
</form>

<?php
$conn = mysqli_connect("localhost","root","","leavedb") or die("error");
//$db = mysql_select_db("leavedb",$conn);// Retrieve username and password from database according to user's input
if(isset($_POST['submit2'])){
$login = mysqli_query($conn,"SELECT * FROM adminlogin WHERE (adminame = '" . mysql_real_escape_string($_POST['aname']) . "') and (adminpass = '" . mysql_real_escape_string($_POST['apass']) . "')");

// Check username and password match
if (mysql_num_rows($login) == 1) {
// Set username session variable

$_SESSION['adminid'] = $_POST['aname'];

$_SESSION['passwd'] = $_POST['apass'];
//echo $_SESSION['emp_id'];

header('Location: admin1.php');
}
else {
// Jump to login page
$message= "invalid username or password" ;
echo "<script> alert ('$message');window.location.href='adminlogin1.php';</script>";
//header('Location: form0.php');
}
}

?>

