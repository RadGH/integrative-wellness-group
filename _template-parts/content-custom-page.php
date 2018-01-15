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
			elseif ( get_row_layout() == 'full-width_content' ) :
				$section_id = get_sub_field('section_id');
				$bg_color_obj = get_sub_field_object('background_color');
				if ( $bg_color_obj ) {
					$bg_color = 'bgc-' . $bg_color_obj['value'];
				} ?>

				<section class="row section-Content_FullWidth <?php echo $bg_color; ?>"
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
			elseif ( get_row_layout() == 'full-width_image' ) :
				$section_id = get_sub_field('section_id');
				$image = get_sub_field('image'); ?>

				<section class="row section-Image_FullWidth <?php echo $bg_color; ?>"
					<?php if ( $section_id ) { echo "id='$section_id'"; } ?>>
					<div class="col-xs-12">
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				    </div>
				</section>

			<?php
			elseif ( get_row_layout() == 'images_row' ) :
				$section_id = get_sub_field('section_id');
				$bg_color_obj = get_sub_field_object('background_color');
				if ( $bg_color_obj ) {
					$bg_color = 'bgc-' . $bg_color_obj['value'];
				} ?>

				<section class="row section-ImageRow <?php echo $bg_color; ?>"
					<?php if ( $section_id ) { echo "id='$section_id'"; } ?>>
						<?php
						if ( have_rows('images') ) :
						    while ( have_rows('images') ) : the_row();
								$image = get_sub_field('image'); ?>
								<div class="col-xs-12 col-md-4 section-ImageRow_Image">
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								</div>
						    <?php
						    endwhile;
						endif; ?>
				</section>

			<?php
			elseif ( get_row_layout() == 'new_here_blocks' ) :
				$section_id = get_sub_field('section_id');
				$bg_color_obj = get_sub_field_object('background_color');
				if ( $bg_color_obj ) {
					$bg_color = 'bgc-' . $bg_color_obj['value'];
				} ?>

				<section class="row section-NewHereBlocks <?php echo $bg_color; ?>"
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
							if ( have_rows('blocks') ) :
							    while ( have_rows('blocks') ) : the_row(); ?>

									<div class="card section-NewHereBlocks_Block">
										<?php the_sub_field('block_content'); ?>
									</div>

							    <?php
							    endwhile;
							endif; ?>
						</div>

					</div></div>
				</section>

			<?php
			elseif ( get_row_layout() == 'get_started_blocks' ) :
				$section_id = get_sub_field('section_id');
				$bg_color_obj = get_sub_field_object('background_color');
				if ( $bg_color_obj ) {
					$bg_color = 'bgc-' . $bg_color_obj['value'];
				} ?>

				<section class="row section-GetStartedBlocks <?php echo $bg_color; ?>"
					<?php if ( $section_id ) { echo "id='$section_id'"; } ?>>
					<div class="container"><div class="row">

						<?php
						if ( get_sub_field('header') ) : ?>
							<header class="col-xs-12 section-Header">
								<?php the_sub_field('header'); ?>
							</header>
							<?php
						endif; ?>

						<div class="col-xs-12 section-GetStartedBlocks_Blocks">
							<?php
							if ( have_rows('blocks') ) :
							    while ( have_rows('blocks') ) : the_row(); ?>

									<div class="card section-GetStartedBlocks_Block">
										<?php the_sub_field('block_content'); ?>
									</div>

							    <?php
							    endwhile;
							endif; ?>
						</div>

						<?php
						if ( get_sub_field('footer') ) : ?>
							<footer class="col-xs-12 section-Footer">
								<?php the_sub_field('footer'); ?>
							</footer>
							<?php
						endif; ?>

					</div></div>
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
			endif; // get_row_layout() ?>

		<?php
		endwhile; // have_rows() ?>

	</div> <!-- /.container-fluid.page-Content -->

<?php
endif; // have_rows() ?>
