<?php
/**
 * Template part for displaying page content in page-success-stories.php
 *
 */

global $images_dir;
?>

<div class="container-fluid page-Content">
	<section class="row section-SuccessStory">
		<div class="container"><div class="row">

			<header class="col-xs-12 section-Header">
				<?php the_content(); ?>
			</header>

			<div class="col-xs-12">
				<?php
				$success_stories_objs = get_field('stories');
				if ($success_stories_objs) :
					$story_count = 0; ?>
					<div class="row">
						<?php
						foreach ($success_stories_objs as $post) :
							$story_count++;
							setup_postdata($post);
							$testimonial_title = get_field('client_name');
							if ( !$testimonial_title ) {
								$testimonial_title = get_the_title();
							}
							$testimonial_description = get_field('client_description');
							$testimonial_image = get_field('client_image');
							if ( !$testimonial_image ) {
								$testimonial_image['url'] = $images_dir . '/ph-Profile.jpg';
							}
							if ( $story_count == 1 || $story_count == 2 ) { ?>
								<div class="col-xs-12 col-md-6">
							<?php } else { ?>
								<div class="col-xs-12">
							<?php } ?>
									<div class="item card testimonial <?php if ( $story_count == 1 || $story_count == 2 ) { echo 'story-2Col'; } else { echo 'story-Single group'; } ?>">
										<img class="testimonial-image" src="<?php echo $testimonial_image['url']; ?>" alt="<?php echo $testimonial_image['alt']; ?>" />
										<blockquote>
											<?php the_field('client_testimonial'); ?>
											<cite>
												<h4><?php echo $testimonial_title; ?></h4>
												<?php if ( $testimonial_description ) { ?><p><?php echo $testimonial_description; ?></p><?php } ?>
											</cite>
											<?php if( get_field('video') ): ?>
											<div class="video">
												<?php the_field('video'); ?>
											</div>
											<?php endif; ?>
										</blockquote>
									</div>
								</div>
								<?php
								if ($story_count == 2 ) {?>
							</div><div class="row">
							<?php
							}
							if ( $story_count == 3 ) { $story_count = 0; } ?>
						<?php
						endforeach;
						wp_reset_postdata(); ?>
					</div>
				<?php
				endif; ?>
			</div>

		</div></div>
	</section>
</div>
