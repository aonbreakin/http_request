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
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */

// array for JSON response
$response = array();
$requestMethod = $_SERVER["REQUEST_METHOD"];

if($requestMethod == 'PUT'){
	
  $data = file_get_contents("php://input");
  
  $name = substr($data,strpos($data,'name=')+5,strpos($data,"&type")-5);
  $type = substr($data,strpos($data,'&type=')+6,strpos($data,"&price")-6-strpos($data,"&type"));
  $price = substr($data,strpos($data,'price=')+6,strlen($data));
  /*
  echo $data;
  echo ' ';
  echo $name;
  echo ' ';
  echo $type;
  echo ' ';
  echo substr($data,strpos($data,'price=')+6,strlen($data));*/
  
// check for required fields
if ($name!='' && $type!='' && $price!='') {
    

    // mysql inserting a new row
    $result = $conn ->query("UPDATE `menu` SET `price`='$price'	WHERE `name`='$name' &&`type`='$type';");

    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Menu successfully update.";

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
}
mysqli_close($conn);
?>
