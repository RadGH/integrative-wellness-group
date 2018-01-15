<?php
/**
 * Template part for displaying post content in single-team_member.php
 *
 */
?>

<div class="container-fluid page-Content">
	<section class="row">
		<div class="container"><div class="row">

			<?php
			if ( function_exists('yoast_breadcrumb') ) { ?>
				<div class="col-xs-12 site-Breadcrumbs">
					<p id="breadcrumbs"><a href="<?php bloginfo('url'); ?>/ourteam-iwg-nj">Our Team</a> > <span><?php the_title(); ?></span></p>
				</div>
			<?php } ?>

			<?php
			$banner_image = get_field('banner_image'); ?>
			<div class="col-xs-12" style="padding:0;">
				<img src="<?php echo $banner_image["url"]; ?>">
			</div>

				<div class="row"><div class="col-xs-12 section-TeamMembers_Member">
					<h3><?php the_title(); ?></h3>
					<?php if( get_field('team_member_description_full') ) { ?>
					<?php the_field('team_member_description_full'); ?>
					<?php } else { ?>
					<?php the_field('team_member_description'); ?>
					<?php } ?>
				</div></div>

			<?php if ( get_field('team_member_specialities') ) { ?>
				<div class="col-xs-12 col-md-6 member-Meta">
					<h3>Specialities</h3>
					<?php the_field('team_member_specialities'); ?>
				</div>
			<?php } ?>

			<?php if ( get_field('team_member_training_credentials') ) { ?>
				<div class="col-xs-12 col-md-6 member-Meta">
					<h3>Training & Credentials</h3>
					<?php the_field('team_member_training_credentials'); ?>
				</div>
			<?php } ?>

			<div class="col-xs-12"><a href="<?php bloginfo('url'); ?>/ourteam-iwg-nj" class="btn"><i class="fa fa-caret-left"></i> Back to Team Page</a></div>

		</div></div>
	</section>
</div>
