<?php
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
$url = 'https://msearch.gsi.go.jp/address-search/AddressSearch?q='.$_GET['address'];
 
 
// 送信時のオプション
$options = array('http' => array(
    'method' => 'GET',
));
 
// ストリームコンテキストを作成
$options = stream_context_create($options);
 
// file_get_contents
$contents = file_get_contents($url, false, $options);

$array = json_decode($contents, true);
$code = $array[0]['geometry']['coordinates'];
echo "{'longitude':".$code[0].",'latitude':".$code[1]."}";
?>