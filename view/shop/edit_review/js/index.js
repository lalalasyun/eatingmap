$(function () {
    $(document).ready(function () {

        set_event();

    });
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

    $('#back_btn').click(function (e) { 
        var select = confirm("入力を破棄しますか？");
        if (select) {
            window.location.href = $('#back_btn').data("href");
        }
    });

    $('#submit_btn').on('click', function () {
        if (!$('#input_area').validate().form()) {
            return;
        }
        let text = $('#text').val();
        $.post(`${data_list.apiUrl}/api/review_register.php`, {
            user: user_account_id,
            shop: shop_id,
            text: text,
            score: score
        })
            .done(function (data) {
                let url = new URL(window.location.href);
                let params = url.searchParams;
                if (data) {
                    window.location.href = `/view/shop/edit_review/index.php?code=1&id=${shop_id}&click=${params.get('click')}`;
                } else {
                    window.location.href = `/view/shop/edit_review/index.php?code=0&id=${shop_id}&click=${params.get('click')}`;
                }
            })

    });


});