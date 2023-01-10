$(function () {
    $(document).ready(async function () {
        const buttons = $('.review_more');
        const max_h = 180;
        buttons.each(function (index) {
            let review_h =  $(this).prev().height();
            if (review_h < max_h) {
                $(this).hide();
            }
        });

    });

    $('.review_more').click(function () {
        $(this).prev().toggleClass('box-close');
        const flg = $(this).data('more-flg');
        $(this).html(flg ? '<i class="fa-solid fa-angle-up"></i>レビューを閉じる' : '<i class="fa-solid fa-angle-down"></i>続きを見る');
        $(this).data('more-flg', !flg);
    })
});