<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class RestClientController extends Controller
{
    public function index(){
        $serviceURL = "http://localhost/Activity5/public/";
        $api = "usersrest";
        $param = "";
        $uri = $api. "/" . $param;
        try{
            $client = new Client(['base_uri' => $serviceURL]);
            $response = $client->request('GET', $uri);
            
            if($response->getStatusCode() == 200){
                return $response->getBody();
            }
            return "There was an error: " . $response->getStatusCode();
        } catch (ClientException $e){
            return "There was an exception: " . $e->getMessage();
        }
    }
}
