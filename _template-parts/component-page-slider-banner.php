<!--BEGIN SLIDER SECTION -->  
   
   <?php // check if the repeater field has rows of data
if( have_rows('header_slider') ): ?>
<section id="hero-slider"> 
    
    <?php	// loop through the rows of data
    while ( have_rows('header_slider') ) : the_row(); 

		//var
		$bg_slider_img = get_sub_field('slider_background_image');
		$bg_slider_text = get_sub_field('slider_text');	
		$banner_video = get_sub_field('banner_video_url');
		$banner_button_url = get_sub_field('banner_button_url');
		$banner_button_text = get_sub_field('banner_button_text'); 
?>

	<div class="jumbotron jumbotron-fluid slider-header slide" style="background-image:linear-gradient(rgba(0,0,0, 0.40), rgba(0,0,0, 0.40)),url(<?php echo $bg_slider_img['url']; ?>);">
   
    <div class="container">
    	<div class="row">
        	<div class="col-xs-12">
            	<div class="slider-text-outer" style="<?php echo the_sub_field('text_position_and_width') ?>">
					<div class="slider-text">
               
               <?php if ( $banner_video ) { ?>
                <a href="#" class="btn-video toggle-Modal_Video"></a>
                <div class="modal-content hidden-xs-up"><?php echo do_shortcode("[arve url='$banner_video']"); ?></div>
                <?php } ?>
                
               <?php echo $bg_slider_text; ?>
               
               <?php if ( $banner_button_url ) { ?><a href="<?php echo $banner_button_url; ?>" class="btn"><?php echo $banner_button_text; ?></a><?php } ?>
               
              	 	</div>
				</div>
			</div>
		</div>
	</div>
	</div>

<?php endwhile; ?>
</section>
<?php else :
    // no rows found
endif; ?>

<!-- END SLIDER HEADER -->