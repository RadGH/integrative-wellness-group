<?php
/**
 * The template for displaying single team members
 */

get_header();
?>

<?php
while ( have_posts() ) : the_post();

    get_template_part( '_template-parts/content', 'team_member' );

endwhile; // End of the loop.
?>

<?php get_footer(); ?>
