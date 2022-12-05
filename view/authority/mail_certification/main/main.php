
<div class="d-flex justify-content-center ">
    <div></div>
    <div class="box5">
        <div class="d-flex flex-column bd-highlight mb-3 text-center" style="width: 300px;">
            <div class="mt-3">
                <h1>メール認証</h1>
            </div>
            <form id="input_area">
                <div class="d-flex flex-column bd-highlight mb-3">
                    <label for="validationDefault01" class="form-label">ユーザネーム</label>
                    <input type="text" class="form-control" id="id" name="name"><br>
                </div>
                <div class="d-flex flex-column bd-highlight mb-5">
                    <label for="validationDefault02" class="form-label">メールアドレス</label>
                    <input type="text" class="form-control" id="mail" name="mail">
                </div>
            </form>

            <button class="btn btn-primary" id="mail_send_btn" name="send" value="send_click">送信</button>
            <div class="sessionsLayout_guide">
                アカウントを持っている場合は
                <a href="/web/view/authority/mail_certification/" rel="nofollow">ログイン</a>
                から。
            </div>
            <div id="loader" style="display:none;">
                <div class="loader"></div>
            </div>
        </div>
    </div>
</div>