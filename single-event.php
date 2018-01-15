<?php
/**
 * The template for displaying single events.
 */

get_header();

global $images_dir;
?>

<?php
while ( have_posts() ) : the_post();

    $args = array(
    'post_type' => 'page',
    'p' => 496,
    );
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post();

            get_template_part('_template-parts/component', 'page-banner');

        endwhile;
        wp_reset_postdata();
    endif;

    get_template_part( '_template-parts/content', 'event' ); ?>

<?php
endwhile; // End of the loop. ?>

<?php get_footer(); ?>
