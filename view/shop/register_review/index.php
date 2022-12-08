<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>   
    <link rel="stylesheet" type="text/css" href="/view/shop/register_review/css/style.css" />
    
    <script src="https://kit.fontawesome.com/2947a18ded.js" crossorigin="anonymous"></script>
    <link href="/libs/css/bootstrap/star-rating.min.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="/libs/js/bootstrap/star-rating.min.js" type="text/javascript"></script>
    <script src="/view/shop/register_review/js/index.js"></script>
    <title>レビュー登録</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include dirname( __FILE__ , 3)."/template/include_header.php" ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php include "main/main.php" ?>
    </div>

    <!--フッター-->
    <footer>
        <?php include dirname( __FILE__ , 3)."/template/footer.php"?>
    </footer>
</body>

</html>