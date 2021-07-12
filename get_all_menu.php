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
 
// get all products from products table
$result = mysqli_query($conn,"SELECT * FROM `menu`") or die($conn);

// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["menu"] = array();
    
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["name"] = $row["name"];
        $product["type"] = $row["type"];
        $product["price"] = $row["price"];



        // push single product into final response array
        array_push($response["menu"], $product);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No menu found";

    // echo no users JSON
    echo json_encode($response);
}
mysqli_close($conn);
?>
