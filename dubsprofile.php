<?php
ob_start();
session_start();

include 'con/con.php';
 
if(isset($_GET['id']))
{
 $idx = addslashes($_GET['id']);
//	$idd = crypto($_GET['id'], "decrypt");
	
	
	$query = "SELECT * FROM registered_users WHERE ID='$idx'";
	$queryr = mysqli_query($con,$query);
	while($par = mysqli_fetch_assoc($queryr))
	{
		$da = $par;
	
		
	}
		$ide = $da['ID'];
$qy="SELECT * FROM more_detail WHERE uid = $ide";

$qsd = mysqli_query($con,$qy);
  while($daa = mysqli_fetch_assoc($qsd))
{ 
$das = $daa;
}
	
	$checkparti = "SELECT * FROM dubsmash WHERE userid='$idx'";
	if(mysqli_num_rows(mysqli_query($con,$checkparti))=='0')
	{
		header('location:http://www.aurganon.com');
	}
	
}














?>



<meta property="og:type" content="video"> <!-- site/page type more information http://ogp.me/ -->
<meta property="og:video:type" content="application/x-shockwave-flash"> <!-- you need this because your player is a SWF player -->
<meta property="og:video:width" content="Width in Pixels"> <!-- player width -->
<meta property="og:video:height" content="Height in Pixels"> 

<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>DUBSMASH Profile: <?php echo 'AUR0'.$da['ID']; ?>- <?php echo $da['NAME']; ?></title>
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
      main {margin-top:55px;}
    </style>
   

</head>

<body id="top">

	<!-- header 
   ================================================== -->
   <?php  include 'ui/nav.php'; ?>
   

<?php include 'ui/dubsprofile.php'; ?>


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

















