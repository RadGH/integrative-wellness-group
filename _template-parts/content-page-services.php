<?php
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
			elseif ( get_row_layout() == 'services_rows' ) : ?>

				<section class="row section-ServicesRows">
					<div class="container"><div class="row">
						<div class="col-xs-12">
							<?php
							if ( have_rows('services') ) :
							    while ( have_rows('services') ) : the_row();
									$block_background_image = get_sub_field('block_background_image');
									$service_page_url = get_sub_field('service_page_link');
									$bg_color_obj = get_sub_field_object('block_background_color');
									if ( $bg_color_obj ) {
										$bg_color = 'bgc-' . $bg_color_obj['value'];
									} ?>

									<div class="row section-ServicesRows_Row">
										<div class="col-xs-12 col-md-6">
											<div class="section-ServicesRows_Block <?php echo $bg_color; ?>" style="background-image: url('<?php echo $block_background_image["url"]; ?>');">
												<?php if ( $service_page_url ) { ?><a href="<?php echo $service_page_url; ?>"></a><?php } ?>
												<div class="section-ServicesRows_BlockContent">
													<?php the_sub_field('block_content'); ?>
												</div>
	                                        </div>
										</div>
										<div class="col-xs-12 col-md-6">
											<div class="section-ServicesRows_ServiceContent">
												<?php the_sub_field('content'); ?>
											</div>
										</div>
									</div>

							    <?php
							    endwhile;
							endif; ?>
						</div>
					</div></div>
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
			elseif ( get_row_layout() == 'services_number_blocks' ) :
				$section_id = get_sub_field('section_id');
				$bg_color_obj = get_sub_field_object('background_color');
				if ( $bg_color_obj ) {
					$bg_color = 'bgc-' . $bg_color_obj['value'];
				} ?>

				<section class="row section-ServicesNumberBlocks">
					<div class="container"><div class="row">

						<?php
						if ( get_sub_field('header') ) : ?>
							<header class="col-xs-12 section-Header">
								<?php the_sub_field('header'); ?>
							</header>
							<?php
						endif; ?>

						<div class="col-xs-12 section-ServicesNumberBlocks_Row">
							<?php
							if ( have_rows('number_blocks') ) :
							    while ( have_rows('number_blocks') ) : the_row(); ?>

									<div class="section-ServicesNumberBlocks_Block">
										<p class="number"><?php the_sub_field('number'); ?></p>
										<h2><?php the_sub_field('heading'); ?></h2>
										<p class="subheading"><?php the_sub_field('subheading'); ?></p>
									</div>

							    <?php
							    endwhile;
							endif; ?>
						</div>
					</div></div>
				</section>

			<?php
			endif;  // get_row_layout() ?>

		<?php
		endwhile; // have_rows() ?>

	</div> <!-- /.container-fluid.page-Content -->

<?php
endif; // have_rows() ?>
