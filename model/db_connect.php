    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/conf/sql_conf.php';
    function get_db_connect()
    {
        try {
            // データベースに接続
            $dbh = new PDO(DSN, DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            echo $json = json_encode(array(
                "code" => 500
            ));
            exit;
        }
        return $dbh;
    }


    ?>