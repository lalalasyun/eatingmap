<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

require $_SERVER['DOCUMENT_ROOT'] . '/model/db_helper.php';

if (isset($_GET['id']) && isset($_GET['index'])) {
    $dbh = con();

    $count = get_user_review_count($dbh, $_GET['id']);
    $result = get_user_review($dbh, $_GET['id'], $_GET['index']);

    for($i=0;$i<count($result);$i++){
        $result[$i]['user_id'] = (string)$result[$i]['user_id'];
        $result[$i]['shop_id'] = (string)$result[$i]['shop_id'];
    }

    $json = array(
        "code"=>1,
        "count"=>$count,
        "data"=>$result
    );
    echo json_encode($json);
    exit;
}
echo "{'code':0}";