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
	    		<i class="fa fa-star left"></i>
	    		<h1 class="page-title horizontal-line-value"><?php the_title(); ?></h1>
	    		<i class="fa fa-star right"></i>
	    	</div>
	    	
	 		<div class="row">
	 		
	 			<div class="col-md-9 page-content">
	 					
	 				<?php the_post(); ?>
	 				<?php the_content(); ?>

	 				<?php if(is_page('involved')): ?>
						<a class="red-button get-involved-contact-button" href="<?php echo site_url(); ?>/contact">Contact Us!</a>
	 				<?php endif; ?>

	 			</div>

	 			<div class="col-md-3 sidebar-content">

	 				<?php if(is_page('events')) : ?>	

		 			<?php else: ?>

						<div class="sidebar-box">
			 				<h4>Sign up for our mailing list</h4>
			 				<span class="signup-description">Get updates on upcoming events, related news, and opportunities to get involved.</span>
			 				<?php echo smlsubform(); ?>
		 				<div class="sidebar-box">

		 				<?php get_template_part('includes/sidebar','involved'); ?>

		 			<?php endif; ?>

	 			</div>

	 		</div>

		</div>

    </main>

<?php get_footer() ?>
