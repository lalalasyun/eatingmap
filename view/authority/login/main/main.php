<div class="d-flex justify-content-center ">
    <div></div>
    <div class="box5">
        <div class="d-flex flex-column bd-highlight mb-3 text-center" style="width: 300px;">
            <div class="mt-3">
                <h1>LOGIN</h1>
            </div>
            <div class="d-flex flex-column bd-highlight mb-2">
                <label class="form-label">ユーザID</label>
                <input type="text" class="form-control" id="id" required><br>
            </div>
            <div class="d-flex flex-column bd-highlight mb-2">
                <label class="form-label">パスワード</label>
                <input type="password" class="form-control mb-2" id="pass" required>
                <div id="err_mess" class="mb-2"></div>
            </div>
            <button class="btn btn-primary" name="login" value="login_click" id="login_btn">ログイン</button>
            <div class="sessionsLayout_guide">
                アカウントを持っていない場合は
                <a href="/view/authority/mail_certification/" rel="nofollow">こちら</a>
            </div>

        </div>
    </div>
</div>