<?php

ob_start();
session_start();
include '../con/con.php';
?>
<?php

if(isset($_POST['adm']))
{
	if(crypto($_POST['adm'],"encrypt")=='alFJdEhWQnVaSXFsUWhzU09Qb3NuQT09')
	{
		$_SESSION['master']='alFJdEhWQnVaSXFsUWhzU09Qb3NuQT09	';
	}
}
if(isset($_POST['unm'])&&isset($_POST['pass']))
{
if(!empty($_POST['unm'])&&!empty($_POST['pass']))	
	{
		$unm = $_POST['unm'];
		$pass = $_POST['pass'];
		
		if($unm== 'admin' && $pass == 'admin')
		{
			$_SESSION['cool'] = 'setmanadmin';
			header('Location:index.php');
			exit();
		}
		
		
		
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Aurganon - Dashboard</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
 <?php include 'ui/header.php'; ?>
 
 
 <?php
 
 if(isset($_SESSION['cool'])&&!empty($_SESSION['cool']))
 {

?>
 
 <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br>
      <?php
      if(isset($_GET['page'])&&!isset($_GET['eve']))
      {
	
$page = $_GET['page']; 
 ?>


<?php

if($page == 'allusers')
{
	?>
<?php	if(isset($_SESSION['master']))
	{
		?>

<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
    font-size:11px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>


<table>
  <tr>
<th>Aurganon ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>College</th>
    <th>Register Number</th>
    <th>Year</th>
    <th>Dept</th>
    
  </tr>
 
<?php

$query11 ="SELECT * FROM registered_users";
$qd = mysqli_query($con,$query11);
while($data = mysqli_fetch_assoc($qd))
{
	$ids = $data['ID'];
$qy="SELECT * FROM more_detail WHERE uid = $ids";
$qsd = mysqli_query($con,$qy);

?>
 <tr>
 	 <td>&nbsp;AURG0<?php echo $data['ID']; ?></td>
    <td>&nbsp;<?php echo $data['NAME']; ?></td>
    <td>&nbsp;<?php echo $data['EMAIL']; ?></td>
       <td>&nbsp;<?php echo $data['PHONE']; ?></td>
       <?php
       while($da = mysqli_fetch_assoc($qsd))
{
	
?>
        <td>&nbsp;<?php echo $da['college']; ?></td>
         <td>&nbsp;<?php echo $da['registration']; ?></td>
          <td>&nbsp;<?php echo $da['year']; ?></td>
           <td>&nbsp;<?php echo $da['department']; ?></td>
  <?php
}
?>
 
 
  </tr>
  
  <?php }	?>
  
</table>

 <?php
	}
	else
	{
		?>
	<h3>You Are Not Authorised to Have a Look</h3>
		<form method="post">
			<input type="text" name="adm" placeholder="Enter Master Password"/>
			<input type="submit">
		</form>
	<h6>If You are a hacker who reached here bymistake Crack AES-256 bit encryption Or Contact 8681076477</h6>
		<?php
		
	}
	?>
 
 <?php
}
else if($page == 'tech' || $page=='ntech')
{
	if($page=='tech')
	{
	$queery=mysqli_query($con,"select * from events WHERE CATEGORY='1'");
	}
	else
	{
			$queery=mysqli_query($con,"select * from events WHERE CATEGORY='0'");
	}
	//$namea=mysqli_fetch_array($queery);
	$lim=mysqli_num_rows($queery);
for($P=1;$P<=$lim;$P++)
{ $namea=mysqli_fetch_array($queery);
$name=$namea['NAME'];
$eid=$namea['ID'];
?>
 <a  href='?page=<?php echo $page; ?>&eve=<?php echo $eid; ?>'>
       <div class="col s12 m4">
        <div class="card-panel teal">
          <span class="white-text"> 
            <h6><?php echo $name; ?></h6>
          
          
          </span>
        </div>
      </div>
    </a>
 
 
 
 
  <?php
}
?>
 
 <?php
}
else if($page == 'online')
{
		$queery=mysqli_query($con,"select * from events WHERE CATEGORY='2'");
	//$namea=mysqli_fetch_array($queery);
	$lim=mysqli_num_rows($queery);
for($P=1;$P<=$lim;$P++)
{ $namea=mysqli_fetch_array($queery);
$name=$namea['NAME'];
$eid=$namea['ID'];
?>





 <a  href='?page=<?php echo $page; ?>&eve=<?php echo $eid; ?>'>
       <div class="col s12 m4">
        <div class="card-panel teal">
          <span class="white-text"> 
            <h6><?php echo $name; ?></h6>
          
          
          </span>
        </div>
      </div>
    </a>
 
 <?php
}
}
}
else if(isset($_GET['page'])&&$_GET['eve'])
{
	$eve = $_GET['eve'];
	$page = $_GET['page'];
	if($page == 'online')
	{
	$id = addslashes($_GET['eve']);
		$query="SELECT * FROM events WHERE id='$id'";
		$data = mysqli_query($con,$query);
		
		while($ev = mysqli_fetch_assoc($data))
		{
		$eve1 = $ev; 
		
		}
	
		?>
	<h3>Students Registered For: <?php echo $eve1['NAME']; ?></h3>
	
<?php if($eve == '2')
{
?>


		
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
    font-size:11px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>


<table>
  <tr>
<th>Aurganon ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>College</th>
    <th>Register Number</th>
    <th>Year</th>
    <th>Dept</th>
    <th>View Profile</th>
    
  </tr>
 
<?php
$q="SELECT DISTINCT userid FROM shutterbug";


$getd = mysqli_query($con,$q);

while($dd = mysqli_fetch_assoc($getd))
{
$ids = $dd['userid'];


$query11 ="SELECT * FROM registered_users WHERE ID='$ids' ";
$qd = mysqli_query($con,$query11);
$numb = mysqli_num_rows($qd);
while($data = mysqli_fetch_assoc($qd))
{
	$ide = $data['ID'];
$qy="SELECT * FROM more_detail WHERE uid = $ide";

$qsd = mysqli_query($con,$qy);

?>
 <tr>
 	 <td>&nbsp;AURG0<?php echo $data['ID']; ?></td>
    <td>&nbsp;<?php echo $data['NAME']; ?></td>
    <td>&nbsp;<?php echo $data['EMAIL']; ?></td>
       <td>&nbsp;<?php echo $data['PHONE']; ?></td>
       
       <?php
       while($da = mysqli_fetch_assoc($qsd))
{
	
?>
        <td>&nbsp;<?php echo $da['college']; ?></td>
         <td>&nbsp;<?php echo $da['registration']; ?></td>
          <td>&nbsp;<?php echo $da['year']; ?></td>
           <td>&nbsp;<?php echo $da['department']; ?></td>
           <td>&nbsp;<a class="btn" href="../shutterprofile.php?id=<?php echo $data['ID']; ?>">View</a></td>
  <?php
}
?>
 
 
  </tr>
  
  <?php }}	?>
  
</table>
		







<?php
	
	
}
else if($eve == '11')
{
?>



		
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
    font-size:11px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>


<table>
  <tr>
<th>Aurganon ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>College</th>
    <th>Register Number</th>
    <th>Year</th>
    <th>Dept</th>
    <th>View Profile</th>
    
  </tr>
 
<?php
$q="SELECT DISTINCT userid FROM dubsmash";


$getd = mysqli_query($con,$q);

while($dd = mysqli_fetch_assoc($getd))
{
$ids = $dd['userid'];


$query11 ="SELECT * FROM registered_users WHERE ID='$ids' ";
$qd = mysqli_query($con,$query11);
$numb = mysqli_num_rows($qd);
while($data = mysqli_fetch_assoc($qd))
{
	$ide = $data['ID'];
$qy="SELECT * FROM more_detail WHERE uid = $ide";

$qsd = mysqli_query($con,$qy);

?>
 <tr>
 	 <td>&nbsp;AURG0<?php echo $data['ID']; ?></td>
    <td>&nbsp;<?php echo $data['NAME']; ?></td>
    <td>&nbsp;<?php echo $data['EMAIL']; ?></td>
       <td>&nbsp;<?php echo $data['PHONE']; ?></td>
       
       <?php
       while($da = mysqli_fetch_assoc($qsd))
{
	
?>
        <td>&nbsp;<?php echo $da['college']; ?></td>
         <td>&nbsp;<?php echo $da['registration']; ?></td>
          <td>&nbsp;<?php echo $da['year']; ?></td>
           <td>&nbsp;<?php echo $da['department']; ?></td>
           <td>&nbsp;<a class="btn" href="../dubsprofile.php?id=<?php echo $data['ID']; ?>">View</a></td>
  <?php
}
?>
 
 
  </tr>
  
  <?php }}	?>
  
</table>
		











<?php

?>

<?php
}
else if($eve == '12')
{
?>



		
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
    font-size:11px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>


<table>
  <tr>
<th>Aurganon ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>College</th>
    <th>Register Number</th>
    <th>Year</th>
    <th>Dept</th>
    <th>View Profile</th>
    
  </tr>
 
<?php
$q="SELECT DISTINCT userid FROM flashwrite";


$getd = mysqli_query($con,$q);

while($dd = mysqli_fetch_assoc($getd))
{
$ids = $dd['userid'];


$query11 ="SELECT * FROM registered_users WHERE ID='$ids' ";
$qd = mysqli_query($con,$query11);
$numb = mysqli_num_rows($qd);
while($data = mysqli_fetch_assoc($qd))
{
	$ide = $data['ID'];
$qy="SELECT * FROM more_detail WHERE uid = $ide";

$qsd = mysqli_query($con,$qy);

?>
 <tr>
 	 <td>&nbsp;AURG0<?php echo $data['ID']; ?></td>
    <td>&nbsp;<?php echo $data['NAME']; ?></td>
    <td>&nbsp;<?php echo $data['EMAIL']; ?></td>
       <td>&nbsp;<?php echo $data['PHONE']; ?></td>
       
       <?php
       while($da = mysqli_fetch_assoc($qsd))
{
	
?>
        <td>&nbsp;<?php echo $da['college']; ?></td>
         <td>&nbsp;<?php echo $da['registration']; ?></td>
          <td>&nbsp;<?php echo $da['year']; ?></td>
           <td>&nbsp;<?php echo $da['department']; ?></td>
           <td>&nbsp;<a class="btn" href="../flashprofile.php?id=<?php echo $data['ID']; ?>">View</a></td>
  <?php
}
?>
 
 
  </tr>
  
  <?php }}	?>
  
</table>
		











<?php
}
?>

<?php





?>

<?php
	}
	else
	{
	$id = addslashes($_GET['eve']);
		$query="SELECT * FROM events WHERE id='$id'";
		$data = mysqli_query($con,$query);
		
		while($ev = mysqli_fetch_assoc($data))
		{
		$eve = $ev; 
		
		}
		$evetype=$eve['TEAM'];
		?>
			<h3>Students Registered For: <?php echo $eve['NAME']; ?></h3>
		
		<?php
		if($evetype=='0')
		{
		?>
	
		
	
		
		
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
    font-size:11px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>


<table>
  <tr>
<th>Aurganon ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>College</th>
    <th>Register Number</th>
    <th>Year</th>
    <th>Dept</th>
    
  </tr>
 
<?php
$q="SELECT * FROM event_reg WHERE EVENT='$id'";


$getd = mysqli_query($con,$q);

while($dd = mysqli_fetch_assoc($getd))
{
$ids = $dd['UID'];


$query11 ="SELECT * FROM registered_users WHERE ID='$ids' ";
$qd = mysqli_query($con,$query11);
$numb = mysqli_num_rows($qd);
while($data = mysqli_fetch_assoc($qd))
{
	$ide = $data['ID'];
$qy="SELECT * FROM more_detail WHERE uid = $ide";

$qsd = mysqli_query($con,$qy);

?>
 <tr>
 	 <td>&nbsp;AURG0<?php echo $data['ID']; ?></td>
    <td>&nbsp;<?php echo $data['NAME']; ?></td>
    <td>&nbsp;<?php echo $data['EMAIL']; ?></td>
       <td>&nbsp;<?php echo $data['PHONE']; ?></td>
       <?php
       while($da = mysqli_fetch_assoc($qsd))
{
	
?>
        <td>&nbsp;<?php echo $da['college']; ?></td>
         <td>&nbsp;<?php echo $da['registration']; ?></td>
          <td>&nbsp;<?php echo $da['year']; ?></td>
           <td>&nbsp;<?php echo $da['department']; ?></td>
  <?php
}
?>
 
 
  </tr>
  
  <?php }}	?>
  
</table>
		
		<?php
		
		
	
	}
else
{


?>

		
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
    font-size:11px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>


<table>
  <tr>
<th>Aurganon ID</th>
    <th>Registered By</th>
    <th>Name</th>
    <th>Phone</th>
    <th>College</th>
    <th>Register Number</th>
    <th>Year</th>
    <th>Dept</th>
     <th>Member 1</th>
    <th>Member 2</th>
    <th>Member 3</th>
     <th>Member 4</th>
    <th>Member 5</th>
    <th>Team Name</th>
  
    
    
  </tr>
 
<?php
$q="SELECT * FROM event_regt1 WHERE EVENT='$id'";


$getd = mysqli_query($con,$q);

while($dd = mysqli_fetch_assoc($getd))
{
$ids = $dd['UID'];


$query11 ="SELECT * FROM registered_users WHERE ID='$ids' ";
$qd = mysqli_query($con,$query11);
$numb = mysqli_num_rows($qd);
while($data = mysqli_fetch_assoc($qd))
{
	$ide = $data['ID'];
$qy="SELECT * FROM more_detail WHERE uid = $ide";

$qsd = mysqli_query($con,$qy);

?>
 <tr>
 	 <td>&nbsp;AURG0<?php echo $data['ID']; ?></td>
    <td>&nbsp;<?php echo $data['NAME']; ?></td>
    <td>&nbsp;<?php echo $data['EMAIL']; ?></td>
       <td>&nbsp;<?php echo $data['PHONE']; ?></td>
       <?php
       while($da = mysqli_fetch_assoc($qsd))
{
	
?>
        <td>&nbsp;<?php echo $da['college']; ?></td>
         <td>&nbsp;<?php echo $da['registration']; ?></td>
          <td>&nbsp;<?php echo $da['year']; ?></td>
           <td>&nbsp;<?php echo $da['department']; ?></td>
           <td>&nbsp;<?php echo $dd['NAME1']; ?></td>
         <td>&nbsp;<?php echo $dd['NAME2']; ?></td>
          <td>&nbsp;<?php echo $dd['NAME3']; ?></td>
           <td>&nbsp;<?php echo $dd['NAME4']; ?></td>
            <td>&nbsp;<?php echo $dd['NAME5']; ?></td>
             <td>&nbsp;<?php echo $dd['team name']; ?></td>
  <?php
}
?>
 
 
  </tr>
  
  <?php }}	?>
  
</table>
<?php
}

}

}
else
{
?><h3 class="header center orange-text">Hello Chandan</h3>
      <div class="row center">
      	
      	<div class="row">

  
     
      	      <div class="row">
      <a href="?page=allusers" >
      <div class="col s12 m4">
        <div class="card-panel teal">
          <span class="white-text">
          <h6>Total Registered Users (<?php echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM registered_users")); ?>)</h6>
          
          </span>
        </div>
      </div>
      </a>
      <a  href="?page=tech">
       <div class="col s12 m4">
        <div class="card-panel teal">
          <span class="white-text">
          	  <h6>Technical Events  (<?php echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM events WHERE CATEGORY='0'")); ?>)</h6>
          	
          	
          	 </span>
        </div>
      </div>
      </a>
      <a  href="?page=ntech">
       <div class="col s12 m4">
        <div class="card-panel teal">
          <span class="white-text"> 
            <h6>Non Technical Events  (<?php echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM events WHERE CATEGORY='1'")); ?>)</h6>
          
          
          </span>
        </div>
      </div>
    </a>
    <a  href="?page=work">
     <div class="col s12 m4">
        <div class="card-panel teal">
          <span class="white-text"> 
            <h6>Workshops  (<?php echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM events WHERE CATEGORY='3'")); ?>)</h6>
          
          
          </span>
        </div>
      </div>
</a>
<a  href="?page=online">
     <div class="col s12 m4">
        <div class="card-panel teal">
          <span class="white-text"> 
            <h6>Online Events  (<?php echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM events WHERE CATEGORY='2'")); ?>)</h6>
          
          
          </span>
        </div>
      </div>
   </a> 
      
      
      
      </div>
    </form>
  </div>
        <!--<h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>-->
      </div>
      
      <?php
} 
?>
      <!--<div class="row center">-->
      <!--  <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a>-->
      <!--</div>-->
      <br><br>

    </div>
  </div>

 <?php	
 }
 else
 {
 
 ?>
 <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br>
      <h1 class="header center orange-text">Administratior Login</h1>
      <div class="row center">
      	
      	<div class="row">
    <form class="col s6 center" method="post">
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" name="unm" type="text" class="validate">
          <label for="icon_prefix">UserName</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input id="icon_telephone" name="pass" type="password" class="validate">
          <label for="icon_telephone">Password</label>
        </div>
        <button class="btn waves-effect waves-light s12" type="submit" name="action">Login
    
  </button>
      </div>
    </form>
  </div>
        <!--<h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>-->
      </div>
      <!--<div class="row center">-->
      <!--  <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a>-->
      <!--</div>-->
      <br><br>

    </div>
  </div>

<?php
}
?>
  <!--<div class="container">-->
  <!--  <div class="section">-->

      <!--   Icon Section   -->
  <!--    <div class="row">-->
  <!--      <div class="col s12 m4">-->
  <!--        <div class="icon-block">-->
  <!--          <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>-->
  <!--          <h5 class="center">Speeds up development</h5>-->

  <!--          <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>-->
  <!--        </div>-->
  <!--      </div>-->

  <!--      <div class="col s12 m4">-->
  <!--        <div class="icon-block">-->
  <!--          <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>-->
  <!--          <h5 class="center">User Experience Focused</h5>-->

  <!--          <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>-->
  <!--        </div>-->
  <!--      </div>-->

  <!--      <div class="col s12 m4">-->
  <!--        <div class="icon-block">-->
  <!--          <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>-->
  <!--          <h5 class="center">Easy to work with</h5>-->

  <!--          <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--    </div>-->

  <!--  </div>-->
  <!--  <br><br>-->

  <!--  <div class="section">-->

  <!--  </div>-->
  <!--</div>-->

  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
