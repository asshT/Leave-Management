<style>
.menu{
border:none;
border:0px;
margin:0px;
padding:0px;
font: 67.5% "Lucida Sans Unicode", "Bitstream Vera Sans", "Trebuchet Unicode MS", "Lucida Grande", Verdana, Helvetica, sans-serif;
font-size:15px;
font-weight:bold;
}
.menu ul{
background:#F93;
height:50px;
list-style:none;
margin:0;
padding:0;
-webkit-border-radius: 15px;
-moz-border-radius: 15px;
border-radius: 15px;
        -webkit-box-shadow: inset 0px 16px 0px 0px rgba(255, 255, 255, .1);
-moz-box-shadow: inset 0px 16px 0px 0px rgba(255, 255, 255, .1);
box-shadow: inset 0px 16px 0px 0px rgba(255, 255, 255, .1);
}
.menu li{
float:left;
padding:0px 0px 0px 15px;
}
.menu li a{
color:#000;
display:block;
font-weight:normal;
line-height:50px;
margin:0px;
padding:0px 25px;
text-align:center;
text-decoration:none;
}
.menu li a:hover{
background:#C60;
color:#030303;
text-decoration:none;
-webkit-box-shadow: inset 0px 0px 7px 2px rgba(0, 0, 0, .3);
-moz-box-shadow: inset 0px 0px 7px 2px rgba(0, 0, 0, .3);
box-shadow: inset 0px 0px 7px 2px rgba(0, 0, 0, .3);
}
.menu ul li:hover a{
background:#C60;
color:#FFFFFF;
text-decoration:none;
}
.menu li ul{
display:none;
height:auto;
padding:0px;
margin:0px;
border:0px;
position:absolute;
width:200px;
z-index:200;
}
.menu li:hover ul{
display:block; 
}
.menu li li {
display:block;
float:none;
margin:0px;
padding:0px;
width:200px;
background:#F93;
}
.menu li:hover li a{
background:none;
}
.menu li ul a{
display:block;
height:50px;
font-size:14px;
font-style:normal;
margin:0px;
padding:0px 10px 0px 15px;
text-align:left;
}
.menu li ul a:hover, .menu li ul li:hover a{
border:0px;
color:#ffffff;
text-decoration:none;
background:#C60;
-webkit-box-shadow: inset 0px 0px 7px 2px rgba(0, 0, 0, .3);
-moz-box-shadow: inset 0px 0px 7px 2px rgba(0, 0, 0, .3);
box-shadow: inset 0px 0px 7px 2px rgba(0, 0, 0, .3); 
}
</style>
<div class="menu">
   
   <ul>
      <li><a href="securedpage.php" >Home</a></li>
      <li><a href="#" id="current">Personal Details</a>
	           <ul>
            <li><a href="formt.php">New Profile</a></li>
            <li><a href="edit_prsnl.php">Edit Details</a></li>
            <li><a href="view_prsnl.php">View Details</a></li>
           
         </ul>
          </li>
      <li><a href="#" id="current">Professional Details</a>
                  <ul><li><a href="formp.php">New Profile</a></li>
            <li><a href="#"> <?php //<a href="edit_prfnl"> ?> Edit Details</a></li>
            <li><a href="#"> <?php //<a href="view_prfnl"> ?> View Details</a></li>
           
         </ul>
      </li>
	  <li><a href="#" id="current">Apply for leave</a>
         <ul>
            <li><a href="form_apply.php">Leave Application</a></li>
            <li><a href="hol_cal.php">View Holidays</a></li>
           
         </ul>
      </li>
      
   <li><a href="logout.php">Logout</a></li>
  
   </ul>
   
</div>
