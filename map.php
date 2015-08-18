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
	 			<div class="col-md-12 page-content">
	 					
	 				<?php the_post(); ?>
	 				<?php the_content(); ?>

				    <style>
				      #map {
				        width: 500px;
				        height: 400px;
				      }
				    </style>
				    <div id="map"></div>
	
				    <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>
			


	 			</div>
	 		</div>

		</div>

    </main>

<?php get_footer() ?>
