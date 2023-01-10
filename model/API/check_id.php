<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
$account = $_GET['id'];
$url = API_URL.'/user/list';
// 送信時のオプション

$context = array(
    'http' => array(
        'method'  => 'GET'
    )
);
$res = file_get_contents($url, false, stream_context_create($context));
$data = json_decode($res, true);
$result = null;
foreach($data['data'] as $usr){
    if ($account === $usr['account']){
        echo 'false';
        exit;
    }
}
echo 'true';
exit;
?>