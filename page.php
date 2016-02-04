<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="page">
	<div class="small-12 large-8 large-push-4 columns wrapper radius-left offset-topgutter">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<main class="content" role="main">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php if (has_post_thumbnail()) { ?> 
					<div class="row">
						<div class="large-12 columns">
							<?php the_post_thumbnail('full'); ?>
						</div>
					</div>
				<?php } ?>
				<h1 class="page-title"><?php the_title();?></h1>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>	
		</main>
	</div>	<!-- End main content (left) section -->
<?php locate_template('parts-sidebar-nav.php', true, false); ?>
</div> <!-- End #landing -->
<?php get_footer(); ?>