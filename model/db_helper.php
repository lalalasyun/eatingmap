<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/web/conf/sql_conf.php';

// DBに接続する
function con()
{
    try {
        $dbh = new PDO(DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }

    return $dbh;
}

//店舗全件取得
function get_shop($dbh)
{
    $sql = "SELECT * FROM shop";

    $stmt = $dbh->prepare($sql);
    
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

//IDで店舗名取得
function get_id_shop_name($dbh,$id)
{
    $sql = "SELECT name FROM shop WHERE id = :id";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id',$id,PDO::PARAM_STR);

    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $data['name'];
}

//店舗カテゴリー取得
function get_category($dbh)
{
    $sql = "SELECT id,name FROM category";

    $stmt = $dbh->prepare($sql);

    $stmt->execute();
    $result = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $ary = [];
        $ary[] = $row['id'];
        $ary[] = $row['name'];
        $result[] = $ary;
    }
    return $result;
}

//カテゴリー別店舗取得
function get_category_shop($dbh, $category)
{
    $sql = "SELECT * FROM shop WHERE category_id = :id";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $category, PDO::PARAM_STR);

    $stmt->execute();
    $result = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }
    return $result;
}

//ジャンル別ユーザーアバターアイテム取得
function get_genre_item($dbh, $genre)
{
    $sql = "SELECT * FROM avatar_item where item_genre_id = :genre";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);

    $stmt->execute();
    $result = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }
    return $result;
}

//ジャンル別ユーザー所持済みアバターアイテム取得
function get_genre_has_item($dbh, $genre, $user)
{
    $sql = 
    "SELECT ITEM.id,ITEM.item_genre_id,name,image,point FROM avatar_item as ITEM 
    INNER JOIN user_owned_item as USER 
    ON ITEM.id != USER.item_id 
    AND USER.user_id = :user  
    AND ITEM.item_genre_id = :genre";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);

    $stmt->execute();
    $result = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }
    return $result;
}

//アイテムジャンルID取得
//@name = genrename
function get_genre_item_id($dbh, $name)
{
    $sql = "SELECT id FROM avatar_item_genre where name = :name";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);

    $stmt->execute();
    $result = null;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result = $row['id'];
    }
    return $result;
}
