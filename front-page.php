<?php get_header(); ?>

    <div class="top_panel" style="background-image: url(<?php the_field('background-top') ?>);">
        <div class="container">
            <h1><?php _e("[:en]We<br> create[:ua]Ми<br> створюємо[:]"); ?> <b><span class="element" data-words="<?php echo get_field('appears_text') ?>"></span></b> <?php _e("[:en]websites[:ua]сайти[:]"); ?></h1>
        </div>
    </div>

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
                                    <h3><?php the_title(); ?></h3>
			                        <?php if( has_excerpt( $post->ID ) ) : the_excerpt(); endif; ?>
                                    <div class="pf_item_buttons">
				                        <?php echo $live_link ? '<a class="rm_btn" href="'.$live_link.'" target="_blank" rel="noopener">'. __( "[:en]View[:ua]Перегляд[:]" ) .'</a>' : ''; ?>
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
            <div class="we_are_content">
                <h2><?php _e("[:en]Who We Are[:ua]Про Нас[:]"); ?></h2>
                <?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
                <div class="button_holder"><a href="javascript:;" class="button go_next"><?php _e("[:en]Find out[:ua]Дізнатись[:]"); ?></a></div>
            </div>
	        <?php if ( $skills_list = get_field( 'skills_list' ) ) : ?>
                <h3 class="rwd_show"><?php _e("[:en]Skills[:ua]Навики[:]"); ?></h3>
                <div id="skills_list">
	                <?php
	                $numbers = range(1, 22);
	                shuffle($numbers);
	                $i = 0;
	                foreach ( $skills_list as $skill ) :
		                if ((0 <= $i) && ($i <= 6)) :
                            $dpt = 10;
	                    elseif ((7 <= $i) && ($i <= 13)) :
	                        $dpt = 20;
	                    else :
                            $dpt = 15;
	                    endif;

		                echo '<div class="layer skill_'. $numbers[$i] .' '. $skill['sm'][0] .'" data-depth="0.'. $dpt .'">'. $skill['title'] .'</div>';

		                $i++;
                    endforeach;
                    ?>
                </div>
	        <?php endif; ?>
        </div>
    </section>

    <section id="what_we_do">
        <div class="container">
            <h2><?php _e("[:en]What We Do[:ua]Ми Робимо[:]"); ?></h2>
            <div class="we_do_columns flex_start__rwd">
                <div class="we_do_col">
                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0ODAgNDgwIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0ODAgNDgwOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI1NnB4IiBoZWlnaHQ9IjI1NnB4Ij4KPGc+Cgk8Zz4KCQk8cGF0aCBkPSJNNTYsNDE2Yy0zMC44NzIsMC01NiwyNS4xMjgtNTYsNTZjMCw0LjQyNCwzLjU3Niw4LDgsOGg5NmM0LjQyNCwwLDgtMy41NzYsOC04QzExMiw0NDEuMTI4LDg2Ljg3Miw0MTYsNTYsNDE2eiAgICAgTTE2LjgwOCw0NjRDMTkuOTkyLDQ0OC4zNiwzMi4zNiw0MzYuMDcyLDQ4LDQzMi44OFY0NDhoMTZ2LTE1LjEyYzE1LjY0LDMuMiwyOC4wMDgsMTUuNDgsMzEuMTkyLDMxLjEySDE2LjgwOHoiIGZpbGw9IiMyMmJiYjQiLz4KCTwvZz4KPC9nPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik00NzIsMzQ0aC0xNC4wMzJjLTAuNDQtMS4xMTItMC44OTYtMi4yMTYtMS4zOTItMy4zMjhsOS45MjgtOS45MjhjMy4xMjgtMy4xMjgsMy4xMjgtOC4xODQsMC0xMS4zMTJsLTMzLjkzNi0zMy45MzYgICAgYy0xLjY1Ni0xLjY1Ni0zLjg0LTIuMzc2LTYuMDA4LTIuMjcyQzQzOS4yNCwyNzYuNDk2LDQ0OCwyNjMuMzIsNDQ4LDI0OFY0MGMwLTIyLjA1Ni0xNy45NDQtNDAtNDAtNDBINDBDMTcuOTQ0LDAsMCwxNy45NDQsMCw0MCAgICB2MjA4YzAsMjIuMDU2LDE3Ljk0NCw0MCw0MCw0MGgxMDQuNGwtMzAuMjI0LDU2SDExMmgtMTJjLTE1LjQ0LDAtMjgsMTIuNTYtMjgsMjhzMTIuNTYsMjgsMjgsMjhoMTcyYzAsNC40MjQsMy41NzYsOCw4LDhoMTQuMDMyICAgIGMwLjQ0LDEuMTEyLDAuODk2LDIuMjE2LDEuMzkyLDMuMzI4bC05LjkyOCw5LjkyOGMtMy4xMjgsMy4xMjgtMy4xMjgsOC4xODQsMCwxMS4zMTJsMzMuOTM2LDMzLjkzNiAgICBjMy4xMjgsMy4xMjgsOC4xODQsMy4xMjgsMTEuMzEyLDBsOS45MjgtOS45MjhjMS4xMTIsMC40OTYsMi4yMTYsMC45NTIsMy4zMjgsMS4zOTJWNDcyYzAsNC40MjQsMy41NzYsOCw4LDhoNDggICAgYzQuNDI0LDAsOC0zLjU3Niw4LTh2LTE0LjAzMmMxLjExMi0wLjQ0LDIuMjE2LTAuODk2LDMuMzI4LTEuMzkybDkuOTI4LDkuOTI4YzMuMTI4LDMuMTI4LDguMTg0LDMuMTI4LDExLjMxMiwwbDMzLjkzNi0zMy45MzYgICAgYzMuMTI4LTMuMTI4LDMuMTI4LTguMTg0LDAtMTEuMzEybC05LjkyOC05LjkyOGMwLjQ5Ni0xLjExMiwwLjk1Mi0yLjIxNiwxLjM5Mi0zLjMyOEg0NzJjNC40MjQsMCw4LTMuNTc2LDgtOHYtNDggICAgQzQ4MCwzNDcuNTc2LDQ3Ni40MjQsMzQ0LDQ3MiwzNDR6IE0xNiw0MGMwLTEzLjIzMiwxMC43NjgtMjQsMjQtMjRoMzY4YzEzLjIzMiwwLDI0LDEwLjc2OCwyNCwyNHYxNjhIMTZWNDB6IE00MCwyNzIgICAgYy0xMy4yMzIsMC0yNC0xMC43NjgtMjQtMjR2LTI0aDQxNnYyNGMwLDEzLjIzMi0xMC43NjgsMjQtMjQsMjRoLThoLTQ4aC02MS44MDhIMTU3LjgwOEg0MHogTTQyMS4xNTIsMjg1LjZsLTkuODI0LDkuODI0ICAgIGMtMS4xMTItMC40OTYtMi4yMTYtMC45NTItMy4zMjgtMS4zOTJWMjg4QzQxMi42MzIsMjg4LDQxNy4wMDgsMjg3LjA1Niw0MjEuMTUyLDI4NS42eiBNMzQ0LDI4OHY2LjAzMiAgICBjLTEuMTEyLDAuNDQtMi4yMTYsMC44OTYtMy4zMjgsMS4zOTJMMzMzLjI0OCwyODhIMzQ0eiBNMzE2LjkyLDI4OGwtNi44OTYsNi44OTZMMzA1LjMyOCwyODhIMzE2LjkyeiBNMjcyLDM4NEgxMDAgICAgYy02LjYxNiwwLTEyLTUuMzg0LTEyLTEyYzAtNi42MTYsNS4zODQtMTIsMTItMTJoMTJoNi45NDRIMjcyVjM4NHogTTEzMi4zNTYsMzQzLjk5MkwxNjIuNTc2LDI4OGgxMjMuMzkybDEyLjU0NCwxOC40MDggICAgbC0xMy4wMTYsMTMuMDE2Yy0zLjEyOCwzLjEyOC0zLjEyOCw4LjE4NCwwLDExLjMxMmw5LjkyOCw5LjkyOGMtMC40OTYsMS4xMTItMC45NTIsMi4yMTYtMS4zOTIsMy4zMjhIMjgwSDEzMi4zNTZ6IE00NjQsMzkyICAgIGgtMTEuNjcyYy0zLjQ5NiwwLTYuNTc2LDIuMjY0LTcuNjMyLDUuNTkyYy0xLjIxNiwzLjg2NC0yLjg1Niw3LjgtNC44OCwxMS42NzJjLTEuNjE2LDMuMTA0LTEuMDMyLDYuODg4LDEuNDQsOS4zNmw4LjI4OCw4LjI4OCAgICBsLTIyLjYyNCwyMi42MjRsLTguMjg4LTguMjg4Yy0yLjQ4LTIuNDcyLTYuMjU2LTMuMDQ4LTkuMzYtMS40NGMtMy44NzIsMi4wMjQtNy44MDgsMy42NjQtMTEuNjcyLDQuODggICAgYy0zLjMzNiwxLjA2NC01LjYsNC4xNDQtNS42LDcuNjRWNDY0aC0zMnYtMTEuNjcyYzAtMy40OTYtMi4yNjQtNi41NzYtNS41OTItNy42MzJjLTMuODY0LTEuMjE2LTcuOC0yLjg1Ni0xMS42NzItNC44OCAgICBjLTMuMTA0LTEuNjA4LTYuODg4LTEuMDMyLTkuMzYsMS40NGwtOC4yODgsOC4yODhsLTIyLjYyNC0yMi42MjRsOC4yODgtOC4yODhjMi40NzItMi40NzIsMy4wNTYtNi4yNTYsMS40NC05LjM2ICAgIGMtMi4wMjQtMy44NzItMy42NjQtNy44MDgtNC44OC0xMS42NzJjLTEuMDY0LTMuMzM2LTQuMTQ0LTUuNi03LjY0LTUuNkgyODh2LTMyaDExLjY3MmMzLjQ5NiwwLDYuNTc2LTIuMjY0LDcuNjMyLTUuNTkyICAgIGMxLjIxNi0zLjg2NCwyLjg1Ni03LjgsNC44OC0xMS42NzJjMS42MTYtMy4xMDQsMS4wMzItNi44ODgtMS40NC05LjM2bC04LjI4OC04LjI4OGwyMi42MjQtMjIuNjI0bDguMjg4LDguMjg4ICAgIGMyLjQ3MiwyLjQ4LDYuMjU2LDMuMDU2LDkuMzYsMS40NGMzLjg3Mi0yLjAyNCw3LjgwOC0zLjY2NCwxMS42NzItNC44OGMzLjMzNi0xLjA2NCw1LjYtNC4xNDQsNS42LTcuNjRWMjg4aDMydjExLjY3MiAgICBjMCwzLjQ5NiwyLjI2NCw2LjU3Niw1LjU5Miw3LjYzMmMzLjg2NCwxLjIxNiw3LjgsMi44NTYsMTEuNjcyLDQuODhjMy4xMDQsMS42MTYsNi44OCwxLjA0LDkuMzYtMS40NGw4LjI4OC04LjI4OGwyMi42MjQsMjIuNjI0ICAgIGwtOC4yODgsOC4yODhjLTIuNDcyLDIuNDcyLTMuMDU2LDYuMjU2LTEuNDQsOS4zNmMyLjAyNCwzLjg3MiwzLjY2NCw3LjgwOCw0Ljg4LDExLjY3MmMxLjA2NCwzLjMzNiw0LjE0NCw1LjYsNy42NCw1LjZINDY0VjM5MnoiIGZpbGw9IiMyMmJiYjQiLz4KCTwvZz4KPC9nPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0zNzYsMzI4Yy0yNi40NzIsMC00OCwyMS41MjgtNDgsNDhzMjEuNTI4LDQ4LDQ4LDQ4czQ4LTIxLjUyOCw0OC00OFM0MDIuNDcyLDMyOCwzNzYsMzI4eiBNMzc2LDQwOCAgICBjLTE3LjY0OCwwLTMyLTE0LjM1Mi0zMi0zMnMxNC4zNTItMzIsMzItMzJzMzIsMTQuMzUyLDMyLDMyUzM5My42NDgsNDA4LDM3Niw0MDh6IiBmaWxsPSIjMjJiYmI0Ii8+Cgk8L2c+CjwvZz4KPGc+Cgk8Zz4KCQk8cGF0aCBkPSJNMTU3LjY1Niw2MS42NTZsLTExLjMxMi0xMS4zMTJsLTU2LDU2Yy0zLjEyOCwzLjEyOC0zLjEyOCw4LjE4NCwwLDExLjMxMmw1Niw1NmwxMS4zMTItMTEuMzEyTDEwNy4zMTIsMTEyICAgIEwxNTcuNjU2LDYxLjY1NnoiIGZpbGw9IiMyMmJiYjQiLz4KCTwvZz4KPC9nPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0zMzMuNjU2LDEwNi4zNDRsLTU2LTU2bC0xMS4zMTIsMTEuMzEyTDMxNi42ODgsMTEybC01MC4zNDQsNTAuMzQ0bDExLjMxMiwxMS4zMTJsNTYtNTYgICAgQzMzNi43ODQsMTE0LjUyOCwzMzYuNzg0LDEwOS40NzIsMzMzLjY1NiwxMDYuMzQ0eiIgZmlsbD0iIzIyYmJiNCIvPgoJPC9nPgo8L2c+CjxnPgoJPGc+CgkJPHJlY3QgeD0iMTMxLjUwOSIgeT0iOTYuMDE5IiB0cmFuc2Zvcm09Im1hdHJpeCgwLjQ0NzIgLTAuODk0NCAwLjg5NDQgMC40NDcyIDI0LjE0NTcgMjQ3LjEwNjgpIiB3aWR0aD0iMTYwLjk1NSIgaGVpZ2h0PSIxNiIgZmlsbD0iIzIyYmJiNCIvPgoJPC9nPgo8L2c+CjxnPgoJPGc+CgkJPHJlY3QgeD0iMzEyIiB5PSIxNjAiIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgZmlsbD0iIzIyYmJiNCIvPgoJPC9nPgo8L2c+CjxnPgoJPGc+CgkJPHJlY3QgeD0iMzQ0IiB5PSIxNjAiIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgZmlsbD0iIzIyYmJiNCIvPgoJPC9nPgo8L2c+CjxnPgoJPGc+CgkJPHJlY3QgeD0iMzc2IiB5PSIxNjAiIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgZmlsbD0iIzIyYmJiNCIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" alt="web development"/>
                    <h4><?php _e("[:en]Website Development[:ua]Розробка Сайтів[:]"); ?></h4>
                    <div class="we_do_desc">
	                    <?php the_field( 'we_do_development' ); ?>
                    </div>
                </div>
                <div class="we_do_col">
                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTEuOTk5IDUxMS45OTkiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMS45OTkgNTExLjk5OTsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIyNTZweCIgaGVpZ2h0PSIyNTZweCI+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTI5MS41NDYsMzI5LjMzMmMtMTQuMzUsMC0yNi4wMjUsMTEuNjc1LTI2LjAyNSwyNi4wMjVjMCwxNC4zNTEsMTEuNjc1LDI2LjAyNiwyNi4wMjUsMjYuMDI2ICAgIGMxNC4zNTEsMCwyNi4wMjYtMTEuNjc1LDI2LjAyNi0yNi4wMjZDMzE3LjU3MiwzNDEuMDA2LDMwNS44OTcsMzI5LjMzMiwyOTEuNTQ2LDMyOS4zMzJ6IE0yOTEuNTQ2LDM2NC43MTggICAgYy01LjE2MiwwLTkuMzYtNC4yLTkuMzYtOS4zNjFjMC01LjE2Miw0LjE5OC05LjM2LDkuMzYtOS4zNmM1LjE2MiwwLDkuMzYxLDQuMiw5LjM2MSw5LjM2UzI5Ni43MDksMzY0LjcxOCwyOTEuNTQ2LDM2NC43MTh6IiBmaWxsPSIjMjJiYmI0Ii8+Cgk8L2c+CjwvZz4KPGc+Cgk8Zz4KCQk8cGF0aCBkPSJNNDI2LjE4NSw0OS40MjRsMy41NDctMTAuNDQzYzEuNDgtNC4zNTctMC44NTItOS4wODktNS4yMDgtMTAuNTdjLTQuMzUzLTEuNDgtOS4wOSwwLjg1MS0xMC41NzEsNS4yMDlsLTMuNTQzLDEwLjQyOCAgICBjLTYuMDk5LTAuNTA4LTEyLjI0NCwwLjY0Ni0xNy44NzcsMy40MjJjLTguMTg2LDQuMDM2LTE0LjMxMSwxMS4wMTctMTcuMjQ0LDE5LjY1NmwtMzIuNjg4LDk2LjIwNGgtMTAuMDcyTDMzMC44MjYsNDIuNDYgICAgYy0wLjE1OC0xMS4yMzktOS40MjktMjAuMzgzLTIwLjY3LTIwLjM4M2MtMTEuMjM5LDAtMjAuNTEzLDkuMTQzLTIwLjY3MSwyMC4zODJsLTEuNzAzLDEyMC44N2gtMTkuMDg3VjY2LjAyOSAgICBjMC0xLjY1My0wLjQ5MS0zLjI2Ny0xLjQxMi00LjY0MUwyMjguNTk4LDMuNjkzQzIyNy4wNTEsMS4zODUsMjI0LjQ1NywwLDIyMS42NzgsMGMtMi43NzksMC01LjM3NCwxLjM4NS02LjkyLDMuNjkzICAgIGwtMzguNjgyLDU3LjY5NmMtMC45MiwxLjM3My0xLjQxMiwyLjk4Ny0xLjQxMiw0LjY0MXY5Ny4yOTloLTIwLjM0NGMtNC42MDMsMC04LjMzMiwzLjczMS04LjMzMiw4LjMzMiAgICBjMCw0LjYwMiwzLjczLDguMzMyLDguMzMyLDguMzMyaDEuNjc2djI4LjFoLTMyLjIxNmMtMjkuNTQ2LDAtNTMuNTgyLDI0LjAzNi01My41ODIsNTMuNTgydjEyMi4xMzMgICAgYzAsMjkuNTQ2LDI0LjAzNyw1My41ODIsNTMuNTgyLDUzLjU4MmgzMi4yMTZ2MjYuMzMyYzAsMjYuNjE5LDIxLjY1Nyw0OC4yNzYsNDguMjc2LDQ4LjI3NmgxNzUuNjQ1ICAgIGMyNi42MTksMCw0OC4yNzYtMjEuNjU3LDQ4LjI3Ni00OC4yNzZWMTc5Ljk5NGgxLjY3N2M0LjYwMywwLDguMzMyLTMuNzMxLDguMzMyLTguMzMyYzAtNC42MDItMy43My04LjMzMi04LjMzMi04LjMzMmgtMTUuMTA0ICAgIGwyNS4yMjEtNzQuMjIyQzQ0NS4xMTgsNzMuOTksNDM5LjAxOCw1Ny43MjQsNDI2LjE4NSw0OS40MjR6IE0xNTUuOTk0LDM4OS42MzloLTI5LjIxOGMtNC44NjgsMC04LjgyOC0zLjk2LTguODI4LTguODI4VjI2NC42NzUgICAgYzAtNC44NjcsMy45Ni04LjgyOCw4LjgyOC04LjgyOGgyOS4yMThWMzg5LjYzOXogTTE1NS45OTQsMjM5LjE4MmgtMjkuMjE4Yy0xNC4wNTYsMC0yNS40OTMsMTEuNDM1LTI1LjQ5MywyNS40OTN2MTE2LjEzNiAgICBjMCwxNC4wNTYsMTEuNDM3LDI1LjQ5MywyNS40OTMsMjUuNDkzaDI5LjIxOHYxNC40MjNoLTMyLjIxNmMtMjAuMzU3LDAtMzYuOTE3LTE2LjU2LTM2LjkxNy0zNi45MTdWMjYxLjY3NiAgICBjMC0yMC4zNTcsMTYuNTYtMzYuOTE3LDM2LjkxNy0zNi45MTdoMzIuMjE2VjIzOS4xODJ6IE0zNzIuMDM3LDEyOC40OTZsMzMuMTM2LDExLjI1OWwtOC4wMSwyMy41NzRoLTM2Ljk2TDM3Mi4wMzcsMTI4LjQ5NnogICAgIE0zMDYuMTQ3LDQyLjY5NGMwLjAzMS0yLjE4LDEuODI5LTMuOTUzLDQuMDA4LTMuOTUzYzIuMTgsMCwzLjk3NywxLjc3Miw0LjAwNywzLjk1MmwxLjcsMTIwLjYzNmgtMTEuNDE3TDMwNi4xNDcsNDIuNjk0eiAgICAgTTI5My40NzcsMTc5Ljk5NGMwLjQ3MiwwLjE1LDAuOTU5LDAuMjUyLDEuNDU0LDAuMzE2djk0Ljc4NWMwLDQuNTQ4LTMuNyw4LjI0OC04LjI0OCw4LjI0OGMtNC41NDgsMC04LjI0OC0zLjctOC4yNDgtOC4yNDggICAgdi0yNi44NDdjMC0xMy43MzctMTEuMTc3LTI0LjkxMy0yNC45MTMtMjQuOTEzYy0xMy43MzYsMC0yNC45MTMsMTEuMTc1LTI0LjkxMywyNC45MTN2NTIuMDQ4YzAsNC41NDgtMy43MDEsOC4yNDgtOC4yNDksOC4yNDggICAgcy04LjI0OC0zLjctOC4yNDgtOC4yNDhWMTc5Ljk5NEgyOTMuNDc3eiBNMjUyLjAyOCwxNjMuMzI5SDIzMC4wMVY4Mi4wMDJjNy40MzctMC41ODMsMTQuODIyLTEuOTU1LDIyLjAxOC00LjEwM1YxNjMuMzI5eiAgICAgTTIyMS42NzgsMjMuMjk2bDguMjg3LDEyLjM2MWMtMi42NjMsMC44MDgtNS40NDksMS4yMjQtOC4yODYsMS4yMjRjLTIuODQsMC01LjYyNi0wLjQxNS04LjI4OS0xLjIyM0wyMjEuNjc4LDIzLjI5NnogICAgIE0yMDMuODY2LDQ5Ljg2M2M1LjU4OSwyLjQwNSwxMS42MjEsMy42ODIsMTcuODE0LDMuNjgyYzYuMTg4LDAsMTIuMjItMS4yNzgsMTcuODEtMy42ODNsOC4wMzEsMTEuOTc5ICAgIGMtMTYuODE2LDUuMDgyLTM0Ljg3MSw1LjA4Mi01MS42ODgsMEwyMDMuODY2LDQ5Ljg2M3ogTTE5MS4zMjcsNzcuODk5YzcuMTk2LDIuMTQ5LDE0LjU4LDMuNTIsMjIuMDE4LDQuMTAzdjgxLjMyNmgtMjIuMDE4ICAgIFY3Ny44OTl6IE00MTEuNTI5LDQ2My43MjNoLTAuMDAyYzAsMTcuNDMtMTQuMTgxLDMxLjYxMS0zMS42MTEsMzEuNjExSDIwNC4yNzFjLTE3LjQzLDAtMzEuNjExLTE0LjE4MS0zMS42MTEtMzEuNjExVjE3OS45OTQgICAgaDIyLjc4OXYxMjAuMzAyYzAsMTMuNzM3LDExLjE3NywyNC45MTMsMjQuOTE0LDI0LjkxM2MxMy43MzYsMCwyNC45MTMtMTEuMTc1LDI0LjkxMy0yNC45MTN2LTUyLjA0OCAgICBjMC00LjU0OCwzLjctOC4yNDgsOC4yNDgtOC4yNDhjNC41NDgsMCw4LjI0OCwzLjcsOC4yNDgsOC4yNDh2MjYuODQ3YzAsMTMuNzM3LDExLjE3NywyNC45MTMsMjQuOTEzLDI0LjkxMyAgICBjMTMuNzM2LDAsMjQuOTEzLTExLjE3NSwyNC45MTMtMjQuOTEzdi05NC43MWw5OS45MzEtMC4zOTJWNDYzLjcyM3ogTTQyNC4yMDUsODMuNzQ2bC0xMy42Nyw0MC4yM2wtMzMuMTM2LTExLjI1OWwxMy42NjktNDAuMjMxICAgIGMxLjUwNC00LjQyNiw0LjY0MS04LjAwMiw4LjgzNS0xMC4wNjljNC4xOTItMi4wNjgsOC45MzctMi4zNzgsMTMuMzU3LTAuODc0QzQyMi40LDY0LjY0Niw0MjcuMzA4LDc0LjYwNyw0MjQuMjA1LDgzLjc0NnoiIGZpbGw9IiMyMmJiYjQiLz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" alt="web design"/>
                    <h4><?php _e("[:en]Web Design[:ua]Веб Дизайн[:]"); ?></h4>
                    <div class="we_do_desc">
	                    <?php the_field( 'we_do_design' ); ?>
                    </div>
                </div>
                <div class="we_do_col">
                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjI1NnB4IiBoZWlnaHQ9IjI1NnB4IiB2aWV3Qm94PSIwIDAgMTAwIDEwMCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMTAwIDEwMDsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxwYXRoIGQ9Ik01MCwwQzIyLjQzMSwwLDAsMjIuNDMyLDAsNTBjMCwyNy41NywyMi40MzEsNTAsNTAsNTBjMjcuNTY4LDAsNTAtMjIuNDMsNTAtNTBDMTAwLDIyLjQzMiw3Ny41NjgsMCw1MCwweiBNNTAsMi4yODEgICBjMjYuMzA1LDAsNDcuNjg4LDIxLjQxNSw0Ny42ODgsNDcuNzE5YzAsMjYuMzA1LTIxLjM4Myw0Ny42ODgtNDcuNjg4LDQ3LjY4OEMyMy42OTYsOTcuNjg4LDIuMzEyLDc2LjMwNSwyLjMxMiw1MCAgIEMyLjMxMiwyMy42OTYsMjMuNjk2LDIuMjgxLDUwLDIuMjgxeiBNNTAsNy4xMjVjLTE0Ljk4NSwwLTI4LjE3NSw3LjY2OS0zNS44NDQsMTkuMzEyYzEuMDA3LDAuMDMyLDEuOTc3LDAuMDYyLDIuNzgxLDAuMDYyICAgYzQuNDg1LDAsMTEuNDA2LTAuNTYyLDExLjQwNi0wLjU2MmMyLjMxMS0wLjEzNSwyLjU5MSwzLjI1OCwwLjI4MSwzLjUzMWMwLDAtMi4zMjIsMC4zMDItNC45MDYsMC40MzhsMTUuNjI1LDQ2LjQzOGw5LjM3NS0yOC4xNTYgICBMNDIuMDMsMjkuOTA3Yy0yLjMxMS0wLjEzNi00LjUtMC40MzgtNC41LTAuNDM4Yy0yLjMxMi0wLjEzNy0yLjAzMS0zLjY2NywwLjI4MS0zLjUzMWMwLDAsNy4wNjcsMC41NjIsMTEuMjgxLDAuNTYyICAgYzQuNDg0LDAsMTEuNDM4LTAuNTYyLDExLjQzOC0wLjU2MmMyLjMxMi0wLjEzNSwyLjU5NCwzLjI1OCwwLjI4MSwzLjUzMWMwLDAtMi4zMjQsMC4zMDItNC45MDYsMC40MzhMNzEuNDA2LDc2bDQuMjgxLTE0LjMxMiAgIGMxLjg1Mi01LjkzNiwzLjI3OS0xMC4xNzQsMy4yNzktMTMuODQ0YzAtNS4zMDMtMS44OTgtOC45ODctMy41MjktMTEuODQ0Yy0yLjE3NC0zLjUzNS00LjIyMS02LjUyOC00LjIyMS0xMC4wNjIgICBjMC0zLjk0MiwyLjk3Ny03LjU5NCw3LjE4OC03LjU5NGMwLjE4OSwwLDAuMzc4LDAuMDIxLDAuNTYyLDAuMDMxQzcxLjMzOCwxMS4zODMsNjEuMTY2LDcuMTI1LDUwLDcuMTI1eiBNODcuNjI1LDI5LjQwNiAgIGMwLjE4NCwxLjM2NiwwLjMxMiwyLjg1OCwwLjMxMiw0LjQzOGMwLDQuMzUxLTAuODM0LDkuMjI1LTMuMjgxLDE1LjM0NEw3MS41NjIsODcuMDYyQzg0LjMxMiw3OS42MjgsOTIuODc1LDY1LjgyMyw5Mi44NzUsNTAgICBDOTIuODc1LDQyLjU0Myw5MC45NzMsMzUuNTE1LDg3LjYyNSwyOS40MDZ6IE0xMC44MTIsMzIuNTMxQzguNDMzLDM3Ljg2NSw3LjEyNSw0My43ODIsNy4xMjUsNTAgICBjMCwxNi45NzcsOS44NDgsMzEuNjQzLDI0LjE1NiwzOC41OTRMMTAuODEyLDMyLjUzMXogTTUwLjc1LDUzLjc1TDM3Ljg3NSw5MS4xNTZjMy44NDQsMS4xMzEsNy45MTYsMS43MTksMTIuMTI1LDEuNzE5ICAgYzQuOTk0LDAsOS43OTItMC44MzgsMTQuMjUtMi40MDZjLTAuMTEzLTAuMTg0LTAuMjI3LTAuMzgyLTAuMzEyLTAuNTk0TDUwLjc1LDUzLjc1eiIgZmlsbD0iIzIyYmJiNCIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" alt="wordpress"/>
                    <h4>WordPress</h4>
                    <div class="we_do_desc">
	                    <?php the_field( 'we_do_wordpress' ); ?>
                    </div>
                </div>
            </div>
            <div class="button_holder"><a href="javascript:;" class="button go_next"><?php _e("[:en]Let's talk[:ua]Поспілкуватись[:]"); ?></a></div>
        </div>
    </section>

    <section id="contact_us">
        <div class="container">
            <h2><?php _e("[:en]Contact Us[:ua]Контакти[:]"); ?></h2>
            <div class="contact_row">
	            <?php
                $tel = get_field('tel', 'option');
                $mail = get_field('mail', 'option');
                ?>
                <a href="mailto:<?php echo $mail; ?>">
                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDQ4NS4yMTEgNDg1LjIxMSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDg1LjIxMSA0ODUuMjExOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPHBhdGggZD0iTTQ4NS4yMTEsMzYzLjkwNmMwLDEwLjYzNy0yLjk5MiwyMC40OTgtNy43ODUsMjkuMTc0TDMyNC4yMjUsMjIxLjY3bDE1MS41NC0xMzIuNTg0ICAgYzUuODk1LDkuMzU1LDkuNDQ2LDIwLjM0NCw5LjQ0NiwzMi4yMTlWMzYzLjkwNnogTTI0Mi42MDYsMjUyLjc5M2wyMTAuODYzLTE4NC41Yy04LjY1My00LjczNy0xOC4zOTctNy42NDItMjguOTA4LTcuNjQySDYwLjY1MSAgIGMtMTAuNTI0LDAtMjAuMjcxLDIuOTA1LTI4Ljg4OSw3LjY0MkwyNDIuNjA2LDI1Mi43OTN6IE0zMDEuMzkzLDI0MS42MzFsLTQ4LjgwOSw0Mi43MzRjLTIuODU1LDIuNDg3LTYuNDEsMy43MjktOS45NzgsMy43MjkgICBjLTMuNTcsMC03LjEyNS0xLjI0Mi05Ljk4LTMuNzI5bC00OC44Mi00Mi43MzZMMjguNjY3LDQxNS4yM2M5LjI5OSw1LjgzNCwyMC4xOTcsOS4zMjksMzEuOTgzLDkuMzI5aDM2My45MTEgICBjMTEuNzg0LDAsMjIuNjg3LTMuNDk1LDMxLjk4My05LjMyOUwzMDEuMzkzLDI0MS42MzF6IE05LjQ0OCw4OS4wODVDMy41NTQsOTguNDQsMCwxMDkuNDI5LDAsMTIxLjMwNXYyNDIuNjAyICAgYzAsMTAuNjM3LDIuOTc4LDIwLjQ5OCw3Ljc4OSwyOS4xNzRsMTUzLjE4My0xNzEuNDRMOS40NDgsODkuMDg1eiIgZmlsbD0iI0ZGRkZGRiIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" alt="email"/>
                    <?php echo $mail; ?>
                </a>
                <a href="tel:+38<?php echo preg_replace('/[^0-9]/', '', $tel); ?>" class="tel_to">
                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDM0OC4wNzcgMzQ4LjA3NyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMzQ4LjA3NyAzNDguMDc3OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPGc+CgkJPGc+CgkJCTxwYXRoIGQ9Ik0zNDAuMjczLDI3NS4wODNsLTUzLjc1NS01My43NjFjLTEwLjcwNy0xMC42NjQtMjguNDM4LTEwLjM0LTM5LjUxOCwwLjc0NGwtMjcuMDgyLDI3LjA3NiAgICAgYy0xLjcxMS0wLjk0My0zLjQ4Mi0xLjkyOC01LjM0NC0yLjk3M2MtMTcuMTAyLTkuNDc2LTQwLjUwOS0yMi40NjQtNjUuMTQtNDcuMTEzYy0yNC43MDQtMjQuNzAxLTM3LjcwNC00OC4xNDQtNDcuMjA5LTY1LjI1NyAgICAgYy0xLjAwMy0xLjgxMy0xLjk2NC0zLjU2MS0yLjkxMy01LjIyMWwxOC4xNzYtMTguMTQ5bDguOTM2LTguOTQ3YzExLjA5Ny0xMS4xLDExLjQwMy0yOC44MjYsMC43MjEtMzkuNTIxTDczLjM5LDguMTk0ICAgICBDNjIuNzA4LTIuNDg2LDQ0Ljk2OS0yLjE2MiwzMy44NzIsOC45MzhsLTE1LjE1LDE1LjIzN2wwLjQxNCwwLjQxMWMtNS4wOCw2LjQ4Mi05LjMyNSwxMy45NTgtMTIuNDg0LDIyLjAyICAgICBDMy43NCw1NC4yOCwxLjkyNyw2MS42MDMsMS4wOTgsNjguOTQxQy02LDEyNy43ODUsMjAuODksMTgxLjU2NCw5My44NjYsMjU0LjU0MWMxMDAuODc1LDEwMC44NjgsMTgyLjE2Nyw5My4yNDgsMTg1LjY3NCw5Mi44NzYgICAgIGM3LjYzOC0wLjkxMywxNC45NTgtMi43MzgsMjIuMzk3LTUuNjI3YzcuOTkyLTMuMTIyLDE1LjQ2My03LjM2MSwyMS45NDEtMTIuNDNsMC4zMzEsMC4yOTRsMTUuMzQ4LTE1LjAyOSAgICAgQzM1MC42MzEsMzAzLjUyNywzNTAuOTUsMjg1Ljc5NSwzNDAuMjczLDI3NS4wODN6IiBmaWxsPSIjZmZmZmZmIi8+CgkJPC9nPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" alt="phone"/>
                    <?php echo $tel; ?>
                </a>
            </div>
            <h3><?php _e("[:en]Write us a Letter[:ua]Напишіть нам Листа[:]"); ?></h3>
			<?php echo do_shortcode('[contact-form-7 id="4" title="Contact Form"]'); ?>
            <h3><?php _e("[:en]Come to Visit us[:ua]Завітайте в Гості[:]"); ?></h3>
        </div>
    </section>
    <?php if ( $map = get_field('map') ) :
        echo do_shortcode('[googlemap id="map" infobox="'. $map['address'] .'" coordinates="' .$map['lat']. ', ' .$map['lng']. '"][{"featureType":"all","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#232323"}]},{"featureType":"all","elementType":"geometry.stroke","stylers":[{"visibility":"on"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"poi.attraction","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"poi.attraction","elementType":"geometry.stroke","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#c50000"},{"lightness":17},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#0f252e"},{"lightness":17}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#22bbb4"}]}][/googlemap]');
    endif; ?>

<?php get_footer(); ?>