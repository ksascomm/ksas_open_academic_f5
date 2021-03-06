<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="page">
	<div class="small-12 large-9 large-push-3 columns wrapper radius-left offset-topgutter" role="main">	
		<div class="content news">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<p class="lead"><?php if( get_post_meta($post->ID, 'ecpt_pull_quote', true)) { echo get_post_meta($post->ID, 'ecpt_pull_quote', true); } ?></p>
			<?php if ( has_post_thumbnail()) { ?> 
				<?php the_post_thumbnail('full', array('class'	=> "floatleft")); ?>
			<?php } ?>
			<?php the_content(); endwhile; endif;?>
		</div>
	</div>	<!-- End main content (left) section -->
<?php locate_template('parts-sidebar-nav.php', true, false); ?>
</div> <!-- End #landing -->
<?php get_footer(); ?>