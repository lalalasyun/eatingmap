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


$buy_flg = (isset($_POST["radio1"]) && $_POST["radio1"] !== []) ||
    (isset($_POST["radio2"]) && $_POST["radio2"] !== []) ||
    (isset($_POST["radio3"]) && $_POST["radio3"] !== []);

if($buy_flg){
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
<script>
    let point = <?= $USER_DATA['point'] ?>;
</script>
<div class="container d-flex justify-content-center <?php if (!$isMobile) {
                                                        echo "w-75 my-4";
                                                    } ?>" style="margin:auto;">
    <div class="w-100 m-3">
        <div class="d-flex justify-content-center">
            <h1>購入アイテム選択</h1>
        </div>

        <div class="d-flex justify-content-around">
            <fieldset>
                <form action="" method="post">
                    <div class="mb-3 heads">

                        <div class="d-flex justify-content-around">
                            <h1>🎩選択</h1>
                        </div>
                        <div class="overflow-div">
                            <?php for ($i = 0; $i < count($heads); $i++) {  ?>

                                <label>
                                    <figure>
                                        <input type="checkbox" name="radio1[]" value="<?= $i; ?>" class="radio" data-point="<?= $heads[$i]['point']; ?>">
                                        <img src="<?= $HEAD_PATH . $heads[$i]['image']; ?>" class="radio_image" id="head" title="<?= $heads[$i]['name'] ?>">
                                        <figcaption><?= $heads[$i]['point']; ?>point</figcaption>
                                    </figure>
                                </label>

                            <?php } ?>
                        </div>


                    </div>

                    <div class="mb-3 clothes">
                        <div class="d-flex justify-content-around">
                            <h1>服選択</h1>
                        </div>
                        <div class="overflow-div">
                            <?php for ($i = 0; $i < count($clothes); $i++) {  ?>

                                <label>
                                    <figure>
                                        <input type="checkbox" name="radio2[]" value="<?= $i; ?>" class="radio" data-point="<?= $clothes[$i]['point']; ?>">
                                        <img src="<?= $CLOTHE_PATH . $clothes[$i]['image']; ?> " class="radio_image" title="<?= $clothes[$i]['name'] ?>">
                                        <figcaption><?= $clothes[$i]['point']; ?>point</figcaption>
                                    </figure>
                                </label>
                            <?php } ?>
                        </div>


                    </div>

                    <div class="mb-3 backs">
                        <div class="d-flex justify-content-around">
                            <h1>背景選択</h1>
                        </div>
                        <div class="overflow-div">
                            <?php for ($i = 0; $i < count($backs); $i++) {  ?>
                                <label>
                                    <figure>
                                        <input type="checkbox" name="radio3[]" value="<?= $i; ?>" class="radio" data-point="<?= $backs[$i]['point']; ?>">
                                        <img src="<?= $BACK_PATH . $backs[$i]['image']; ?> " class="radio_image" title="<?= $backs[$i]['name'] ?>">
                                        <figcaption><?= $backs[$i]['point']; ?>point</figcaption>
                                    </figure>
                                </label>
                            <?php } ?>
                        </div>


                    </div>
                    <div class="d-flex fs-3">
                        <div>残りポイント : </div>
                        <div id="point"><?= $USER_DATA['point'] ?></div>
                    </div>
                    <div class="text-center">
                        <input id="submit_btn" class="btn btn-primary btn-lg" type="submit" value="購入" disabled>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>