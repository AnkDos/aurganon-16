<?php 

// Connecting to the database
require_once '../con/con.php';

// Fetching according to the event type
if(isset($_POST['etype']))
{
	$response["error"] = FALSE;
	
	$etype = addslashes($_POST['etype']);
	$getdata = "SELECT * FROM `events` WHERE CATEGORY = '$etype'";
	$rq  = mysqli_query($con, $getdata);
	while($EVENT = mysqli_fetch_assoc($rq))
	{
        $response["UID"][] = $EVENT["ID"];
        $response["EVE"][] = $EVENT["NAME"];
        $response["IMG"][] = $EVENT["IMG"];
        $response["TAG"][] = $EVENT["DESCRIPTION"];
	}
	
	$data = $response;
	echo json_encode($data);
}
?>