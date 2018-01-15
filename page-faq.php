<?php
/**
 * FAQ Page
 */

get_header();
?>

<?php
while ( have_posts() ) : the_post();

    get_template_part( '_template-parts/content', 'page-faq' );

    aa_footer_banner();

endwhile; // End of the loop.
?>

<?php get_footer(); ?>
