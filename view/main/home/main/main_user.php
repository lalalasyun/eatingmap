<?php
$dbh = con();
$shop_list = get_shop($dbh);
?>
<div class="container border rounded d-flex justify-content-center <?php if (!$isMobile) {
                                                                        echo "w-75 my-4";
                                                                    } ?>" style="margin:auto;">
    <div class="w-100 m-3">
        <div class="d-flex mb-5">
            <div class="user_icon" style="width:100px; height:100px; background:black;" onclick="location.href='/user/<?= $_SESSION['account'] ?>'">
            </div>
            <div class="d-flex p-3">
                <div id="user_name">
                    ユーザネーム
                </div>
                <div class="px-2">
                    さん
                </div>
            </div>

        </div>
        <div class="mb-5">
            <div class="input-group mb-3 d-flex">
                <input type="text" class="form-control-lg w-75" placeholder="店名を入力">
                <button class="btn btn-success" type="button" id="button-addon2"><i class="fas fa-search"></i> 検索</button>
            </div>
            <div class="d-flex justify-content-between w-75">
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
                </div>
            </div>
        </div>
        <div class="d-flex mb-4">
            <div class="search_distance mx-2">
                <button class="btn btn-info btn-lg" onclick="location.href='/web/view/search/distance/'">距離検索</button>
            </div>
            <div class="search_genre mx-2">
                <button class="btn btn-info btn-lg" onclick="location.href='/web/view/search/genre/'">ジャンルで検索</button>
            </div>
        </div>
        <p style="background-color:#CCFFFF;">最近見たお店</p>
        <div class="box1 border border-dark rounded p-3" style="overflow: scroll;">
            
        </div>
        <div class="mt-5">
            <ul class="slider">
                <?php foreach ($shop_list as $shop) { ?>
                    <?php if (isset($shop['image'])) { ?>
                        <li>
                            <a href="/shop/<?= $shop['id'] ?>">
                                <img src="/web/images/shopImage/<?= $shop['image'] ?>">
                            </a>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>