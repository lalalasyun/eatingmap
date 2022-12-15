<?php
$dbh = con();
$shop_list = get_shop($dbh);
?>
<div class="container border rounded d-flex justify-content-center m-auto <?php if (!$isMobile) {
                                                                                echo "w-75 my-4";
                                                                            } ?>">
    <div class="w-100 m-3">
        <div class="d-flex mb-5">
            
            <div class="user_icon">
                <iframe src="/icon/<?= $_SESSION['account'] ?>"></iframe>
                <script>
                    $(".user_icon").click(function() {
                        if(user_account_id){
                            window.location.href = `/user/${user_account_id}`;
                        }
                    });
                </script>
                <style>
                    .user_icon iframe{
                        width:100px;
                        height:100px;
                        pointer-events:none;
                    }
                </style>
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
                <input id="search_name" type="text" class="form-control-lg w-75" placeholder="店名を入力">
                <button class="btn btn-success" type="button" id="search_btn"><i class="fas fa-search"></i> 検索</button>
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
                            <div class="ms-3">
                                <select id="price" class="form-select form-select w-100">
                                    <option value="">予算</option>
                                    <option value="1500">1000円以下</option>
                                    <option value="1500">1500円</option>
                                    <option value="3000">3000円</option>
                                    <option value="5000">5000円</option>
                                    <option value="10000">10000円</option>
                                    <option value="100000">10000円以上</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="d-flex mb-4">
            <div class="search_distance mx-2">
                <button class="btn btn-info btn-lg" onclick="location.href='/view/search/distance/'">距離検索</button>
            </div>
            <div class="search_genre mx-2">
                <button class="btn btn-info btn-lg" onclick="location.href='/view/search/genre/'">ジャンルで検索</button>
            </div>
        </div>
        <p style="background-color:#CCFFFF;">最近見たお店</p>
        <div class="box1 border border-dark rounded p-3" style="overflow: scroll;">

        </div>
        <div class="mt-5" style="height:150px;overflow: hidden;">
            <ul class="slider">
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <?php $shop = $shop_list[$i] ?>
                    <?php if (isset($shop['image'])) { ?>
                        <li title="<?= $shop['name']?>">
                            <a href="/shop/<?= $shop['id'] ?>" >
                                <img src="/images/shopImage/<?= $shop['image'] ?>">
                            </a>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>