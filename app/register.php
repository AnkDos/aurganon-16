<?php

require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);


if (isset($_POST['NAME']) && isset($_POST['EMAIL']) && isset($_POST['PASSWORD'])) {

    // receiving the post params
    $name = $_POST['NAME'];
    $email = $_POST['EMAIL'];
    $password = $_POST['PASSWORD'];
   
   // check if user is already existed with the same email
    if ($db->isUserExisted($email)) {
        // user already existed
        $response["error"] = TRUE;
        $response["error_msg"] = "User already existed with " . $email;
        echo json_encode($response);
    } else {
        // create a new user
        $user = $db->storeUser($name, $email, $password);
        if ($user) {
            // user stored successfully
            $response["error"] = FALSE;
            $response["UID"] = $user["UNIQUE_ID"];
            $response["USER"]["NAME"] = $user["NAME"];
            $response["USER"]["EMAIL"] = $user["EMAIL"];
            $response["USER"]["CREATED_AT"] = $user["CREATED_AT"];
            $response["USER"]["UPDATED_AT"] = $user["UPDATED_AT"];
            echo json_encode($response);
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
    
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (name, email or password) is missing!";
    echo json_encode($response);
}

 
?>

