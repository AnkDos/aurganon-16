<?php

function bgMod($page_name){
	$login_background_arr = array("bat.jpg","aur.jpg","flashvbat.jpg","wol.jpg","super.jpg");
	$i = rand(0,4);
	if ($page_name == 'login' || $page_name == 'registration'){
		echo "images/".$login_background_arr[$i];
	}
}

?>



