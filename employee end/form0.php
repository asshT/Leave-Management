<!DOCTYPE html>
<html>
<head>
<title>
LOGIN
</title>
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
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
<font style="font-size:21px"><b>Login</b></font> <hr />

<font size=4>
<form action="login1.php" method="post" name="form" onSubmit="MM_validateForm('user_id','','R','pass','','R');return document.MM_returnValue" >
<table>
<tr><td>Employee ID </td><td> : <input type="text" name="user_id" size="30"></td></tr>
<tr><td>Password </td><td>: <input type="password" name ="pass" size="30"></td></tr></table>
<center><input type="submit" name="submit1" value="Submit">    <input type="reset" name="reset" value="Reset"></center>
</form></font><br>
<font size="+1"><center>New user? <a href ="register.php">Register here.</a>	</center></font>

</div>


<br><br><br><br></center></div>
<?php include("leavefooer.php");
?>

</body>
</html>
