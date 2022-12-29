$(function() {
    $('#input_area').validate({
        //ルールの設定
        rules: {
            text:{
                required: true,
                minlength:10,
                maxlength:1000
            }
        },
        //エラーメッセージの設定
        messages: {
            text: {
                required: 'これは必須項目です！',
                minlength:'10文字以上で入力してください',
                maxlength:'1000文字以内で入力してください'
            }
        }
    });
});