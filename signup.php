<?php
include 'con/con.php'; 

include 'function.php'; 



?>
<?php
if(isset($_SESSION['admin']))
{
header('Location:http://www.aurganon.com');
exit();
	
}
else
{
	
}
?>
<?php
$ank=trim($_POST['phone']);
$anku=trim($_POST['email']);
if(isset($_POST['name'])&&isset($_POST['phone'])&&isset($_POST['email'])&&isset($_POST['password']))
{


	if(!empty($_POST['name'])&&!empty($_POST['phone'])&&!empty($_POST['email'])&&!empty($_POST['password']))
{
	
 $yum = mysqli_query($con, "SELECT * from registered_users WHERE PHONE='$ank' OR EMAIL='$anku'");
 $do=mysqli_num_rows($yum);
 if($do==0)
 {
	
	$nm = addslashes($_POST['name']);
	$ph = addslashes($_POST['phone']);
	$em = addslashes($_POST['email']);
	$pw = addslashes($_POST['password']);
		$uid = uniqid('', true);
	
	$query = "INSERT INTO `registered_users` (`ID`, `UNIQUE_ID`, `NAME`, `EMAIL`, `REG_NO`, `EVENTS`, `PHONE`, `ENCRYPTED_PASSWORD`, `SALT`) 
	VALUES (NULL, '$uid', '$nm', '$em', '', '' , '$ph', '$pw', '')";
	$run = mysqli_query($con,$query);
	if($run)
	{
	header('location:login.php?success=1');
	$error='Registered Sucessfully';
	}
}
 
  else
	{
	$error="Already Registered";
	}}
	
}

	
 
	











?>

<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Aurganon'16 - Register</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/bootstrap.min.css"> 
   <link rel="stylesheet" href="css/base.css">  
   <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/vendor.css">
   
    
    

   <!-- script
   ================================================== -->
	<script src="js/modernizr.js"></script>
    <script src="js/particles.js"></script>
    <script src="js/particles.min.js"></script>
    

   <!-- favicons
	================================================== -->
	<link rel="icon" type="image/png" href="images/logo.png">
 <style>
      .fixed-nav {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: rgba(255,255,255,.8) ;
 
        white-space: nowrap;
        height: 50px;
        box-sizing: border-box;
        padding: 10px;
        box-shadow: 0px 3px 6px rgba(0,0,0,0.16),0px 3px 6px rgba(0,0,0,0.23);      
      }
 
      .fixed-nav ul, .fixed-nav li {
        display:inline;
      }
 
      .fixed-nav a {
        text-decoration: none;
        text-transform: uppercase;
        padding: 17px 10px;
        color: #333;
        font-family: arial;
      }
 
      .fixed-nav a:hover {
        background-color: #000;
        color: #eee;
      }
 
      .fixed-nav ul {
        padding:0;
      }
      .fixed-nav img {
        vertical-align: middle;
      }
      main {margin-top:55px;}
    </style>
   

</head>


	<!-- header 
   ================================================== -->
   <?php  include 'ui/nav.php'; ?>
   


   <!-- info
   ================================================== -->


   <!-- CTA Section
   ================================================== -->
<?php include 'ui/sin.php'; ?>


   <!-- footer
   ================================================== -->
<?php include 'ui/footer.php'; ?>

   <div id="preloader"> 
    	<div id="loader"></div>
    	
   </div> 
   
   
   <!-- Java Script
   ================================================== --> 
  <script src="js/classie.js"></script>
	<script src="js/borderMenu.js"></script>
     <script   src="https://code.jquery.com/jquery-3.1.0.min.js"  integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-2.1.3.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/main.js"></script>
    <script src="js/materialize.js"></script>
</body>

</html>