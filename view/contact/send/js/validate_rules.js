$(function() {
    $('#input_area').validate({
        //ルールの設定
        rules: {
            shop_name: {
                required: true,
            },
            user_mail:{
                required: true,
                pattern: /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/i,
            },
            phone: {
                required: true,
                pattern: /^\d{2,4}-?\d{2,4}-?\d{3,4}$/i
            },
            question: {
                required: true,
            },
            message:{
                required: true,
            },
            select1: {
                required: true,
            },
            select2: {
                required: true,
            },
            select3: {
                required: true,
            },
            shop_address: {
                required: true,
            },
        },
        //エラーメッセージの設定
        messages: {
            shop_name: {
                required: 'これは必須項目です！',
            },
            user_mail:{
                required: 'これは必須項目です！',
                pattern: 'メールアドレスが正しくありません',
            },
            phone: {
                required: 'これは必須項目です！',
                pattern: '電話番号が正しくありません'
                
            },
            question: {
                required: 'これは必須項目です！',
            },
            message:{
                required: 'これは必須項目です！',
            },
            select1: {
                required: '選択してください',
            },
            select2: {
                required: '選択してください',
            },
            select3: {
                required: '選択してください',
            },
            shop_address: {
                required: 'これは必須項目です！',
            },
        }
    });
});