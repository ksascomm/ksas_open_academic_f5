<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="page">
	<div class="small-12 large-8 large-push-4 columns wrapper radius-left offset-topgutter">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); 
		$theme_option = flagship_sub_get_global_options(); ?>	
		<main class="content archive">
			<h1 class="page-title"><?php echo $theme_option['flagship_sub_feed_name']; ?> Archive</h1>
			<?php 
				$paged = (get_query_var('paged')) ? (int) get_query_var('paged') : 1;
				if ( false === ( $news_archive_query = get_transient( 'news_archive_query_' . $paged ) ) ) {
					// It wasn't there, so regenerate the data and save the transient
					$news_archive_query = new WP_Query(array(
						'post_type' => 'post',
						'posts_per_page' => 10,
						'paged' => $paged
						)); 
						set_transient( 'news_archive_query_' . $paged, $news_archive_query, 2592000 );
				} 	

			while ($news_archive_query->have_posts()) : $news_archive_query->the_post(); ?>
				<a href="<?php the_permalink(); ?>">	
					<h3 class="uppercase"><?php the_date(); ?></h3>
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