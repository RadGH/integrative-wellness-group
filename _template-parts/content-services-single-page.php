<?php
global $images_dir;

if ( have_rows( 'content_sections' ) ) : ?>
	
	<div class="container-fluid page-Content">
	
	<?php
	while( have_rows( 'content_sections' ) ) : the_row(); ?>
		
		<?php
		// todo:
		// content_columns
		// call-to-action_bar: contact_form and contact_form_id
		if ( get_row_layout() == 'physicians' ) :
			$lead_physician = get_sub_field( 'lead_physician' );
			$supporting_staff = get_sub_field( 'supporting_staff' );
			
			if ( $lead_physician ) {
				ob_start();
				?>
				<div class="physician-group lead-physician">
					<div class="physician-header">
						<h2>Lead Physician</h2>
					</div>
				
					<div class="row physician-row">
						<?php
						$staff_id = $lead_physician;
						
						$image_id = get_field( 'physician_portrait', $staff_id, false );
						if ( !$image_id ) $image_id = get_post_thumbnail_id( $staff_id );
						if ( !$image_id ) $image_id = get_field( 'banner_image', $staff_id, false );
						
						$image_src = $image_id ? wp_get_attachment_image_src( $image_id, 'medium' ) : false;
						?>
						<div class="col-md-12 physician">
							<div class="-image"><a href="<?php echo get_permalink($staff_id); ?>"><div class="circle" style="<?php if ( $image_src ) echo 'background-image: url(', esc_attr($image_src[0]), ');'; ?>"></a></div></div>
							<div class="-name"><a href="<?php echo get_permalink($staff_id); ?>"><?php echo get_the_title( $staff_id ); ?></a></div>
						</div>
					</div>
				</div>
				<?php
				$lead_physician_html = ob_get_clean();
			}
			
			if ( is_array($supporting_staff) && $supporting_staff ) {
				
				ob_start();
				?>
				<div class="physician-group supporting-staff">
					<div class="physician-header">
						<h2>Supporting Staff</h2>
					</div>
					
					<div class="row physician-row">
						<?php
						foreach( (array) $supporting_staff as $staff_id ) {
							$image_id = get_field( 'physician_portrait', $staff_id, false );
							if ( !$image_id ) $image_id = get_post_thumbnail_id( $staff_id );
							if ( !$image_id ) $image_id = get_field( 'banner_image', $staff_id, false );
							
							$image_src = $image_id ? wp_get_attachment_image_src( $image_id, 'medium' ) : false;
							?>
							<div class="col-md-<?php echo round(12 / count($supporting_staff)); ?> <?php if ( count($supporting_staff) == 4 ) echo 'col-xs-6'; ?> physician">
								<div class="-image"><a href="<?php echo get_permalink($staff_id); ?>"><div class="circle" style="<?php if ( $image_src ) echo 'background-image: url(', esc_attr($image_src[0]), ');'; ?>"></a></div></div>
								<div class="-name"><a href="<?php echo get_permalink($staff_id); ?>"><?php echo get_the_title( $staff_id ); ?></a></div>
							</div>
							<?php
						}
	                    ?>
					</div>
				</div>
				<?php
				$supporting_staff_html = ob_get_clean();
			}
			?>
			
			<section class="row section-Physicians">
				<div class="container">
					<div class="row">
						
						<?php if ( $lead_physician && $supporting_staff ) { ?>
							<div class="col-md-4 lead-column">
								<?php echo $lead_physician_html; ?>
							</div>
							<div class="col-md-8 supporting-column">
								<?php echo $supporting_staff_html; ?>
							</div>
						<?php }elseif ( $lead_physician ) { ?>
							<div class="col-md-12 lead-column">
								<?php echo $lead_physician_html; ?>
							</div>
						<?php }elseif ( $supporting_staff ) { ?>
							<div class="col-md-12 supporting-column">
								<?php echo $supporting_staff_html; ?>
							</div>
						<?php } ?>
					
					</div>
				</div>
			</section>
		
		<?php
		elseif ( get_row_layout() == 'image_and_content' ) :
			?>
			
			<section class="row section-Image_And_Content theme-<?php the_sub_field( 'theme' ); ?>">
				<div class="container">
					<div class="row">
						
						<?php if ( get_sub_field( 'image_position' ) === 'right' ) ob_start(); ?>
						<div class="col-md-6 -image">
							<?php $image = get_sub_field( 'image' ); ?>
							<?php if ( $image ) { ?>
								<div class="image-center-stretch"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></div>
							<?php } ?>
						</div>
						<?php if ( get_sub_field( 'image_position' ) === 'right' ) $image_right = ob_get_clean(); ?>
						
						<div class="col-md-6 -content">
							
							<?php
							$t = get_sub_field( 'title' );
							$st = get_sub_field('subtitle');
							if ( $t || $st ) :
								?>
								<header class="section-Header">
									<?php if ( $t ) echo '<h2>', $t, '</h2>'; ?>
									<?php if ( $st ) echo '<h3>', $st, '</h3>'; ?>
								</header>
								<?php
							endif;
							?>
							
							<div class="section-Content">
								<?php the_sub_field( 'content' ); ?>
							</div>
							
						</div>
						
						<?php if ( get_sub_field( 'image_position' ) === 'right' ) echo $image_right; ?>
					
					</div>
				</div>
			</section>
		
		<?php
		elseif ( get_row_layout() == 'contained_content' ) :
			$section_id = get_sub_field( 'section_id' );
			$bg_color_obj = get_sub_field_object( 'background_color' );
			if ( $bg_color_obj ) {
				$bg_color = 'bgc-' . $bg_color_obj['value'];
			} ?>
			
			<section class="row section-Content_Contained <?php echo $bg_color; ?>"
				<?php if ( $section_id ) {
					echo "id='$section_id'";
				} ?>>
				<div class="container">
					<div class="row">
						
						<?php
						if ( function_exists( 'yoast_breadcrumb' ) ) { ?>
							<div class="col-xs-12 site-Breadcrumbs">
								<?php yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' ); ?>
							</div>
						<?php } ?>
						
						<?php
						if ( get_sub_field( 'header' ) ) : ?>
							<header class="col-xs-12 section-Header">
								<?php the_sub_field( 'header' ); ?>
							</header>
						<?php
						endif; ?>
						
						<div class="col-xs-12">
							<?php the_sub_field( 'content' ); ?>
						</div>
					
					</div>
				</div>
			</section>
		
		<?php
		elseif ( get_row_layout() == 'success_stories_slider' ) :
			$section_id = get_sub_field( 'section_id' );
			$bg_color_obj = get_sub_field_object( 'background_color' );
			if ( $bg_color_obj ) {
				$bg_color = 'bgc-' . $bg_color_obj['value'];
			} ?>
			
			<section class="row section-SuccessStory <?php echo $bg_color; ?>"
				<?php if ( $section_id ) {
					echo "id='$section_id'";
				} ?>>
				<div class="container">
					<div class="row">
						
						<?php
						if ( get_sub_field( 'header' ) ) : ?>
							<header class="col-xs-12 section-Header">
								<?php the_sub_field( 'header' ); ?>
							</header>
						<?php
						endif; ?>
						
						<div class="col-xs-12">
							<?php
							$success_stories_objs = get_sub_field( 'success_stories' );
							if ( $success_stories_objs ) : ?>
								<div class="owl-carousel" id="success-stories-slider">
									<?php
									foreach( $success_stories_objs as $post ) :
										setup_postdata( $post );
										$testimonial_title = get_field( 'client_name' );
										if ( !$testimonial_title ) {
											$testimonial_title = get_the_title();
										}
										$testimonial_description = get_field( 'client_description' );
										$testimonial_image = get_field( 'client_image' );
										if ( !$testimonial_image ) {
											$testimonial_image['url'] = $images_dir . '/ph-Profile.jpg';
										} ?>
										<div class="item card testimonial">
											<img class="testimonial-image" src="<?php echo $testimonial_image['url']; ?>" alt="<?php echo $testimonial_image['alt']; ?>" />
											<blockquote>
												<?php the_field( 'client_testimonial' ); ?>
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
					
					</div>
				</div>
			</section>
		
		<?php
		elseif ( get_row_layout() == 'includes' ) :
			$section_id = get_sub_field( 'section_id' );
			$bg_color_obj = get_sub_field_object( 'background_color' );
			if ( $bg_color_obj && !empty($bg_color_obj['value']) ) {
				$bg_color = 'bgc-' . $bg_color_obj['value'][0];
			}
			?>
			
			<section class="row section-Includes <?php echo $bg_color; ?>"
				<?php if ( $section_id ) {
					echo "id='$section_id'";
				} ?>>
				<div class="container">
					
					<?php
					if ( get_sub_field( 'header' ) ) : ?>
						<div class="row">
							<header class="col-xs-12 section-Header">
								<h2><?php the_sub_field( 'header' ); ?></h2>
							</header>
						</div>
					<?php
					endif; ?>
					
					<div class="row">
						<?php
						if ( have_rows( 'include_items' ) ) :
							while( have_rows( 'include_items' ) ) : the_row(); ?>
								
								<div class="col-xs-12 col-md-6 col-lg-4">
									<div class="section-Includes_Item">
										<?php if ( get_sub_field( 'icon' ) ) { ?><i class="fa fa-<?php the_sub_field( 'icon' ); ?>"></i><?php } ?>
										<h4><?php the_sub_field( 'header' ); ?></h4>
										<p><?php the_sub_field( 'content' ); ?></p>
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
			$section_id = get_sub_field( 'section_id' );
			$bg_color_obj = get_sub_field_object( 'background_color' );
			if ( $bg_color_obj ) {
				$bg_color = 'bgc-' . $bg_color_obj['value'];
			} ?>
			
			<section class="row section-Banner_Content <?php echo $bg_color; ?>"
				<?php if ( $section_id ) {
					echo "id='$section_id'";
				} ?>>
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<?php the_sub_field( 'content' ); ?>
						</div>
					</div>
				</div>
			</section>
		
		<?php
		elseif ( get_row_layout() == 'accordion' ) :
			$include_content = get_sub_field( 'include_content' );
			$section_id = get_sub_field( 'section_id' );
			$bg_color_obj = get_sub_field_object( 'background_color' );
			if ( $bg_color_obj ) {
				$bg_color = 'bgc-' . $bg_color_obj['value'];
			} ?>
			
			<section class="row section-Accordion <?php echo $bg_color; ?>"
				<?php if ( $section_id ) {
					echo "id='$section_id'";
				} ?>>
				
				<?php
				if ( get_sub_field( 'header' ) ) : ?>
					<header class="col-xs-12 section-Header">
						<?php the_sub_field( 'header' ); ?>
					</header>
				<?php
				endif; ?>
				
				<div class="container">
					<div class="row">
						<?php if ( $include_content ) { ?>
							<div class="col-xs-12 col-md-7">
								<?php
								if ( have_rows( 'accordion_items' ) ) : ?>
									<div class="section-Accordion_Items">
										<?php
										while( have_rows( 'accordion_items' ) ) : the_row(); ?>
											
											<div class="section-Accordion_Item visible">
												<button><h4><?php the_sub_field( 'question' ); ?></h4> <i class="fa fa-minus"></i></button>
												<div class="section-Accordion_ItemContent"><?php the_sub_field( 'answer' ); ?></div>
											</div>
										
										<?php
										endwhile; ?>
									</div>
								<?php
								endif; ?>
							</div>
							<div class="col-xs-12 col-md-5 section-Accordion_Content">
								<?php the_sub_field( 'content' ); ?>
							</div>
						<?php }else{ ?>
							<div class="col-xs-12">
								<?php
								if ( have_rows( 'accordion_items' ) ) : ?>
									<div class="section-Accordion_Items">
										<?php
										while( have_rows( 'accordion_items' ) ) : the_row(); ?>
											
											<div class="section-Accordion_Item visible">
												<button><h4><?php the_sub_field( 'question' ); ?></h4> <i class="fa fa-minus"></i></button>
												<div class="section-Accordion_ItemContent"><?php the_sub_field( 'answer' ); ?></div>
											</div>
										
										<?php
										endwhile; ?>
									</div>
								<?php
								endif; ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</section>
		
		<?php
		elseif ( get_row_layout() == 'call-to-action_bar' ) :
			?>
			
			<section class="row section-CallToActionBar">
				<div class="container">
					<div class="row">
						
						<div class="col-xs-12">
							<div class="section-CallToActionBar_Content"><?php the_sub_field( 'content_-_left' ); ?></div>
							<a href="<?php the_sub_field( 'button_url' ); ?>" class="btn btn-blue"><?php the_sub_field( 'button_text' ); ?></a>
						</div>
					
					</div>
				</div>
			</section>
		
		<?php
		elseif ( get_row_layout() == 'blog_posts' ) : ?>
			
			<section class="row section-Blog-services">
				<div class="container">
					<div class="row">
						
						<?php
						if ( get_sub_field( 'title' ) ) : ?>
							<header class="col-xs-12 section-Header">
								<h2><?php the_sub_field( 'title' ); ?></h2>
							</header>
						<?php
						endif; ?>
						
						<div class="col-xs-12">
							
							<?php $post_objects = get_sub_field( 'selected_posts' );
							if ( $post_objects ): ?>
								<div class="row posts-Feed">
									<?php foreach( $post_objects as $post ): ?>
										<?php setup_postdata( $post ); ?>
										<div class="col-xs-6 col-sm-3 post-FeedItem">
											<?php get_template_part( '_template-parts/content', 'feed' ); ?>
										</div>
									<?php endforeach; ?>
								</div>
								<?php wp_reset_postdata(); ?>
							<?php endif; ?>
						
						</div>
					
					</div>
				</div>
			</section>
		
		
		<?php elseif ( get_row_layout() == 'icon_text_blocks' ) : ?>
			<section class="row section-Icons-services icon-size-<?php echo esc_attr( get_sub_field( 'icon_size' ) ?: 'large' ); ?>">
				
				<?php
				if ( get_sub_field( 'header' ) ) : ?>
					<header class="col-xs-12 section-Header">
						<h2><?php the_sub_field( 'header' ); ?></h2>
					</header>
				<?php
				endif; ?>
				
				<div class="container">
					<div class="row">
						
						<?php if ( have_rows( 'icon_blocks' ) ) : ?>
							<?php while( have_rows( 'icon_blocks' ) ) : the_row(); ?>
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
