  <footer>
  	<div class="row hide-for-print">
  		<?php //Check Theme Options for Quicklinks setting 
	  		$theme_option = flagship_sub_get_global_options(); 
	  		if ( $theme_option['flagship_sub_quicklinks']  == '1' ) {
	  				global $switched;
	  				$quicklinks_id = $theme_option['flagship_sub_quicklinks_id'];
	  				switch_to_blog($quicklinks_id); }  
	  		
	  		//Quicklinks Menu
	  		wp_nav_menu( array( 
				'theme_location' => 'quick_links', 
				'menu_class' => 'nav-bar', 
				'fallback_cb' => 'foundation_page_menu', 
				'container' => 'nav', 
				'container_id' => 'quicklinks',
				'container_class' => 'small-3 columns hide-for-small', 
				'walker' => new foundation_navigation() ) ); 
			
			//Return to current site
			if ( $theme_option['flagship_sub_quicklinks']  == '1' ) { restore_current_blog(); }
			
			//Footer Links
			 wp_nav_menu( array( 
				'theme_location' => 'footer_links', 
				'menu_class' => 'inline-list hide-for-small', 
				'fallback_cb' => 'foundation_page_menu', 
				'container' => 'nav', 
				'container_class' => 'medium-7 columns', 
				'walker' => new foundation_navigation() ) ); 
		 ?>
		<!-- Social Media -->
		<nav class="small-12 medium-4 large-2 columns">
			<div class="small-6 columns">
				<a href="http://facebook.com/jhuksas" title="Facebook"><i class="fa fa-facebook-official fa-3x"></i></a>
			</div>
			<div class="small-6 columns">
				<a href="https://www.youtube.com/user/jhuksas" title="YouTube"><i class="fa fa-youtube-square fa-3x"></i></a>
			</div>
		</nav>
		<!-- Copyright and Address -->
		<div class="row" id="copyright" role="content-info">
  			<p>&copy; <?php print date('Y'); ?> Johns Hopkins University, <?php echo $theme_option['flagship_sub_copyright'];?></p>
  		</div>
  		<div class="row">
	  		<div class="small-12 small-centered medium-4 columns">
  				<a href="http://www.jhu.edu" title="Johns Hopkins University homepage"><img src="<?php echo get_template_directory_uri() ?>/assets/images/university.jpg" /></a>
  			</div>
  		</div>

  	</div>
  </footer>
  
  <?php //Call all the javascript
  		locate_template('parts-script-initiators.php', true, false); 
  		wp_footer(); ?>
  		
	</body>
</html>