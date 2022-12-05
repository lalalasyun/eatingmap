<div class="container">
    <div class="row">
        <div class="col text-center">
            <div class="d-flex flex-column bd-highlight mb-3 text-left p-4">
                <div class="mt-3">
                    <form>
                        <div class="sample-box">
                            <img src="/web/images/user_icon/hiphop.png" width="200" height="200">
                            <div class="good">
                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col text-center">
            <em class="d-flex font-italic">
                <p>名前：<?php echo $test_name ?></p>
            </em>
            <em class="d-flex font-italic">
                <p>自己紹介文：<?php echo $test_email ?></p>
            </em>
            <div class="d-flex align-items-center">
                <div class="h4">
                    口コミ数
                </div>
                <div class="d-flex align-items-center">
                    <div class="h5">
                        ???
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
session_start();
//if($_SESSION['auth']){
include 'edit_btn.php';
//}
?>
</form>


</div>
<form id="form" action="https://www.eatingmap.fun/web/view/profile/kaku/" method="post">
    <div class="d-flex justify-content-center mb-3">
        ユーザー名:<input type="text" class="form-control w-50 md-3" name="name" placeholder="伝説のフィッシャーマン" aria-label="First name" required>
    </div>
    <div class="d-flex justify-content-center">
        自己紹介:<input type="text" class="form-control w-50 mb-3" name="self-introduction" placeholder="ごはんおいしい" aria-label="Last name" required>
    </div>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary">決定</button>
                <button type="button" class="btn btn-danger" onClick="location.href='https://www.eatingmap.fun/web/view/mypage/';">戻る</button>
            </div>
        </div>
    </div>
</form>