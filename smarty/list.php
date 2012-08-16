<?php
require_once 'Util.php';

$req = $twitteroauth->OAuthRequest(UPDATE_PROFILE,"POST",array());
$profile = json_decode($req, true);

$screen_name = $profile['screen_name'];

$req = $twitteroauth->OAuthRequest(LIST_ALL, "GET", array());
$list_all = json_decode($req, true);

//for ($i = 0;$i < 50;$i++) {
//    echo "\n";
//}

$list = array();
foreach ($list_all as $item) {
    $list_name = $item['name'];echo 'list name = ' . $list_name . '<br>';
    $list_id = $item['id'];
    $cursor = -1;
    do {
        $req = $twitteroauth->OAuthRequest(
            LIST_MEMBERS,
            "GET",
            array(
                'list_id' => $list_id,
                'cursor' => $cursor
            )
        );
        $list_members = json_decode($req, true);
        $cursor = $list_members['next_cursor'];
//    var_dump($list_members);die;
        foreach ($list_members as $list_info) {
            foreach ($list_info as $member) {
                echo 'name   =  ' . $member['name'] . '<br>';
            }
        }
    die;
    } while (isset($cursor) || $cursor != 0);
}


//$smarty->assign('stream', $list);
//$smarty->display('list.tpl');
