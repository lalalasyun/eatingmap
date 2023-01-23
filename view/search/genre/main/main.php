<?php
$data = get_category($dbh);
?>
<div class="container border rounded d-flex justify-content-center <?php if (!$isMobile) {
                                                                        echo "w-75 my-4";
                                                                    } ?>" style="margin:auto;">
    <div class="w-100 m-3">
        <div class="sel sel--black-panther m-0">
            <select name="select-profession" id="select-profession">
                <option value="">ジャンルを選択</option>
                <option value="">すべて</option>
                <?php foreach ($data as list($id, $name)) { ?>
                    <option value="<?= $id ?>"><?= $name ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="accordion-area mx-0">
            <section class="my-2">
                <div class="title">詳細選択</div>
                <div class="box">
                    <div class="d-flex">
                        <div class="search_prefectures">
                            <select id="select-pref" class="form-select form-select w-100">
                                <option value="">都道府県</option>
                            </select>
                        </div>
                        <div class="search_municipalities mx-1">
                            <select id="select-city" class="form-select form-select w-100">
                                <option value="">市区町村</option>
                            </select>
                        </div>
                        <div class="ms-2">
                            <select id="price" class="form-select form-select w-100">
                                <option value="">予算</option>
                                <option value="1500">1000円</option>
                                <option value="1500">1500円</option>
                                <option value="3000">3000円</option>
                                <option value="5000">5000円</option>
                                <option value="10000">10000円</option>
                                <option value="50000">50000円</option>
                            </select>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="d-flex">
            <div>検索結果</div>
            <div id="search_count" class="ms-1 fw-bold"></div>
            <div>件</div>
            <div id="search_page"></div>
        </div>
        <div id="shop_list">


        </div>
        <div class="d-flex justify-content-center w-100 my-3">
            <ul class="style_pages"></ul>
        </div>
    </div>

</div>