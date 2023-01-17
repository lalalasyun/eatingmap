<div class="d-flex flex-column bd-highlight mb-3 align-items-center ">
    <div class="mt-3">
        <h1>新規登録</h1>
    </div>
    <div style="width: 60%;">
        <form class="row g-3" action="" method="post" id="input_area">
            <div class="d-flex flex-column bd-highlight mb-5">
                <label class="leftcolor-blue">ニックネーム</label>
                <div class="d-flex m-0">
                    <i class="fa-solid fa-check me-1"></i>
                    <div class="validate-style">2文字以上20文字以内で入力してください</div>
                </div>
                <div class="validate-column">
                    <input type="text" class="form-control" placeholder="ニックネーム" name="name" disabled>
                    <i class="fa-solid fa-xmark form-err-mark"></i>
                    <i class="fa-solid fa-check form-check-mark"></i>
                </div>

            </div>
            <div class="d-flex flex-column bd-highlight validate-column mb-5">
                <label class="leftcolor-blue">メールアドレス</label>
                <div class="d-flex m-0">
                    <i class="fa-solid fa-check me-1"></i>
                    <div class="validate-style">半角英数で現在使用しているメールアドレスを入力してください</div>
                </div>
                <div class="validate-column">
                    <input type="text" class="form-control" placeholder="メールアドレス" name="mail" disabled>
                    <i class="fa-solid fa-xmark form-err-mark"></i>
                    <i class="fa-solid fa-check form-check-mark"></i>
                </div>

            </div>
            <div class="d-flex flex-column bd-highlight validate-column mb-5">
                <label class="leftcolor-blue">ユーザID</label>
                <div class="d-flex m-0">
                    <i class="fa-solid fa-check me-1"></i>
                    <div class="validate-style">半角英数字で8文字以上20文字以内で入力してください</div>
                </div>
                <div class="validate-column">
                    <input type="text" class="form-control" placeholder="ユーザID" name="id" disabled>
                    <i class="fa-solid fa-xmark form-err-mark"></i>
                    <i class="fa-solid fa-check form-check-mark"></i>
                </div>
            </div>
            <div class="d-flex flex-column bd-highlight validate-column mb-5">
                <label class="leftcolor-blue">パスワード</label>
                <div class="d-flex m-0">
                    <i class="fa-solid fa-check me-1"></i>
                    <div class="validate-style">半角英数字を必ず含み8文字以上20文字以内で入力してください</div>
                </div>
                <div class="validate-column">
                    <input id="password" type="password" class="form-control" placeholder="パスワード" name="pass" disabled>
                    <i class="fa-solid fa-xmark form-err-mark"></i>
                    <i class="fa-solid fa-check form-check-mark"></i>
                </div>

            </div>
            <div class="d-flex flex-column bd-highlight validate-column mb-5">
                <label class="leftcolor-blue">パスワード確認</label>
                <div class="validate-column">
                    <input type="password" class="form-control" placeholder="パスワード" name="pass_confirm" disabled>
                    <i class="fa-solid fa-xmark form-err-mark"></i>
                    <i class="fa-solid fa-check form-check-mark"></i>
                </div>

            </div>
            <div class="d-flex flex-column bd-highlight mb-5 text-center">
                <div>
                    <button class="btn btn-primary" type="submit" style="width: 30vh; height:45px;" name="submit" value="click">新規登録</button>
                </div>
            </div>
        </form>
    </div>

</div>