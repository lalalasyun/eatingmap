$(function() {
    const error_icon = '<i class="fa-solid fa-circle-exclamation"></i>';
    $('#input_area').validate({
        //ルールの設定
        rules: {
            name: {
                required: true,
                minlength:2,
                maxlength:20
            },
            text: {
                maxlength:500
            }
        },
        //エラーメッセージの設定
        messages: {
            name: {
                required: error_icon+'これは必須項目です！',
                minlength: error_icon+'ニックネームは2文字以上で入力してください',
                maxlength:error_icon+'ニックネームは20文字以下で入力してください'
            },
            text: {
                maxlength:error_icon+'プロフィールは500文字以下で入力してください'
            }
        }
    });
});