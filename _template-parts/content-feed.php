<?php
/**
 * Template part for displaying posts feed.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>

	<?php
	if ( has_post_thumbnail() ) {
        $thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		echo '<a class="post-Thumbnail" href="' . get_permalink() . '"><img src="' . $thumbnail_url . '"></a>';
	} ?>

	<div class="post-ContentWrapper">
        <header class="post-Header">
            <div class="post-Meta">
                <?php
				if ( get_the_category() ) { ?>
					<p class="post-Category"><?php the_category(', '); ?> / </p>
				<?php
				} ?>
                <p class="post-Date"><?php the_time('n/d/y'); ?></p>
            </div>
    		<h2 class="post-Title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    	</header><!-- /.post-Header -->

    	<div class="post-Content">
    		<?php echo aa_get_the_excerpt(); ?>
    	</div><!-- /.post-Content -->

    	<footer class="post-Footer">
    		<a href="<?php the_permalink(); ?>">Read More</a>
    	</footer><!-- /.post-Footer -->
	</div>
	<div style="clear:both;"></div>

</article><!-- /#post-## -->
