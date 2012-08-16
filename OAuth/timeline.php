<?php
require_once 'HTTP/OAuth/Consumer.php';

session_start();

if (!isset($_SESSION['access_token']) || !isset($_SESSION['access_token_secret'])) {

    header('Location: auth.php');
    exit;
}

$config_file = 'config.json';
$config = json_decode(file_get_contents($config_file), true);
$consumer_key = $config['consumer_key'];
$consumer_secret = $config['consumer_secret'];

// set access_token
$oauth = new HTTP_OAuth_Consumer($consumer_key, $consumer_secret);
$oauth->setToken($_SESSION['access_token']);
$oauth->setTokenSecret($_SESSION['access_token_secret']);

// Twitter API
// ref: http://twideni.fuhai-music.com/ApiList/

// format
$api_format = 'json'; //xml can be used

// URL
$api_url = "http://api.twitter.com/1/statuses/home_timeline.$api_format";
//$api_url = "https://api.twitter.com/1/statuses/mentions.json?include_entities=true";

// parameters
$api_params = array();
$api_params['count'] = 20;

// get data
$response = $oauth->sendRequest($api_url, $api_params);

// display
if ($api_format == 'json') {
    $data = json_decode($data);
}
echo '<pre>' . print_r($data, true) . '</pre>';
?>
