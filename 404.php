<?php
/**
 * 404 Page
 */

get_header();
?>

<div class="container-fluid page-Content">
	<section class="row section-Content_Contained">
		<div class="container"><div class="row">

			<header class="col-xs-12 section-Header">
				<?php the_field('404_page_content', 'option'); ?>
			</header>

			<div class="col-xs-12">
				<footer><?php get_search_form(); ?></footer>
			</div>

		</div></div>
	</section>
</div>

<?php get_footer(); ?>
