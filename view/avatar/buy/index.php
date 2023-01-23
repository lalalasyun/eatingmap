<?php
$user = $_SESSION['account'];
$HEAD_ID =  get_genre_item_id($dbh, "head");
$CLOTHE_ID =  get_genre_item_id($dbh, "clothes");
$BACK_ID =  get_genre_item_id($dbh, "background");

$heads = get_genre_hasnt_item($dbh, $HEAD_ID, $user);
$clothes = get_genre_hasnt_item($dbh, $CLOTHE_ID, $user);
$backs = get_genre_hasnt_item($dbh, $BACK_ID, $user);

$HEAD_PATH = "/images/avatar/headimg/";
$CLOTHE_PATH = "/images/avatar/clotheimg/";
$BACK_PATH = "/images/avatar/backimg/";


$buy_flg = (isset($_POST["radio1"]) && $_POST["radio1"] !== []) ||
    (isset($_POST["radio2"]) && $_POST["radio2"] !== []) ||
    (isset($_POST["radio3"]) && $_POST["radio3"] !== []);

if ($buy_flg) {
    $check_point_result = check_point($USER_DATA['point'], $heads, $clothes, $backs);
    if ($check_point_result) {
        if (isset($_POST["radio1"]) && $_POST["radio1"] !== []) {
            $item_list = $_POST["radio1"];
            foreach ($item_list as $index) {
                $item = $heads[$index];
                buy_user_item($dbh, $user, $item['genre'], $item['id']);
                remove_user_point($dbh, $user, $item['point']);
            }
        }
        if (isset($_POST["radio2"]) && $_POST["radio2"] !== []) {
            $item_list = $_POST["radio2"];
            foreach ($item_list as $index) {
                $item = $clothes[$index];
                buy_user_item($dbh, $user, $item['genre'], $item['id']);
                remove_user_point($dbh, $user, $item['point']);
            }
        }
        if (isset($_POST["radio3"]) && $_POST["radio3"] !== []) {
            $item_list = $_POST["radio3"];
            foreach ($item_list as $index) {
                $item = $backs[$index];
                buy_user_item($dbh, $user, $item['genre'], $item['id']);
                remove_user_point($dbh, $user, $item['point']);
            }
        }
    }
    if (!$check_point_result) {
        header("Location:/view/avatar/buy/index.php?code=0");
    } else {
        header("Location:/view/avatar/buy/index.php?code=1");
    }
}
function check_point($has_point, $heads, $clothes, $backs)
{
    $point = 0;
    if (isset($_POST["radio1"]) && $_POST["radio1"] !== []) {
        $item_list = $_POST["radio1"];
        foreach ($item_list as $index) {
            $item = $heads[$index];
            $point += $item['point'];
        }
    }
    if (isset($_POST["radio2"]) && $_POST["radio2"] !== []) {
        $item_list = $_POST["radio2"];
        foreach ($item_list as $index) {
            $item = $clothes[$index];
            $point += $item['point'];
        }
    }
    if (isset($_POST["radio3"]) && $_POST["radio3"] !== []) {
        $item_list = $_POST["radio3"];
        foreach ($item_list as $index) {
            $item = $backs[$index];
            $point +=  $item['point'];
        }
    }
    return $point <= $has_point;
}

?>
<html lang="ja">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/libs/php/include_head.php" ?>
    <link rel="stylesheet" type="text/css" href="/view/avatar/buy/css/style.css" />
    <script src="/view/avatar/buy/js/index.js"></script>
    <title>eatingmap - アイテム購入</title>

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
        }else if(isset($_GET['code']) && $_GET['code'] == 0){
            include "main/faile.php";
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