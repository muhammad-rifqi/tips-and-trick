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
    'customer' => '89090',
    'username' => 'app',
    'password' => 'pwd'  
 );
 $url = "http://localhost/guzzle/send.php";
 $response = $client->post($url, [
     'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
     'body'    => json_encode($data)
 ]); 
 
 echo "<pre>";
 print_r(json_decode($response->getBody(), true));
 echo "</pre>";