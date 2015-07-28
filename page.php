<?php
/*
 * Template Name: Standard Page
 * Description: Will be used for contact page, about page, and any other static page. 
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

	 			</div>

	 		</div>

		</div>

    </main>

<?php get_footer() ?>
