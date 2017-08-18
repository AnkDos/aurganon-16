
<?php include 'con/con.php'; ?>
<?php


	if(isset($_GET['id'])&&!empty($_GET['id']))
		{
			 $id = addslashes(crypto($_GET['id'], 'decrypt'));
			$query= "SELECT * FROM events WHERE ID='$id'";
			$runq = mysqli_query($con,$query);
			while($Nrows = mysqli_fetch_assoc($runq))
		
				{
					$row1=$Nrows['TEAM'];
					$row=$Nrows;
					
				
				}  

}
?>
<html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Aurganon'16 <?php echo $row['NAME']; ?></title>
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
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/modernizr.js"></script>
    <script src="js/particles.js"></script>
    <script src="js/particles.min.js"></script>
       <script src="js/materialize.js"></script>
       	<script>
		
		$(document).ready(function() {
    $(".text").hide()
        
});
function getResults(elem) {
    elem.checked && elem.value == "Show" ? $(".text").show() : $(".text").hide();
};
	</script>
    
    

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
   <?php  include 'ui/footer.php'; ?>

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