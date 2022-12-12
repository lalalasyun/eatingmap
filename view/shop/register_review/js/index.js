let score = 1;
$(function () {

    set_event();
    function set_event() {
        $('.fa').off();
        $('.fa').on('mouseover', function () {
            var $this = $(this);
            $this.nextAll().removeClass('fa-star').addClass("fa-star-o");
            $this.prevAll().removeClass("fa-star-o").addClass('fa-star');
            $this.removeClass("fa-star-o").addClass('fa-star');
        });
        $('.fa').one('click', function () {
            var $this = $(this);
            $this.addClass('active').siblings().removeClass('active');
            if ($this.data().name != null) {
                score = $this.data().name
            }
            set_event();
        });
        $('.fa').on('mouseleave', function () {
            var select = $('.active');
            select.nextAll().removeClass('fa-star').addClass('fa-star-o');
            select.prevAll().removeClass('fa-star-o').addClass('fa-star');
            select.removeClass('fa-star-o').addClass('fa-star');
        });
    }

    $('#submit_btn').on('click', function () {
        console.log(score);
        let text = $('#text').val();
        $.post("https://app.eatingmap.fun/api/review_register.php",
            {
                user: user_account_id,
                shop: shop_id,
                text: text,
                score: score
            }
        )
            .done(function (data) {
                console.log(data)
                if (data) {
                    window.location.href = `/view/shop/register_review/index.php?code=1&id=${shop_id}`;
                } else {
                    window.location.href = `/view/shop/register_review/index.php?code=0&id=${shop_id}`;
                }
            })

            //通信エラーの場合
            .fail(function () {
                window.location.href = '/view/error/500';
            });
    });


});