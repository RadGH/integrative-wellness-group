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
				<?php
				$event_category_terms = get_terms( array(
					'taxonomy' => 'event_category',
					'hide_empty' => true,
				) );
				if ($event_category_terms) {
					$all_categories = array();
					foreach($event_category_terms as $term) {
						$all_categories[] = $term->slug;
					}
					$all_categories = implode(',', $all_categories); ?>
				<ul id="alm-filter-nav">
					<li><a href="#" data-repeater="default" data-post-type="event" data-taxonomy="event_category" data-taxonomy-terms="<?php echo $all_categories; ?>" data-posts-per-page="3" data-scroll="true" data-button-label="Load More Events">Show All</a></li>
					<?php
					foreach($event_category_terms as $term) { ?>
						<li><a href="#" data-repeater="default" data-post-type="event" data-taxonomy="event_category" data-taxonomy-terms="<?php echo $term->slug; ?>" data-posts-per-page="3" data-scroll="true" data-button-label="Load More <?php echo $term->name; ?> Events"><?php echo $term->name; ?></a></li>
					<?php
					} ?>
				</ul>
				<?php
				} ?>
			</header>

			<div class="col-xs-12">
				<?php echo do_shortcode('[ajax_load_more container_type="ul" post_type="event" orderby="menu_order" order="ASC" posts_per_page="3" button_label="Load More Events"]'); ?>
			</div>

		</div></div>
	</section>
</div>
