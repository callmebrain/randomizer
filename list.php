<?php
$myObj = new \stdClass();

// echo $_GET["name"]; 


// $myObj->name = $_GET["name"];
// $myObj->age = 30;
// $myObj->city = "New York";

$myJSON = json_encode($myObj);

echo $myJSON;
file_put_contents('list.json', $myJSON)
?>