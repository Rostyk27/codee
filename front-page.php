<?php get_header(); ?>

    <section id="top_panel" class="top-block" style="background-image: url(<?php the_field('background-top') ?>);">
        <div class="container">
            <h1 class="codee"><span>[</span>code<b class="element" data-words="<?php echo get_field('appears_text') ?>"></b><span>]</span></h1>
        </div>
    </section>

    <?php
    // the query
    $the_query = new WP_Query( array(
        'posts_per_page' => 5,
        'post_type' => 'portfolio'
    ));
    ?>

    <?php if ( $the_query->have_posts() ) : ?>
        <section id="portfolio">
            <div class="container">
                <h2>Portfolio</h2>
	            <div class="portfolio__items">
		            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <figure class="snip1401">
                            <img src="<?php the_post_thumbnail_url() ?>"/>
                            <figcaption>
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo wp_trim_words( get_the_content(), 16, '' ) ?></p>
                                <a class="button" href="#">Button</a>
                            </figcaption><i class="ion-ios-home-outline"></i>
                        </figure>
		            <?php endwhile; ?>
		            <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section id="who_we_are">
        <div class="container">
            <h2>Who We Are</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
        </div>
    </section>

    <section id="what_we_do">
        <div class="container">
            <h2>What We Do</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum doloremque neque officia quidem tenetur, veniam? Expedita officiis rem similique?</p>
        </div>
    </section>

    <section id="contact_us" class="contact-us">
        <div class="container">
            <h2>Contact Us</h2>
            <ul>
                <li>Skype</li>
                <li>Upwork agency</li>
                <li>Something else?</li>
            </ul>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <h3><?php _e("[:en]Get in Touch[:ua]Зв'яжіться з Нами[:]"); ?></h3>
			<?php echo do_shortcode('[contact-form-7 id="4" title="Contact Form"]') ?>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <h2>Map</h2>
        </div>
    </section>

<?php get_footer(); ?>