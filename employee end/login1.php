<?php

// Inialize session
session_start();

$conn = mysqli_connect("localhost","root","","leavedb") or die("error");
//$db = mysql_select_db("leavedb",$conn);

// Retrieve username and password from database according to user's input
$login = mysqli_query($conn,"SELECT * FROM login2 WHERE (result = '" . mysqli_real_escape_string($conn,$_POST['user_id']) . "') and (password = '" . mysqli_real_escape_string($conn,$_POST['pass']) . "')");

// Check username and password match
if (mysqli_num_rows($login) == 1) {
// Set username session variable

$_SESSION['emp_id'] = $_POST['user_id'];

header('Location: securedpage.php');
}
else {
// Jump to login page
$message= "invalid username or password" ;
echo "<script> alert ('$message');window.location.href='form0.php';</script>";
//header('Location: form0.php');
}

?>