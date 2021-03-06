<?php get_header(); locate_template('parts-slider.php', true);?>
<div class="row homepage_bg">
	<main class="large-8 columns wrapper toplayer content">		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<?php $frontpagecontent = the_content(); if($frontpagecontent != '') { ?>
				<?php the_content(); ?>	
			<?php } ?>
			
		<?php endwhile; endif; ?>	
		
		<?php 
			$theme_option = flagship_sub_get_global_options();
			$news_quantity = $theme_option['flagship_sub_news_quantity'];
			if ( false === ( $news_query = get_transient( 'news_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$news_query = new WP_Query(array(
					'post_type' => 'post',
					'posts_per_page' => $news_quantity)); 
					set_transient( 'news_query', $news_query, 2592000 );
			} 	
			if ( $news_query->have_posts() ) : ?>

			<h4><?php echo $theme_option['flagship_sub_feed_name']; ?></h4>
			
			<?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
					
				<div class="row">		
					<article class="small-12 columns news-item">
						<h2 class="uppercase black"><?php the_time( get_option( 'date_format' ) ); ?></h2>
						<h1>
							<a href="<?php the_permalink(); ?>">
								<?php the_title();?>
							</a>	
						</h1>
							<?php if ( has_post_thumbnail()) { ?> 
								<?php the_post_thumbnail('thumbnail', array('class'	=> "floatleft")); ?>
							<?php } ?>
							<?php the_excerpt(); ?>
							
							<hr>
					</article>
				</div>
			
			<?php endwhile; ?>

			<div class="row">
				<h5>
					<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">View <?php echo $theme_option['flagship_sub_feed_name']; ?> Archive</a>
				</h5>
			</div>
		
		<?php endif; ?>
		
	</main>	<!-- End main content (left) section -->
<?php locate_template('parts-homepage-sidebar.php', true, false); ?>	
</div> <!-- End #landing -->
<?php get_footer(); ?>