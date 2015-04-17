<?php
	if ( false === ( $slider_query = get_transient( 'slider_query' ) ) ) {
		$slider_query = new WP_Query(array(
			'post_type' => 'slider',
			'posts_per_page' => '5'));
		set_transient( 'slider_query', $slider_query, 2592000 );
	} 	
	if ( $slider_query->have_posts() ) :
?>
<div class="blueslide hide-for-mobile">
<div class="row">
<div class="slideshow-wrapper">
  <div class="preloader"></div>
<ul id="slider" data-orbit data-options="animation:fade; slide_number: false; timer:true; next_on_click: true;pause_on_hover:false; animation_speed:500; navigation_arrows:false; bullets:false;">
<?php while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
<li>
	<img src="<?php echo get_post_meta($post->ID, 'ecpt_slideimage', true); ?>" class="no-gutter" />
<div class="orbit-caption">
		<summary class="small-4 small-push-8 columns vertical <?php echo get_post_meta($post->ID, 'ecpt_slidecolor', true); ?> no-gutter" id="caption">
			<div class="middle">
				<h3 class="white"><?php the_title(); ?></h3>
				<h5 class="white"><?php echo get_the_content(); ?></h5>
			   	<?php if ( get_post_meta($post->ID, 'ecpt_button', true) ) : ?>				
					<div class="button <?php echo get_post_meta($post->ID, 'ecpt_slidecolor', true); ?>"><a href="<?php echo get_post_meta($post->ID, 'ecpt_urldestination', true); ?>"><span class="uppercase">Find Out More</span></a></div>
				<?php endif;?>
			</div>
	</summary>	
</div>

</li>
<?php endwhile; ?>
				
</ul>
</div>
</div>
</div>
<?php endif; ?>
<div class="slider-break"></div>