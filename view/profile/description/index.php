<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/web/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/web/view/profile/description/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rampart+One&family=Reggae+One&family=DotGothic16&display=swap" rel="stylesheet">
    <title>プロフィール画面</title>
</head>

<body background="/WEB/images/background/c.jpg">
    <!--ヘッダー-->
    <header>
        <?php include dirname( __FILE__ , 3)."/template/include_header.php"; ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php include "main/main1.php" ?>
    </div>

    <!--フッター-->
    <footer>
        <?php include dirname( __FILE__ , 3)."/template/footer.php";?>
    </footer>
</body>

</html>