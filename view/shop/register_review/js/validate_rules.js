$(function() {
    $('#input_area').validate({
        //ルールの設定
        rules: {
            text:{
                required: true,
                minlength:5,
                maxlength:1000
            }
        },
        //エラーメッセージの設定
        messages: {
            text: {
                required: 'レビューを入力してください。',
                minlength:'5文字以上で入力してください。',
                maxlength:'1000文字以内で入力してください。'
            }
        }
    });
});