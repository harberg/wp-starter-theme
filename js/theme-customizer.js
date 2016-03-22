(function($) {

    wp.customize( 'hc_base_color', function(value) {
        value.bind(function(to) {
            $('body').css({color : to});
        });
    });

    wp.customize( 'hc_link_color', function(value) {
        value.bind(function(to) {
            $('body a').css({color : to});
        });
    });

})(jQuery);