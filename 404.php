<?php get_header(); 
	$theme_option = flagship_sub_get_global_options(); 
	$collection_name = $theme_option['flagship_sub_search_collection'];
?>

<div class="row wrapper radius10">
	<main class="large-12 columns no-gutter">
			<h1 class="page-title">Whoops...</h1>
			<p>This page does not exist.  Try searching</p>
       <form class="search-form" action="<?php echo site_url('/search'); ?>" method="get">
                    <fieldset>
                        <input type="text" class="input-text" name="q" />
                        <label class="inline bold">Search:</label>
                        <input type="radio" name="site" value="<?php echo $collection_name; ?>" checked>This site only
                        <input type="radio" name="site" value="krieger_collection">All JHU websites
                        <input type="submit" class="button blue_bg" value="Search Again" />
                    </fieldset>
       </form>        

	</main>
</div>

<?php get_footer(); ?>

