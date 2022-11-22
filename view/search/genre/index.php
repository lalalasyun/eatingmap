<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="/web/libs/css/bootstrap/bootstrap.min.css">
    <script src="/web/libs/js/bootstrap/bootstrap.min.js"></script>
    <script src="/web/libs/js/jquery/jquery-3.6.0.js"></script>
    <title>ジャンル検索</title>
</head>

<body >
    <!--ヘッダー-->
    <header>
        <?php include dirname( __FILE__ , 3)."/template/header.php"; ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php include "main/main.php" ?>
    </div>

    <!--フッター-->
    <footer>
        <?php include dirname( __FILE__ , 3)."/template/footer.php";?>
    </footer>
</body>

</html>