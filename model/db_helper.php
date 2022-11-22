<?php
require_once 'config.php';

// DBに接続する
function get_db_connect() 
{
    try{
        $dbh = new PDO(DSN,DB_USER,DB_PASSWORD);
    }
    catch (PDOException $e){
        echo $e->getMessage();
        die();
    }

    return $dbh;
}

// DBから全商品グループを取得する
function select_goodsgroup_all($dbh)
{
    $sql = "SELECT * FROM GoodsGroup";

    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $data = [];
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }

    return $data;

}

// DBから全おすすめ商品を取得する
function select_recommend_goods($dbh)
{
    $sql = "SELECT * FROM goods WHERE recommend = 1";

    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $data = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }

    return $data;
}

// DBから指定したグループコードの商品を取得する
function select_goods_by_groupcode($dbh, $groupcode)
{
    $sql = "SELECT * FROM goods WHERE groupcode = :groupcode ORDER BY recommend DESC";

    $stmt = $dbh->prepare($sql);

    $stmt->bindValue(':groupcode',$groupcode, PDO::PARAM_INT);
    $stmt->execute();

    $data = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }

    return $data;
}

// DBから、引数 $goodscode の商品を取得する
function select_goods_by_goodscode($dbh,$goodscode)
{
    $sql = "SELECT * FROM goods WHERE goodscode = :goodscode";

    $stmt = $dbh->prepare($sql);

    $stmt->bindValue(':goodscode',$goodscode,PDO::PARAM_STR);
    $stmt->execute();

    $goods = $stmt->fetch(PDO::FETCH_ASSOC);
    return $goods;

}

// メールアドレス, パスワードが一致する会員データを取得する
function select_member($dbh,$email,$password)
{
    $sql = "SELECT * FROM member WHERE email = :email AND password = :password";

    $stmt = $dbh->prepare($sql);

    $stmt->bindValue(':email',$email,PDO::PARAM_STR);
    $stmt->bindValue(':password',$password,PDO::PARAM_STR);
    $stmt->execute();

    $member = $stmt->fetch(PDO::FETCH_ASSOC);
    return $member;



}

// Saleテーブルに引数の商品データを登録する
function insert_sale($dbh,$memberid,$goodscode,$num,$date)
{
    $sql = "insert into sale(memberid,goodscode,num,saledate) VALUES(:memberid,:goodscode,:num,:date);";

    $stmt = $dbh->prepare($sql);

    $stmt->bindValue(':num',$num,PDO::PARAM_INT);
    $stmt->bindValue(':memberid',$memberid,PDO::PARAM_STR);
    $stmt->bindValue(':goodscode',$goodscode,PDO::PARAM_STR);
    $stmt->bindValue(':date',$date,PDO::PARAM_STR);

    $stmt->execute();

}

// DBに会員データを登録する
function insert_member_data($dbh,$email,$membername,$password,$zipcode,$address)
{
    $sql = "insert into member(email,membername,password,zipcode,address) VALUES(:email,:membername,:password,:zipcode,:address);";
    
    $stmt = $dbh->prepare($sql);
    
    $stmt->bindValue(':email',$email,PDO::PARAM_STR);
    $stmt->bindValue(':membername',$membername,PDO::PARAM_STR);
    $stmt->bindValue(':password',$password,PDO::PARAM_STR);
    $stmt->bindValue(':zipcode',$zipcode,PDO::PARAM_STR);
    $stmt->bindValue(':address',$address,PDO::PARAM_STR);

    $stmt->execute();

}

//会員テーブルのメールアドレスの重複を調べる
function email_exists($dbh,$email)
{
    $sql = "select * from member where email = :email;";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email',$email,PDO::PARAM_STR);

    $stmt->execute();

    $count = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $count != 0;

}

//商品検索
function select_goods_by_keyword($dbh,$keyword)
{
    $sql = "SELECT * FROM goods WHERE goodsname LIKE :keyword1 OR detail LIKE :keyword2";

    $stmt = $dbh->prepare($sql);

    $keyword1 = '%'.$keyword.'%';
    $keyword2 = '%'.$keyword.'%';

    

    $stmt->bindValue(':keyword1',$keyword1, PDO::PARAM_STR);
    $stmt->bindValue(':keyword2',$keyword2, PDO::PARAM_STR);

    $stmt->execute();

    $goods = $stmt->fetchAll(PDO::FETCH_ASSOC);


 


    return $goods;
}