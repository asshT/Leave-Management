<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Accordion - Default functionality</title>
  <link rel="stylesheet" href="jquery-ui.css">
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  <link rel="stylesheet" href="style.css">
  <script>
  $(function() {
    $( "#accordion" ).accordion();
  });
  </script>
</head>
<body>
<div id="container">
    <div class="preOrderTop">
        <h1>Sign Up</h1>
    </div>
 <div id='accordion'><h3>Registration Details</h3><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >Name :<input type="text" name= "emp_name" size="30"><br>Department:<input type="text" name="emp_dept" size="3"><br>Category:<input type="radio" name="emp_cat" value="t" checked="checked"/> Teaching &nbsp; &nbsp; &nbsp; <input type="radio" name="emp_cat" value="n"/> Non-teaching<br>Password :<input type="text" name= "pass" size="30"><input type="submit" name="contactSubmit" value="submit"  /></form> 

  <h3>Personal Details</h3>
  <div>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
   Age:<input type="text" name="emp_age" size="3"><br>
Address :<textarea rows="5" cols="50" name="emp_add"> </textarea><br>                   
Phone No.:<input type="text" name="emp_phone" size="30"></center> <br>       

Email ID:<input type="text" name= "emp_mail" size="30">  <br>                            
Gender:<input type="radio" name="emp_gen" value="m" checked="checked"/> Male &nbsp; &nbsp; &nbsp; <input type="radio" name="emp_gen" value="f"/> Female                
<input type="submit" name="contactSubmit" value="send"  /></form> 
  </div>
  <h3>Professional Details</h3>
  <div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" accept-charset="utf-8"><br>Qualification<input type="text" name="qual" value=""  />Designation<input type="text" name="designation" value=""  /><label for="date">Date of joining</label><input type="text" name="date" value="" id="date"  /><br><input type="submit" name="contactSubmit" value="send"  /></form> 
    
  </div>
  <h3>Section 4</h3>
  <div>
    <p>
    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
    et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
    faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
    mauris vel est.
    </p>
    <p>
    Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
    inceptos himenaeos.
    </p>
  </div>
</div>
 
 
</body>
</html>

