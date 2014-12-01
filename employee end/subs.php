<?php
session_start();
?>

<html>
<head>
<style>
.head{ background-color:#FFFFFF;
}
#tt{ border-collapse:collapse;
border:thin solid;}
#tt td, #tt th{ padding:2px;
border:thin solid;}

#sub {
background-color:#FF9933;
margin-left:20%;
padding-left:10px;
margin-right:20%;}
</style>
</head>
<body>
<body>


<?php include('leaveheader.php'); ?>

<div class="head">
<br />

<?php
include ('emp_navbar.php');
?>

<p style="clear:both"></p>
<br />

<center><h2>Suggest Substitutions</h2></center><hr />
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

<?php
$nbsp=" ";
function createDateRangeArray($strDateFrom,$strDateTo)
{
    // takes two dates formatted as YYYY-MM-DD and creates an
    // inclusive array of the dates between the from and to dates.

    // could test validity of dates here but I'm already doing
    // that in the main script

    $aryRange=array();

    $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
    $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

    if ($iDateTo>=$iDateFrom)
    {
        array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
        while ($iDateFrom<$iDateTo)
        {
            $iDateFrom+=86400; // add 24 hours
            array_push($aryRange,date('Y-m-d',$iDateFrom));
        }
    }
    return $aryRange;
}
/*
$name=$_SESSION['name']; //**teacher name
$date1=$_SESSION['date1']; //**date
$date2=$_SESSION['date2'];//**date
*/

$name="Ashish Sharma"; //**teacher name
$date1="2014-11-24"; //**date
$date2="2014-11-26";//**date


$dates=createDateRangeArray($date1,$date2);

$con=mysql_connect("localhost","root","")or die("sorry to your database is not connect to this web page!");
$db=mysql_select_db("leavedb",$con);
$str="delete from temp";
$result=mysql_query($str);
$db=mysql_select_db("test",$con);
$str="delete from temp";
$result=mysql_query($str);
$str="delete from temp2";
$result=mysql_query($str);
$str="delete from tname";
$result=mysql_query($str);

foreach ($dates as $date)
{
	$db=mysql_select_db("leavedb",$con);
	$str="insert into temp (select emp_name from employee_personal, leave_application where employee_personal.emp_id=leave_application.emp_id and '$date' between date_from and date_to )"; //except (select emp_name from employee_personal where emp_name='$name')"; 
	//***except not working***
 	$result=mysql_query($str);
	$str="delete from temp where emp_name='$name'";
 	$result=mysql_query($str);
	$str="select distinct(emp_name) from temp";
	//teachers on lv on same date
	$result=mysql_query($str);
	//$n=mysql_num_rows($result);
	//echo $n;
	$i=0;
	$temp[0]=" ";
	while($r=mysql_fetch_array($result))
		{
			$temp[$i]=$r['emp_name'];
			$i=$i+1;
		}	
	
	$timestamp = strtotime($date);
	$day = date('D', $timestamp); // convert date to day
	
	
	echo"<p style='padding-left:20%'><b>".$date."  ".$day."</b></p>";
	
	$db=mysql_select_db("test",$con);
	foreach ($temp as $tname)
	{
	 $str="insert into tname values('$tname')"; // table to str name of tchrs with lv on same date
	 $result=mysql_query($str);
	} 
	
	 $str="insert into temp select * from tt where faculty_name='$name'";
	 $result=mysql_query($str);
	
	 $str="select * from temp where day='$day' order by time";
	 $result=mysql_query($str);
	// ***display teachers tt
	
	$a=array("Day/Time","08:15-09:15","09:15-10:15","10:15-11:15","11:45-12:45","12:45-01:45","01:45-02:45","02:45-03:45");
	echo '<center><table id="tt"><tr>';
	echo"<th>".$a[0]."</th>";
	echo"<th>".$a[1]."</th>";
	echo"<th>".$a[2]."</th>";
	echo"<th>".$a[3]."</th>";
	echo"<th>".$a[4]."</th>";
	echo"<th>".$a[5]."</th>";
	echo"<th>".$a[6]."</th>";
	echo"<th>".$a[7]."</th>";
	echo"</tr>";
	$z=0;
	echo '<tr><td rowspan="3" >'.$day.'</td>';
	while($r=mysql_fetch_array($result))
	{
	    
	 	if ($r['time']=$a[$z])
		 {
		     echo '<td>'.$r['subject_name'].'</td>';
		}
		else
		 {
		   echo '<td>'.$nbsp.'</td>';
		  }
		$z=$z+1;  
	}
		 echo '</tr>'; 
	
	
 echo '</table></center>'; 
	 

	$str="select distinct(subject_name) from temp where day='$day'";
	$result=mysql_query($str);
	while($r=mysql_fetch_array($result))
	{
	echo"<div id='sub'>";
	 echo "<p>".$r['subject_name']."</p>";
	 $sub=$r['subject_name'];
	 $str1="insert into temp2 (select faculty_name from tt where subject_name='$sub' and faculty_name not like '$name')";
      $result1=mysql_query($str1);
	 $str1="delete from temp2 where name in (select fname from tname)";
      $result1=mysql_query($str1);
	 $str1="select distinct(name) from temp2";
	  //except (select fname from tname)"; //*** other teachers of same subject***
     $result1=mysql_query($str1);
	 echo "<p>";
	 $m=0;
	 $t="t".$m;
	 while($r1=mysql_fetch_array($result1))
	  {
	 	echo $r1['name'].'<input type=checkbox value=t1 name=$t/>'. " "; // link to other teachers timetable
		/* 
		  $name2=$r1['faculty_name']
		  $str2="select * from tt where faculty_name='$name2' and day='$day'";
		  	$result2=mysql_query($str2);
         
		 ***display TT***
		 */
		 $m=$m+1;
		  $t="t".$m;
	  }
	  echo "</div>";	
	
	// insert into sub table
	/*
	$str3="insert into subs values ('$day','$time','$room_id','$subject_name','$batch','$faculty_name')";
	$result3=mysql_query($str3);
	*/
	}
	echo"<hr>";
}
	  //echo"<center><input type='submit' value='Submit' name='Submit'></center><br>";
	  

?> 
</form>
<center><a href="securedpage.php">Submit and go to Home Page</a></center><br />
</div>
<?php 
include("leavefooer.php");
?>

</body>	 
</html>