<?php
ob_start();
session_start();

include '../con/con.php';

if(!isset($_SESSION['auth']))
{
header("Location:dashboardauth.php");
exit;
}
else {

	$dataaa=mysqli_query($con,"select * from events");
	while($nameaa= mysqli_fetch_assoc($dataaa)){
	$namee=$nameaa['NAME'];
	$idee = $nameaa['ID'];
	$count = mysqli_num_rows(mysqli_query($con,"SELECT * FROM event_reg WHERE EVENT = ".$idee));
	echo "<a type='submit' href='".$namee."'> ".$namee." (".$count.")</a> ";
}

if(isset($_POST['btn']))
{
	
	echo"<table border=1>";
	echo"<th>uid  </th>";
	echo"<th>name  </th>";
	echo"<th>mail  </th>";
	echo "<th>                  name            </th>";
	echo "<th>registered on  </th>";
	echo"<th>intime  </th>";
	echo"<th>outtime  </th>";

	echo"</table>";    


$query=mysqli_query($con,"select * from attendencedesk");

$do1=mysqli_num_rows($query);




for($i=0;$i<$do1;$i++){

$do=mysqli_fetch_array($query);
$uid=$do['userid'];
$uid2=$do['intime'];
$uid3=$do['outtime'];

$query1=mysqli_query($con,"select * from more_detail where uid='$uid'");
$dox=mysqli_fetch_array($query1);

$uid4=$dox['college'];
// $ru=$do['REGISTERED_ON'];
// $eve=$do['EVENT'];


$data=mysqli_query($con,"select * from registered_users WHERE ID='$uid'");
$namea=mysqli_fetch_array($data);
$name=$namea['NAME'];
$mail=$namea['EMAIL'];









echo"<table border=1>";
echo "<tr>";
echo"<td>$uid </td>";
echo"<td>$name </td>";
echo"<td>$mail <td>";
echo "<td>                  $namee            </td>";
echo "<td>$ru  </td>";
echo"<td>$uid2 <td>";
echo"<td>$uid3 <td>";
echo"<td>$uid4 <td>";

echo"<tr>";
echo"</table>";    


}

}
}


if(isset($_GET['logout']))
{

session_destroy();
unset($_SESSION['auth']);
header("Location: dashboardauth.php");
}



if(isset($_POST['btn1']))
{

echo"<table border=1>";

echo"<th>uid  </th>";
echo"<th>name  </th>";
echo"<th>mail  </th>";
echo"<th>Event </th>";
echo"<th>NAME1 </th>";
echo"<th>NAME2 </th>";
echo"<th>NAME3 </th>";
echo"<th>NAME4 </th>";
echo"<th>TEAM NAME </th>";

//echo "</tr>";
echo"</table>";    


$query=mysqli_query($con,"select * from event_regt1");
$do1=mysqli_num_rows($query);




for($i=0;$i<$do1;$i++){

$do=mysqli_fetch_array($query);
$uid=$do['UID'];
//$ru=$do['REGISTERED_ON'];
$eve=$do['EVENT'];
$eve1=$do['NAME1'];
$eve2=$do['NAME2'];
$eve3=$do['NAME3'];
$eve4=$do['NAME4'];
$eve5=$do['team name'];


$data=mysqli_query($con,"select * from registered_users WHERE ID='$uid'");
$namea=mysqli_fetch_array($data);
$name=$namea['NAME'];
$mail=$namea['EMAIL'];




$dataaa=mysqli_query($con,"select * from events WHERE ID='$eve'");
$nameaa=mysqli_fetch_array($dataaa);
$namee=$nameaa['NAME'];





echo"<table>";
echo "<tr>";
echo"<td>$uid </td>";
echo"<td>$name </td>";
echo"<td>$mail <td>";
echo "<td>                  $namee            </td>";
echo "<td>$ru  </td>";


echo "<td>$eve1 </td>";
echo "<td>$eve2 </td>";
echo "<td>$eve3 </td>";
echo "<td>$eve4 </td>";



echo "<td>$eve5 </td>";
echo "</tr>";
echo"</table>";    


}

}



if(isset($_POST['btnc']))
{


echo"<table border=1>";

echo"<th>uid  </th>";
echo"<th>name  </th>";
echo"<th>mail  </th>";
echo"<th>Event </th>";
echo"<th>NAME1 </th>";
echo"<th>NAME2 </th>";
echo"<th>NAME3 </th>";
echo"<th>NAME4 </th>";
echo"<th>TEAM NAME </th>";

//echo "</tr>";
echo"</table>";    


$query=mysqli_query($con,"select * from event_regt1 WHERE EVENT=1 ORDER BY ID desc");
$do1=mysqli_num_rows($query);




for($i=0;$i<$do1;$i++){

$do=mysqli_fetch_array($query);
$uid=$do['UID'];
//$ru=$do['REGISTERED_ON'];
$eve=$do['EVENT'];
$eve1=$do['NAME1'];
$eve2=$do['NAME2'];
$eve3=$do['NAME3'];
$eve4=$do['NAME4'];
$eve5=$do['team name'];


$data=mysqli_query($con,"select * from registered_users WHERE ID='$uid'");
$namea=mysqli_fetch_array($data);
$name=$namea['NAME'];
$mail=$namea['EMAIL'];




$dataaa=mysqli_query($con,"select * from events WHERE ID='$eve'");
$nameaa=mysqli_fetch_array($dataaa);
$namee=$nameaa['NAME'];





echo"<table>";
echo "<tr>";
echo"<td>$uid </td>";
echo"<td>$name </td>";
echo"<td>$mail <td>";
echo "<td>                  $namee            </td>";
echo "<td>$ru  </td>";


echo "<td>$eve1 </td>";
echo "<td>$eve2 </td>";
echo "<td>$eve3 </td>";
echo "<td>$eve4 </td>";



echo "<td>$eve5 </td>";
echo "</tr>";
echo"</table>";    


}   

}

?>
<html>
<head>
</head>

<body>
<form method="post">
  <input type =text name="evename" placeholder="enter the email">
  <button type="submit" name="btn2">get info </button>
  <br>
  <button type="submit" name="btn">single</button>
  <button type="submit" name="btnc">crack jack</button>
  <button type="submit" name="btn1">team</button>
</form>
<a href="dashboard.php?logout">logout</a>
</body>
</html>