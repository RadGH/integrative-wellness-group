<?php
/**
 * Template Name: Test Page Template
 */

get_header(menutest);
?>

<?php
while ( have_posts() ) : the_post();

	get_template_part('_template-parts/component', 'page-banner');

	aa_header_banner(); ?>

   <div class="container-fluid page-Content">
	<section class="row section-Content_Contained">
		<div class="container"><div class="row">

			<header class="col-xs-12 section-Header">
				<h1><?php the_title(); ?></h1>
			</header>

			<div class="col-xs-12">
				<a href="#/" class="popup-click-open-trigger-3">CLICK</a>
				Maecenas faucibus mollis interdum. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sed odio dui.

Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.

Cras mattis consectetur purus sit amet fermentum. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam quis risus eget urna mollis ornare vel eu leo.

Nullam id dolor id nibh ultricies vehicula ut id elit. Curabitur blandit tempus porttitor. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere consectetur est at lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae elit libero, a pharetra augue.
			</div>

		</div></div>
	</section>
</div>

   <?php  aa_footer_banner();

endwhile; // End of the loop.
?>

<!--cornerSlider starts-->
<style>
	#corner-slider{
		background-image: url(<?php the_field('popup_image','option')?>);
	}

@media only screen and (max-width: 480px) {
#corner-slider{
	background-image: url(<?php the_field('popup_image_mobile','option')?>);
}
	}
</style>
<div id="corner-slider">
<div class="popup-form"><?php the_field('popup_form_code','option')?></div>      
</div>
<!--cornerSlider ends-->

<?php get_footer(); ?>
