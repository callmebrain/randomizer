<?php 
// echo $_GET["name"]; 

$str = file_get_contents('list.json');

$json = json_decode($str, true);

echo '<pre>' . print_r($json, true) . '</pre>';

foreach ($json as $key => $val) {

    echo $val['name'];
}
?>

