<?php
require_once 'HTTP/OAuth/Consumer.php';

$config_file = 'config.json';
$config = json_decode(file_get_contents($config_file), true);
$consumer_key = $config['consumer_key'];
$consumer_secret = $config['consumer_secret'];
$callback_url = $config['callback_url'];

session_start();
$http_request = new HTTP_Request2();
$http_request->setConfig('ssl_verify_peer', false);

// get access_token
$oauth = new HTTP_OAuth_Consumer($consumer_key, $consumer_secret);
$oauth->accept($http_request);
$verifier = $_GET['oauth_verifier'];
$oauth->setToken($_SESSION['callback_token']);
$oauth->setTokenSecret($_SESSION['callback_secret']);
$oauth->getAccessToken('https://api.twitter.com/oauth/access_token', $verifier);

// save access_token to session
$_SESSION['access_token'] = $oauth->getToken();
$_SESSION['access_token_secret'] = $oauth->getTokenSecret();

header('Location: timeline.php');
?>
