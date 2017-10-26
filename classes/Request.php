<?php
namespace Monitor;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;

class Request {

    public static function doTheRequest($method, $uri){
        $response = array();
        $client = Access::getGuzzleClient();
        try {
            $request = $client->request($method, $uri);
            $tareas = $request->getBody();
            $response['success'] = true;
            $response['data'] = json_decode($tareas);
        } catch (RequestException $e) {
            $response['success'] = false;
            $response['message'] = $e->getResponse()->getStatusCode() . ' - ' . $e->getResponse()->getReasonPhrase();
            $response['data'] = [];
        }
        return $response;
    }

}