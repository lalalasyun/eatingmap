<?php

$heads = []; //頭格納用
$clothes = []; //服格納用
$backs = []; //背景格納用
for ($i = 1; $i <= 11; $i++) {
    $heads[] = "head" . (string)$i . ".PNG";
}

for ($i = 1; $i <= 16; $i++) {
    $clothes[] = "clothe" . (string)$i . ".PNG";
}

for ($i = 1; $i <= 20; $i++) {
    $backs[] = "back" . (string)$i . ".jpg";
}



$head = $_POST['radio1'];
$clothe = $_POST['radio2']; //現在のアバター設定
$back = $_POST['radio3'];


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

                    <label><input type="radio" name="radio1" value="<?= $i; ?>" class="radio"><img src="/web/images/avatar/headimg/<?= $heads[$i]; ?> " width="300px" height="450px" class="radio_image"></label>
                <?php } ?>

            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-around">
                    <h1>服選択</h1>
                </div>

                <?php for ($i = 0; $i < count($clothes); $i++) {  ?>

                    <label><input type="radio" name="radio2" value="<?= $i; ?>" class="radio"><img src="/web/images/avatar/clotheimg/<?= $clothes[$i]; ?> " width="300px" height="450px" class="radio_image"></label>
                <?php } ?>

            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-around">
                    <h1>背景選択</h1>
                </div>

                <?php for ($i = 0; $i < count($backs); $i++) {  ?>

                    <label><input type="radio" name="radio3" value="<?= $i; ?>" class="radio"><img src="/web/images/avatar/backimg/<?= $backs[$i]; ?> " width="300px" height="450px" class="radio_image"></label>
                <?php } ?>

            </div>
            <div class="text-center"style>
                    <input class="btn btn-primary btn-lg" type="submit"value="変更を適用"style="width:15%;height:30%;">
            </div>
        </form>
    </fieldset>
</div>




</div>