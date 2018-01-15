<?php global $images_dir; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favico.png">

	<title><?php wp_title('|',1,'right'); ?></title>

	<!-- Enqueue custom browser-detect for browser-targeted CSS styling -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/_static/js/browser-detect.js"></script>

	<!-- Include FontAwesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Include Google Fonts -->
	<!--link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,600,800|Lato' rel='stylesheet' type='text/css'-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">

	<link href="<?php bloginfo('stylesheet_url') ?>" rel="stylesheet">

	<!-- For use with browser-detect.js -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/_static/styles/browser-specific-styles.css" />

	<!--
	This second stylesheet is for hotfixes/vanilla CSS,
	and should only be used if you are not compiling the Sass files -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/vanilla-style.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	<link href="//addtocalendar.com/atc/1.5/atc-style-button-icon.css" rel="stylesheet" type="text/css">

	<script type="text/javascript">
	(function(p,u,s,h){
	    p._pcq=p._pcq||[];
	    p._pcq.push(['_currentTime',Date.now()]);
	    s=u.createElement('script');
	    s.type='text/javascript';
	    s.async=true;
	    s.src='https://cdn.pushcrew.com/js/98c2d601d794a6ff7919f7fe0c081f03.js';
	    h=u.getElementsByTagName('script')[0];
	    h.parentNode.insertBefore(s,h);
	})(window,document);
	</script>

	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class('page-' . $post->post_name); ?>>

	<div id="off-canvas-nav" class="mm-menu">
		<div>
			<a href="#" id="off-canvas-close-button">X</a>
			<?php
			wp_nav_menu( array(
				'menu'       => 'off-canvas-nav',
				'menu_class' => 'nav navbar-nav',
				'container'  => false,
			));
			?>
			<?php get_template_part('_template-parts/component', 'social-follow'); ?>
		</div>
	</div>

	<div id="mobile-nav" class="mm-menu">
		<div>
			<a href="#" id="mobile-close-button">X</a>
			<?php
			wp_nav_menu( array(
				'menu'       => 'mobile-nav',
				'menu_class' => 'nav navbar-nav',
				'container'  => false,
			));
			?>
			<?php get_template_part('_template-parts/component', 'social-follow'); ?>
		</div>
	</div>

	<div id="search-Wrapper">
		<a href="#" id="search-Close"><i class="fa fa-close"></i></a>
		<div class="container"><div class="row">
			<div class="col-xs-12">
				<?php get_search_form(); ?>
			</div>
		</div></div>
	</div>

	<div id="page-wrapper" class="remodal-bg">

		<header class="site-Header">
			<nav class="top-nav">
				<div class="container-fluid group">
					<?php
					wp_nav_menu( array(
						'menu'       => 'top-nav',
						'menu_class' => 'nav navbar-nav group pull-sm-right',
						'container'  => false,
						'fallback_cb'=> 'bs4navwalker::fallback',
					    'walker'     => new bs4navwalker(),
						'items_wrap' => top_nav_wrap()
					));
					?>
				</div>
			</nav>

			<nav class="main-nav navbar">
				<div class="container-fluid">
					<a class="navbar-brand" href="<?php bloginfo('url'); ?>">
						<img src="<?php echo $images_dir; ?>/site-Logo-full.png" alt="Integrative Wellness Group logo" />
					</a>

					<?php
					wp_nav_menu( array(
						'menu'       => 'new-main-nav',
						'theme_location' => 'primary',
						'menu_class' => 'nav navbar-nav group',
						'container'  => false,
						'fallback_cb'=> 'bs4navwalker::fallback',
						'items_wrap' => main_nav_wrap()
					));
					?>
					<a href="#off-canvas-nav" id="off-canvas-nav-button"></a>
					<a href="#mobile-nav" id="mobile-nav-button"></a>
				</div>
			</nav>

			<div class="mainnav-SubMenu">
				<div class="container"><div class="row">
					<div class="col-xs-12 mainnav-SubMenu_Column">
						<ul class="sub-menu">
							<!-- Populated via JS  - subMenuJS() -->
						</ul>
					</div>
				</div></div>
			</div>
		</header>

		<main>
