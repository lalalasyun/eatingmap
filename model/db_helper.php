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

//ユーザーIDでユーザー名を特定
function get_userid_user($dbh,$user)
{
    $sql = "SELECT * FROM user WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $user, PDO::PARAM_STR);
    $stmt->execute();
    $result = null;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result = $row;
    }
    return $result;
}

//ユーザーIDのレビュー数
function get_userid_review_count($dbh,$user)
{
    $sql = "SELECT count(*) as cnt FROM shop_review WHERE user_id = :user";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->execute();
    $result = null;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result = $row['cnt'];
    }
    return $result;
}

//店舗全件取得
function get_shop($dbh)
{
    $sql = "SELECT * FROM shop";

    $stmt = $dbh->prepare($sql);

    $stmt->execute();
    $result = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }
    return $result;
}

//IDで店舗情報取得
function get_id_shop_data($dbh, $id)
{
    $sql = "SELECT * FROM shop WHERE id = :id";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_STR);

    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    return $data;
}

//IDで店舗名取得
function get_id_shop_name($dbh, $id)
{
    $sql = "SELECT name FROM shop WHERE id = :id";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_STR);

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

//ジャンル別ユーザー所持アバターアイテム取得
function get_genre_has_item($dbh, $genre, $user)
{
    $sql = "SELECT distinct ITEM.id as id,ITEM.item_genre_id as genre,image,point FROM avatar_item as ITEM 
    INNER JOIN user_owned_item as USER 
    ON ITEM.id = USER.item_id
    AND ITEM.item_genre_id = :genre 
    AND USER.user_id = :user";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);

    $stmt->execute();
    $result = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }
    return $result;
}

//ジャンル別ユーザー未所持アバターアイテム取得
function get_genre_hasnt_item($dbh, $genre, $user)
{
    //全件取得
    $sql = "SELECT id,item_genre_id as genre ,image,name,point 
        FROM avatar_item 
        WHERE item_genre_id = :genre";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
    $stmt->execute();
    $result = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }

    $res = get_genre_has_item($dbh, $genre, $user);
    if(count($res) !== 0){
        foreach($res as $val1){
            for($i = 0;$i < count($result);$i++){
                if($result[$i]['id'] === $val1['id']){
                    $result[$i] = null;
                }
            }
        }
    }
    $result = array_values($result);
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

//アイテム購入
function buy_user_item($dbh, $user, $genre, $item)
{
    $sql = "INSERT INTO user_owned_item (user_id,genre_id,item_id) VALUES(:user,:genre,:item)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
    $stmt->bindValue(':item', $item, PDO::PARAM_STR);
    $stmt->execute();
}

//指定した量のポイントを増減する
function add_user_point($dbh, $point)
{
    $sql = "UPDATE user SET point=point+:point WHERE id=:user";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $point, PDO::PARAM_STR);
    $stmt->execute();
}
function remove_user_point($dbh, $point)
{
    $sql = "UPDATE user SET point=point-:point WHERE id=:user";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $point, PDO::PARAM_STR);
    $stmt->execute();
}

//店舗IDごとのレビューを検索
function get_shopid_review($dbh, $shop)
{
    $sql = "SELECT * FROM shop_review WHERE shop_id = :shop";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':shop', $shop, PDO::PARAM_STR);

    $stmt->execute();
    $result = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }
    return $result;
}

//ユーザが店舗のレビューをしているかどうか
function check_user_review($dbh, $user,$shop)
{
    $sql = "SELECT * FROM shop_review WHERE shop_id = :shop AND user_id = :user";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':shop', $shop, PDO::PARAM_STR);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);

    $stmt->execute();
    $result = null;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result = $row;
    }
    return $result;
}