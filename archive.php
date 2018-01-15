<?php
/**
 * The template for displaying archive pages.
 */

get_header();
?>

<?php
get_template_part('_template-parts/component', 'blog-banner');

aa_header_banner(); ?>

<div class="container-fluid page-Content">
	<section class="row section-BlogArchive">
		<div class="container">

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

            <div class="row posts-Feed">
                <div class="col-xs-12 col-lg-8 post-FeedItem">

					<header class="archive-Header">
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<?php
					if ( have_posts() ) : ?>

						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( '_template-parts/content', 'feed' );

						endwhile;

					else :

						get_template_part( '_template-parts/content', 'none' );

					endif; ?>

					<div class="posts-Navigation">
						<?php posts_nav_link('', 'Previous Page', 'Next Page'); ?>
					</div>

                </div>

                <div class="hidden-md-down col-lg-4 post-Sidebar">
                    <?php get_sidebar(); ?>
            </div>

        </div>
    </section>
</div>

<?php get_footer(); ?>
