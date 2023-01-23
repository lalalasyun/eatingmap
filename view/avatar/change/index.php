<?php
$user = $_SESSION['account'];
$HEAD_ID =  get_genre_item_id($dbh, "head");
$CLOTHE_ID =  get_genre_item_id($dbh, "clothes");
$BACK_ID =  get_genre_item_id($dbh, "background");


$heads = get_genre_has_item($dbh, $HEAD_ID, $user);
$clothes = get_genre_has_item($dbh, $CLOTHE_ID, $user);
$backs = get_genre_has_item($dbh, $BACK_ID, $user);

$is_change = false;
if (isset($_POST["radio1"]) && $_POST["radio1"] != "") {
    set_user_item($dbh, $user, $HEAD_ID, $heads[$_POST["radio1"]]['id']);
    $is_change = true;
}

if (isset($_POST["radio2"]) && $_POST["radio2"] != "") {
    set_user_item($dbh, $user, $CLOTHE_ID, $clothes[$_POST["radio2"]]['id']);
    $is_change = true;
}

if (isset($_POST["radio3"]) && $_POST["radio3"] != "") {
    set_user_item($dbh, $user, $BACK_ID, $backs[$_POST["radio3"]]['id']);
    $is_change = true;
}

if ($is_change) {
    header("Location:/view/avatar/change/index.php?code=1");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/view/avatar/change/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/view/avatar/change/css/icon.css" />
    <script src="/view/avatar/change/js/index.js" defer></script>

    <title>eatingmap - アバター変更</title>
</head>

<body>
    <!--ヘッダー-->
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_header.php" ?>
    </header>

    <!--初期メイン画面-->
    <div class="main">
        <?php
        if (isset($_GET['code']) && $_GET['code'] == 1) {
            include "main/success.php";
        }else{
            include "main/main.php";
        }
        ?>
    </div>


    <!--フッター-->
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/template/include_footer.php" ?>
    </footer>
</body>

</html>