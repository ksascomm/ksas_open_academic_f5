<footer>
  	<div class="row hide-for-print">
  		<nav class="small-10 medium-3 columns" id="quicklinks" aria-label="Quicklinks Menu">
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
					'container' => 'false', 
					'walker' => new foundation_navigation() ) ); 
				
				//Return to current site
				if ( $theme_option['flagship_sub_quicklinks']  == '1' ) { restore_current_blog(); }
			 ?>
		</nav>
		<!-- Footer Links -->
		<div class="medium-6 columns" role="navigation" aria-labelledby="menu-footer-links">
			<ul id="menu-footer-links" class="inline-list" role="menu">
				<li role="menuitem"><a href="<?php echo get_site_url(); ?>/sitemap">Sitemap</a></li>
				<li role="menuitem"><a href="<?php echo get_site_url(); ?>/about/recruiting/">Employment</a></li>
				<li role="menuitem"><a href="http://krieger.jhu.edu/communications-office/">Communications Office</a></li>
				<li role="menuitem"><a href="https://www.jhu.edu/alert/">Emergency Alerts & Info</a></li>
			</ul>
		</div>

		<!-- Social Media -->
		<div class="small-12 medium-4 large-2 columns" role="navigation" aria-label="Social Media">
			<div class="small-6 columns">
				<a href="http://facebook.com/jhuksas" title="Facebook"><span class="fa fa-facebook-official fa-3x"></span><span class="screen-reader-text">Facebook</span></a>
			</div>
			<div class="small-6 columns">
				<a href="https://www.youtube.com/user/jhuksas" title="YouTube"><span class="fa fa-youtube-square fa-3x"></span><span class="screen-reader-text">YouTube</span></a>
			</div>
		</div>
	</div>	

	<!-- Copyright and Address -->
	<div class="row" id="copyright" role="contentinfo">
		<p>&copy; <?php print date('Y'); ?> Johns Hopkins University, <?php echo $theme_option['flagship_sub_copyright'];?></p>
	</div>
	<div class="row">
			<div class="small-12 small-centered medium-4 columns">
			<a href="http://www.jhu.edu" title="Johns Hopkins University homepage"><img src="<?php echo get_template_directory_uri() ?>/assets/images/university.jpg" alt="Johns Hopkins University logo"/></a>
		</div>
	</div>
</footer>
  
  <?php //Call all the javascript
  		locate_template('parts-script-initiators.php', true, false); 
  		wp_footer(); ?>
  		
	</body>
</html>