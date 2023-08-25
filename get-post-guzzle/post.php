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
 $url = "https://service.synxchro.co.id/fello_snap/v1/access/token/b2b";
 $response = $client->post($url, [
     'headers' => ['x-timestamp'=>'2023-02-13T00:00:00+07','x-client-key'=>'5d26d44e4243dfa85df78d504a8170ef','x-signature'=>'H/V9EP7DwL6a4xwOhR81UfedZS0/gdVm2/VtZnZOOukSEUGa2Q5JhugU0QUKvZoYzJq53DXJVCZv2F9WY6O07A==','content-type'=>'application/json'],
     'body'    => json_encode($data)
 ]); 
 
 echo "<pre>";
 print_r(json_decode($response->getBody(), true));
 echo "</pre>";