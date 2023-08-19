<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

$data = json_decode(file_get_contents("php://input"),true);

print_r($data);


?>