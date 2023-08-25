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
 $url = "https://service.synxchro.co.id/fello_snap/v1/utilities/signature/service";
 $response = $client->post($url, [
     'headers' => [
     'x-timestamp'=>'2023-02-13T00:00:00+07',
     'x-client-secret' => 'JhR0nSqHxhWe+MkQuzGbr5cwyc3iPBzhpUuPZLvPVoRbbI8ve36Zcz81UL+5Z//Sit7Mzu+qKs5mK29FhzcdhQ==',
     'httpmethod'=>'post',
     'endpoinurl'=>'https://arneva.co.id/fello_snap/v1/registration-account-creation',
     'accesstoken' => '06feca9225a1e3fb838e69892ef80487a47e52d3',
     'content-type'=>'application/json'
    ],
     'body'    => json_encode($data)
 ]); 
 
 echo "<pre>";
 print_r(json_decode($response->getBody(), true));
 echo "</pre>";