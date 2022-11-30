<?php
$page = "lowpage"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css" />

    <link rel="stylesheet" href="/web/libs/css/bootstrap/bootstrap.min.css">
    <script src="/web/libs/js/bootstrap/bootstrap.min.js"></script>
    <script src="/web/libs/js/jquery/jquery-3.6.0.min.js"></script>

    <script src="js/index.js"></script>
    <script src="js/load_city/load_city.js"></script>
    <script src="https://kit.fontawesome.com/2947a18ded.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="css/slider.css">
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


    <title>メイン画面</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php
        include dirname( __FILE__ , 3)."/template/include_header.php";
        ?>
        <!--
            main_user.phpとmain_owner.phpを切り替える
        -->
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php include "main/main_user.php" ?>
        <!--
            main_user.phpとmain_owner.phpを切り替える
        -->
    </div>

    <!--フッター-->
    <footer>
        <?php include dirname( __FILE__ , 3)."/template/footer.php" ?>
    </footer>
    <script src="js/slider.js"></script>
</body>

</html>