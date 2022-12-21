<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

$account = $_GET['account'];
$password = $_GET['password'];
$url = 'https://app.eatingmap.fun/user/login';
// 送信時のオプション

$json = array(
    "account" => $account,
    "password" => $password
);

// JSON形式に変換
$json = json_encode($json);

$context = array(
    'http' => array(
        'method'  => 'POST',
        'header'  => implode("\r\n", array('Content-Type: application/json;', 'Accept: application/json;')),
        'content' => $json
    )
);
$res = file_get_contents($url, false, stream_context_create($context));
$data = json_decode($res, true);

if($data['code'] == 1){
    echo 'true';
}else{
    echo 'false';
}
exit;
