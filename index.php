<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme.
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 */

get_header();
?>

<div class="container">

    <?php
	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) : ?>
			<header>
				<h1><?php single_post_title(); ?></h1>
			</header>

		<?php
		endif;

		/* Start the Loop */
		while ( have_posts() ) : the_post();

            get_template_part( '_template-parts/content', get_post_format() );

        endwhile;

	endif; ?>

</div> <!-- /.container -->

<?php get_footer(); ?>
