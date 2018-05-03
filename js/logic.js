/*jslint browser: true, white: true, plusplus: true, regexp: true, indent: 4, maxerr: 50, es5: true */
/*jshint multistr: true, latedef: nofunc */
/*global jQuery, $, Swiper*/


// menu scroll actions
function scroll_menu() {
    var lastId, id,
        topMenu = $('#menu'),
        menuItems = topMenu.find('a'),
        scrollItems = menuItems.map(function(){
            if(this.href.indexOf('#') !== -1) {
                var item = $($(this).attr('href').replace('to-', ''));
                if (item.length) { return item; }
            }
        });
    $(window).scroll(function() {
        var $window = $(window),
            ww = $window.width(),
            fromTop = $(this).scrollTop(),
            cur = scrollItems.map(function(){
                if ($(this).offset().top < fromTop) return this;
            });
        cur = cur[cur.length-1];
        var id = cur && cur.length ? cur[0].id : '';

        if (lastId !== id) {
            lastId = id;
            menuItems.parent().removeClass('is_active').end().filter('[href="#to-' + id + '"]').parent().addClass('is_active');
            window.location.hash = '/'+id.replace('#', '');
        }
    });
}


// menu click actions
function click_menu() {
    var $window = $(window),
        ww = $window.width();
    $('.home a[href^="#"]').on('click', function () {
        var id = $(this).attr('href').replace('to-', '');
        if ($('#portfolio').length !== 0) {
            $('html,body').stop().animate({scrollTop: $(id).offset().top + 2}, 1000, function () {
                window.location.hash = '/' + id.replace('#', '');
            });
            $('.nav_icon').removeClass('is_active').next().removeClass('is_open');
            $('body').removeClass('is_overflow');
        }
        return false;
    });
}



$(document).ready(function() {
    'use strict';

    var typed = new Typed(".element", {
        strings: $(".element").data('words').split(' '),
        startDelay: 1500,
        typeSpeed: 150,
        loop: true,
        backSpeed: 80,
        backDelay: 1500
    });

    //  hamburger + menu
    $('.nav_icon').on('click', function() {
        $(this).toggleClass('is_active').next().stop().toggleClass('is_open');
        $('body').toggleClass('is_overflow');
        return false;
    });
    $('#menu .menu-item-has-children > a').after('<span />');
    $('#menu').on('click', '.menu-item-has-children > a + span', function() {
        $(this).toggleClass('is_open').next().stop().toggle().parent().toggleClass('is_active');
    });


    //  contact form 7
    $(this).on('click', '.wpcf7-not-valid-tip', function() {
        $(this).prev().trigger('focus');
        $(this).fadeOut(500,function(){
            $(this).remove();
        });
    });
    $(this).on('focus', '.wpcf7-form-control:not([type="submit"])', function() {
        $(this).parent().addClass('is_active');
    });
    $(this).on('blur', '.wpcf7-form-control:not([type="submit"])', function() {
        if($(this).val() !== "") {
            $(this).parent().addClass('is_active');
        } else {
            $(this).parent().removeClass('is_active');
        }
    });
    $(this).on( 'keyup', 'textarea', function() {
        $(this).height( 0 );
        $(this).height( this.scrollHeight );
    });


    //  custom select
    // $('select').selectric({
    //     disableOnMobile: false,
    //     nativeOnMobile: false,
    //     arrowButtonMarkup: '<span class="select_arrow"></span>'
    // });
    // $('select.wpcf7-form-control').each(function () {
    //     $(this).find('option').first().val('');
    // });


    //  custom code

    // menu
    click_menu();
    scroll_menu();


    var scene = $('#skills_list').get(0);
    var parallax = new Parallax(scene);
});



$(window).on('load', function() {
    'use strict';

    var hash = window.location.hash,
        $window = $(window),
        ww = $window.width();
    if(hash && hash !== '#/') {
        $('html,body').animate({scrollTop: $(hash.replace('#/', '#')).offset().top + 3}, 700);
    }

    //  swiper
    // setTimeout(function() {
    //     var home_slider = new Swiper('.home_slider', {
    //         navigation: {
    //             nextEl: '.custom_next',
    //             prevEl: '.custom_prev'
    //         },
    //         pagination: {
    //             el: '.sw_pagination',
    //             type: 'bullets',
    //             clickable: true
    //         },
    //         autoplay: {
    //             delay: 4000
    //         },
    //         speed: 1000
    //     });
    // }, 500);


    //  fluid video (iframe)
    $('.content iframe').each(function(i) {
        var t = $(this),
            p = t.parent();
        if (p.is('p') && !p.hasClass('fullframe')) {
            p.addClass('fullframe');
        }
    });
    $('.wp-video').each(function() {
        $('.mejs-video .mejs-inner', this).addClass('fullframe');
    });

});



$(window).resizeEnd(function() {
    'use strict';

    // menu
    click_menu();
    scroll_menu();
});