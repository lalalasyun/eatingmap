<?php 
    $res = $_GET['logout'];

    if($res == 'logout_click'){
        /* 仮　ログインチェック*/
        $_SESSION['logout'] = "1";
        header( "Location: /web/view/main/home" ) ;
	    exit;
    }
    
?>
<div>
    <!--ログイン済みヘッダー-->
    <div class="d-flex justify-content-between">
        <div class="header_img">
            <img src="/web/view/template/images/header/header_icon.png" onclick="location.href='/web/view/main/home/'">
        </div>

        <div class="d-flex align-items-end">
            <form action="" method="get">
                <!--ログアウト、MyPage-->
                <button type="submit" class="btn btn-primary" name="logout" value="logout_click" style="height: 38px;">ログアウト</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/web/view/mypage/'" style="height: 38px;">MyPage</button>
            </form>

        </div>
    </div>
    <hr style="margin:10px 0px 0px;">
</div>