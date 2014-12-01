<html>
<head>
<script>
function validateForm()
{var x = document.forms["form"]["user"].value;
var y = document.forms["form"]["pass"].value;
var z = document.forms["form"]["name"].value;
if(z==null || z=="")
 {alert("Name cannot be blank ");
   return false;
 }
else
{if(x==null || x=="")
     {alert("Username cannot be blank");
      return false;
  }    
else
  {if(y==null || y=="")
       {alert("Password cannot be blank");
        return false;
       }
  }
}
}
</script>
<title>New Login</title>
<style>
.head{ background-color:#FFFFFF;
}
.below{  border: 1px solid gray;
   
   text-align: left;
    width: 30%;
    background-color:#E8E8E8; 
    padding: 18px;
}

</style>

</head>
<body>
<?php include("leaveheader.php");
?>

<div class="head">
<br><br>

<center>
<div class="below">
<font style="font-size:21px"><b>Registration</b></font> <hr />
<font size=5>
<form name="form" action = "newlogin.php" method="post" onSubmit="return validateForm()">
<table>
<tr><td>Employee ID </td><td> :<input type="text" name="emp_id" size="30"></td></tr>
<tr><td>User ID </td><td> :<input type="text" name="user_id" size="30"></td></tr>
<tr><td>Password </td><td>:<input type="password" name ="pass" size="30"></td></tr></table>

<center><input type ="submit" value="Submit">    <input type = "reset" value= "Reset"></center>
</form></font><br>
</div><br><br><br></center></div>
<?php include("leavefooer.php");
?>



</div>
</html>