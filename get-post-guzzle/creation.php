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
            "notifUrl" => "https://arneva.co.id/fello_snap/v1/callback"
        )
 );

 
 $url = "https://service.synxchro.co.id/fello_snap/v1/registration-account-creation";
 $response = $client->post($url, [
     'headers' => [
     'content-type'=>'application/json',
     'Authorization' => 'Bearer 06feca9225a1e3fb838e69892ef80487a47e52d3',
     'x-timestamp'=>'2023-02-13T00:00:00+07',
     'x-signature' => '5t6e7PXKhWPCxbU0OY2OFvVAHSCpuYX+p4YEtlcmjUzB++HzCfNqnhDPMZyVWBkgyVA+Lk02tV5NhMjGSpqL9w==',
     'x-partner-id'=>'90fd238f-3c83-4ca4-a64e-d68aeb643b5e',
     'x-external-id'=> time(),
     'channel-id' => 1,
    
    ],
     'body'    => json_encode($data)
 ]); 
 
 echo "<pre>";
 print_r(json_decode($response->getBody(), true));
 echo "</pre>";