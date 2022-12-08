<?php
$dbh = con();
$user = $_SESSION['account'];
$HEAD_ID =  get_genre_item_id($dbh,"head");
$CLOTHE_ID =  get_genre_item_id($dbh,"clothes");
$BACK_ID =  get_genre_item_id($dbh,"background");

$heads = get_genre_has_item($dbh, $HEAD_ID, $user);
$clothes = get_genre_has_item($dbh, $CLOTHE_ID, $user);
$backs = get_genre_has_item($dbh, $BACK_ID, $user);


$HEAD_PATH = "/images/avatar/headimg/";
$CLOTHE_PATH = "/images/avatar/clotheimg/";
$BACK_PATH = "/images/avatar/backimg/";
?>


<div class="d-flex justify-content-center">
    <h1>アバター選択</h1>
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
                        <input type="radio" name="radio1" value="<?= $i; ?>" class="radio">
                        <img src="<?= $HEAD_PATH.$heads[$i]['image']; ?> " width="300px" height="450px" class="radio_image">
                    </label>
                <?php } ?>

            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-around">
                    <h1>服選択</h1>
                </div>

                <?php for ($i = 0; $i < count($clothes); $i++) {  ?>
                    <label>
                        <input type="radio" name="radio2" value="<?= $i; ?>" class="radio">
                        <img src="<?= $CLOTHE_PATH.$clothes[$i]['image']; ?> " width="300px" height="450px" class="radio_image">
                    </label>
                <?php } ?>

            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-around">
                    <h1>背景選択</h1>
                </div>

                <?php for ($i = 0; $i < count($backs); $i++) {  ?>
                    <label>
                        <input type="radio" name="radio3" value="<?= $i; ?>" class="radio">
                        <img src="<?= $BACK_PATH.$backs[$i]['image']; ?> " width="300px" height="450px" class="radio_image">
                    </label>
                <?php } ?>

            </div>
            <div class="text-center" style>
                <input class="btn btn-primary btn-lg" type="submit" value="変更を適用" style="width:45%;height:50%;">
            </div>
        </form>
    </fieldset>
</div>




</div>