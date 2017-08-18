<?php
include 'con/con.php'; 



if(isset($_SESSION['admin']))

{

if(isset($_GET['id'])&&!empty($_GET['id']))


{
	echo $id = addslashes($_GET['id']);

$query= "SELECT * FROM events WHERE ID='$id'";
$runq = mysqli_query($con,$query);
while($data = mysqli_fetch_assoc($runq))
{
	
	$dat = $data;
	
	
}	
	
}
	}

else{
	
	header("Location:login.php?redirect=".$_SERVER['REQUEST_URI']);
	exit;
}


	










?>
<?php include 'con/con.php'; ?>

<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Aurganon'16</title>
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

<body id="top">

	<!-- header 
   ================================================== -->
   <?php  include 'ui/nav.php'; ?>
   


   <!-- info
   ================================================== -->


   <!-- CTA Section
   ================================================== -->
<?php include 'regis2.php'; ?>


   <!-- footer
   ================================================== -->
 <?php include 'ui/footer.php'; ?>

   <div id="preloader"> 
    	<div id="loader"></div>
   </div> 

   <!-- Java Script
   ================================================== --> 
   <script src="js/jquery-2.1.3.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/main.js"></script>

</body>

</html>