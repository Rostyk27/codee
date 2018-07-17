<?php if( @!WP_DEBUG) {	ob_start('ob_html_compress'); } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php wpa_title(); ?></title>
    <meta name="theme-color" content="#232323">
    <meta name="MobileOptimized" content="width"/>
    <meta name="HandheldFriendly" content="True"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0"/>
    <?php wp_head(); ?>
<!--    <style>-->
<!--        #loader_wrap {-->
<!--            position: fixed;-->
<!--            top: 0;-->
<!--            left: 0;-->
<!--            right: 0;-->
<!--            bottom: 0;-->
<!--            background: #000;-->
<!--            visibility: visible;-->
<!--            z-index: 99;-->
<!--            -webkit-transition: all 0.3s ease;-->
<!--            transition: all 0.3s ease;-->
<!--        }-->
<!--        .global_loader {-->
<!--            width: 240px;-->
<!--            height: 240px;-->
<!--            position: absolute;-->
<!--            top: 50%;-->
<!--            left: 50%;-->
<!--            background: #000;-->
<!--            -webkit-transform: translate(-50%,-50%);-->
<!--            transform: translate(-50%,-50%);-->
<!--            filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feGaussianBlur stdDeviation="10" /><feComponentTransfer color-interpolation-filters="sRGB"><feFuncR type="linear" slope="20" intercept="-9.5" /><feFuncG type="linear" slope="20" intercept="-9.5" /><feFuncB type="linear" slope="20" intercept="-9.5" /></feComponentTransfer></filter></svg>#filter');-->
<!--            -webkit-filter: blur(10px) contrast(20);-->
<!--            filter: blur(10px) contrast(20);-->
<!--        }-->
<!--        .loader__blob_1,.loader__blob_2 {-->
<!--            width: 60px;-->
<!--            height: 60px;-->
<!--            position: absolute;-->
<!--            top: 50%;-->
<!--            left: 50%;-->
<!--            -webkit-transform: translate(-50%,-50%);-->
<!--            transform: translate(-50%,-50%);-->
<!--            border-radius: 50%;-->
<!--        }-->
<!--        .loader__blob_1 {-->
<!--            left: 20%;-->
<!--            background: #fff;-->
<!--            -webkit-animation: bubble_left 1.7s ease infinite;-->
<!--            animation: bubble_left 1.7s ease infinite;-->
<!--        }-->
<!--        .loader__blob_2 {-->
<!--            left: 80%;-->
<!--            background: #0ff;-->
<!--            -webkit-animation: bubble_right 1.7s ease infinite;-->
<!--            animation: bubble_right 1.7s ease infinite;-->
<!--        }-->
<!--        @-webkit-keyframes bubble_left {-->
<!--            0%{left:20%}-->
<!--            50%{left:50%}-->
<!--            100%{left:20%}-->
<!--        }-->
<!--        @keyframes bubble_left {-->
<!--            0%{left:20%}-->
<!--            50%{left:50%}-->
<!--            100%{left:20%}-->
<!--        }-->
<!--        @-webkit-keyframes bubble_right {-->
<!--            0%{left:80%}-->
<!--            50%{left:50%}-->
<!--            100%{left:80%}-->
<!--        }-->
<!--        @keyframes bubble_right {-->
<!--            0%{left:80%}-->
<!--            50%{left:50%}-->
<!--            100%{left:80%}-->
<!--        }-->
<!---->
<!--        body {-->
<!--            opacity: 1;-->
<!--            visibility: hidden;-->
<!--            -webkit-transition: all 0.3s ease;-->
<!--            transition: all 0.3s ease;-->
<!--        }-->
<!--        body.is_loaded {visibility: visible}-->
<!--        body.is_loaded #loader_wrap {-->
<!--            opacity: 0;-->
<!--            visibility: hidden;-->
<!--            pointer-events: none;-->
<!--        }-->
<!--    </style>-->
<!--    <script type="text/javascript">-->
<!--        function loader_off() {-->
<!--            document.getElementsByTagName('body')[0].classList.add('is_loaded');-->
<!--        }-->
<!--        window.onload = loader_off;-->
<!--    </script>-->


    <style>
        html:after,
        html:before {content: '';position: fixed;-webkit-transition: all 0.3s ease;transition: all 0.3s ease;opacity: 1;visibility: visible;}
        html:after {width: 48px;height: 48px;border: 7px solid #22bbb4;top: 50%;left: 50%;margin-top: -40px;margin-left: -24px;-webkit-animation: dance 1.2s ease infinite;animation: dance 1.2s ease infinite;z-index: 99;}
        @media screen and (min-width: 1025px) {  html:after {width: 56px;height: 56px;margin-left: -28px;}  }
        html:before {top: 0;left: 0;right: 0;bottom: 0;background: #232323;z-index: 98;}
        @-webkit-keyframes dance {
            0%, 100% {-webkit-transform: rotate(45deg) scale(1.2);transform: rotate(45deg) scale(1.2);}
            50%{-webkit-transform: rotate(0deg) scale(1);transform: rotate(0deg) scale(1);}
        }
        @keyframes dance {
            0%, 100% {-webkit-transform: rotate(45deg) scale(1.2);transform: rotate(45deg) scale(1.2);}
            50% {-webkit-transform: rotate(0deg) scale(1);transform: rotate(0deg) scale(1);}
        }
        html.is_loaded:after,
        html.is_loaded:before {opacity: 0;visibility: hidden;pointer-events: none;}
        body {opacity: 0}
    </style>
    <script type="text/javascript">
        function loader_off() {
            document.getElementsByTagName('html')[0].classList.add('is_loaded');
        }
        window.onload = loader_off;
    </script>


</head>
<body <?php body_class(); ?>  data-hash="<?php wpa_fontbase64(true); ?>" data-a="<?php echo admin_url('admin-ajax.php'); ?>">
<!--<div id="loader_wrap"><div class="global_loader"><div class="loader__blob_1"></div><div class="loader__blob_2"></div></div></div>-->
<div id="main">
    <header>
        <a id="logo" class="codee codee_dev" href="mailto:dev@codee.pro">
            <span>[</span>code<span>e</span><span>]</span>
        </a>
        <a class="nav_icon" href=""><i></i><i></i><i></i></a>
        <div class="menu_holder flex_center">
            <nav id="menu"><?php wp_nav_menu(array('container' => false, 'items_wrap' => '<ul id="%1$s">%3$s</ul>', 'theme_location'  => 'main_menu')); ?></nav>
            <?php echo qtranxf_generateLanguageSelectCode('text'); ?>
        </div>
    </header>
