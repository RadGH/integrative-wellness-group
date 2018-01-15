<?php
/**
 * The template for displaying archive pages.
 */

get_header();
?>

<div class="container-fluid page-Content">
	<section class="row section-BlogArchive">
		<div class="container">

            <div class="row posts-Feed">
                <div class="col-xs-12 col-lg-8 post-FeedItem">

					<header class="archive-Header">
						<h1><?php printf( esc_html__( 'Search Results for: "%s"' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
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
                    <aside class="">
                        <div class="widget"></div>
                        <div class="widget"></div>
                        <div class="widget"></div>
                    </aside>
                </div>
            </div>

        </div>
    </section>
</div>

<?php get_footer(); ?>
