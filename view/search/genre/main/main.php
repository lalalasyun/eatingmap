<?php
require $_SERVER['DOCUMENT_ROOT'] . '/web/model/db_helper.php';
$dbh = con();
$data = get_category($dbh);
?>
<div class="container">
    <div class="sel sel--black-panther m-0 mt-2">
        <select name="select-profession" id="select-profession">
            <option value="" disabled>ジャンルを選択</option>
            <?php foreach ($data as list($id, $name)) { ?>
                <option value="<?= $id ?>"><?= $name ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="accordion-area mx-0">
        <section class="my-2">
            <h3 class="title">詳細選択</h3>
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
                    <div class="ms-3">
                        <select name="price" class="form-select form-select w-100">
                            <option value="">予算</option>
                            <option value="1000">1000円</option>
                            <option value="3000">3000円</option>
                            <option value="5000">5000円</option>
                            <option value="10000">10000円</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="shop_list">
        <div class="container p-3 border rounded">
            <ul class="list-group list-group-horizontal">
                <div>
                    <img src="/web/images/shop_image/sample1.jpg" class="shopimage">
                </div>
                <div>
                    <p class="fs-3 ms-5">店名:<span class="ms-3">店名</span><br><br>
                        評価:<span class="ms-3">2.4</span></p>
                </div>
            </ul>
            <hr>
            <ul class="list-group list-group-horizontal">
                <div>
                    <img src="/web/images/shop_image/sample2.jpg" class="shopimage">
                </div>
                <div>
                    <p class="fs-3 ms-5">店名:<span class="ms-3">店名</span><br><br>
                        評価:<span class="ms-3">2.4</span></p>
                </div>
            </ul>

            <hr>
            <ul class="list-group list-group-horizontal">
                <div>
                    <img src="/web/images/shop_image/sample3.jpg" class="shopimage">
                </div>
                <div>
                    <p class="fs-3 ms-5">店名:<span class="ms-3">店名</span><br><br>
                        評価:<span class="ms-3">2.4</span></p>
                </div>
            </ul>
        </div>
        <div class="d-flex justify-content-center w-100 m-3">

            <div class="me-5">
                <input type="button" class="btn btn-primary btn-lg" id="prev_btn" name="prev_page" value="前へ">
            </div>
            <div class="ms-5">
                <input type="button" class="btn btn-success btn-lg" id="next_btn" name="next_page" value="次へ">
            </div>
        </div>
    </div>

</div>