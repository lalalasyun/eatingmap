<!DOCTYPE html>
<?php
//phpエラー表示用
ini_set('display_errors', "On");


//各変数の初期化
require 'model/db_helper.php';
$dbh = con();

// apiのURLをjsに実装
require 'conf/api_conf.php';
echo '<script data-api-url="' . API_URL . '"></script>';


require_once dirname(__FILE__) . "/libs/php/Mobile_Detect.php";
$detect = new Mobile_Detect;
$isMobile = $detect->isMobile();



session_start();
$REQUEST_URI = $_SERVER["REQUEST_URI"];
if (!isset($page)) {
    $page = $REQUEST_URI;
}


if (!isset($_SESSION['auth'])) {
    $_SESSION['auth'] = false;
}
if (!isset($_SESSION['account'])) {
    $_SESSION['account'] = "";
}

//ログアウト処理
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    $_SESSION['account'] = "";
    $_SESSION['auth'] = false;
    header("Location: ?logout=0");
}


//js用変数
$USER_DATA = "";
if ($_SESSION['auth'] && $_SESSION['account'] != "") {
    $USER_DATA = get_userid_user($dbh, $_SESSION['account']);

    //shopタグが間違っている場合nullに修正
    if (!get_id_shop_data($dbh, $USER_DATA['shop_id'])) {
        $USER_DATA['shop_id'] = null;
    }
    echo "<script>let user_account_id = '" . $USER_DATA['id'] . "';</script>";
} else {
    echo "<script>let user_account_id = '';</script>";
}

if ($isMobile) {
    echo "<script>const isMobile = true;</script>";
} else {
    echo "<script>const isMobile = false;</script>";
}


//index.phpを消す

$sp_url_param = explode("?", $REQUEST_URI, 2);

$sp_url = $sp_url_param[0];
$sp_param = null;
if (count($sp_url_param) == 2) {
    $sp_param = $sp_url_param[1];
}

$sp_url = explode("/", $sp_url);

$GET_PARAM = null;


$FILENAME = $sp_url[count($sp_url) - 1];
$sp_url[count($sp_url) - 1] = explode("?", $FILENAME)[0];

//getパラメータがあれば保存する
if (isset($sp_param)) {
    $GET_PARAM = explode("&", $sp_param);
}
if (preg_match("/index\.php/", $FILENAME)) {
    $sp_url[count($sp_url) - 1] = "";
}


// /shop/:id にアクセスが来るとルーティング
if ($sp_url[1] === "shop") {
    $SHOP_DATA = get_id_shop_data($dbh, $sp_url[2]);
    if ($SHOP_DATA) {
        include "view/shop/details/index.php";
        die();
    }
}

// /user/:id にアクセスが来るとルーティング
if ($sp_url[1] === "user") {
    // $USERPAGE_DATA = get_userid_user($dbh, $sp_url[2]);
    // //なければアカウントで再検索
    // if (!isset($USERPAGE_DATA)) {
    //     $USERPAGE_DATA = get_account_user($dbh, $sp_url[2]);
    // }
    //マッピングをログインIDに統合
    $USERPAGE_DATA = get_account_user($dbh, $sp_url[2]);

    if (isset($USERPAGE_DATA)) {
        include "view/profile/description/index.php";
        die();
    }
}


// /icon/:id にアクセスが来るとルーティング
if ($sp_url[1] === "icon") {
    // $USERPAGE_DATA = get_userid_user($dbh, $sp_url[2]);
    // //なければアカウントで再検索
    // if (!isset($USERPAGE_DATA)) {
    //     $USERPAGE_DATA = get_account_user($dbh, $sp_url[2]);
    // }
    //マッピングをログインIDに統合
    $USERPAGE_DATA = get_account_user($dbh, $sp_url[2]);

    //アカウントが存在する又は空文字の場合
    if (isset($USERPAGE_DATA) || $sp_url[2] === "") {
        include "view/avatar/view/index.php";
        die();
    }
}


$REQUEST_URI = implode("/", $sp_url);

//json読み込み
$PAGECONF = file_get_contents("conf/page_conf.json");
$PAGECONF = mb_convert_encoding($PAGECONF, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$MAP = json_decode($PAGECONF, true);

$is_logged_in = false;

foreach ($MAP as $key) {
    foreach ($key as $pages) {
        if (($pages['url'] === $REQUEST_URI) || ("/" . $pages['routing'] === $REQUEST_URI)) {
            if (($pages['level'] == 2 || $pages['level'] == 3) && !$_SESSION['auth']) {
                //ログイン状態じゃないと見れないサイトはエラー画面に移動
                if (isset($_GET['logout'])) {
                    header('Location: /view/main/home/');
                } else {
                    header('Location: /error/login');
                }
            }
            if ($pages['level'] == 3 && !isset($USER_DATA['shop_id'])) {
                //店員ログイン状態じゃないと見れないサイトはエラー画面に移動
                header('Location: /error/employee');
            }
            //ログイン転送用フラグ
            if (isset($pages['is_logged_in'])) {
                $is_logged_in = true;
            }
        }
        if ($pages['url'] === $REQUEST_URI) {
            if ($GET_PARAM) {
                include $pages['routing'] . 'index.php';
                foreach ($GET_PARAM as $param) {

                    $_GET[explode('=', $param)[0]] = explode('=', $param)[1];
                }
            } else {
                include $pages['routing'] . 'index.php';
            }
            exit;
        }
        if ("/" . $pages['routing'] === $REQUEST_URI) {
            if ($GET_PARAM) {
                header('Location: ' . $pages['url'] . '?' . implode('&', $GET_PARAM));
            } else {
                header('Location: ' . $pages['url']);
            }
            exit;
        }
    }
}


//ルーティング先が見つからない場合404ページへリダイレクトする
header('Location: /error/404');
exit;
