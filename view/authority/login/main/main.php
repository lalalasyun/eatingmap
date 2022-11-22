<div class="d-flex justify-content-center ">
    <div></div>
    <div class="box5">
        <div class="d-flex flex-column bd-highlight mb-3 text-center">
            <div class="mt-3">
                <h1>LOGIN</h1>
            </div>
                <div class="d-flex flex-column bd-highlight mb-3">
                    <label class="form-label">ユーザID</label>
                    <input type="text" class="form-control" id="id" required><br>
                </div>
                <div class="d-flex flex-column bd-highlight mb-3">
                    <label class="form-label">パスワード</label>
                    <input type="password" class="form-control" id="pass" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit" name="login" value="login_click" id="login_btn">ログイン</button>
                </div>
                <button class="btn btn-primary" type="submit" onclick="location.href='../register/'">新規登録</button>
            
        </div>
    </div>
</div>