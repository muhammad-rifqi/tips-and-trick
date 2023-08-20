<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

$data = json_decode(file_get_contents("php://input"),true);

// print_r($data);
for($i=0; $i< count($data); $i++){
    $row[$i] = explode(",",$data[$i]);
        print_r($row[$i]);
        //insert to db 
}

// output like this
// Array
// (
//     [0] => 7
//     [1] => michael.lawson@reqres.in
//     [2] => Michael
//     [3] => Lawson
//     [4] => https://reqres.in/img/faces/7-image.jpg
// )
// Array
// (
//     [0] => 8
//     [1] => lindsay.ferguson@reqres.in
//     [2] => Lindsay
//     [3] => Ferguson
//     [4] => https://reqres.in/img/faces/8-image.jpg
// )
// Array
// (
//     [0] => 9
//     [1] => tobias.funke@reqres.in
//     [2] => Tobias
//     [3] => Funke
//     [4] => https://reqres.in/img/faces/9-image.jpg
// )
// Array
// (
//     [0] => 10
//     [1] => byron.fields@reqres.in
//     [2] => Byron
//     [3] => Fields
//     [4] => https://reqres.in/img/faces/10-image.jpg
// )
// Array
// (
//     [0] => 11
//     [1] => george.edwards@reqres.in
//     [2] => George
//     [3] => Edwards
//     [4] => https://reqres.in/img/faces/11-image.jpg
// )
?>
