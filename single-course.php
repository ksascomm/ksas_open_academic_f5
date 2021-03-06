<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="page">
	<div class="small-12 large-9 large-push-3 columns wrapper radius-left offset-topgutter" role="main">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<div class="content news">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h5><?php the_title(); ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_credit', true) ) : ?>
					&nbsp;(<?php echo get_post_meta($post->ID, 'ecpt_credit', true); ?> Credits)
				<?php endif; ?></h5>
				<?php the_content()?>
				<?php if ( get_post_meta($post->ID, 'ecpt_prereqs', true) ) : ?>
					<p><strong>Prerequisites:</strong> 
					<?php echo get_post_meta($post->ID, 'ecpt_prereqs', true); ?></p>
				<?php endif; ?>
				<p>
				<?php if ( get_post_meta($post->ID, 'ecpt_instructor', true) ) : ?>
					<strong>Instructor:</strong> 
					<?php echo get_post_meta($post->ID, 'ecpt_instructor', true); ?><br>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_course_times', true) ) : ?>
					<strong>Course Times:</strong> 
					<?php echo get_post_meta($post->ID, 'ecpt_course_times', true); ?><br>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_course_limit', true) ) : ?>
					<strong>Course Limit:</strong> 
					<?php echo get_post_meta($post->ID, 'ecpt_course_limit', true); ?><br>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_course_website', true) ) : ?>
					<a href="<?php echo get_post_meta($post->ID, 'ecpt_course_website', true); ?>" target="_blank">View course website/syllabus</a>
				<?php endif; ?>
				</p>
			<?php endwhile; endif;?>
		</div>
	</div>	<!-- End main content (left) section -->
<?php locate_template('parts-sidebar-nav.php', true, false); ?>
</div> <!-- End #landing -->
<?php get_footer(); ?>