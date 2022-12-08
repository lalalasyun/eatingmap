<?php
$dbh = con();
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

$buy_flg = false;
if (isset($_POST["radio1"])) {
    $item = $heads[$_POST["radio1"]];
    buy_user_item($dbh, $user, $item['genre'], $item['id']);
    remove_user_point($dbh,$item['point']);
    $buy_flg = true;
}
if (isset($_POST["radio2"])) {
    $item = $clothes[$_POST["radio2"]];
    buy_user_item($dbh, $user, $item['genre'], $item['id']);
    remove_user_point($dbh,$item['point']);
    $buy_flg = true;
}
if (isset($_POST["radio3"])) {
    $item = $backs[$_POST["radio3"]];
    buy_user_item($dbh, $user, $item['genre'], $item['id']);
    remove_user_point($dbh,$item['point']);
    $buy_flg = true;
}
if ($buy_flg) {
    //購入完了ページ
    echo "購入しました。";
}

?>
<div class="d-flex justify-content-center">
    <h1>アバター購入選択</h1>
</div>

<div class="d-flex justify-content-around">


    <fieldset>
        <form action="" method="post">
            <div class="mb-3">

                <div class="d-flex justify-content-around">
                    <h1>🎩選択</h1>
                </div>
                <div class="overflow-div">
                    <?php for ($i = 0; $i < count($heads); $i++) {  ?>

                        <label>
                            <figure>
                                <input type="radio" name="radio1" value="<?= $i; ?>" class="radio">
                                <img src="<?= $HEAD_PATH . $heads[$i]['image']; ?>" width="300px" height="450px" class="radio_image" id="head">
                                <figcaption><?= $heads[$i]['point']; ?>point</figcaption>
                            </figure>
                        </label>

                    <?php } ?>
                </div>


            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-around">
                    <h1>服選択</h1>
                </div>
                <div class="overflow-div">
                    <?php for ($i = 0; $i < count($clothes); $i++) {  ?>

                        <label>
                            <figure>
                                <input type="radio" name="radio2" value="<?= $i; ?>" class="radio">
                                <img src="<?= $CLOTHE_PATH . $clothes[$i]['image']; ?> " width="300px" height="450px" class="radio_image">
                                <figcaption><?= $clothes[$i]['point']; ?>point</figcaption>
                            </figure>
                        </label>
                    <?php } ?>
                </div>


            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-around">
                    <h1>背景選択</h1>
                </div>
                <div class="overflow-div">
                    <?php for ($i = 0; $i < count($backs); $i++) {  ?>

                        <label>
                            <figure>
                                <input type="radio" name="radio3" value="<?= $i; ?>" class="radio">
                                <img src="<?= $BACK_PATH . $backs[$i]['image']; ?> " width="300px" height="450px" class="radio_image">
                                <figcaption><?= $backs[$i]['point']; ?>point</figcaption>
                            </figure>
                        </label>
                    <?php } ?>
                </div>


            </div>
            <div class="text-center" style>
                <input class="btn btn-primary btn-lg" type="submit" value="購入" style="width:15%;height:30%;">
            </div>
        </form>
    </fieldset>
</div>




</div>