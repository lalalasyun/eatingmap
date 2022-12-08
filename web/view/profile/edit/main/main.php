
    <div class="g col text-center">
        <div class="d-flex flex-column bd-highlight mb-3 text-left p-4">
            <div class="mt-3">
                <form>
                    <div class="sample-box">
                        <img src="/web/images/user_icon/hiphop.png" width="200" height="200">
                        <div class="good">
                            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<form id="form" action="https://www.eatingmap.fun/profile/description" method="post"  enctype="multipart/form-data">

    <div class="d-flex justify-content-center ">
        ユーザー名:<input type="text" class="form-control w-50 mb-3 username" name="name" placeholder="伝説のフィッシャーマン" aria-label="First name" required>
    </div>
    <div class="d-flex justify-content-center font-italic">
        自己紹介:<input type="text" class="form-control w-50 mb-3 self-introduction" name="introduction" placeholder="ごはんおいしい" aria-label="Last name" required>
    </div>


    <div class="container">
        <div class="row">
            <div class="col text-center my-5">
                <button type="submit" class="btn btn-primary me-5">決定</button>
                <button type="button" class="btn btn-danger ms-5" onClick="location.href='/web/view/account/mypage/'">戻る</button>
            </div>
        </div>
    </div>
</form>