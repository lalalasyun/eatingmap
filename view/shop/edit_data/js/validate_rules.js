$(function() {
    $.validator.addMethod('check_price', function(value, element) {
        if ( value >= 1000 && value <= 50000 ) {
            return true;
        }
        return false;
    }, '1000円から50000円の範囲で入力してください');
    $('#input_area').validate({
        //ルールの設定
        rules: {
            name:{
                required: true,
                minlength:3,
                maxlength:20
            },
            location:{
                required: true,
            },
            description:{
                required: true,
                maxlength: 1000
            },
            phone:{
                pattern: /^\d{2,4}-?\d{2,4}-?\d{3,4}$/i
            },
            price:{
                required: true,
                number: true,
                check_price:true
            },
            genre:{
                required: true,
            }
        },
        //エラーメッセージの設定
        messages: {
            name: {
                required: 'これは必須項目です！',
                minlength:'3文字以上で入力してください',
                maxlength:'20文字以内で入力してください'
            },
            location: {
                required: 'これは必須項目です！'
            },
            description: {
                required: 'これは必須項目です！',
                maxlength:'1000文字以内で入力してください'
            },
            phone: {
                pattern: '電話番号が正しくありません'
            },
            price: {
                required: 'これは必須項目です！',
                number:'価格を入力してください',
            },
            genre:{
                required: 'これは必須項目です！',
            }
        }
    });
});