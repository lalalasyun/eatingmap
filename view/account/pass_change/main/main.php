<div class="container mt-3">
    <div class="col-md-6 offset-md-3">
        <h3 class="mb-5 text-center">パスワード変更</h3>

        <form action="" method="get" id="input_area">
            <div class="mb-4" id="Box1">
                <label  class="form-label">現在のパスワード</label>
                <div class="validate-column">
                    <input type="password" class="form-control" id="pass1" name="pass1" rows="5" placeholder="現在のパスワード">
                    <i class="fa-regular fa-eye form-open-eye-mark" title="パスワードを表示"></i>
                    <i class="fa-regular fa-eye-slash form-close-eye-mark" title="パスワードを非表示"></i>
                </div>
            </div>
            <div class="mb-4" id="hid">
                <label  class="form-label">新しいパスワード</label>
                <div class="validate-column">
                    <input type="password" class="form-control" id="pass2" name="pass2" rows="5" placeholder="新しいパスワード">
                    <i class="fa-regular fa-eye form-open-eye-mark" title="パスワードを表示"></i>
                    <i class="fa-regular fa-eye-slash form-close-eye-mark" title="パスワードを非表示"></i>
                </div>
            </div>
            <div class="mb-4" id="hid2">
                <label  class="form-label">新しいパスワード(確認)</label>
                <div class="validate-column">
                    <input type="password" class="form-control" id="pass3" name="pass3" rows="5" placeholder="新しいパスワード(確認)">
                    <i class="fa-regular fa-eye form-open-eye-mark" title="パスワードを表示"></i>
                    <i class="fa-regular fa-eye-slash form-close-eye-mark" title="パスワードを非表示"></i>
                </div>
            </div>
            <div class="d-flex justify-content-center mb-5">
                <input type="submit" class="btn btn-primary" value="変更を適用">
            </div>


        </form>
    </div>
</div>