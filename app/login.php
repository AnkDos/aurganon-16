<?php

require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['EMAIL']) && isset($_POST['PASSWORD'])) {

    // receiving the post params
    $email = $_POST['EMAIL'];
    $password = $_POST['PASSWORD'];

    // get the user by email and password
    $user = $db->getUserByEmailAndPassword($email, $password);

    if ($user != false) {
        // use is found
        $response["error"] = FALSE;
        $response["UID"] = $user["UNIQUE_ID"];
        $response["USER"]["NAME"] = $user["NAME"];
        $response["USER"]["EMAIL"] = $user["EMAIL"];
        $response["USER"]["CREATED_AT"] = $user["CREATED_AT"];
        $response["USER"]["UPDATED_AT"] = $user["UPDATED_AT"];
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Login credentials are wrong. Please try again!";
        echo json_encode($response);
    }
} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters email or password is missing!";
    echo json_encode($response);
}

?>

