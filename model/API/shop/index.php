<?php
$shop_id = "null";
if(isset($_GET['id'])){
    $shop_id = $_GET['id'];
}

require $_SERVER['DOCUMENT_ROOT'] . '/web/model/db_connect.php';
$sql = "SELECT * FROM shop WHERE id = :id";

$stmt = $dbh->prepare($sql);

$stmt->bindValue(':id',$shop_id,PDO::PARAM_STR);
$stmt->execute();

$data = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if($row == null){
        $data = array(
            "code" => 500
        );
    }
    $data[] = $row;
}
echo json_encode($data);
?>