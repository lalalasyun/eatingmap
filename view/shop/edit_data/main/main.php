
<script>
    let shop_id = "<?= $USER_DATA['shop_id'] ?>";
    let HAS_TAG = [];
    <?php if (isset($TAG_DATA)) { ?>
        HAS_TAG = <?= json_encode($TAG_DATA, JSON_UNESCAPED_UNICODE) ?>;
    <?php } ?>
</script>
<div class="container border rounded d-flex justify-content-center <?php if (!$isMobile) {
                                                                        echo "w-75 my-4";
                                                                    } ?>" style="margin:auto;">
    <div class="w-100 mt-3">
        <form id="input_area">
            <div class="form-group form-inline input-group-sm my-3">
                <span class="col-md-2 text-md-right">店舗名</span>
                <input type="text" class="form-control col-sm-10" id="name" name="name" value="<?= $SHOP_DATA['name'] ?>" placeholder="店舗名">
            </div>
            <div class="form-group form-inline input-group-sm my-3">
                <span class="col-md-2 text-md-right">店舗住所</span>
                <input type="text" class="form-control col-sm-10" id="location" name="location" value="<?= $SHOP_DATA['location1'] ?>" placeholder="店舗住所">
            </div>
            <div class="form-group form-inline input-group-sm my-3">
                <span class="col-md-2 text-md-right">店舗情報</span>
                <textarea class="form-control col-sm-10" cols="22" rows="5" id="description" name="description" placeholder="店舗情報"><?= $SHOP_DATA['info1'] ?></textarea>
            </div>
            <div class="form-group form-inline input-group-sm my-3">
                <span class="col-md-2 text-md-right">電話番号</span>
                <input type="text" class="form-control col-sm-10" id="phone" name="phone" value="<?= $SHOP_DATA['phone'] ?>" placeholder="電話番号">
            </div>
            <div class="form-group form-inline input-group-sm my-3">
                <span class="col-md-2 text-md-right">最寄り駅</span>
                <input type="text" class="form-control col-sm-10" id="station" name="station" value="<?= $SHOP_DATA['close_station'] ?>" placeholder="最寄り駅">
            </div>
            <div class="form-group form-inline input-group-sm my-3">
                <span class="col-md-2 text-md-right">予算</span>
                <input type="text" class="form-control col-sm-10" id="price" name="price" value="<?= $SHOP_DATA['price'] ?>" placeholder="予算">
            </div>
            <div class="form-group form-inline input-group-sm my-3">
                <span class="col-md-2 text-md-right">店舗ジャンル</span>
                <select class="form-select" id="genre" name="genre">
                    <option value="0">ジャンルを選択</option>
                    <?php foreach ($GENRE_DATA as list($id, $name)) { ?>
                        <?php
                        $selected = "";
                        if ($SHOP_DATA['category_id'] == $id) {
                            $selected = "selected";
                        }
                        ?>
                        <option value="<?= $id ?>" <?= $selected ?>><?= $name ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group form-inline input-group-sm my-3">
                <span class="col-md-2 text-md-right">店舗タイプ</span>
                <select class="form-select" id="type" name="type">
                    <option value="0">タイプを選択</option>
                    <?php foreach ($TYPE_DATA as list($id, $name)) { ?>
                        <?php
                        $selected = "";
                        if ($SHOP_DATA['type_id'] == $id) {
                            $selected = "selected";
                        }
                        ?>
                        <option value="<?= $id ?>" <?= $selected ?>><?= $name ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group form-inline input-group-sm my-3 tag-form">
                <div class="d-flex my-2">
                    <span class="my-auto text-md-right">店舗タグ</span>
                    <i id="add_btn" class="btn fa-solid fa-plus" title="タグを追加"></i>
                </div>


            </div>
        </form>
        <div class="d-flex justify-content-center my-3">
            <button id="back_btn" class="btn btn-info btn-lg mx-2">戻る</button>
            <button id="submit" class="btn btn-info btn-lg mx-2">更新</button>
        </div>


    </div>
</div>