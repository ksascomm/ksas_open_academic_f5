<?php
/*
Template Name: Courses - Graduate
*/
?>

<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="page">
<div class="small-12 large-9 large-push-3 columns wrapper radius-left offset-topgutter">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<main class="content" role="main">
 			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> <!--Start the loop -->
				<h1><?php the_title(); ?>&nbsp;<a class="acc_expandall">[Expand All]</a></h1>
				<?php the_content() ?>
			<?php endwhile; endif ?>
			
			<?php 
			// Get any existing copy of our transient data
			if ( false === ( $ksas_course_grad_query = get_transient( 'ksas_course_grad_query' ) ) ) {
			// It wasn't there, so regenerate the data and save the transient
				$ksas_course_grad_query = new WP_Query(array(
					'post-type' => 'course',
					'coursetype' => 'graduate-course',
					'orderby' => 'title',
					'order' => 'ASC', 
					'posts_per_page' => -1));
				set_transient( 'ksas_course_grad_query', $ksas_course_grad_query, 86400 );
			} 
			?>
		<?php if($ksas_course_grad_query->have_posts()) : ?>
			<dl class="accordion" data-accordion>
		<?php while ($ksas_course_grad_query->have_posts()) : $ksas_course_grad_query->the_post(); ?>
		<dd class="accordion-navigation">
			<a href="#post<?php the_ID(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_credit', true) ) : ?>
					&nbsp;(<?php echo get_post_meta($post->ID, 'ecpt_credit', true); ?> Credits)
				<?php endif; ?><i class="fa fa-caret-down"></i><i class="fa fa-caret-up"></i></a>
			<div id="post<?php the_ID(); ?>" class="content course">
				<?php the_content()?>
				<?php if ( get_post_meta($post->ID, 'ecpt_prereqs', true) ) : ?>
					<p><b>Prerequisites:</b> 
					<?php echo get_post_meta($post->ID, 'ecpt_prereqs', true); ?></p>
				<?php endif; ?>
				<p>
				<?php if ( get_post_meta($post->ID, 'ecpt_instructor', true) ) : ?>
					<b>Instructor:</b> 
					<?php echo get_post_meta($post->ID, 'ecpt_instructor', true); ?><br>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_course_times', true) ) : ?>
					<b>Course Times:</b> 
					<?php echo get_post_meta($post->ID, 'ecpt_course_times', true); ?><br>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_course_limit', true) ) : ?>
					<b>Course Limit:</b> 
					<?php echo get_post_meta($post->ID, 'ecpt_course_limit', true); ?><br>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_course_website', true) ) : ?>
					<a href="<?php echo get_post_meta($post->ID, 'ecpt_course_website', true); ?>" target="_blank">View course website/syllabus</a>
				<?php endif; ?>
				</p>
			</div>
		</dd>
		
		<?php endwhile; ?>
			</dl>
		<?php endif; ?>
		</main>
	</div>	<!-- End main content (left) section -->
<?php locate_template('parts-sidebar-nav.php', true, false); ?>
</div> <!-- End #landing -->
<?php get_footer(); ?>