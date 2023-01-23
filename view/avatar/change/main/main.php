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
<?php if (!$isMobile) { ?>
    <style>
        .overflow-div {
            min-width: 600px;
        }
    </style>
<?php } ?>
<div class="container border rounded d-flex justify-content-center <?php if (!$isMobile) {
                                                                        echo "w-75 my-4";
                                                                    } ?>" style="margin:auto;">
    <div class="w-100 m-3">
        <?php if (count($heads) + count($backs) + count($clothes) != 0) { ?>
            <div class="d-flex justify-content-center">
                <div style="width: 300px;">
                    <div class="icon_area border" title="アイコン">
                        <div class="mask">

                        </div>
                        <div class="user_icon2">
                            <img src="/images/user_icon/user_init_icon.png" width="100px" height="100px">
                        </div>
                        <div class="user_icon3">
                            <?php if ($HEAD) { ?>
                                <img id="heads_icon" src="<?= $HEAD_PATH . $HEAD ?>" width="100px" height="100px">
                            <?php } else { ?>
                                <img id="heads_icon" src="/images/user_icon/mask.png" width="100px" height="100px">
                            <?php } ?>
                        </div>

                        <div class="user_icon4">
                            <?php if ($CLOTHE) { ?>
                                <img id="clothes_icon" src="<?= $CLOTHE_PATH . $CLOTHE ?>" width="100px" height="100px">
                            <?php } else { ?>
                                <img id="clothes_icon" src="/images/user_icon/mask.png" width="100px" height="100px">
                            <?php } ?>
                        </div>

                        <div class="user_icon1">
                            <?php if ($BACK) { ?>
                                <img id="backs_icon" src="<?= $BACK_PATH . $BACK ?>" width="100px" height="100px">
                            <?php } else { ?>
                                <img id="backs_icon" src="/images/user_icon/mask.png" width="100px" height="100px">
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
            <!-- test -->
            <div class="d-flex justify-content-center">
                <form action="" method="post" style="margin-top:300px;" id="set_form">

                    <div>
                        <?php if ($isMobile) { ?>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-solid" id="heads_btn"><span><i class="fa-solid fa-hat-wizard"></i>帽子</span></a>
                                <a class="btn btn-solid" id="clothes_btn"><span><i class="fa-solid fa-shirt"></i>服</span></a>
                                <a class="btn btn-solid" id="backs_btn"><span><i class="fa-regular fa-image"></i>背景</span></a>
                            </div>
                        <?php } else { ?>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-solid" id="heads_btn"><span><i class="fa-solid fa-hat-wizard"></i>帽子選択</span></a>
                                <a class="btn btn-solid" id="clothes_btn"><span><i class="fa-solid fa-shirt"></i>服選択</span></a>
                                <a class="btn btn-solid" id="backs_btn"><span><i class="fa-regular fa-image"></i>背景選択</span></a>
                            </div>
                        <?php } ?>

                        <div id="change_area">
                            <div class="overflow-div scrollbar1" id="heads_area">
                                <?php for ($i = 0; $i < count($heads); $i++) {  ?>
                                    <label class="item-img">
                                        <input type="radio" name="radio1" value="<?= $i; ?>" class="radio" data-item_id="heads_icon" data-item_image="<?= $HEAD_PATH . $heads[$i]['image']; ?>" <?= $heads[$i]['is_set_avatar'] == "1" ? "checked" : "" ?>>
                                        <img src="<?= $HEAD_PATH . $heads[$i]['image']; ?> " width="300px" height="450px" class="radio_image" title="<?= $heads[$i]['name']; ?>">
                                    </label>
                                <?php } ?>
                            </div>

                            <div class="overflow-div scrollbar1" id="clothes_area">
                                <?php for ($i = 0; $i < count($clothes); $i++) {  ?>
                                    <label class="item-img">
                                        <input type="radio" name="radio2" value="<?= $i; ?>" class="radio" data-item_id="clothes_icon" data-item_image="<?= $CLOTHE_PATH . $clothes[$i]['image']; ?>" <?= $clothes[$i]['is_set_avatar'] ? "checked" : "" ?>>
                                        <img src="<?= $CLOTHE_PATH . $clothes[$i]['image']; ?> " width="300px" height="450px" class="radio_image" title="<?= $clothes[$i]['name']; ?>">
                                    </label>
                                <?php } ?>
                            </div>

                            <div class="overflow-div scrollbar1" id="backs_area">
                                <?php for ($i = 0; $i < count($backs); $i++) {  ?>
                                    <label class="item-img">
                                        <input type="radio" name="radio3" value="<?= $i; ?>" class="radio" data-item_id="backs_icon" data-item_image="<?= $BACK_PATH . $backs[$i]['image']; ?> " <?= $backs[$i]['is_set_avatar'] ? "checked" : "" ?>>
                                        <img src="<?= $BACK_PATH . $backs[$i]['image']; ?> " width="300px" height="450px" class="radio_image" title="<?= $backs[$i]['name']; ?>">
                                    </label>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <?php if (!$isMobile) { ?>
                                <a class="btn_18 w-25" id="back_btn"><i class="fa-solid fa-xmark"></i> 変更をやめる</a>
                                <a class="btn_18 w-25" id="change_btn"><i class="fa-solid fa-user-pen"></i> 変更を適用</a>
                            <?php } else { ?>
                                <a class="btn_18 w-50" id="back_btn"><i class="fa-solid fa-circle-arrow-left"></i>戻る</a>
                                <a class="btn_18 w-50" id="change_btn"><i class="fa-solid fa-user-pen"></i> 適用</a>
                            <?php } ?>
                        </div>
                    </div>
                </form>
            </div>

            <!-- test -->


        <?php } else { ?>
            <div class="d-flex justify-content-center">
                <h4>アイテムはありません</h4>
            </div>
            <div class="d-flex justify-content-center">
                <a class="btn_18 w-25" href="/view/account/mypage/"><i class="fa-solid fa-user-pen"></i> 戻る</a>
            </div>
        <?php } ?>
    </div>
</div>