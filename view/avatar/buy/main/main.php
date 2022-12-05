<?php
session_start();
if(!isset($_SESSION['account'])){

}
require $_SERVER['DOCUMENT_ROOT'] . '/web/model/db_helper.php';
$dbh = con();

$HEAD_ID =  get_genre_item_id($dbh,"head");
$CLOTHE_ID =  get_genre_item_id($dbh,"clothes");
$BACK_ID =  get_genre_item_id($dbh,"background");

get_genre_has_item($dbh, $HEAD_ID, $user);
get_genre_has_item($dbh, $CLOTHE_ID, $user);
get_genre_has_item($dbh, $BACK_ID, $user);

$r = get_genre_item($dbh,$HEAD_ID);

var_dump($r);

$heads = []; //頭格納用
$clothes = []; //服格納用
$backs = []; //背景格納用

$HEAD_PATH = "/web/images/avatar/headimg/";
$CLOTHE_PATH = "/web/images/avatar/clotheimg/";
$BACK_PATH = "/web/images/avatar/backimg/";





$head = $_POST['radio1'];
$clothe = $_POST['radio2']; //現在のアバター設定
$back = $_POST['radio3'];


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

                <?php for ($i = 0; $i < count($heads); $i++) {  ?>

                    <label>
                        <figure>
                            <input type="radio" name="radio1" value="<?= $i; ?>" class="radio">
                            <img src="<?= $HEAD_PATH.$heads[$i][0]; ?>" width="300px" height="450px" class="radio_image" id="head">
                            <figcaption><?= $heads[$i][1]; ?>point</figcaption>
                        </figure>
                    </label>

                <?php } ?>

            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-around">
                    <h1>服選択</h1>
                </div>

                <?php for ($i = 0; $i < count($clothes); $i++) {  ?>

                    <label>
                        <figure>
                            <input type="radio" name="radio2" value="<?= $i; ?>" class="radio">
                            <img src="<?= $CLOTHE_PATH.$clothes[$i][0]; ?> " width="300px" height="450px" class="radio_image">
                            <figcaption><?= $clothes[$i][1]; ?>point</figcaption>
                        </figure>
                    </label>
                <?php } ?>

            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-around">
                    <h1>背景選択</h1>
                </div>

                <?php for ($i = 0; $i < count($backs); $i++) {  ?>

                    <label>
                        <figure>
                            <input type="radio" name="radio3" value="<?= $i; ?>" class="radio">
                            <img src="<?= $BACK_PATH.$backs[$i][0]; ?> " width="300px" height="450px" class="radio_image">
                            <figcaption><?= $backs[$i][1]; ?>point</figcaption>
                        </figure>
                    </label>
                <?php } ?>

            </div>
            <div class="text-center" style>
                <input class="btn btn-primary btn-lg" type="submit" value="購入" style="width:15%;height:30%;">
            </div>
        </form>
    </fieldset>
</div>




</div>