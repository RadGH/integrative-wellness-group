<?php
/**
 * JS plugin includes
 */
function aa_enqueue_scripts() {
	/**
	 * Enqueue Velocity JS
	 * It's faster and more extensive than jQuery for animations
	 * @link http://julian.com/research/velocity/
	 * @version 1.2.3
	 */
	wp_register_script( 'velocity', get_template_directory_uri() . '/_static/js/vendor/velocity.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'velocity' );

	/**
	 * Bootstrap JS
	 * Bootstrap 4 JS
	 * @link http://v4-alpha.getbootstrap.com/
	 * @version 4.0.0-alpha.3
	 */
	wp_register_script( 'tether', get_template_directory_uri() . '/_static/js/vendor/tether.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'tether' );
	wp_register_script( 'bootstrap', get_template_directory_uri() . '/_static/js/vendor/bootstrap.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'bootstrap' );

	/**
	 * MMenu Off-canvas menu
	 * @link http://mmenu.frebsite.nl/
	 * @version 5.6.1
	 */
	wp_register_script( 'mmenu', get_template_directory_uri() . '/_static/js/vendor/jquery-mmenu.all.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'mmenu' );
	wp_register_style( 'mmenu', get_template_directory_uri() . '/_static/js/vendor/_jquery-mmenu.all.css', array() );
	wp_enqueue_style( 'mmenu' );
	
	
//	<!-- jquery mmenu -->
/*	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/_static/js/vendor/_jquery-mmenu.all.css" />*/
/*	<script src="<?php bloginfo('template_directory'); ?>/_static/js/vendor/jquery-mmenu-all.min.js"></script>*/

	/**
	 * jQuery Sticky-kit JS
	 * @link http://leafo.net/sticky-kit/
	 * @version 1.1.2
	 */
	wp_register_script( 'sticky_kit', get_template_directory_uri() . '/_static/js/vendor/jquery.sticky-kit.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'sticky_kit' );

	/*
	 * Remodal JS
	 * @link http://vodkabears.github.io/remodal/
	 * @version 1.1.0
	 */
	wp_register_script( 'remodal', get_template_directory_uri() . '/_static/js/vendor/remodal.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'remodal' );

	/**
	 * Parallax JS
	 * @link http://pixelcog.github.io/parallax.js/
	 * @version 1.4.2
	 */
	wp_register_script( 'parallax', get_template_directory_uri() . '/_static/js/vendor/parallax.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'parallax' );

	/**
	 * Owl Carousel JS
	 * Slider plugin
	 * @link http://www.owlcarousel.owlgraphic.com/
	 * @version 2.0.0-beta.2.4
	 */
	wp_register_script( 'owl_carousel', get_template_directory_uri() . '/_static/js/vendor/owl.carousel.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'owl_carousel' );
	
	/**
	 * Slick Slider JS
	 * Slider plugin
	 * @link http://kenwheeler.github.io/slick/
	 * @version 1.6.0
	 */
	wp_register_script( 'slick', get_template_directory_uri() . '/_static/js/vendor/slick.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'slick' );
	
	
	/**
	 * Corner Slider JS
	 * Corner Slider plugin
	 */
	wp_register_script( 'corner_slider', get_template_directory_uri() . '/_static/js/vendor/jquery.cornerslider.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'corner_slider' );

	/**
	 * IFS Form Code script
	 */
	wp_register_script( 'ifs_form_script', 'https://nt277.infusionsoft.com/app/webTracking/getTrackingCode?trackingId=8070ca9b8618a3c72eb5fbc42716e53b', array( 'jquery' ), '', true );
	wp_enqueue_script( 'ifs_form_script' );


	/* Enqueue Main JS */
	wp_register_script( 'main', get_template_directory_uri() . '/_static/js/main.js', array( 'jquery' ), '', true);
	wp_enqueue_script( 'main' );
}
add_action( 'wp_enqueue_scripts', 'aa_enqueue_scripts' );
