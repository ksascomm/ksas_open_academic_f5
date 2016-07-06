<?php
/*
Template Name: Calendar
*/
?>
<?php get_header(); ?>
<div class="row wrapper radius10" id="page" role="main">
	<div class="large-12 columns">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<main class="content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title();?></h1>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
			
			<!-- /************Calendar display**************/ -->	
				<div class="row" id="calendar_container"></div>

		</main>
	</div>
</div> 
<?php get_footer(); ?>