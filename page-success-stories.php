<?php
/**
 * Template Name: Success Stories
 */

get_header();
?>

<?php
while ( have_posts() ) : the_post();

    get_template_part( '_template-parts/content', 'page-success-stories' );

    aa_footer_banner();

endwhile; // End of the loop.
?>

<?php get_footer(); ?>
