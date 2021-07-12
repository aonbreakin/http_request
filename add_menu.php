<?php
//define('DB_USER', "cnit"); // db user
//define('DB_PASSWORD', "12345tgb"); // db password (mention your db password here)
//define('DB_DATABASE', "cnit_stream_camera"); // database name
//define('DB_SERVER', "localhost"); // db server

include "config.php";

// connecting to db
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

 if($conn == false) {
     die("Error: " . mysqli_error_connect());
 } 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */

// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['name']) && isset($_POST['type']) && isset($_POST['price'])) {
    
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];

    // mysql inserting a new row
    $result = $conn ->query("INSERT INTO `sunvending`.`menu`(`name`, `type`, `price`) VALUES('$name','$type','$price');");

    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Menu successfully added.";

        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
        
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
mysqli_close($conn);
?>
