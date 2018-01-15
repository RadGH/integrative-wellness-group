<div class="container-fluid page-Content">

	<section class="row section-TeamMembers">
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
				if ( have_rows('team_sections') ) :
					while ( have_rows('team_sections') ) : the_row(); ?>

						<h2><?php the_sub_field('title'); ?></h2>

						<?php
						$team_members_objects = get_sub_field('team_members');
						if ($team_members_objects) :
							foreach ($team_members_objects as $post) :
								setup_postdata($post);
								$banner_image = get_field('banner_image');
								$banner_image_hover = get_field('banner_image_hover'); ?>

								<div class="section-TeamMembers_Member <?php the_field('class_developer_use_only'); ?>" style="background-image: url('<?php echo $banner_image["url"]; ?>');">
									<div class="banner-image-hover" style="background-image: url('<?php echo $banner_image_hover["url"]; ?>');"></div>
									<div class="row"><div class="col-xs-12 col-lg-6">
										<div class="team-member-desc">
										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<?php the_field('team_member_description'); ?>
										<a href="<?php the_permalink(); ?>" class="btn btn-primary">Learn More</a></div>
									</div></div>
								</div>

						    <?php
							endforeach;
							wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
						<?php
						endif; ?>

					<?php
					endwhile;
				endif; ?>
			</div>

		</div></div>
	</section>

</div> <!-- /.container-fluid.page-Content -->
