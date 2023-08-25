<?php
//POST Data Guzzle

require 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
$client = new \GuzzleHttp\Client();

$data = array(
    "grantType"=>"client_credentials", 
    "additionalInfo"=>new stdClass
 );
 $url = "url";
 $response = $client->post($url, [
     'headers' => ['x-timestamp'=>'2023-02-13T00:00:00+07','x-client-key'=>'','x-signature'=>'','content-type'=>'application/json'],
     'body'    => json_encode($data)
 ]); 
 
 echo "<pre>";
 print_r(json_decode($response->getBody(), true));
 echo "</pre>";
