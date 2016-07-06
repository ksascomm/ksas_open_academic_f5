<?php
/*
Template Name: Faculty Books
*/
?>	
<?php get_header(); ?>
<div class="row wrapper radius10" id="page">
	<div class="large-12 columns">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<main class="content">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
			<?php 
			$paged = (get_query_var('paged')) ? (int) get_query_var('paged') : 1;
			if ( false === ( $faculty_books_query = get_transient( 'faculty_books_query_' . $paged ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$faculty_books_query = new WP_Query(array(
					'post_type' => 'post',
					'category_name' => 'books',
					'posts_per_page' => 10,
					'paged' => $paged
					)); 
					set_transient( 'faculty_books_query_' . $paged, $faculty_books_query, 2592000 );
			} 	
			 if ( $faculty_books_query->have_posts() ) : while ($faculty_books_query->have_posts()) : $faculty_books_query->the_post(); ?>
 			<article>
					<?php if ( has_post_thumbnail()) { ?> 
						<?php the_post_thumbnail('medium', array('class'	=> "floatleft")); ?>
					<?php } ?>
					<?php $faculty_post_id = get_post_meta($post->ID, 'ecpt_pub_author', true);
						  $faculty_post_id2 = get_post_meta($post->ID, 'ecpt_pub_author2', true); ?>
			
				<ul class="no-bullet">
					<li><h3><?php the_title(); ?></h3></li>
					<li><?php if ( get_post_meta($post->ID, 'ecpt_pub_date', true) ) : echo get_post_meta($post->ID, 'ecpt_pub_date', true);  endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_publisher', true) ) :?>, <?php echo get_post_meta($post->ID, 'ecpt_publisher', true);  endif; ?>
					</li>
					<li>
						<strong><a href="<?php echo get_permalink($faculty_post_id); ?>"><?php echo get_the_title($faculty_post_id); ?> 
									<?php if ( get_post_meta($post->ID, 'ecpt_pub_role', true)) :?>, <?php echo get_post_meta($post->ID, 'ecpt_pub_role', true); endif; ?>
								</a>
						</strong>
					</li>
					<li><?php if (get_post_meta($post->ID, 'ecpt_author_cond', true) == 'on') { ?><br>
						<strong>
							<a href="<?php echo get_permalink($faculty_post_id2); ?>"><?php echo get_the_title($faculty_post_id2); ?>,&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_pub_role2', true); ?></a>
						</strong>
						<?php } ?>
					</li>
					<li><?php if ( get_post_meta($post->ID, 'ecpt_pub_link', true) ) :?> 
							<a href="http://<?php echo get_post_meta($post->ID, 'ecpt_pub_link', true); ?>">
								Purchase Online <span class="fa fa-external-link-square"></span>
							</a>
						<?php endif; ?>
					</li>
				</ul>

				<?php the_content(); ?>
				<hr>
			</article>	
			<?php endwhile; endif; ?>
		<div class="row">
			<?php flagship_pagination($faculty_books_query->max_num_pages); ?>		
		</div>	
		</main>
	</div>	<!-- End main content (left) section -->
</div> <!-- End #landing -->
<?php get_footer(); ?>