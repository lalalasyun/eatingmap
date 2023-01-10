<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/conf/sql_conf.php';

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
function get_userid_user($dbh, $user)
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
//ユーザーアカウントでユーザー名を特定
function get_account_user($dbh, $account)
{
    $sql = "SELECT * FROM user WHERE account = :account";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':account', $account, PDO::PARAM_STR);
    $stmt->execute();
    $result = null;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result = $row;
    }
    return $result;
}

//ユーザーIDのレビュー数
function get_userid_review_count($dbh, $user)
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
    $sql = "SELECT * FROM shop  ORDER BY score DESC LIMIT 20";

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
    $sql = "SELECT id,name FROM category WHERE type = 1";

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

//店舗タイプ取得
function get_type($dbh)
{
    $sql = "SELECT * FROM category WHERE type = 2";

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
    $sql = "SELECT distinct ITEM.id as id,ITEM.item_genre_id as genre,image,point,name,is_set_avatar 
    FROM avatar_item as ITEM 
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
    //所持アイテムを取得
    $result1 = get_genre_has_item($dbh, $genre, $user);
    $sql_add =  "";
    foreach ($result1 as $data) {
        $sql_add .= " AND id != " . $data['id'];
    }


    //全件取得
    $sql = "SELECT id,item_genre_id as genre ,image,name,point 
        FROM avatar_item 
        WHERE item_genre_id = :genre" . $sql_add;
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
    $stmt->execute();
    $result2 = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result2[] = $row;
    }


    return $result2;
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
function add_user_point($dbh, $user, $point)
{
    $sql = "UPDATE user SET point=point+:point WHERE id=:user";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':point', $point, PDO::PARAM_STR);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->execute();
}
function remove_user_point($dbh, $user, $point)
{
    $sql = "UPDATE user SET point=point-:point WHERE id=:user";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':point', $point, PDO::PARAM_STR);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->execute();
}

//ユーザデータにアイテムをセット
function set_user_item($dbh, $user, $genre, $item)
{
    //ジャンルのアイテムをリセット
    $sql = "UPDATE user_owned_item SET is_set_avatar = '0' WHERE user_id = :user AND genre_id = :genre";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
    $stmt->execute();

    //ジャンルのアイテムIDにフラグをセット
    $sql = "UPDATE user_owned_item SET is_set_avatar = '1' WHERE user_id = :user AND genre_id = :genre AND item_id = :item";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
    $stmt->bindValue(':item', $item, PDO::PARAM_STR);
    $stmt->execute();
}

//店舗IDごとのレビューを検索(降順)
function get_shopid_review($dbh, $shop)
{
    $sql = "SELECT * FROM shop_review WHERE shop_id = :shop ORDER BY score DESC";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':shop', $shop, PDO::PARAM_STR);

    $stmt->execute();
    $result = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }
    return $result;
}

//ユーザIDのレビューを検索
function get_user_review_count($dbh, $user)
{
    $sql = "SELECT count(*) as count FROM shop_review WHERE user_id = :user";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);

    $stmt->execute();
    $result = 0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result = $row["count"];
    }
    return $result;
}

//更新順
function get_user_review($dbh, $user)
{
    $sql = "SELECT * FROM shop_review AS r 
    INNER JOIN shop AS s 
    ON r.shop_id = s.id 
    WHERE user_id = :user 
    ORDER BY s.score DESC";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);

    $stmt->execute();
    $result = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }
    return $result;
}

//ユーザが店舗のレビューをしているかどうか
function check_user_review($dbh, $user, $shop)
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

//レビューを投稿あれば更新
function update_shop_review($dbh, $user, $shop, $text, $score)
{
    $sql = "INSERT INTO shop_review (user_id,shop_id, text ,score) 
    VALUES (:user,:shop, :text,:score) 
    ON DUPLICATE KEY 
    UPDATE text = VALUES(text),score = VALUES(score)";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':shop', $shop, PDO::PARAM_STR);
    $stmt->bindValue(':text', $text, PDO::PARAM_STR);
    $stmt->bindValue(':score', $score, PDO::PARAM_STR);

    $stmt->execute();
}

//レビューを削除
function delete_shop_review($dbh, $user, $shop)
{
    $sql = "DELETE FROM shop_review WHERE user_id = :user AND shop_id = :shop";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':shop', $shop, PDO::PARAM_STR);

    $stmt->execute();
}

//ユーザアバター取得
function get_avatar($dbh, $user, $genre)
{
    $sql = "SELECT * FROM avatar_item WHERE id in (SELECT item_id FROM user_owned_item WHERE user_id = :user AND genre_id = :genre AND is_set_avatar = 1)";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


//ユーザプロフィール設定
function set_user_prof($dbh, $user, $name, $text)
{
    $sql = "UPDATE user SET name = :name, profile = :text WHERE id = :user";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':text', $text, PDO::PARAM_STR);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

//店舗情報タグを取得
function get_shop_tag($dbh, $shop)
{
    $sql = "SELECT * FROM shop_description WHERE shop_id = :shop";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':shop', $shop, PDO::PARAM_STR);

    $stmt->execute();

    $result = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $ary = array(
            'name' => $row['name'],
            'value' => $row['value']
        );
        $result[] = $ary;
    }
    return $result;
}

//お気に入り追加
function add_shop_favorite($dbh, $user, $shop)
{
    try {
        $sql = "INSERT INTO shop_favorite (user_id,shop_id) VALUES (:user,:shop)";

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':user', $user, PDO::PARAM_STR);
        $stmt->bindValue(':shop', $shop, PDO::PARAM_STR);

        $stmt->execute();
    } catch (PDOException $e) {
        //uniqueエラー回避用
    }
}

//お気に入り削除
function del_shop_favorite($dbh, $user, $shop)
{
    $sql = "DELETE FROM shop_favorite WHERE user_id = :user AND shop_id = :shop";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':shop', $shop, PDO::PARAM_STR);

    $stmt->execute();
}

//ユーザ別お気に入り確認
function get_shop_favorite_list($dbh, $user)
{
    $sql = "SELECT s.id,name,f.create_time FROM shop_favorite as f INNER JOIN shop as s ON f.shop_id = s.id WHERE user_id = :user  ORDER BY f.create_time ASC";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);

    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $ary = array(
            "id" => (string)$row['id'],
            "create_time" => $row['create_time'],
            "name" => $row['name']
        );
        $result[] = $ary;
    }
    return $result;
}

//店舗ページアクセス時ユーザお気に入り確認
function is_user_shop_favorite($dbh, $user, $shop)
{
    $sql = "SELECT * FROM shop_favorite WHERE user_id = :user AND shop_id = :shop";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':shop', $shop, PDO::PARAM_STR);

    $stmt->execute();
    $result = "";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result = $row;
    }
    return $result;
}

//店舗検索(降順)
function search_shop($dbh, $name, $genre, $pref, $city, $price)
{
    $name_sql = " (name LIKE :name OR info1 LIKE :name) ";
    $genre_sql = " category_id = :genre ";

    $pref_sql = " location1 LIKE :pref ";
    $city_sql = " location1 LIKE :city ";

    $price_sql = " price < :price ";

    $sep = " AND ";

    $sql = "select * from shop WHERE id IS NOT NULL ";
    if (isset($name)) {
        $sql = $sql . $sep . $name_sql;
    }
    if (isset($genre)) {
        $sql = $sql . $sep . $genre_sql;
    }
    if (isset($pref)) {
        $sql = $sql . $sep . $pref_sql;
    }
    if (isset($city)) {
        $sql = $sql . $sep . $city_sql;
    }
    if (isset($price)) {
        $sql = $sql . $sep . $price_sql;
    }

    $sql = $sql . "  ORDER BY score DESC";
    $stmt = $dbh->prepare($sql);

    if (isset($name)) {
        $stmt->bindValue(':name', "%" . $name . "%", PDO::PARAM_STR);
    }
    if (isset($genre)) {
        $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
    }
    if (isset($pref)) {
        $stmt->bindValue(':pref', "%" . $pref . "%", PDO::PARAM_STR);
    }
    if (isset($city)) {
        $stmt->bindValue(':city', "%" . $city . "%", PDO::PARAM_STR);
    }
    if (isset($price)) {
        $stmt->bindValue(':price', $price, PDO::PARAM_STR);
    }

    $stmt->execute();
    $result = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $row['id'] = (string)$row['id'];
        $result[] = $row;
    }
    return $result;
}


//緯度経度登録
function set_geocode($dbh, $user, $lat, $lng)
{
    $sql = "UPDATE shop SET longitude = :lng, latitude = :lat WHERE id = :user";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':lng', $lng, PDO::PARAM_STR);
    $stmt->bindValue(':lat', $lat, PDO::PARAM_STR);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);

    $stmt->execute();
}

//お問い合わせフォーム
function send_ask_form($dbh, $user, $user_name, $content,$mail)
{
    $code = str_pad(random_int(0, 999999999999999999), 18, 0, STR_PAD_LEFT);
    $sql = "INSERT INTO application (id, type,name, content, user_id, status, user_name,mail) 
    VALUES (:id, '3', '質問', :content,:user, '0', :user_name,:mail)";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $code, PDO::PARAM_STR);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':content', $content, PDO::PARAM_STR);
    $stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
    $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);

    $stmt->execute();
}

function send_del_shop_form($dbh, $user, $content, $shop_name, $user_name)
{
    $code = str_pad(random_int(0, 999999999999999999), 18, 0, STR_PAD_LEFT);
    $sql = "INSERT INTO application (id, type, name, content, user_id,status, shop_name, user_name) 
    VALUES (:id, '2', '店舗削除申請',:content, :user, '0', :shop_name, :user_name)";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $code, PDO::PARAM_STR);
    $stmt->bindValue(':content', $content, PDO::PARAM_STR);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':shop_name', $shop_name, PDO::PARAM_STR);
    $stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);

    $stmt->execute();
}

function send_del_emp_form($dbh, $user, $content, $shop_id, $shop_name, $user_name)
{
    $code = str_pad(random_int(0, 999999999999999999), 18, 0, STR_PAD_LEFT);
    $sql = "INSERT INTO application (id, type, name, content, user_id,status, shop_id, shop_name, user_name) 
    VALUES (:id, '5', '店員削除申請', :content, :user,'0', :shop_id, :shop_name, :user_name)";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $code, PDO::PARAM_STR);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':content', $content, PDO::PARAM_STR);
    $stmt->bindValue(':shop_id', $shop_id, PDO::PARAM_STR);
    $stmt->bindValue(':shop_name', $shop_name, PDO::PARAM_STR);
    $stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);

    $stmt->execute();
}

function send_add_shop_form($dbh, $user, $content, $shop_name, $user_name, $location)
{
    $code = str_pad(random_int(0, 999999999999999999), 18, 0, STR_PAD_LEFT);
    $sql = "INSERT INTO application (id, type, name, content, user_id,status, shop_name, user_name, location) 
    VALUES (:id, '0', '店舗登録申請', :content,:user, '0', :shop_name, :user_name, :location)";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $code, PDO::PARAM_STR);
    $stmt->bindValue(':content', $content, PDO::PARAM_STR);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':shop_name', $shop_name, PDO::PARAM_STR);
    $stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
    $stmt->bindValue(':location', $location, PDO::PARAM_STR);

    $stmt->execute();
}

function send_add_emp_form($dbh, $user, $content, $shop_name, $user_name, $phone)
{
    $code = str_pad(random_int(0, 999999999999999999), 18, 0, STR_PAD_LEFT);
    $sql = "INSERT INTO application (id, type, name, content, user_id, status, shop_name, user_name, phone) 
    VALUES (:id, '1', '店員登録申請', :content,:user, '0', :shop_name, :user_name, :phone)";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $code, PDO::PARAM_STR);
    $stmt->bindValue(':content', $content, PDO::PARAM_STR);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':shop_name', $shop_name, PDO::PARAM_STR);
    $stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
    $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);

    $stmt->execute();
}

function send_other_form($dbh, $user, $user_name, $content,$mail)
{
    $code = str_pad(random_int(0, 999999999999999999), 18, 0, STR_PAD_LEFT);
    $sql = "INSERT INTO application (id, type, name, content, user_id,status, user_name,mail) 
    VALUES (:id, '4', 'その他', :content,:user, '0', :user_name,:mail);";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $code, PDO::PARAM_STR);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':content', $content, PDO::PARAM_STR);
    $stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
    $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);

    $stmt->execute();
}

//店舗情報更新
function update_shop($dbh, $data)
{
    $sql = "UPDATE shop SET name = :name, info1 = :description, location1 = :location, price = :price, close_station = :station, phone = :phone, category_id = :genre, type_id = :type WHERE id= :shop";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':shop', $data['id'], PDO::PARAM_STR);
    $stmt->bindValue(':name', $data['name'], PDO::PARAM_STR);
    $stmt->bindValue(':description', $data['description'], PDO::PARAM_STR);
    $stmt->bindValue(':location', $data['location'], PDO::PARAM_STR);
    $stmt->bindValue(':price', $data['price'], PDO::PARAM_STR);
    $stmt->bindValue(':station', $data['station'], PDO::PARAM_STR);
    $stmt->bindValue(':phone', $data['phone'], PDO::PARAM_STR);
    $stmt->bindValue(':genre', $data['genre'], PDO::PARAM_STR);
    $stmt->bindValue(':type', $data['type'], PDO::PARAM_STR);

    $stmt->execute();
}

//店舗タグ更新
function update_shop_tag($dbh, $shop, $tags)
{
    //全削除
    $sql = "DELETE FROM shop_description WHERE shop_id = :shop";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':shop', $shop, PDO::PARAM_STR);
    $stmt->execute();

    foreach ($tags as $tag) {
        $id = str_pad(random_int(0, 999999999999999999), 18, 0, STR_PAD_LEFT);
        $sql = "INSERT INTO shop_description (id,shop_id,name,value) values (:id, :shop, :name,:tag)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->bindValue(':shop', $shop, PDO::PARAM_STR);
        $stmt->bindValue(':name', $tag['name'], PDO::PARAM_STR);
        $stmt->bindValue(':tag', $tag['tags'], PDO::PARAM_STR);
        $stmt->execute();
    }
}
