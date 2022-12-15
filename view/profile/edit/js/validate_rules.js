$(function() {
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
                required: 'これは必須項目です！',
                minlength: 'ニックネームは2文字以上で入力してください',
                maxlength:'ニックネームは20文字以下で入力してください'
            },
            text: {
                maxlength:'プロフィールは500文字以下で入力してください'
            }
        }
    });
});