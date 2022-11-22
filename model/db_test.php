    <?php
    try {
        // データベースに接続
        $pdo = new PDO(
            'mysql:dbname=ramenlog;host=163.44.251.186;charset=utf8',
            'root',
            'root'
        );
        echo "success connecting DB";
    } catch (PDOException $e) {
        echo $e;
    }
    ?>