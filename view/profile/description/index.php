<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/view/profile/description/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rampart+One&family=Reggae+One&family=DotGothic16&display=swap" rel="stylesheet">

    <link href="/libs/css/bootstrap/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
    <script src="/libs/js/bootstrap/star-rating.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/libs/icon/icon.css" />

    <script src="/view/profile/description/js/index.js"></script>

    <title>プロフィール画面</title>

    <link rel="stylesheet" type="text/css" href="/libs/css/page_button.css" />
    <script src="/libs/js/page_btn.js" defer></script>

    <script src="/libs/js/lock.js"></script>
</head>


<!--ヘッダー-->
<header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_header.php"; ?>
</header>

<!--初期メイン画面-->
<div class="main">
    <?php include "main/main1.php" ?>
</div>

<!--フッター-->
<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_footer.php"; ?>
</footer>
</body>

</html>