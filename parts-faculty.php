<div class="row">
	<div class="small-12 medium-5 medium-offset-7 columns">
		<label for="jump">
			<h5>Jump to Faculty Member</h5>
		</label>
		<select name="jump" id="jump" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<option>---<?php the_title(); ?></option> 
			<?php endwhile; endif; ?>
			<?php $jump_menu_query = new WP_Query(array(
				'post-type' => 'people',
				'role' => 'faculty',
				'meta_key' => 'ecpt_people_alpha',
				'orderby' => 'meta_value',
				'order' => 'ASC',
				'posts_per_page' => '-1')); ?>
			<?php while ($jump_menu_query->have_posts()) : $jump_menu_query->the_post(); ?>				
				<option value="<?php the_permalink() ?>"><?php the_title(); ?></option>
			<?php endwhile; ?>
		</select>
	</div>
</div>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="small-12 medium-4 columns bio">
				<?php if ( has_post_thumbnail()) { ?> 
						<?php the_post_thumbnail('full'); ?>
					<?php } ?>			    
					<h1><?php the_title() ?></h1>
			    <h2><?php echo get_post_meta($post->ID, 'ecpt_position', true); ?></h2>
			
			    <p class="listing">
			    	<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?>
			    		<span class="icon-location"></span><?php echo get_post_meta($post->ID, 'ecpt_office', true); ?><br>
			    	<?php endif; ?>
			    
			    	<?php if ( get_post_meta($post->ID, 'ecpt_hours', true) ) : ?>
			    		<span class="icon-calendar-2"></span><?php echo get_post_meta($post->ID, 'ecpt_hours', true); ?><br>
			    	<?php endif; ?>
			    
			    	<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?>
			    		<span class="icon-phone"></span><?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?><br>
			    	<?php endif; ?>
			    
			    	<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?>
			    		<span class="icon-printer"></span><?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?><br>
			    	<?php endif; ?>
			    
			    	<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : $email = get_post_meta($post->ID, 'ecpt_email', true); ?>
											<span class="icon-mail"></span><a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;<?php echo email_munge($email); ?>">
											
											<?php echo email_munge($email); ?> </a><br>
										<?php endif; ?>
			    	
			    	<?php if ( get_post_meta($post->ID, 'ecpt_cv', true) ) : ?>
			    		<a href="<?php echo get_post_meta($post->ID, 'ecpt_cv', true); ?>"><span class="icon-file-pdf"></span>Curriculum Vitae</a><br>
			    	<?php endif; ?>
			    
			    	<?php if ( get_post_meta($post->ID, 'ecpt_website', true) ) : ?>
			    		<a href="<?php echo get_post_meta($post->ID, 'ecpt_website', true); ?>" target="_blank"><span class="icon-globe"></span>Personal Website</a><br>
			    	<?php endif; ?>
			    	<?php if ( get_post_meta($post->ID, 'ecpt_lab_website', true) ) : ?>
			    		<a href="<?php echo get_post_meta($post->ID, 'ecpt_lab_website', true); ?>" target="_blank"><span class="icon-globe"></span>Group Website</a>
			    	<?php endif; ?>
			    </p>
			</div>

			<dl class="tabs small-12 medium-8 columns" data-tab>
				<?php if ( get_post_meta($post->ID, 'ecpt_bio', true) ) : ?><dd class="active"><a href="#bio">Biography</a></dd><?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_research', true) ) : ?><dd><a href="#research">Research</a></dd><?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_teaching', true) ) : ?><dd><a href="#teaching">Teaching</a></dd><?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_publications', true) || get_post_meta($post->ID, 'ecpt_microsoft_id', true) || get_post_meta($post->ID, 'ecpt_google_id', true)) : ?><dd><a href="#publications">Publications</a></dd><?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_books_cond', true) == 'on' ) : ?><dd><a href="#books">Books</a></dd><?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_extra_tab_title', true) ) : ?><dd><a href="#extra"><?php echo get_post_meta($post->ID, 'ecpt_extra_tab_title', true); ?></a></dd><?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_extra_tab_title2', true) ) : ?><dd><a href="#extra2"><?php echo get_post_meta($post->ID, 'ecpt_extra_tab_title2', true); ?></a></dd><?php endif; ?>			  
			</dl>
			
			<div class="tabs-content faculty">				
			<?php if ( get_post_meta($post->ID, 'ecpt_bio', true) ) : ?>
					<div class="content active" id="bio">
						<?php echo get_post_meta($post->ID, 'ecpt_bio', true); ?>
					</div>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_research', true) ) : ?>
					<div class="content" id="research"><?php echo get_post_meta($post->ID, 'ecpt_research', true); ?></div>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_teaching', true) ) : ?>
					<div class="content" id="teaching"><?php echo get_post_meta($post->ID, 'ecpt_teaching', true); ?></div>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_publications', true) || get_post_meta($post->ID, 'ecpt_microsoft_id', true) || get_post_meta($post->ID, 'ecpt_google_id', true) ) : ?>
					<div class="content" id="publications">
						<?php if ( get_post_meta($post->ID, 'ecpt_publications', true) ) : echo get_post_meta($post->ID, 'ecpt_publications', true); endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_microsoft_id', true) ) : ?>
							<?php $author_id = get_post_meta($post->ID, 'ecpt_microsoft_id', true); ?>
							<div id="LibraInsideDiv" class="libra">[Loading...]</div>
							<script language="javascript">
							    g_libraBase="http://academic.research.microsoft.com/";
							    g_authorID=<?php echo $author_id;?>;
							    g_showMask=5;g_orderBy=0;g_topN=20;g_showStyle="LibraStyle";g_content=2;g_ws_head="http://academic.research.microsoft.com/";
							</script>
							<script language="javascript" id="insideJs" src="http://academic.research.microsoft.com/LibraInside?js&infos=<?php echo $author_id; ?>|5|0|20"></script>						
						<?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_google_id', true) ) : locate_template('parts-google-scholar.php', true, false); endif; ?>
					</div>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_books_cond', true) == 'on' ) : locate_template('parts-faculty-books.php', true, false); endif;?>
				<?php if ( get_post_meta($post->ID, 'ecpt_extra_tab', true) ) : ?>
					<div class="content"  id="extra"><?php echo get_post_meta($post->ID, 'ecpt_extra_tab', true); ?></div>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_extra_tab2', true) ) : ?>
					<div class="content" id="extra2"><?php echo get_post_meta($post->ID, 'ecpt_extra_tab2', true); ?></div>
				<?php endif; ?>			
			</div>
			<?php endwhile; endif; ?>