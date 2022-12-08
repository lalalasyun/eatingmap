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


            console.log($this.data().name);
            set_event();
        });
        $('.fa').on('mouseleave', function () {
            var select = $('.active');
            select.nextAll().removeClass('fa-star').addClass('fa-star-o');
            select.prevAll().removeClass('fa-star-o').addClass('fa-star');
            select.removeClass('fa-star-o').addClass('fa-star');
        });
    }


});