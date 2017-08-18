


<?php

include '../con/con.php';

echo "ENTER THE EMAIL FOR RECEIVING PIN";
if(isset($_POST['dude']))
{
	$email=trim($_POST['mid']); //use this to insert in db

	$rand = rand(653,37214);
			$query1 =mysqli_query($con,"INSERT INTO recover (id,user_mail) VALUES ('$rand','$email')");

	
	
require("class.phpmailer.php");


$mail = new PHPMailer;
$mail->SMTPSecure = 'tls';
$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = "server25.hostingraja.in";                 // Specify main and backup server <-- our smtp server hashbird -->
//$mail->Host = "Give IP Address";                 // If the above does not work.
$mail->Port = 25;  

// Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "registrations@aurganon.com";                // SMTP username email username
$mail->Password = "chandan@123";                  // SMTP password email ^
//$mail->SMTPSecure = "ssl";                            // Enable encryption, 'ssl' also accepted

$mail->From = 'registrations@aurganon.com';
$mail->FromName = 'Registrations';
$mail->AddAddress($email);  // Add a recipient here bro...<---- ankur for ur understanding-->

$mail->IsHTML(true);                                   // Set email format to HTML <-- html enabled-- so no worries-->

$mail->Subject = 'Registrations';



				    
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 8;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 8);


    
    
        //default data
       // echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';    
       // QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        // QRcode::png('8',$filename, $errorCorrectionLevel, $matrixPointSize, 8); 
      
      
        
        
    
    
      
      
      
      
$mail->Body = $rand;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//$mail->Send();
if(!$mail->Send()) {
	print_r($mail);
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Message has been sent';
exit(0);
}

?>




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
   <?php  include '../ui/nav.php'; ?>
   


   <!-- info
   ================================================== -->
     <form method="post">
        <input type="email" name="mid">
         <button type="submit" name="dude">CLICK</button>
         </form>

   <!-- CTA Section
   ================================================== -->



   <!-- footer
   ================================================== -->
<?php include '../ui/footer.php'; ?>

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






