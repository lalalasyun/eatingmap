<div class="d-flex flex-column bd-highlight mb-3 text-left p-4">
    <div class="mt-3">
        <form>
            <div class="sample-box">
                <img src="/web/images/user_icon/hiphop.png" width="200" height="200">
                <div class="good">
                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                </div>
            </div>
            <p>名前：<?php echo $test_name ?></p>
            
            <div class="d-flex align-items-center">
                <div class="h4">
                    口コミ数
                </div>
                <div class="d-flex align-items-center">
                    <div class="h5">
                        ???
                    </div>
                </div>
            </div>
            <em class="d-flex font-italic">
            <p>自己紹介文：<?php echo $test_email ?></p>
            </em>
            <?php
                session_start();
                //if($_SESSION['auth']){
                    include 'edit_btn.php';
                //}
            ?>
        </form>

    </div>
</div>