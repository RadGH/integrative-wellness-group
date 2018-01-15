<?php
/**
 * Template part for displaying posts feed.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>

	<?php
	if ( has_post_thumbnail() ) { ?>
		<div class="col-xs-12 post-Thumbnail-static"><?php the_post_thumbnail(); ?></div>
	<?php
	} ?>

	<div class="post-ContentWrapper col-xs-12">
        <header class="post-Header">
            <div class="post-Meta">
                <?php
				if ( get_the_category() ) { ?>
					<p class="post-Category"><?php the_category(', '); ?> / </p>
				<?php
				} ?>
                <p class="post-Date"><?php the_time('n/d/y'); ?></p>
            </div>
    		<h2 class="post-Title"><?php the_title(); ?></h2>
    	</header><!-- /.post-Header -->

    	<div class="post-Content">
    		<?php the_content(); ?>
    	</div><!-- /.post-Content -->

    	<footer class="post-Footer">

			<div class="post-Share">
				<?php echo do_shortcode('[ssba]'); ?>
			</div>
			<div class="row post-Author">
				<?php
				$author_avatar = get_avatar(get_the_author_id(), 256);
				if ( $author_avatar ) { ?>
					<div class="col-xs-12 col-md-6 post-Author_Image"><?php echo $author_avatar; ?></div>
				<?php } ?>
				<div class="col-xs-12 col-md-6 post-Author_Bio">
					<h2><?php echo sprintf('%s %s', get_the_author_meta('first_name'), get_the_author_meta('last_name')); ?></h2>
					<?php the_author_meta('user_description', get_the_author_id()); ?>
				</div>
			</div>
			<?php // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) : ?>
                <div class="row post-Comments">
                	<?php comments_template(); ?>
                </div>
			<?php
            endif; ?>

    	</footer><!-- /.post-Footer -->
	</div>

</article><!-- /#post-## -->
