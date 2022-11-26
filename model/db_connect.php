    <?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');
    require_once $_SERVER['DOCUMENT_ROOT'] . '/web/conf/sql_conf.php';
    $dbh = null;
    try {
        // データベースに接続
        $dbh = new PDO(DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo $json = json_encode(array(
            "code" => 500
        ));
        exit;
    }
    ?>