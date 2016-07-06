<?php
/*
Template Name: Full Width - No Sidebar
*/
?>
<?php get_header(); ?>
<div class="row wrapper radius10" id="page" role="main">
	<div class="large-12 columns">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<main class="content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title();?></h1>
					<?php if ( has_post_thumbnail()) { ?> 
						<div class="photo-page-left floatleft large-7 columns">
							<?php the_post_thumbnail('full',array('class'	=> "radius-topleft")); ?>
						</div>
					<?php } ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>	
		</main>
	</div>
</div> 
<?php get_footer(); ?>