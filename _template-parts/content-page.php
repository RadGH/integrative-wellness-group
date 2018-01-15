<?php
/**
 * Template part for displaying page content in page.php.
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
			</div>

		</div></div>
	</section>
</div>
