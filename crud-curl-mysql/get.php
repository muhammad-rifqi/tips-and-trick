<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://localhost:9900/api/banners");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($curl);
curl_close($curl);
print_r($output);
?>