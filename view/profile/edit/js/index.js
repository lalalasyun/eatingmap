$(function () {
    const user_name = $('#input_name').val();
    const user_text = $('#input_text').val();
    $('#submit_btn').click(function (e) {
        if (user_name !== $('#input_name').val() || user_text !== $('#input_text').val()) {
            $('#input_area').submit();
            return;
        }
        if(!$("#err-equal").length){
            $(`<label id="err-equal" class="error"><i class="fa-solid fa-circle-exclamation"></i>内容を変更してください。</label>`).appendTo('#input_area');
        }
        
    });

    $('#back_btn').click(function (e) {
        var select = confirm("変更を破棄しますか？");
        if (select) {
            History_back();
        }
    });

    $('.now_cnt').text($('#input_text').val().length);

    $('#input_text').on('input', function () {
        //文字数を取得
        var cnt = $(this).val().length;
        //現在の文字数を表示
        $('.now_cnt').text(cnt);
        if (cnt > -1 && 501 > cnt) {
            //1文字以上かつ140文字以内の場合はボタンを有効化＆黒字
            $('.cnt_area').removeClass('cnt_danger');
        } else {
            //0文字または140文字を超える場合はボタンを無効化＆赤字
            $('.cnt_area').addClass('cnt_danger');
        }
    });
});