<?php
/**
 * Template Name: Custom Page Template
 */

get_header();

global $images_dir;
?>

<?php
while ( have_posts() ) : the_post(); ?>

    <?php get_template_part('_template-parts/component', 'page-banner'); ?>

    <?php aa_header_banner(); ?>

    <?php get_template_part( '_template-parts/content', 'custom-page' ); ?>

    <?php aa_footer_banner(); ?>

<?php
endwhile; // End of the loop. ?>

<?php get_footer(); ?>
