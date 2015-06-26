<?php
/*
 * Template Name: Single Post Template
 * Description: Template for displaying single posts.
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
