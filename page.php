<?php
/*
 * Template Name: Standard Page
 * Description: Will be used for contact page, about page, and any other static page. 
 */
?>

<?php get_header(); ?>

    <main class="page-main">



	    <div class="container main-container page-container">

	 		<div class="row">
	 			<div class="col-md-9 page-content">
	 					
	 				<?php the_post(); ?>
	 				<?php the_content(); ?>

	 			</div>
	 			<div class="col-md-3 sidebar-content">
	 				
	 			<div class="sidebar-section get-involved-section">
					<?php get_template_part('includes/snippet', 'get-involved'); ?>
				</div>

	 			</div>
	 		</div>

		</div>

    </main>

<?php get_footer() ?>
