<?php session_start();
if(isset($_POST['submit'])){
$id = $_SESSION['emp_id'];
$name = $_POST['name'];
$address = $_POST['address'];
$age = $_POST['age'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$gender = $_POST['gender'];
echo $id;
echo $name;
echo $address;
echo $age;
echo $contact;
echo $email;
echo $gender;
$conn = mysqli_connect("localhost","root","","leavedb") or die("error");
$qry = "UPDATE employee_personal SET emp_name='$name', address='$address',age='$age',contact='$contact',email_id='$email',gender='$gender' WHERE emp_id='$id'";
$result=mysql_query($qry);


if(!$result)
echo "error";
else
echo "done";
header('Location: view_prsnl.php');
}


?>
