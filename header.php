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
    <link href="https://file.myfontastic.com/A88sMv7e3mbBxaADTKY52J/icons.css" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>  data-hash="<?php wpa_fontbase64(true); ?>" data-a="<?php echo admin_url('admin-ajax.php'); ?>">
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
