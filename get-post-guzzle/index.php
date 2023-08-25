<?php
// composer require guzzlehttp/guzzle:^7.0
//GET Data Guzzle
//Query Param
//$client->request('GET', 'http://httpbin.org', ['query' => 'foo=bar']);

//$client = new GuzzleHttp\Client(['base_uri' => 'https://foo.com/api/']);
// Send a request to https://foo.com/api/test
//$response = $client->request('GET', 'test');

// $response = $client->request('GET', 'http://httpbin.org?foo=bar');

require 'vendor/autoload.php';
use GuzzleHttp\Client;
$client = new GuzzleHttp\Client();
$response = $client->get('https://jsonplaceholder.typicode.com/todos');
$body = $response->getBody();
echo $response->getStatusCode();
echo "<hr>";
echo "<pre>";
print_r($body->getContents());
echo "</pre>";

?>