<div class="container-fluid page-Content">
	<section class="row section-Titleheader">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h3>IWG's Approach to<br />
					<strong><em><?php the_title(); ?></em></strong></h3>
				</div>
			</div>
		</div>
	</section>
<?php if ( have_rows( 'flexible_content' ) ): ?>
	<?php while ( have_rows( 'flexible_content' ) ) : the_row(); ?>
	
		<?php if ( get_row_layout() == 'testimonial_section' ) : ?>
		<!-- TESTIMONIAL SECTION -->
		<section class="row section-Testimonialblock">
			<div class="container">
				<div class="row textimonial-block">
				
			<?php $author_headshot = get_sub_field( 'author_headshot' ); ?>
			<?php if ( $author_headshot ) { ?>
					<div class="testimonial-img col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<?php echo wp_get_attachment_image( $author_headshot, 'treatment-quote' ); ?>
					</div>
			<?php } ?>
					<div class="testimonial-text col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<?php the_sub_field( 'autor_text' ); ?>
					</div>
				</div>
			</div>
		</section>
			
		<?php elseif ( get_row_layout() == 'two_column_text_section' ) : ?>
		<!-- TWO COLUMN SECTION -->
		<section class="row section-Twocolumns">
			<div class="container">
				<div class="row">
				<div class="col-1 col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<?php the_sub_field( 'column_one_text' ); ?>
			</div>
			<div class="col-2 col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<?php the_sub_field( 'column_two_text' ); ?>
			</div>
			</div>
		</div>
	</section>
			
		<?php elseif ( get_row_layout() == 'what_we_found_section' ) : ?>
		<!-- WHAT WE FOUND SECTION -->
		<section class="row section-Whatwefound">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="wwf-block">
							<div class="wwf-heading"><?php the_sub_field( 'what_we_found_title' ); ?></div>
							<div class="wwf-text"><?php the_sub_field( 'what_we_found_text' ); ?></div>
						</div>
					</div>
				</div>
			</div>
		</section>
			
		<?php elseif ( get_row_layout() == 'fun_fact_section' ) : ?>
		<!-- FUN FACT SECTION -->
		<section class="row section-Funfacts">
			<div class="row">
				<div class="col-xs-12">
					<div class="funfact-block">
						<div class="row">
							<div class="ff-col-1 col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="ff-title"><?php the_sub_field( 'fun_fact_title' ); ?></div>
							</div>
							<div class="ff-col-2 col-lg-8 col-md-8 col-sm-12 col-xs-12">
								<div class="ff-text"><?php the_sub_field( 'fun_fact_text' ); ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
			
		<?php elseif ( get_row_layout() == 'results_section' ) : ?>
		<!-- RESULTS SECTION -->
		<?php if ( have_rows( 'result_blocks' ) ) : ?>
		<section class="row section-Monthlyresults">
			<div class="container">
				<div class="row">
			<?php while ( have_rows( 'result_blocks' ) ) : the_row(); ?>
					<div class="r-blk col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<div class="result-block"><?php the_sub_field( 'result_block' ); ?></div>
					</div>
			<?php endwhile; ?>
				</div>
			</div>
		</section>
		<?php else : ?>
			<?php // no rows found ?>
		<?php endif; ?>
			
		<?php elseif ( get_row_layout() == 'diagram_section' ) : ?>
		<!-- DIAGRAM SECTION -->
		<section class="row section-Diagram">
			<div class="container">
				<div class="row">
					<?php $diagram_image = get_sub_field( 'diagram_image' ); ?>
					<?php if ( $diagram_image ) { ?>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<img src="<?php echo $diagram_image['url']; ?>" alt="<?php echo $diagram_image['alt']; ?>" />
					</div>
					<?php } ?>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="diagram-text"><?php the_sub_field( 'diagram_text' ); ?></div>
					</div>
				</div>
			</div>
		</section>
			
		<?php elseif ( get_row_layout() == 'icon_text_list_section' ) : ?>
		<!-- ICON & TEXT SECTION -->
		<?php if ( have_rows( 'icon_text_blocks' ) ) : ?>
		<section class="row section-Iconlist">
			<div class="container">
				<div class="row">
			<?php while ( have_rows( 'icon_text_blocks' ) ) : the_row(); ?>
				<div class="icon-list-item col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<?php $icon_image = get_sub_field( 'icon_image' ); ?>
				<?php if ( $icon_image ) { ?>
					<figure class="icon-img"><img src="<?php echo $icon_image['url']; ?>" alt="<?php echo $icon_image['alt']; ?>" /></figure>
				<?php } ?>
					<div class="icon-text"><?php the_sub_field( 'icon_text' ); ?></div>
				</div>
			<?php endwhile; ?>
				</div>
			</div>
		</section>
		<?php else : ?>
			<?php // no rows found ?>
		<?php endif; ?>
			
		<?php elseif ( get_row_layout() == 'contact_section' ) : ?>
		<!-- CTA SECTION -->
		<section class="row section-CallToActionBar">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="section-CallToActionBar_Content"><?php the_sub_field( 'cta_text' ); ?></div>
						<a href="<?php the_sub_field( 'cta_button_link' ); ?>" class="btn btn-blue"><?php the_sub_field( 'cta_button_label' ); ?></a>
					</div>
				</div>
			</div>
		</section>
		
		<!-- CONTACT FORM -->
		<?php $form = get_sub_field( 'contact_form_shortcode' ); ?>
		<section class="row section-Content_Contained">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<?php echo do_shortcode("$form"); ?>
					</div>
				</div>
			</div>
		</section>

		<?php endif; ?>
	<?php endwhile; ?>
<?php else: ?>
	<?php // no layouts found ?>
<?php endif; ?>
</div>