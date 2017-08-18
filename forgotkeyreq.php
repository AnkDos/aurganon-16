<!--Code Indented-->
<?php
include 'con/con.php';

echo "ENTER THE EMAIL FOR RECEIVING PIN";

if(isset($_POST['dude']))
{
	$email=trim($_POST['mid']); //use this to insert in db
	//$rand=3;   
	$rand = rand(653,37214); //will generate random number 
	//echo $rand; //mail
	$query1 ="INSERT INTO recover (id,user_mail) VALUES ('$rand','$email')";

	$query =mysqli_query($con,$query1);
	
	
	
	
	
	
	
	

require("mail/class.phpmailer.php");


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



	
	$to = $email ;
	$subj = 'Aurganon 16';
	$mess = "Your PIN is: $rand";
	$mailsend = mail($to,$subj,$mess);
	//$do=mysql_query("select * from recover WHERE id='$rand'");
	
	//header("Location: forgotkey.php");
}
?>

<html>
	<head>
    </head>
    <body>
        <form method="post">
        <input type="email" name="mid">
         <button type="submit" name="dude">CLICK</button>
         </form>
    </body>
</html>
