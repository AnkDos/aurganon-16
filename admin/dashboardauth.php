<?php
ob_start();
session_start();
if(isset($_POST['bto']))
{
	
$psw=trim($_POST['pass']);
if($psw=='130013S')
{
	$_SESSION['auth']='4';
	header("Location:dashboard.php");
	exit;
}
	


}

?>

<html><head></head><body>
	
	<form method="post"> 
	<input type="password" name="pass">
	<button type ="submit" name="bto">CLICK</button>
	</form>
	
</body></html>