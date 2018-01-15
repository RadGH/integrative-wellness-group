<?php
/**
 * Blog Page
 */

get_header();

global $images_dir;
?>

<?php get_template_part('_template-parts/component', 'blog-banner'); ?>

<?php aa_header_banner(); ?>

<div class="container-fluid page-Content">
	<section class="row section-BlogFeed">
		<div class="container">

            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 1,
                'meta_key' => 'featured_post',
                'meta_value' => true,
            );
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) : ?>
                <div class="row posts-FeaturedPost">
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                        <div class="col-xs-12 post-FeedItem">
                            <?php get_template_part( '_template-parts/content', 'feed-featured' ); ?>
                        </div>

                        <?php endwhile; wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>

            <div class="row posts-Categories">
                <header class="col-xs-12">
                    <h3>Find More On</h3>
                </header>
                    <div class="col-xs-12 col-md-4 post-Categories_Item">
                        <a href="<?php bloginfo('url'); ?>/category/autoimmune-conditions/" class="btn btn-primary">Autoimmune Conditions</a>
                    </div>
                    <div class="col-xs-12 col-md-4 post-Categories_Item">
                        <a href="<?php bloginfo('url'); ?>/category/food-environmental-allergies/" class="btn btn-primary">Food + Environmental Allergies </a>
                    </div>
                    <div class="col-xs-12 col-md-4 post-Categories_Item">
                        <a href="<?php bloginfo('url'); ?>/category/gut-health/" class="btn btn-primary">Gut Health</a>
                    </div>
                    <div class="col-xs-12 col-md-4 post-Categories_Item">
                        <a href="<?php bloginfo('url'); ?>/category/chronic-pain-inflammation/" class="btn btn-primary">Chronic Pain + Inflammatory Conditions</a>
                    </div>
                    <div class="col-xs-12 col-md-4 post-Categories_Item">
                        <a href="<?php bloginfo('url'); ?>/category/lyme-disease/" class="btn btn-primary">Lyme Disease + Lyme Co-infections</a>
                    </div>
                    <div class="col-xs-12 col-md-4 post-Categories_Item">
                        <a href="<?php bloginfo('url'); ?>/category/mold-biotoxin-illness/" class="btn btn-primary">Mold + Biotoxin Illness</a>
                    </div>
                    <div class="col-xs-12 col-md-4 post-Categories_Item">
                        <a href="<?php bloginfo('url'); ?>/category/thyroid-conditions/" class="btn btn-primary">Thyroid Conditions</a>
                    </div>
                    <div class="col-xs-12 col-md-4 post-Categories_Item">
                        <a href="<?php bloginfo('url'); ?>/category/hormones/" class="btn btn-primary">Hormonal Imbalances</a>
                    </div>
                    <div class="col-xs-12 col-md-4 post-Categories_Item">
                        <a href="<?php bloginfo('url'); ?>/category/nutrition-recipes/" class="btn btn-primary">Nutrition + Recipes</a>
                    </div>
                    <div class="col-xs-12 col-md-4 post-Categories_Item">
                        <a href="<?php bloginfo('url'); ?>/category/depression-mentalhealth/" class="btn btn-primary">Depression, Anxiety, and Mental Health</a>
                    </div>
                    <div class="col-xs-12 col-md-4 post-Categories_Item">
                        <a href="<?php bloginfo('url'); ?>/category/fertility/" class="btn btn-primary">Fertility</a>
                    </div>
                     <div class="col-xs-12 col-md-4 post-Categories_Item">
                        <a href="<?php bloginfo('url'); ?>/category/pregnancy-children/" class="btn btn-primary">Pregnancy + Children</a>
                    </div>
            </div>

            <?php
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $args2 = array(
                'post_type' => 'post',
                'posts_per_page' => 4,
		'paged' => $paged,
                'meta_query' => array(
                    array(
                        'key'	  	=> 'featured_post',
                        'value'	  	=> 'true',
                        'compare' 	=> 'NOT IN',
                    ),
                )
            );
            $posts_query = new WP_Query( $args2 );
            if ( $posts_query->have_posts() ) : ?>
                <div class="row posts-Feed">
                    <?php
                    while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>

                        <div class="post-FeedItem">
                            <?php get_template_part( '_template-parts/content', 'feed' ); ?>
                        </div>

                        <?php endwhile; wp_reset_postdata(); ?>
                </div>
	        <div class="row posts-Navigation"><div class="col-xs-12">
                <?php posts_nav_link('', 'Previous Page', 'Next Page'); ?>
		</div></div>
            <?php endif;  ?>

		</div>
	</section>
</div>

<?php aa_footer_banner(); ?>

<?php get_footer(); ?>
