(function( $ ) {
    'use strict';

    $(function (){ 
        var $elementor_root_menu = $('#menu-posts-elementor_library.wp-has-current-submenu'),
            $thepack_kit_root_menu = $('#toplevel_page_news-element');

        if($elementor_root_menu.length && $elementor_root_menu.find('a.current').length == 0 && $thepack_kit_root_menu.length > 0){
            $elementor_root_menu.removeClass('wp-has-current-submenu wp-menu-open').addClass('wp-not-current-submenu');
            $elementor_root_menu.children('a').removeClass('wp-has-current-submenu wp-menu-open').addClass('wp-not-current-submenu')
            $thepack_kit_root_menu.removeClass('wp-not-current-submenu').addClass('wp-has-current-submenu wp-menu-open');
            $thepack_kit_root_menu.children('a').removeClass('wp-not-current-submenu').addClass('wp-has-current-submenu wp-menu-open');
            $thepack_kit_root_menu.find('ul > li:last-child').addClass('current').find('a').addClass('current');
        }
    })

})( jQuery ); 