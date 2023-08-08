<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://localhost:9900/api/banners/".$_GET['id']);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($curl);
curl_close($curl);
?>