<?php
$dbh = con();
$user = $_SESSION['account'];
$HEAD_ID =  get_genre_item_id($dbh, "head");
$CLOTHE_ID =  get_genre_item_id($dbh, "clothes");
$BACK_ID =  get_genre_item_id($dbh, "background");

$heads = get_genre_has_item($dbh, $HEAD_ID, $user);
$clothes = get_genre_has_item($dbh, $CLOTHE_ID, $user);
$backs = get_genre_has_item($dbh, $BACK_ID, $user);


$HEAD_PATH = "/images/avatar/headimg/";
$CLOTHE_PATH = "/images/avatar/clotheimg/";
$BACK_PATH = "/images/avatar/backimg/";

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
}

?>
<div class="container d-flex justify-content-center <?php if (!$isMobile) {
                                                        echo "w-75 my-4";
                                                    } ?>" style="margin:auto;">
    <div class="w-100 m-3">

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
                        <div class="overflow-div">
                            <?php for ($i = 0; $i < count($heads); $i++) {  ?><label>
                                    <input type="radio" name="radio1" value="<?= $i; ?>" class="radio" <?= $heads[$i]['is_set_avatar'] == "1" ? "checked" : "" ?>>
                                    <img src="<?= $HEAD_PATH . $heads[$i]['image']; ?> " width="300px" height="450px" class="radio_image" title="<?= $heads[$i]['name']; ?>">
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
                                    <input type="radio" name="radio2" value="<?= $i; ?>" class="radio" <?= $clothes[$i]['is_set_avatar'] ? "checked" : "" ?>>
                                    <img src="<?= $CLOTHE_PATH . $clothes[$i]['image']; ?> " width="300px" height="450px" class="radio_image" title="<?= $clothes[$i]['name']; ?>">
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
                                    <input type="radio" name="radio3" value="<?= $i; ?>" class="radio" <?= $backs[$i]['is_set_avatar'] ? "checked" : "" ?>>
                                    <img src="<?= $BACK_PATH . $backs[$i]['image']; ?> " width="300px" height="450px" class="radio_image" title="<?= $backs[$i]['name']; ?>">
                                </label>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="text-center" style>
                        <input class="btn btn-primary btn-lg" type="submit" value="変更を適用">
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>