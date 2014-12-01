<?php
session_start();

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
	echo $day;
	
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
	echo '<center><table><tr>';
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
	
	 $str="select * from temp where day='$day' order by time";
	 $result=mysql_query($str);	  	 
	 echo '<tr>';
	 $z=0;
	 while($r=mysql_fetch_array($result))
	{
	    
	 	if ($r['time']=$a[$z])
		 {
		     echo '<td>'.$r['room_id'].'</td>';
		}
		else
		 {
		   echo '<td>'.$nbsp.'</td>';
		  }
		$z=$z+1;  
	}
 echo '</tr></table></center>'; 
	 

	$str="select distinct(subject_name) from temp where day='$day'";
	$result=mysql_query($str);
	while($r=mysql_fetch_array($result))
	{
	 echo "<br>";
	 echo $r['subject_name'];
	 echo "<br><br>";
	 $str1="insert into temp2 (select faculty_name from tt where subject_name='$r[subject_name]' and faculty_name not in '$name')";
      $result1=mysql_query($str1);
	 $str1="delete from temp2 where name in (select fname from tname)";
      $result1=mysql_query($str1);
	 $str1="select distinct(name) from temp2";
	  //except (select fname from tname)"; //*** other teachers of same subject***
     $result1=mysql_query($str1);
	 while($r1=mysql_fetch_array($result1))
	  {
	 	echo $r1['name']." "; // link to other teachers timetable
		/* 
		  $name2=$r1['faculty_name']
		  $str2="select * from tt where faculty_name='$name2' and day='$day'";
		  	$result2=mysql_query($str2);
         
		 ***display TT***
		 */
	  }	
	
	// insert into sub table
	/*
	$str3="insert into subs values ('$day','$time','$room_id','$subject_name','$batch','$faculty_name')";
	$result3=mysql_query($str3);
	*/
	}
}

?>	 