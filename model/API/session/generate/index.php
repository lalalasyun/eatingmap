<?php
require $_SERVER['DOCUMENT_ROOT'] . '/web/model/db_connect.php';
$data = array(
    "code" => 0,
);
ini_set('display_errors', 1);
$id = "null";
if (isset($_GET['id']) && preg_match("/[0-9]{19}/",$_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'INSERT INTO session (session,id) values(:session,:id) ON DUPLICATE KEY UPDATE session=VALUES(session)';
    $key = generate();
    // SQL文をセット
    $stmt = $dbh->prepare($sql);
    // 値をセット
    $stmt->bindValue(':id', $id, PDO::PARAM_STR);
    $stmt->bindValue(':session', $key , PDO::PARAM_STR);

    $stmt->execute();
    $data['code'] = 1;
    $data['key'] = $key;
} else {
    $data['code'] = 0;
}


echo json_encode($data);

function generate()
{
    return bin2hex(openssl_random_pseudo_bytes(16)) . bin2hex(openssl_random_pseudo_bytes(16));
}
