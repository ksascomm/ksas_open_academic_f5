<?php
/*
Template Name: Quicklinks Listing
*/
?>	
<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="page">
	<div class="large-8 columns wrapper radius-left offset-topgutter" role="main">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<div class="content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title();?></h1>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>	
	  		<?php wp_nav_menu( array( 
				'theme_location' => 'quick_links', 
				'fallback_cb' => 'foundation_page_menu', 
				) ); ?>
		</div>
	</div>	<!-- End main content (left) section -->
<?php locate_template('parts-sidebar-nav.php', true, false); ?>
</div> <!-- End #landing -->
<?php get_footer(); ?>