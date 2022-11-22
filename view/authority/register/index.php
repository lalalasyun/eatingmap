<?php
    /* 本番環境用メールアドレス認証チェック
    session_start();
    if(!isset($_SESSION['register_event']) || !$_SESSION['register_event']){
        header('Location: /web/view/error/404/');
        exit;
    }
    */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/jquery/jquery-3.6.0.min.js"></script>
    <script src="js/jquery/jquery.validate.min.js"></script>
    <script src="js/jquery/additional-methods.min.js"></script>
    <script src="js/validate_rules.js"></script>
    <title>新規登録</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include dirname( __FILE__ , 3)."/template/header.php" ?>
    </header>

    <!--初期メイン画面-->

    <div class="main">
        <?php
        $name = $_GET["submit"];
        if ($name == "ok") {
            include "main/confirm.php";
        }else if($name == "confirm"){
            include "main/complite.php";
        }else{
            include "main/main.php";
        }
        ?>
        
    </div>

    <!--フッター-->
    <footer>
        <?php include dirname( __FILE__ , 3)."/template/footer.php" ?>
    </footer>
</body>

</html>