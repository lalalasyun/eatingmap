function pass_change(){
    document.getElementById('hid').style.display = "";
    document.getElementById('hid2').style.display = "";
}
$(function() {

    

    $('#input_area').validate({
        //ルールの設定
        rules: {
            name: {
                required: true,
                maxlength:10
               
            },
            email: {
                required: true,
                pattern: /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/i
            },
            pass1: {
                required: true,
                pattern: /^[a-z\d]{4,8}$/i
            },
            pass2: {
                required: true,
                pattern: /^[a-z\d]{4,8}$/i,
            },
            pass3: {
                required: true,
                pattern: /^[a-z\d]{4,8}$/i,
                equalTo: "#pass2"
            },
        },
        //エラーメッセージの設定
        messages: {
            name: {
                required: 'これは必須項目です！',
                 maxlength: '10文字以内で設定してください',
               
                
            },
            email: {
                required: 'これは必須項目です！',
                pattern: 'メールアドレスが正しくありません'
                
            },
            pass1: {
                required: 'これは必須項目です！',
                pattern: 'パスワードが正しくありません'
               
            },
            pass2: {
                required: 'これは必須項目です！',
                pattern: '違うパスワードを入力してください'
                
            },
            pass3: {
                required: 'これは必須項目です！',
                pattern: 'パスワードが正しくありません',
                equalTo: 'パスワードが間違っています'
            },
        }
    });
});