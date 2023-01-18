<?php


$HEAD_PATH = "/images/avatar/headimg/";
$CLOTHE_PATH = "/images/avatar/clotheimg/";
$BACK_PATH = "/images/avatar/backimg/";


$HEAD = null;
$CLOTHE = null;
$BACK = null;

$res = get_avatar($dbh, $user, $HEAD_ID);
if ($res) {
    $HEAD = $res["image"];
}
$res = get_avatar($dbh, $user, $CLOTHE_ID);
if ($res) {
    $CLOTHE = $res["image"];
}
$res = get_avatar($dbh, $user, $BACK_ID);
if ($res) {
    $BACK = $res["image"];
}



?>
<div class="container border rounded d-flex justify-content-center <?php if (!$isMobile) {
                                                                        echo "w-75 my-4";
                                                                    } ?>" style="margin:auto;">
    <div class="w-100 m-3">
        <div class="d-flex justify-content-center">
            <h1>アバター選択</h1>
        </div>
        <?php if (count($heads) + count($backs) + count($clothes) != 0) { ?>
            <div class="d-flex justify-content-center">
                <div style="width: 300px;">
                    <div class="icon_area">
                        <div class="mask">

                        </div>
                        <div class="user_icon2">
                            <img src="/images/user_icon/user_init_icon.png" width="100px" height="100px">
                        </div>
                        <?php if ($HEAD) { ?>
                            <div class="user_icon3">
                                <img id="heads_icon" src="<?= $HEAD_PATH . $HEAD ?>" width="100px" height="100px">
                            </div>
                        <?php } ?>
                        <?php if ($CLOTHE) { ?>
                            <div class="user_icon4">
                                <img id="clothes_icon" src="<?= $CLOTHE_PATH . $CLOTHE ?>" width="100px" height="100px">
                            </div>
                        <?php } ?>
                        <?php if ($BACK) { ?>
                            <div class="user_icon1">
                                <img id="backs_icon" src="<?= $BACK_PATH . $BACK ?>" width="100px" height="100px">
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
            <!-- test -->
            <form action="" method="post" style="margin-top:300px;">
                <div class="d-flex justify-content-center">
                    <div class="">
                        <div class="d-flex justify-content-between">
                            <h1 id="heads_btn">🎩選択</h1>
                            <h1 id="clothes_btn">服選択</h1>
                            <h1 id="backs_btn">背景選択</h1>
                        </div>
                        <div id="change_area">
                            <div class="overflow-div scrollbar1" id="heads_area">
                                <?php for ($i = 0; $i < count($heads); $i++) {  ?><label>
                                        <input type="radio" name="radio1" value="<?= $i; ?>" class="radio" data-item_id="heads_icon" data-item_image="<?= $HEAD_PATH . $heads[$i]['image']; ?>" <?= $heads[$i]['is_set_avatar'] == "1" ? "checked" : "" ?>>
                                        <img src="<?= $HEAD_PATH . $heads[$i]['image']; ?> " width="300px" height="450px" class="radio_image" title="<?= $heads[$i]['name']; ?>" loading="lazy">
                                    </label>
                                <?php } ?>
                            </div>

                            <div class="overflow-div scrollbar1" id="clothes_area">
                                <?php for ($i = 0; $i < count($clothes); $i++) {  ?>
                                    <label>
                                        <input type="radio" name="radio2" value="<?= $i; ?>" class="radio" data-item_id="clothes_icon" data-item_image="<?= $CLOTHE_PATH . $clothes[$i]['image']; ?>" <?= $clothes[$i]['is_set_avatar'] ? "checked" : "" ?>>
                                        <img src="<?= $CLOTHE_PATH . $clothes[$i]['image']; ?> " width="300px" height="450px" class="radio_image" title="<?= $clothes[$i]['name']; ?>" loading="lazy">
                                    </label>
                                <?php } ?>
                            </div>

                            <div class="overflow-div scrollbar1" id="backs_area">
                                <?php for ($i = 0; $i < count($backs); $i++) {  ?>
                                    <label>
                                        <input type="radio" name="radio3" value="<?= $i; ?>" class="radio" data-item_id="backs_icon" data-item_image="<?= $BACK_PATH . $backs[$i]['image']; ?> " <?= $backs[$i]['is_set_avatar'] ? "checked" : "" ?>>
                                        <img src="<?= $BACK_PATH . $backs[$i]['image']; ?> " width="300px" height="450px" class="radio_image" title="<?= $backs[$i]['name']; ?>" loading="lazy">
                                    </label>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <input class="btn btn-primary btn-lg" type="submit" value="変更を適用">
                        </div>
                    </div>

                </div>

            </form>


            <!-- test -->


        <?php } else { ?>
            <div class="d-flex justify-content-center">
                <h4>アイテムはありません</h4>
            </div>
            <div class="d-flex justify-content-center">
                <a href="/view/account/mypage/" class="btn btn-primary btn-lg" type="button" style="color:azure">戻る</a>
            </div>
        <?php } ?>
    </div>
</div>