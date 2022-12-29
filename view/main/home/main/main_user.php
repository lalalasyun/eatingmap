<?php
$dbh = con();
$shop_list = get_shop($dbh);
?>
<div class="container border rounded d-flex justify-content-center m-auto <?php if (!$isMobile) {
                                                                                echo "w-75 my-4";
                                                                            } ?>">
    <div class="w-100 m-3">
        <div class="d-flex mb-5">

            <div class="user_icon ">
                <iframe src="/icon/<?= $_SESSION['account'] ?>" width="100px" height="100px" loading="lazy" style="pointer-events: none;"title="アイコン"></iframe>
            </div>


            <div>
                <div class="d-flex p-3">
                    <div id="user_name">
                        <?php if (isset($USER_DATA['name'])) {
                            echo $USER_DATA['name'];
                        } else {
                            echo "guest";
                        } ?>
                    </div>
                    <div class="px-2">
                        さん
                    </div>
                </div>
                <?php if (isset($USER_DATA['shop_id'])) { ?>
                    <div class="p-3">
                        <button class="btn btn-info btn-sm p-0"><a id='shop_updata'href='/view/shop/edit_data/index.php'>店舗情報更新</a></button>
                    </div>
                <?php } ?>
            </div>



        </div>
        <div class="mb-5">
            <div class="input-group mb-3 d-flex">
                <input id="search_name" type="text" class="form-control-lg w-75" placeholder="店名を入力">
                <button class="btn btn-success" type="button" id="search_btn"><i class="fas fa-search"></i> 検索</button>
            </div>
            <div class="accordion-area mx-0">
                <section class="my-2">
                    <div class="title">詳細選択</div>
                    <div class="box">
                        <div class="d-flex">
                            <div class="search_prefectures">
                                <select id="select-pref" class="form-select w-100">
                                    <option value="">都道府県</option>
                                </select>
                            </div>
                            <div class="search_municipalities mx-1">
                                <select id="select-city" class="form-select w-100">
                                    <option value="">市区町村</option>
                                </select>
                            </div>
                            <div class="ms-3">
                                <select id="price" class="form-select w-100">
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
        </div>
        <div class="d-flex mb-4">
            <div class="search_btn mx-2">
                <a href="/view/search/distance/"><i class="fa-solid fa-location-dot me-2"></i>距離検索</a>
            </div>
            <div class="search_btn mx-2">
                <a href='/view/search/genre/'><i class="fa-solid fa-list me-2"></i>ジャンル検索</a>
            </div>
        </div>
        <p style="background-color:#CCFFFF;">最近見たお店</p>
        <div id="recently_shop" class="user-select-none d-flex border border-dark rounded px-3 pt-3 pb-5 ">

        </div>
        <p class="mt-3" style="background-color:#CCFFFF;">オススメのお店</p>
        <div class="mt-5" style="height:150px;overflow: hidden;">
            <ul class="slider">
                <?php for ($i = 0; $i < 10; $i++) { ?>
                    <?php $shop = $shop_list[$i] ?>
                    <?php if (isset($shop['image'])) { ?>
                        <li title="<?= $shop['name'] ?>">
                            <a href="/shop/<?= $shop['id'] ?>">
                                <img src="/images/shopImage/<?= $shop['image'] ?>" loading="lazy" width="200px" height="auto" alt="recommend">
                            </a>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>