<?php
/*
 * Template Name: Map Page
 * Description: Shows where the different districts are and stuff.
 */
?>

<?php get_header(); ?>

    <main class="page-main">

	    <div class="container main-container page-container">

	    	<div class="horizontal-line-holder">
	    		<h1 class="page-title horizontal-line-value"><?php the_title(); ?></h1>
	    	</div>

	 		<div class="row">
	 			<div class="col-md-9 page-content">
	 					
	 				<?php the_post(); ?>
	 				<?php the_content(); ?>

 					<iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.govtrack.us/congress/members/embed/mapframe?bounds=-96.453,43.500,-90.502,48.748"></iframe>

	 			</div>
	 		</div>

		</div>

    </main>

<?php get_footer() ?>
