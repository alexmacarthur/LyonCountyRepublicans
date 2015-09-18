<?php
/*
 * Template Name: Contribute Page
 * Description: Will be used for collecting contributions.
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

	 				<?php if(is_page('contribute')): ?>

	 				<div class="row donate-options">
	 					<div class="col-md-6">
	 						
	 						<?php get_template_part("img/inline", "paypal.svg")?>
	 						<h3>PayPal</h3>
	 						<span>You will be taken to PayPal's site where you can donate securely. You'll have the option to pay by credit/debit card or PayPal account.</span>
	 						<div class="donate-action">
	 							<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
									<input type="hidden" name="cmd" value="_s-xclick">
									<input type="hidden" name="hosted_button_id" value="8WBTLKVME8GXS">
									<input type="submit" class="red-button donate-button" name="submit" value="Click to Donate">
								</form>
							</div>

	 					</div>
	 					<div class="col-md-6">
	 	
	 						<?php get_template_part("img/inline", "mail.svg")?>
	 						<h3>By Mail</h3>
	 						<span>Please send a donation by check (no cash, please) with your contact information to the following address: </span>
	 						<div class="donate-action">
	 							
	 							<span class="donation-address">1234 Lava Lane, Marshall, Kentucky</span>

	 						</div>
	 						
	 					</div>
	 				</div>

	 				<?php endif; ?>

	 			</div>
	 			<div class="col-md-3 sidebar-content">
					<div class="sidebar-box">
		 				<h4>Sign up for our mailing list</h4>
		 				<span class="signup-description">Get updates on upcoming events, related news, and opportunities to get involved.</span>
		 				<?php echo smlsubform(); ?>
	 				<div class="sidebar-box">

	 				<?php get_template_part('includes/sidebar','involved'); ?>
	 			</div>
	 		</div>

		</div>

    </main>

<?php get_footer() ?>
