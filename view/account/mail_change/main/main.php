<script>
    const point = <?= $USER_DATA['point'] ?>;
</script>
<div class="container mt-3">
    <div class="col-md-6 offset-md-3">
        <h3 class="mb-5 text-center">メールアドレス変更</h3>

        <form id="input_area" onsubmit="return false;">
            <div class="mb-4" id="Box1">
                <label class="form-label">メールアドレス</label>
                <div class="validate-column">
                    <input type="text" id='mail'class="form-control" name="mail" rows="5" placeholder="メールアドレス">

                    <i class="fa-solid fa-xmark form-err-mark"></i>
                    <i class="fa-solid fa-check form-check-mark"></i>
                </div>
            </div>
            <input type="text" name="dummy" style="display:none;">
        </form>
        <div class="d-flex justify-content-center mb-5">
            <button type="button" class="btn_18" id="change_btn">変更を適用</button>
        </div>
    </div>
</div>