<?php
//https://app.eatingmap.fun/user/check
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
$mail = $_GET['mail'];
$url = API_URL.'/user/check';
// 送信時のオプション

$json = array(
    "mail" => $mail,
    );

// JSON形式に変換
$json = json_encode($json);

$context = array(
    'http' => array(
        'method'  => 'POST',
        'header'  => implode("\r\n", array('Content-Type: application/json; charset=utf-8;', 'Content-Length:' . strlen($json))),
        'content' => $json
    )
);
$res = file_get_contents($url, false, stream_context_create($context));
$data = json_decode($res, true);
$result = null;
if($data['code'] == 1){
    echo 'true';
}else{
    echo 'false';
}

exit;