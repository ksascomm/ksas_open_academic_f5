<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="date" content="<?php the_modified_date(); ?>" />
  <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/assets/images/favicon.ico" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-144x144-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-114x114-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-72x72-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-57x57-precomposed.png" />

  <!-- CSS Files: All pages -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/stylesheets/app.min.css">

  <!-- CSS Files: Conditionals -->
	<!-- Make IE a modern browser -->
	<!--[if IE]>
		<script src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://cdn.jsdelivr.net/css3-mediaqueries/0.1/css3-mediaqueries.min.js"></script>
	<![endif]-->
  	<!--[if lt IE 11]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/css/app.ie.css">
		<div data-alert class="alert-box alert">
		<?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.'); ?>	
		</div>		
	<![endif]-->

	<!-- Modernizr and Jquery Script -->
  <?php wp_enqueue_script('jquery'); ?>
  <script src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/modernizr.min.js"></script>
  <?php wp_head(); ?>

  <?php include_once("parts-analytics.php"); ?>
</head>

<body <?php body_class(); ?> onLoad="viewport()">
	<header class="black_bg">
 		<div id="mobile-nav">
			<div class="row">
				<div class="small-12 large-4 columns ">
				<div class="mobile-logo"><a href="<?php echo network_site_url(); ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/images/ksas-logo-horizontal.png" alt="jhu logo"></a></div>
					<h1><a class="white" href="<?php echo site_url(); ?>"><?php echo get_bloginfo( 'title' ); ?></a></h1>
				</div>
			</div>
			<div class="row hide-for-print">
				<?php get_template_part( 'parts', 'search-mobile' ); ?>
			</div>
		</div>

		<div id="desktop-nav">
			
				<?php get_template_part( 'parts', 'offcanvas' ); ?>
			
			<div class="row">
				<div class="medium-12 columns" id="logo_nav">
					<div class="medium-3 columns">
						<li class="logo"><a href="<?php echo network_home_url(); ?>" title="Krieger School of Arts & Sciences"><img src="<?php echo get_template_directory_uri() ?>/assets/images/ksas-logo.png" alt="jhu logo"></a></li>
					</div>
					<div class="medium-8 medium-offset-1 large-9 columns">
						<h1><a class="white" href="<?php echo site_url(); ?>"><span class="small"><?php echo get_bloginfo ( 'description' ); ?></span><?php echo get_bloginfo( 'title' ); ?></a></h1>
					</div>	
				</div>
			</div>
			<div class="row hide-for-print">
				<?php wp_nav_menu( array(
					'theme_location' => 'main_nav',
					'menu_class' => 'nav-bar',
					'container' => 'nav',
					'container_id' => 'main_nav',
					'container_class' => 'small-12 columns',
					'fallback_cb' => 'foundation_page_menu',
					'walker' => new foundation_navigation(),
					'items_wrap' => '<ul id="%1$s" class="%2$s" role="navigation" aria-label="Main menu">%3$s</ul>',
					'depth' => 3  )); ?>
			</div>
		</div>
	</header>
<div id="nav-break"></div>