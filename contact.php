<?php
/*
 * Template Name: Contact Page
 * Description: Standard page, but it contains an AJAX contact form. 
 */
?>

<?php get_header(); ?>

    <main class="page-main">

	    <div class="container page-container">
	 
			<?php the_post(); ?>
	 		<?php the_content(); ?>

			<!-- where alert messages are placed -->
			<div id="form-messages"></div>

			<!-- form to email -->
			<form action="<?php echo get_template_directory_uri(); ?>/send.php" method="post" class="contact-form" id="ajax-contact">

				<div class="form-field"><label>Name<span>*</span></label> <input type="text" id="name" name="name"></div>

				<div class="form-field"><label>Phone Number</label> <input type="text" id="phonenumber" name="phonenumber"></div>

				<div class="form-field"><label>Email Address<span>*</span></label> <input type="text" id="email" name="email"></div>

				<div class="form-field"><label>City, State</label> <input type="text" id="citystate" name="citystate"></div>

				<div class="form-field"><label>Message<span>*</span></label> <textarea name="message" id="message"></textarea></div>

				<input type="submit" name="submit" value="Submit">

			</form>

		</div>

    </main>

<?php get_footer() ?>
