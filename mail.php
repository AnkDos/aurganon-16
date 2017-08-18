        <?php
      
      
      
      include 'con/con.php'; 
        include 'email/smtp/Send_Mail.php';

  include 'phpqrcode/qrlib.php';  
  
$dataaa=mysqli_query($con,"select * from registered_users WHERE ID='1039'");
    
    while($nameaa= mysqli_fetch_assoc($dataaa)){
    	    	
   $name=$nameaa['NAME'];
   $ID = $nameaa['ID'];

    

$idey=$ID;
$checkdbs="SELECT * FROM event_reg WHERE UID='$idey'";
$data = mysqli_query($con,$checkdbs);
while($da = mysqli_fetch_assoc($data))
{
	$eveid = $da['EVENT'];
	$querye = "SELECT * FROM  `events` WHERE ID='$eveid'";	

$spoe = mysqli_query($con,$querye);

while($eve = mysqli_fetch_assoc($spoe))
{
	
 $evep .=  '<li>&nbsp;'.$eve['NAME'].'</li>'; 
 
	
}


	
}
$checkdbs1="SELECT * FROM event_regt1 WHERE UID='$idey'";
$data1 = mysqli_query($con,$checkdbs1);
while($da1 = mysqli_fetch_assoc($data1))
{
	$eveid = $da1['EVENT'];
	$querye1 = "SELECT * FROM  `events` WHERE ID='$eveid'";	

$spoe1 = mysqli_query($con,$querye1);
while($eve1 = mysqli_fetch_assoc($spoe1))
{
	
 $evep .=  '<li>&nbsp;'.$eve1['NAME'].'</li>'; 
 
	
}


	
}

echo $evep;


				    
   $PNG_TEMP_DIR = 'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';
 
   
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
//$count=mysqli_num_rows($do);






    
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




$to=$nameaa['EMAIL'];
$subject="Aurganon Greetings";
$body=' <!-- topHeader -->
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
      <table border="0" cellspacing="0" cellpadding="0" width="100%" summary="" class="featuredHeader" style="background-image:url(http://www.aurganon.com/123.jpg);">
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
                        Hi '.ucfirst($name).' <br><br>
                         <font color="white"> Greetings for Aurganon\'16. We are excited to inform that you have registered for Aurganon\'16 successfully.
                          We hope to see you there on 23rd September, 2016.<br><br>Keep your QR code handy to avoid queue on registration desk. It can be found on MyQR code section.<br><br>
                          Thanks & Regards<br>
                          Team Aurganon.
                          <br>
                          
                          
                          
                         
	

                        </font>  
            <h5>You Have Succcessfully Registered For</h5>
                          <ul>'.$evep.'</ul>
<p style="color:#ffffff;">Like Our Facebook Page To Stay Upto Dated <a href="http://www.facebook.com/aurganon">www.facebook.com/auganon</a></p>
                      <a href="https://play.google.com/store/apps/details?id=com.aurganonlite.android"><img src="https://storage.googleapis.com/support-kms-prod/D90D94331E54D2005CC8CEE352FF98ECF639" style="width:200px"></a>
                    *Please Ignore if any mail recieved before.
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
                  <img src="http://www.aurganon.com/'.$filename.'" width="200px" height="200px" alt="some error occured" />
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
// try{

Send_Mail($to,$subject,$body);

// }
// catch(exception $e)
// {
// 	echo $e;
// }
echo $to;
$inset = "INSERT INTO `hashbird_aurganon`.`email` (`id`, `uid`, `dat`) VALUES (NULL, '$ID', CURRENT_TIMESTAMP)";
mysqli_query($con,$inset);
$evep='';

}

?>