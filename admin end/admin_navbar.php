<style>
.menu{
border:none;
border:0px;
margin:0px;
padding:0px;
font: 67.5% "Lucida Sans Unicode", "Bitstream Vera Sans", "Trebuchet Unicode MS", "Lucida Grande", Verdana, Helvetica, sans-serif;
font-size:14px;
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
color:#FFFFFF;
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
font-size:12px;
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
       <li><a href="../../Leave Management/admin end/calendar3.php">Leave requests</a>
    
      <li><a href="../../Leave Management/admin end/admin1.php" id="current">Leave types</a>
          </li>
           <li><a href="../../Leave Management/admin end/newleavedate.php">Holidays</a>
    
      </li>
	  
	  <li><a href="#" id="current">Timetable</a>
         <ul>
            <li><a href="../../fornet/toupload/YImpoExpo.php">Sem 1</a></li>
			<li><a href="#">Sem 2</a></li>
			<li><a href="#">Sem 3</a></li>
			<li><a href="#">Sem 4</a></li>
			<li><a href="#">Sem 5</a></li>
			<li><a href="#">Sem 6</a></li>
			<li><a href="#">Sem 7</a></li>
			<li><a href="#">Sem 8</a></li>
      
         </ul>
      </li>
	  <li><a href="#" id="current">Set ID's</a>
         <ul>
            <li><a href="../../Leave Management/admin end/dept.php">Department ID</a></li>
            <li><a href="../../Leave Management/admin end/desig.php">Designation ID</a></li>
            <li><a href="../../Leave Management/admin end/category.php">Category ID</a></li>
           
         </ul>
      </li>
	  <li><a href="../../Leave Management/admin end/announcement.php">New Announcements</a>
   <li><a href="../../Leave Management/admin end/searchdate.php">Generate Report</a></li>
      <li><a href="../../Leave Management/admin end/logout.php">Logout</a></li>
  
   </ul>
<br /><br /><br />   
</div>
