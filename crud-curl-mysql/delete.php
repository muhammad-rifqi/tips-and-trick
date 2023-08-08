<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://localhost:9900/api/banner/".$_GET['id']);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($curl);
curl_close($curl);
print_r($output);
?>