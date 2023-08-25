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
        "customerId"=> "productive",
        "redirectUrl"=> "https://arneva.co.id/callback",
        "description"=> "productive Snap",
        "partnerReferenceNo"=> "20230213000126",
        "additionalInfo" => array(
            "notifUrl" => "https://arneva.co.id/v1/callback"
        )
 );

 
 $url = "";
 $response = $client->post($url, [
     'headers' => [
     'content-type'=>'application/json',
     'Authorization' => 'Token',
     'x-timestamp'=>'2023-02-13T00:00:00+07',
     'x-signature' => '',
     'x-partner-id'=>'',
     'x-external-id'=> time(),
     'channel-id' => 1,
    
    ],
     'body'    => json_encode($data)
 ]); 
 
 echo "<pre>";
 print_r(json_decode($response->getBody(), true));
 echo "</pre>";
