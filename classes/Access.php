<?php

namespace Monitor;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Cookie\SessionCookieJar;

class Access
{

    public static function isLoggedIn(){
        if (isset($_SESSION['logged'])) {
            try {
                Access::getSessionInfo();
            } catch (RequestException $e) {
                if ($e->hasResponse()) {
                    $error = Psr7\str($e->getResponse());
                }
                return false;
            }
            return true;
        }
        return false;

    }

    public static function getGuzzleClient(){
        $cookieJar = new SessionCookieJar('MiCookie', true);
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $_SESSION['base_uri_bonita'],
            // You can set any number of default request options.
            'timeout'  => 1.0,
            'cookies' => $cookieJar
        ]);

        return $client;
    }

    public static function login(){
        $user = $_POST['user'];
        $password = $_POST['password'];
        $base_uri = $_POST['host'];

        try {
            $cookieJar = new SessionCookieJar('MiCookie', true);
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => $base_uri,
                // You can set any number of default request options.
                'timeout'  => 4.0,
                'cookies' => $cookieJar
            ]);
            $resp = $client->request('POST', 'loginservice', [
                'form_params' => [
                    'username' => $user,
                    'password' => $password,
                    'redirect' => 'false'
                ]
            ]);

            $_SESSION['user_bonita']= $_POST['user'];
            $_SESSION['password_bonita']= $_POST['password'];
            $_SESSION['base_uri_bonita']= $_POST['host'];
            $_SESSION['logged'] = true;

            return false;
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $error = Psr7\str($e->getResponse());
            } else {
                $error = "No se puede conectar al servidor de Bonita OS";
            }

            return $error;
        }
    }

    public static function getSessionInfo(){
        $client = Access::getGuzzleClient();
        $response = $client->request('GET', 'API/system/session/unusedid');
        $info = $response->getBody();
        return json_decode($info);
    }

    public static function getUserLogged(){
        $info = Access::getSessionInfo();
        return Users::getUserUsername($info->user_id);
    }
}