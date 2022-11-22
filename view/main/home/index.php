<?php
    $res = $_GET['logout'];
    session_start();

    if($res == "logout_click"){
        $_SESSION['login'] = "0";
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css" />

    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/jquery/jquery-3.6.0.min.js"></script>
    <script src="js/load_city/load_city.js"></script>
    <title>メイン画面</title>
</head>

<body background="images/background/c.jpg">
    <!--ヘッダー-->
    <header>
        <?php
        var_dump($_SESSION['login']);
        if($_SESSION['login'] == "1"){
            include dirname( __FILE__ , 3)."/template/header2.php";
        }else{
            include dirname( __FILE__ , 3)."/template/header1.php";
        }
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
</body>

</html>