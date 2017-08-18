


<?php
include '../con/con.php';

require("class.phpmailer.php");
  include '../phpqrcode/qrlib.php';  


    



$dataaa=mysqli_query($con,"select * from registered_users");
    
    while($nameaa= mysqli_fetch_assoc($dataaa)){
    	
   $name=$nameaa['NAME'];
   $ID = $nameaa['ID'];
  echo  $maila=$nameaa['EMAIL'];
    
    
    
    
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
$mail->Subject = "A Message From Aurganon'16";
$mail->From = 'registrations@aurganon.com';
$mail->FromName = 'Registrations';



$mail->IsHTML(true);                                   // Set email format to HTML <-- html enabled-- so no worries-->



//$name="chandan";

				    
   $PNG_TEMP_DIR = '../temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = '../temp/';
 
   
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
//$count=mysqli_num_rows($do);





$mail->AddAddress($maila);  // Add a recipient here bro...<---- ankur for ur understanding-->


    
    $filename = $PNG_TEMP_DIR.crypto($ID,'encrypt').'test.png';
    
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
        QRcode::png(crypto($ID,'encrypt'),$filename, $errorCorrectionLevel, $matrixPointSize, 8); 
      
      
        
        
    
    
      
      
      
      
$mail->Body = ' <!-- topHeader -->
      <table border="0" cellspacing="0" cellpadding="0" width="100%" summary="" class="topHeader">
        <tr>
          <td>
            <!-- Logo (branding) -->
            <table border="0" cellspacing="0" cellpadding="0" width="640" align="center" summary="">
              <tr>
                <td class="logoContainer" align="center">
                
                    <img class="logo" src="http://www.aurganon.com/mail/tech-logo.png" alt="Lorem logo" />
                  </a>
                </td>
              </tr>
            </table>
            <!-- End Logo (branding) -->
          </td>
        </tr>
      </table>
      <!-- End topHeader -->
      
      <!-- featuredHeader -->
      <table border="0" cellspacing="0" cellpadding="0" width="100%" summary="" class="featuredHeader" style="background:#313a42;">
        <tr>
          <td class="section">
            <table border="0" cellspacing="0" cellpadding="0" width="640" align="center" summary="">
              <tr>
                <td class="column">
                  <table border="0" cellspacing="0" cellpadding="0" width="395" summary="">
                    <tr>
                      <td class="featuredTitle">
                        
                      </td>
                    </tr>
                    <tr>
                      <td class="featuredContent" style="color:#ffffff;" >
                        Hi '.$name.' <br><br>
                         <font color="white"> Greetings for Aurganon \'16. We are excited to inform that you have registered for Aurganon\'16 successfully.
                          We hope to see you there on 23rd September, 2016.<br><br>Keep your QR code handy to avoid queue on registration desk.It can be found on MyQR code section.<br><br>
                          Thanks & Regards<br>
                          Team Aurganon.</font>

	

                          
            
                      </td>
                    </tr>
                  </table>
                </td>
                <td id="featuredImage" class="column"><img src="http://aurganon.com/mail/mobile-phone.png" ></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    
      <table border="0" cellspacing="0" cellpadding="0" width="100%" summary="" class="socialMedia">
        <tr><td class="whitespace" height="20">&nbsp;</td></tr>
        <tr>
          <td>
            <table border="0" cellspacing="0" cellpadding="0" width="120" align="center" summary="">
              <tr>
                <td align="center" width="32">
                <font color="Black">Show this QR Code in the registration desk.</font><br>
                  <img src="http://www.aurganon.com/temp/'.$filename.'" width="200px" height="200px" alt="some error occured" />
                </td>
                
              </tr>
            </table>
          </td>
        </tr>
        <tr><td class="whitespace" height="10">&nbsp;</td></tr>
      </table>
      <!-- End Social media -->
      
    
    </span>
  </body>
</html>



';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->Send()) {
	print_r($mail);
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
  exit;
}
echo 'xxx';
echo 'Message has been sent';
}
exit();

?>