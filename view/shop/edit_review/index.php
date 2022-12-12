<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>   
    <script src="https://kit.fontawesome.com/2947a18ded.js" crossorigin="anonymous"></script>
    <link href="/libs/css/bootstrap/star-rating.min.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="/libs/js/bootstrap/star-rating.min.js" type="text/javascript"></script>
    <script src="/view/shop/edit_review/js/index.js"></script>
    <link rel="stylesheet" type="text/css" href="/view/shop/edit_review/css/style.css" />
    <title>レビュー編集</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT']."/view/template/include_header.php" ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php
            if(isset($_GET['code']) && $_GET['code'] == 1){
                include "main/success.php";
            }else if(isset($_GET['code']) && $_GET['code'] == 0){
                include "main/faile.php";
            }else{
                include "main/main.php";
            }
        ?>
    </div>

    <!--フッター-->
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT']."/view/template/include_footer.php"?>
    </footer>
</body>

</html>