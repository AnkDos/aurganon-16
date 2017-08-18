<?php
$to = "somnathfreak007@gmail.com";
$subj = 'Aurganon 16';
$mess = "Your have been registered  ";

$mailsend = mail($to,$subj,$mess);

if($mailsend){
	
echo "sucessfully sent";
}
else{
	echo "nopes";
}
?>