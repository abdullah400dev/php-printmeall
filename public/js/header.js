var lastScroll = 40;

jQuery(document).ready(function($) {
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll > 100) {
            $(".wrapper").addClass("sticky");
        } else if (scrollY < 20) {
            $(".wrapper").removeClass("sticky");
        }
        lastScroll = scroll;
    });
});``