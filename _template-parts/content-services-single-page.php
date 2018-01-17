<?php
global $images_dir;

if ( have_rows('content_sections') ) : ?>

	<div class="container-fluid page-Content">

		<?php
		while ( have_rows('content_sections') ) : the_row(); ?>

			<?php
			if ( get_row_layout() == 'contained_content' ) :
				$section_id = get_sub_field('section_id');
				$bg_color_obj = get_sub_field_object('background_color');
				if ( $bg_color_obj ) {
					$bg_color = 'bgc-' . $bg_color_obj['value'];
				} ?>

				<section class="row section-Content_Contained <?php echo $bg_color; ?>"
					<?php if ( $section_id ) { echo "id='$section_id'"; } ?>>
					<div class="container"><div class="row">

						<?php
						if ( function_exists('yoast_breadcrumb') ) { ?>
							<div class="col-xs-12 site-Breadcrumbs">
								<?php yoast_breadcrumb('<p id="breadcrumbs">','</p>'); ?>
							</div>
						<?php } ?>

						<?php
						if ( get_sub_field('header') ) : ?>
							<header class="col-xs-12 section-Header">
								<?php the_sub_field('header'); ?>
							</header>
							<?php
						endif; ?>

						<div class="col-xs-12">
							<?php the_sub_field('content'); ?>
						</div>

					</div></div>
				</section>

			<?php
			elseif ( get_row_layout() == 'success_stories_slider' ) :
				$section_id = get_sub_field('section_id');
				$bg_color_obj = get_sub_field_object('background_color');
				if ( $bg_color_obj ) {
					$bg_color = 'bgc-' . $bg_color_obj['value'];
				} ?>

				<section class="row section-SuccessStory <?php echo $bg_color; ?>"
					<?php if ( $section_id ) { echo "id='$section_id'"; } ?>>
					<div class="container"><div class="row">

						<?php
						if ( get_sub_field('header') ) : ?>
							<header class="col-xs-12 section-Header">
								<?php the_sub_field('header'); ?>
							</header>
							<?php
						endif; ?>

						<div class="col-xs-12">
							<?php
							$success_stories_objs = get_sub_field('success_stories');
							if ($success_stories_objs) : ?>
								<div class="owl-carousel" id="success-stories-slider">
									<?php
									foreach ($success_stories_objs as $post) :
										setup_postdata($post);
										$testimonial_title = get_field('client_name');
			                            if ( !$testimonial_title ) {
			                                $testimonial_title = get_the_title();
			                            }
			                            $testimonial_description = get_field('client_description');
			                            $testimonial_image = get_field('client_image');
			                            if ( !$testimonial_image ) {
			                                $testimonial_image['url'] = $images_dir . '/ph-Profile.jpg';
			                            } ?>
										<div class="item card testimonial">
			                                <img class="testimonial-image" src="<?php echo $testimonial_image['url']; ?>" alt="<?php echo $testimonial_image['alt']; ?>" />
			                                <blockquote>
			                                    <?php the_field('client_testimonial'); ?>
			                                    <cite>
			                                        <h4><?php echo $testimonial_title; ?></h4>
			                                        <?php if ( $testimonial_description ) { ?><p><?php echo $testimonial_description; ?></p><?php } ?>
			                                    </cite>
			                                </blockquote>
			                            </div>
									<?php
									endforeach; ?>
								</div>
								<?php
								wp_reset_postdata();
							endif; ?>
						</div>

					</div></div>
				</section>

			<?php
			elseif ( get_row_layout() == 'includes' ) :
				$section_id = get_sub_field('section_id');
				$bg_color_obj = get_sub_field_object('background_color');
				if ( $bg_color_obj ) {
					$bg_color = 'bgc-' . $bg_color_obj['value'];
				} ?>

				<section class="row section-Includes <?php echo $bg_color; ?>"
					<?php if ( $section_id ) { echo "id='$section_id'"; } ?>>
					<div class="container">

						<?php
						if ( get_sub_field('header') ) : ?>
							<div class="row"><header class="col-xs-12 section-Header">
								<h2><?php the_sub_field('header'); ?></h2>
							</header></div>
							<?php
						endif; ?>

				        <div class="row">
							<?php
							if ( have_rows('include_items') ) :
							    while ( have_rows('include_items') ) : the_row(); ?>

									<div class="col-xs-12 col-md-6 col-lg-4">
										<div class="section-Includes_Item">
											<?php if ( get_sub_field('icon') ) { ?><i class="fa fa-<?php the_sub_field('icon'); ?>"></i><?php } ?>
											<h4><?php the_sub_field('header'); ?></h4>
											<p><?php the_sub_field('content'); ?></p>
										</div>
									</div>

							    <?php
							    endwhile;
							endif; ?>
				        </div>
				    </div>
				</section>

			<?php
			elseif ( get_row_layout() == 'full-width_content_banner' ) :
				$section_id = get_sub_field('section_id');
				$bg_color_obj = get_sub_field_object('background_color');
				if ( $bg_color_obj ) {
					$bg_color = 'bgc-' . $bg_color_obj['value'];
				} ?>

				<section class="row section-Banner_Content <?php echo $bg_color; ?>"
					<?php if ( $section_id ) { echo "id='$section_id'"; } ?>>
					<div class="container">
				        <div class="row"><div class="col-xs-12">
				            <?php the_sub_field('content'); ?>
				        </div></div>
				    </div>
				</section>

			<?php
			elseif ( get_row_layout() == 'accordion' ) :
				$include_content = get_sub_field('include_content');
				$section_id = get_sub_field('section_id');
				$bg_color_obj = get_sub_field_object('background_color');
				if ( $bg_color_obj ) {
					$bg_color = 'bgc-' . $bg_color_obj['value'];
				} ?>

				<section class="row section-Accordion <?php echo $bg_color; ?>"
					<?php if ( $section_id ) { echo "id='$section_id'"; } ?>>

					<?php
					if ( get_sub_field('header') ) : ?>
						<header class="col-xs-12 section-Header">
							<?php the_sub_field('header'); ?>
						</header>
						<?php
					endif; ?>

					<div class="container"><div class="row">
						<?php if ( $include_content ) { ?>
							<div class="col-xs-12 col-md-7">
								<?php
								if ( have_rows('accordion_items') ) : ?>
									<div class="section-Accordion_Items">
										<?php
										while ( have_rows('accordion_items') ) : the_row(); ?>

											<div class="section-Accordion_Item visible">
												<button><h4><?php the_sub_field('question'); ?></h4> <i class="fa fa-minus"></i></button>
												<div class="section-Accordion_ItemContent"><?php the_sub_field('answer'); ?></div>
											</div>

										<?php
										endwhile; ?>
									</div>
								<?php
								endif; ?>
							</div>
							<div class="col-xs-12 col-md-5 section-Accordion_Content">
								<?php the_sub_field('content'); ?>
							</div>
						<?php } else { ?>
							<div class="col-xs-12">
								<?php
								if ( have_rows('accordion_items') ) : ?>
									<div class="section-Accordion_Items">
										<?php
										while ( have_rows('accordion_items') ) : the_row(); ?>

											<div class="section-Accordion_Item visible">
												<button><h4><?php the_sub_field('question'); ?></h4> <i class="fa fa-minus"></i></button>
												<div class="section-Accordion_ItemContent"><?php the_sub_field('answer'); ?></div>
											</div>

										<?php
										endwhile; ?>
									</div>
								<?php
								endif; ?>
							</div>
						<?php } ?>
					</div></div>
				</section>

			<?php
			elseif ( get_row_layout() == 'call-to-action_bar' ) :
				?>

				<section class="row section-CallToActionBar">
					<div class="container"><div class="row">

						<div class="col-xs-12">
							<div class="section-CallToActionBar_Content"><?php the_sub_field('content_-_left'); ?></div>
							<a href="<?php the_sub_field('button_url'); ?>" class="btn btn-blue"><?php the_sub_field('button_text'); ?></a>
						</div>

					</div></div>
				</section>

			<?php
			elseif ( get_row_layout() == 'blog_posts' ) : ?>

				<section class="row section-Blog-services">
                       		 <div class="container"><div class="row">

					<?php
					if ( get_sub_field('title') ) : ?>
						<header class="col-xs-12 section-Header">
							<h2><?php the_sub_field('title'); ?></h2>
						</header>
						<?php
					endif; ?>

                            		<div class="col-xs-12">

						<?php $post_objects = get_sub_field('selected_posts');
						if( $post_objects ): ?>
    						<div class="row posts-Feed">
    						<?php foreach( $post_objects as $post): ?>
        					<?php setup_postdata($post); ?>
							<div class="col-xs-6 col-sm-3 post-FeedItem">
						 	<?php get_template_part( '_template-parts/content', 'feed' ); ?>
							</div>
						<?php endforeach; ?>
    						</div>
    						<?php wp_reset_postdata(); ?>
						<?php endif; ?>

					</div>

					</div></div>
				</section>
				
			
				<?php elseif ( get_row_layout() == 'icon_text_blocks' ) : ?>
					<section class="row section-Icons-services icon-size-<?php echo esc_attr(get_sub_field('icon_size') ?: 'large'); ?>">
						
						<?php
						if ( get_sub_field('header') ) : ?>
							<header class="col-xs-12 section-Header">
								<h2><?php the_sub_field('header'); ?></h2>
							</header>
						<?php
						endif; ?>
						
                       		 <div class="container">
                       		 <div class="row">
		                        
			<?php if ( have_rows( 'icon_blocks' ) ) : ?>
				<?php while ( have_rows( 'icon_blocks' ) ) : the_row(); ?>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="service-icon"><?php the_sub_field( 'icon' ); ?></div>
					<div class="service-icon-text"><?php the_sub_field( 'icon_text' ); ?></div>
								 </div>
				<?php endwhile; ?>
			<?php else : ?>
				<?php // no rows found ?>
			<?php endif; ?>
			
			</div>
					</div></div>
				</section>
			

			<?php
			endif; // get_row_layout() ?>

		<?php
		endwhile; // have_rows() ?>

	</div> <!-- /.container-fluid.page-Content -->

<?php
endif; // have_rows() ?>
