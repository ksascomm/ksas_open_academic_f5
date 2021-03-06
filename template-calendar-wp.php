<?php
/*
Template Name: Calendar - WP Plugin
*/
?>
<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="page">
<div class="small-12 large-9 large-push-3 columns wrapper radius-left offset-topgutter">	
		<?php locate_template('parts-nav-breadcrumbs.php', true, false); ?>	
		<main class="content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<p align="right"><a href="<?php echo site_url(); ?>/feed/ical?categories=<?php echo get_post_meta($post->ID, 'cal_cats', true); ?>"class="button">Subscribe to <?php the_title(); ?></a></p>
			<?php if (!is_handheld()) {
			function render_calendar($atts) {
				global $post;
					$cal_cats = get_post_meta($post->ID, 'cal_cats', true);
					$cal_cats_atts = 'categories="' . $cal_cats . '";';
				global $fsCalendar;
				$content = '{events_calendar; ' . $cal_cats_atts . '}';
				return $fsCalendar->hookFilterContent($content);	
			}
			add_shortcode( 'my_calendar', 'render_calendar' );
			echo do_shortcode('[my_calendar]'); 
			the_content();			
			
				 } else {
				 the_content();
				 $cal_cats_mobile = get_post_meta($post->ID, 'cal_cats', true);
				fse_print_events($args = array(
					"groupby" => FSE_GROUPBY_DAY,
					"template" => "<a href='{event_url}' class='black'><article><h6>{event_startdate} {event_starttime}{event_endtime; before=-;  }{event_allday text=All Day}</h6><strong><span class='blue'>{event_subject}</span></strong><br><strong>Type:</strong> {event_categories}<br><strong>Location: </strong>{event_location}</article></a>", 
					"alwaysshowenddate" => "false",
					"categories" => $cal_cats_mobile, 
					"datefrom" => "today"));
			} endwhile; endif; ?>
			
		</main>
	</div>
<?php locate_template('parts-sidebar-nav.php', true, false); ?>
</div> 
<?php get_footer(); ?>