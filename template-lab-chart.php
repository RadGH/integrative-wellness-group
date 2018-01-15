<?php
/**
 * Template Name: Lab Chart Page Template
 */

get_header();

global $images_dir;
?>

<?php
while ( have_posts() ) : the_post(); ?>

    <?php get_template_part('_template-parts/component', 'page-banner'); ?>

    <?php aa_header_banner(); ?>

   				<section class="row section-LabCharts">
					<div class="container"><div class="row">
						<div class="col-xs-12">
							
							<div class="lab-chart">
							
							<?php if ( have_rows( 'lab_cart_tabs' ) ) : ?>
							<div class="tab">
	<?php while ( have_rows( 'lab_cart_tabs' ) ) : the_row(); ?>
	<?php 	
			//var
			$tab = get_sub_field( 'tab_title' );	
	?>
	<button class="tablinks" onclick="openChart(event, '<?php echo $tab; ?>')" id="defaultOpen"><?php echo $tab; ?></button>
	
	<?php endwhile; ?>
		</div>
<?php else : ?>
	<?php // no rows found ?>

<?php endif; ?>


<?php if ( have_rows( 'lab_chart_items' ) ) : ?>
	<?php while ( have_rows( 'lab_chart_items' ) ) : the_row(); ?>
		<?php 
			//var	
			$icon = get_sub_field( 'item_icon' ); 
		 	$title = get_sub_field( 'item_title' ); 
		 	$text = get_sub_field( 'item_content' ); 
		?>
		<div id="<?php echo $title; ?>" class="tabcontent">
  			<h2><?php echo $icon; ?> <?php echo $title; ?>:</h2>
  			<?php echo $text; ?>
		</div>
	<?php endwhile; ?>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>




	</div>
							
						</div>
					</div></div>
				</section>

    <?php aa_footer_banner(); ?>

<?php
endwhile; // End of the loop. ?>

<script>
function openChart(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

<?php get_footer(); ?>
