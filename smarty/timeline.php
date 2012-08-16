<?php
require_once 'Util.php';

$req = $twitteroauth->OAuthRequest(HOME_TIMELINE,"GET",array("count"=>"100"));
$json = json_decode($req, true);

$smarty->assign('stream', $json);
$smarty->display('timeline.tpl');
