<?php
//use x-www-form-urlencoded;charset=UTF-8

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
 * Following code will delete a product from table
 * A product is identified by product id (pid)
 */

// array for JSON response
$response = array();
$requestMethod = $_SERVER["REQUEST_METHOD"];
if($requestMethod == 'DELETE'){
	
  //$data = json_decode(file_get_contents("php://input"));
  $data = file_get_contents("php://input");
  
  $name = substr($data,strpos($data,'name=')+5,strpos($data,"&type")-5);
  $type = substr($data,strpos($data,'type=')+5,strlen($data));

// check for required fields
if ($name != ''&&$type!='') {
    // mysql update row with matched pid
    $result = mysqli_query($conn,"DELETE FROM `menu` WHERE `name` = '$name' AND `type`='$type'") ;
    
    // check if row deleted or not
    if ($result > 0) {
    //if (mysql_affected_rows() > 0) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "menu successfully deleted";

        // echoing JSON response
        echo json_encode($response);
    } else {
        // no product found
        $response["success"] = 0;
        $response["message"] = "No menu found";

        // echo no users JSON
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
}
mysqli_close($conn);
?>
