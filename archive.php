<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="page">
	<div class="large-8 large-push-4 columns wrapper radius-left offset-topgutter push-3">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>
		<main class="content">
			<h1>Archive</h1>
			<?php while ( have_posts()) : the_post(); ?>
				<a href="<?php the_permalink(); ?>">	
					<h3><?php the_date(); ?></h3>
					<h2><?php the_title();?></h2>
						<?php if ( has_post_thumbnail()) { ?> 
							<?php the_post_thumbnail('thumbnail', array('class'	=> "floatleft")); ?>
						<?php } ?>
					<?php the_excerpt(); ?>
				</a>
					<hr>
				<?php endwhile; ?>
			<div class="row">
				<?php flagship_pagination($news_archive_query->max_num_pages); ?>		
			</div>	
		</main>
	</div>	<!-- End main content (left) section -->
<?php locate_template('parts-sidebar-nav.php', true, false); ?>
</div> <!-- End #landing -->
<?php get_footer(); ?>