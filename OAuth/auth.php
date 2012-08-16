<?php
require_once 'HTTP/OAuth/Consumer.php';

$config_file = 'config.json';
$config = json_decode(file_get_contents($config_file), true);
$consumer_key = $config['consumer_key'];
$consumer_secret = $config['consumer_secret'];
$callback_url = $config['callback_url'];

$http_request = new HTTP_Request2();
$http_request->setConfig('ssl_verify_peer', false);
$consumer_request = new HTTP_OAuth_Consumer_Request;
$consumer_request->accept($http_request);

$oauth = new HTTP_OAuth_Consumer($consumer_key, $consumer_secret);
$oauth->accept($consumer_request);
session_start();

// get request token
$oauth->getRequestToken('https://api.twitter.com/oauth/request_token', $callback_url);

// save request token to session
$_SESSION['callback_token'] = $oauth->getToken();
$_SESSION['callback_secret'] = $oauth->getTokenSecret();

// URL for authentication with or without access token
//$redirect_url = $oauth->getAuthorizeUrl('https://api.twitter.com/oauth/authorize');

// URL for authentication without access token
$redirect_url = $oauth->getAuthorizeUrl('https://api.twitter.com/oauth/authenticate');

header('Location: ' . $redirect_url);
?>
