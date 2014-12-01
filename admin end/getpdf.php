<?php session_start();
include_once('dompdf/dompdf_config.inc.php');
$conn= mysqli_connect("localhost","root","","leavedb") or die("error");
$b=$_SESSION['emp_id'];
$c=$_SESSION['date_from'];
$d=$_SESSION['date_to'];

if($_SESSION['emp_name']!="" or $_SESSION['emp_id']!="")
{
if($_SESSION['emp_name']!="")
{ $a=$_SESSION['emp_name'];
$query1="select emp_id from employee_personal where emp_name='$emp_name' ";
$result1 = mysqli_query($conn,$query1);
while($row1=mysqli_fetch_array($result1))
$emp_id1=$row1['emp_id'];
}

$query="select * from leave_application where emp_id in ('$b','$emp_id1')";
if($_SESSION['date_from']!="" and $_SESSION['date_to']!="")
$query .="and date_from >= '$c' and date_to <= '$d'";
}
else
$query="select * from leave_application where date_from >= '$c' and date_to <= '$d'";

$result = mysqli_query($conn,$query);

$rhtml= "<html><head></head><body><table> <tr><td> Employee id </td><td> Leave ID </td><td> Status </td><td> Reason </td><td> No of days </td><td> Date From </td><td> Date To </td>";

while($row=mysqli_fetch_array($result))
{
	$rhtml.='<tr><td>'.$row['emp_id'].'</td>'.
	'<td>'. $row['leave_id'].'</td>'.
	'<td>'. $row['status'].'</td>'.
	'<td>'. $row['reason'].'</td>'.
	'<td>'. $row['nod'].'</td>'.
	'<td>'. $row['date_from'].'</td>'.
	'<td>'. $row['date_to'].'</td></tr>';
}
$rhtml.='</table>';
$rhtml.='</body></html>';
$dompdf = new DOMPDF();
$dompdf->load_html($rhtml);
$dompdf->render();
$pdf = $dompdf->output();
$dompdf->stream("my_pdf.pdf", array("Attachment" => 0));

/*
  $rhtml="<html>
<head>
</head>
<body>

<h2 align=\"center\">". $_SESSION['fname']."</h2>";
$rhtml.="<p align=\"center\"><br />".$_SESSION['add']."<br/>".$_SESSION['phn']."<br />".
$_SESSION['email']."
</p>";
$rhtml.='<h3><font color="#0099FF">Objectives</font></h3>';
$rhtml.='<p>'.$_SESSION['objective'].'
</p>


<h3><font color="#0099FF">Summary</font></h3>
<p>'.
$_SESSION['summary'].'

</p>

<h3><font color="#0099FF">Education</font></h3>
<p>'.
$_SESSION['school']."<br>".
$_SESSION['status'].
":&nbsp;".
$_SESSION['month'].",".$_SESSION['year']."&nbsp;"."from"."&nbsp;".$_SESSION['uni'].'
</p>


<h3><font color="#0099FF">Employment History</font></h3>
<p>'.$_SESSION['sdate'].",".$_SESSION['syear']."-".$_SESSION['edate'].",".$_SESSION['eyear'].":".$_SESSION['title']."<br>"."Compnay:".$_SESSION['company']."<br>".$_SESSION['description'].'
</p>
<h3><font color="#0099FF">Professional Skills</font></h3>
<p>'.
$_SESSION['sname1'].":".$_SESSION['sstatus2']."</br>".$_SESSION['sname2'].":".$_SESSION['sstatus2']
.'</p>';
$rhtml.='</body></html>';
 
$dompdf = new DOMPDF();
$dompdf->load_html($rhtml);
$dompdf->render();
$pdf = $dompdf->output();
$dompdf->stream("my_pdf.pdf", array("Attachment" => 0));
*/
?>