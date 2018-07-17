<?php get_header(); ?>
<section class="page404 content flex_center">
    <div class="container">
        <h1><?php _e( "[:en]Error 404[:ua]Помилка 404[:]" ); ?></h1>
        <p></p>
        <p><?php _e( "[:en]Sorry, this page doesn't exist or has been removed.[:ua]Вибачте, цієї сторінки не існує або вона була перенесена.[:]" ); ?></p>
        <p></p>
        <p></p>
        <a href="<?php echo site_url(); ?>" class="button"><?php _e( "[:en]Go back home[:ua]На головну[:]" ); ?></a>
    </div>
</section>
<?php get_footer(); ?>
