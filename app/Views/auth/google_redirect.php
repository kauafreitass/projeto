<?php

use App\Controllers\AuthController;

require_once __DIR__ . '/../../../vendor/autoload.php';


$client = new Google\Client();

$client->setClientId("975261131313-3oq9148p7hs3pvvnjqc63tmpu1nn3f5r.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri('http://localhost/projetovida/public/redirect');

if (!isset($_GET['code'])) {
    exit("Tentativa de login falhou");
}

$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

$client->setAccessToken($token['access_token']);

$oauth =  new Google\Service\Oauth2($client);

$userinfo =  $oauth->userinfo->get();

$auth = new AuthController();
$auth->storeAccountGoogle($userinfo['name'], $userinfo['email'], $userinfo['gender'], $userinfo['id'], $userinfo['picture']);