<?php
$title = $_POST['title'];
$description = $_POST['description'];
$image_banner = $_POST['image_banner'];
$curl = curl_init();
$data = json_encode(array("title"=>$title, "description"=>$description, "image_banner"=>$image_banner));
curl_setopt($curl, CURLOPT_URL,"http://localhost:9900/api/banners");
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$result = curl_exec ($curl);
curl_close ($curl);
?>