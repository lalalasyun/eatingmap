<?php

$heads = ["head1.jpg", "head2.jpg", "head3.jpg"]; //頭格納用
$clothes = ["clothe1.jpg"]; //服格納用
$backs = ["back1.jpg", "back2.jpg", "back3.jpg"]; //背景格納用

$head = $_POST['radio1'];
$clothe = $_POST['radio2']; //現在のアバター設定
$back = $_POST['radio3'];


?>


<div class="d-flex justify-content-center">
    <h1>アバター選択</h1>
</div>

<div>
    <div class="d-flex justify-content-around">
        <div>
            <img class="text_img" src="/web/images/user_icon/user_icon_sample.jpg" style="width:100px; height:100px; margin-top:10px; margin-left:10vh">



        </div>


        <div class="d-flex pt-3">
            <div class="align-items-center">
                <p class="fs-3">ニックネーム</p>
            </div>


        </div>
    </div>
</div>

<div class="d-flex justify-content-around">


    <fieldset>
        <form action="" method="post">
            <div class="mb-3">

                <div class="d-flex justify-content-around">
                    <h1>🎩選択</h1>
                </div>
                <div class="headradio">
                    <?php for ($i = 0; $i < count($heads); $i++) {  ?>
                        <input id="radio-1" type="checkbox" name="radio1"value="<?= $heads[$i]; ?>" />
                        <label for="radio1-<?= $i+1; ?>" class="radio-label">
                            <img src="/web/images/headimg/<?= $heads[$i]; ?>" width="300px" height="450px">
                        </label>
                    <?php } ?>
                </div>
                <div class="d-flex justify-content-around">
                    <h1>👕選択</h1>
                </div>

                <?php for ($i = 0; $i < count($clothes); $i++) {  ?>
                    <input id="radio-2" type="radio" name="radio2" value="<?= $clothes[$i]; ?>"/>
                    <label for="radio2-2" class="radio-label">
                        <img src="/web/images/clotheimg/<?= $clothes[$i]; ?>" width="300px" height="450px">
                    </label>
                <?php } ?>
            </div>
            <div class="mb-4">
                <div class="d-flex justify-content-around">
                    <h1>背景選択</h1>
                </div>

                <div class="backradio">
                    <?php for ($i = 0; $i < count($backs); $i++) {  ?>
                        <input id="radio-3" type="radio" name="radio3"value="<?= $backs[$i]; ?>" />
                        <label for="radio-3" class="radio-label">
                            <img src="/web/images/backimg/<?= $backs[$i]; ?>" width="300px" height="450px">
                        </label>
                    <?php } ?>
                </div>
            </div>
            <div class="mb-4">
                <div class="text-end">
                    <button type="submit" style="width:35%;height:30%;" class="btn btn-success">変更を適応</button>
                </div>
            </div>


        </form>
    </fieldset>


</div>

