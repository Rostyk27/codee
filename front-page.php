<?php get_header(); ?>

    <section class="top_panel" style="background-image: url(<?php the_field('background-top') ?>);">
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
                <h2><?php _e("[:en]Portfolio[:ua]Портфоліо[:]"); ?></h2>
	            <!--<div class="portfolio__items">
		            <?php /*while ( $the_query->have_posts() ) : $the_query->the_post(); */?>
                        <figure class="portfolio__item">
                            <div class="portfolio__img" style="background-image: url(<?php /*the_post_thumbnail_url() */?>);"></div>
                            <figcaption>
                                <h3><?php /*the_title(); */?></h3>
                                <p><?php /*echo wp_trim_words( get_the_content(), 16, '' ) */?></p>
	                            <?php /*if ($link = get_field('live_link')) {
	                                echo '<a class="button" href="'.$link.'">Button</a>';
	                            } */?>
                            </figcaption><i class="ion-ios-home-outline"></i>
                        </figure>
		            <?php /*endwhile; */?>
		            <?php /*wp_reset_postdata(); */?>
                </div>-->

                <div class="portfolio_items">
		            <?php
                    $i = 1; $j = 1;
		            while ( $the_query->have_posts() ) : $the_query->the_post();
                    global $post;
                    $live_link = get_field('live_link', $post->ID);
			        $pf_cats = get_the_terms( $post->ID, 'portfolio_artical_category' );
                    ?>
                        <div class="portfolio_item">
                            <div class="pf_item_info flex_center">
                                <div class="pf_item_info_inner">
                                    <h4><?php the_title(); ?></h4>
			                        <?php if( has_excerpt( $post->ID ) ) : the_excerpt(); endif; ?>
                                    <div class="pf_item_buttons">
				                        <?php echo $live_link ? '<a class="rm_btn" href="'.$live_link.'">'. __( "[:en]View[:ua]Перегляд[:]" ) .'</a>' : ''; ?>
                                        <a href="javascript:;" class="rm_btn" data-fancybox data-src="#portfolio_item<?php echo $j++; ?>"><?php _e( "[:en]Details[:ua]Деталі[:]" ); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="pf_item_inner" style="<?php echo image_src( get_post_thumbnail_id( $post->ID ), 'portfolio', true ); ?>"></div>
                            <div id="portfolio_item<?php echo $i++; ?>" class="pf_item_details">
                                <h3><?php the_title(); ?></h3>
                                <div class="pf_content"><?php the_content(); ?></div>
                                <div class="pf_cats">
                                    <span><?php _e( "[:en]Responsible for :[:ua]Відповідальні за :[:]" ); ?></span>
	                                <?php if ( !empty( $pf_cats ) && ! is_wp_error( $pf_cats ) ) :
		                                $qua = count($pf_cats); $k = 1;
		                                foreach($pf_cats as $cat) :
                                            $cat_name = '#'. str_replace(' ', '_', $cat->name); ?>
                                            <small><?php echo $cat_name, $k++ != $qua ? ', ' : ''; ?></small>
		                                <?php endforeach;
	                                endif; ?>
                                </div>
                            </div>
                        </div>
		            <?php endwhile;
		            wp_reset_postdata(); ?>
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

    <section id="contact_us">
        <div class="container">
            <h2><?php _e("[:en]Contact Us[:ua]Контакти[:]"); ?></h2>
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