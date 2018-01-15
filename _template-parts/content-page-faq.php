<?php
/**
 * Template part for displaying page content in page-faq.php
 *
 */
?>

<div class="container-fluid page-Content">
	<section class="row section-Content_Contained">
		<div class="container"><div class="row">

			<header class="col-xs-12 section-Header">
				<h1><?php the_title(); ?></h1>
			</header>

			<div class="col-xs-12">
				<?php the_content(); ?>

				<section class="section-Accordion">
					<div class="section-Accordion_Items">
						<?php
						while ( have_rows('faq_accordion_accordion_items') ) : the_row(); ?>

							<div class="section-Accordion_Item visible">
								<button><h4><?php the_sub_field('question'); ?></h4> <i class="fa fa-minus"></i></button>
								<div class="section-Accordion_ItemContent"><?php the_sub_field('answer'); ?></div>
							</div>

						<?php
						endwhile; ?>
					</div>
				</section>
			</div>

		</div></div>
	</section>
</div>
