<?php
/*
 * Template Name: Standard Page
 * Description: Will be used for contact page, about page, and any other static page. 
 */
?>

<?php get_header(); ?>

    <main class="page-main">

	    <div class="container page-container">
	 
			<?php the_post(); ?>
			<?php the_title(); ?>
	 		<?php the_content(); ?>

		</div>

    </main>

<?php get_footer() ?>
