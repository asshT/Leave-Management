<!DOCTYPE html>
<html>
<head>
<title>
Enter
</title>
<style>
.head{ background-color:#FFFFFF;
}
.below{  border: 1px solid gray;
   
   text-align: left;
    width: 30%;
    background-color:#E8E8E8; 
    padding: 18px;
}

section {
    width: 80%;
    height: 200px;
  
    margin: auto;
    padding: 10px;
}
div#one {
    width: 45%;
    height: 200px;
  background-color:#E8E8E8;
    float: left;
	border:#030303 solid thin;
	padding-top:10px;
	border-radius: 40px;
	
}
div#two {
width: 45%;
    margin-left: 50%;
    height: 200px;
    background-color:#E8E8E8;
    border:#030303 solid thin;
	border-radius: 40px;
	padding-top:10px;
}
a{ text-decoration:none;}

a:hover{ text-decoration:underline;
font-weight:bold;}
</style>
</head>
<body>
<?php include("leaveheader.php");
?>

<div class="head">
<br><br>
<br><br>
<center>
<section>
<div id="one">
<font style="font-size:21px"><b>Employee</b></font> <hr />
<font size="+3"><br> <a href="form0.php"> Login>> <a><br>
<a href="register.php"> Register>></a><br></font>
</div>
<div id="two">
<font style="font-size:21px"><b>Administrator</b></font> <hr />
<font size="+3"><br><a href="form_adm.php">Login>></a><br>
<a href="admin_reg.php">Register>></a><br>
</font>
</div>

</section>
<br><br><br><br><br></center></div>
<?php include("leavefooer.php");
?>

</body>
</html>
