<?php
function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd >= $range);
    return $min + $rnd;
}
function getToken($length)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "012345678973210-092139-102391203920130283-103219389213-123-921372183-918392";
    $max = strlen($codeAlphabet) - 1;
    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, $max)];
    }
    return $token;
}


ob_start();
session_start();
include 'con/con.php';
$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
 $file_ext=strtolower(end(explode('.',$_FILES['file1']['name'])));
 
  $nm =  getToken(crypto_rand_secure(50,60)).'.'.$file_ext;

if(move_uploaded_file($fileTmpLoc, "dubsmash/$nm")){
	$idx= $_SESSION['admin'];
	$adddub="INSERT INTO `dubsmash` (`id`, `userid`, `file`, `submitted`) VALUES (NULL, '$idx', '$nm', CURRENT_TIMESTAMP)";
	$run = mysqli_query($con,$adddub);
	if($run){
  
    echo 1;
 
	}
} else {
    echo "<p style='color:#fff;'>move_uploaded_file function failed</p>";
}

?>