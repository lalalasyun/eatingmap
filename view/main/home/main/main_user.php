<?php
echo $_SESSION['user_account_id'];
echo $_GET['shop_id'];
?>
<div class="container my-5 p-5 border rounded" style="margin:auto;">

    <div class="d-flex justify-content-center w-100">
        <div class="w-100">
            <div class="d-flex mb-5">
                <div class="user_icon" style="width:100px; height:100px; background:black;">

                </div>
                <div class="p-3" id="user_name">
                    ユーザネーム
                </div>
            </div>
            <div class="mb-5">
                <div class="input-group mb-3 d-flex">
                    <input type="text" class="form-control-lg w-50" placeholder="店名を入力">
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
            <div class="d-flex">
                <div class="search_distance mx-2">
                    <button class="btn btn-info btn-lg" onclick="location.href='/web/view/search/distance/'">距離検索</button>
                </div>
                <div class="search_genre mx-2">
                    <button class="btn btn-info btn-lg" onclick="location.href='/web/view/search/genre/'">ジャンルで検索</button>
                </div>
            </div>
            <div class="sample02" style="margin:0px;">
                <ul>
                    <li><img src="/web/images/shop_image/ピザ.jpg" width="300"></li>
                    <li><img src="/web/images/shop_image/ハンバーグ.jpg" width="300"></li>
                    <li><img src="/web/images/shop_image/ボンゴレ.jpg" width="250"></li>
                    <li><img src="/web/images/shop_image/ヒカル.jpg" width="300"></li>
                    <li><img src="/web/images/shop_image/寿司.jpg" width="300"></li>
                    <li><img src="/web/images/shop_image/そば.jpg" width="300"></li>
                    <li><img src="/web/images/shop_image/クレープ.jpg" width="300"></li>
                    <li><img src="/web/images/shop_image/サンドウィッチ.jpg" width="300"></li>
                </ul>
            </div>
        </div>
    </div>
</div>