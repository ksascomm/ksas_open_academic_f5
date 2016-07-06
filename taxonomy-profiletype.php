<?php get_header(); ?>
<div class="row sidebar_bg radius10" id="page">
<div class="small-12 large-9 large-push-3 columns wrapper radius-left offset-topgutter">	
		<main class="content">
		<?php if(is_tax('profiletype', 'spotlight')){ ?>
		<h1>Spotlights</h1>
		<?php } elseif(is_tax('profiletype', 'undergraduate-profile')){ ?>
		<h1>Undergraduate Profiles</h1>
		<?php } elseif(is_tax('profiletype', 'graduate-profile')){ ?>
		<h1>Graduate Profiles</h1>
		<?php } ?>
		<?php while ( have_posts()) : the_post(); ?>
			<a href="<?php the_permalink(); ?>">	
				
				<h2><?php the_title();?></h2>
					<?php if ( has_post_thumbnail()) { ?> 
						<?php the_post_thumbnail('thumbnail', array('class'	=> "floatleft")); ?>
					<?php } ?>
					<?php if (get_post_meta($post->ID, 'ecpt_pull_quote', true)){ ?><blockquote><?php echo get_post_meta($post->ID, 'ecpt_pull_quote', true); ?></blockquote><?php }?>
				<?php the_excerpt(); ?>
			</a>
				<hr>
			<?php endwhile; ?>
		<div class="row">
			<?php flagship_pagination(); ?>		
		</div>	
		</main>
	</div>	<!-- End main content (left) section -->
<?php locate_template('parts-sidebar-nav.php', true, false); ?>
</div> <!-- End #landing -->
<?php get_footer(); ?>