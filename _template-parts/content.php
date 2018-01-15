<?php
/**
 * Template part for displaying posts.
 *
 */
?>

<div class="container-fluid page-Content">
	<section class="row">
		<div class="container"><div class="row">

			<header class="col-xs-12 entry-header">
				<?php
					if ( is_single() ) {
						the_title( '<h1 class="entry-title">', '</h1>' );
					} else {
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					}

				if ( 'post' === get_post_type() ) : ?>
		    		<div class="entry-meta">

		    		</div><!-- /.entry-meta -->
				<?php
				endif; ?>
			</header><!-- /.entry-header -->

			<div class="col-xs-12 entry-content">
				<?php the_content(); ?>
			</div><!-- /.entry-content -->

			<footer class="col-xs-12 entry-footer">
				<?php
				the_post_navigation();

			    // If comments are open or we have at least one comment, load up the comment template.
			    if ( comments_open() || get_comments_number() ) :
			        comments_template();
			    endif; ?>
			</footer><!-- /.entry-footer -->

		</div></div>
	</section>
</div>
