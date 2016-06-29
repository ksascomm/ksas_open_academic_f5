<?php
/*
Template Name: Sitemap Listing
*/
?>	

<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="page">
	<div class="small-12 large-9 large-push-3 columns wrapper radius-left offset-topgutter">	
		<main class="content" role="main">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1 class="page-title"><?php the_title();?></h1>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>	
			<?php wp_nav_menu( array( 
				'theme_location' => 'main_nav', 
				'fallback_cb' => 'foundation_page_menu', 
				) ); ?>
		</main>
	</div>	<!-- End main content (left) section -->
<?php locate_template('parts-sidebar-nav.php', true, false); ?>
</div> <!-- End #landing -->
<?php get_footer(); ?>