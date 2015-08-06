<?php
/*
 * Template Name: Contact Page
 * Description: Standard page, but it contains an AJAX contact form. 
 */
?>

<?php get_header(); ?>

    <main class="page-main">

	    <div class="container main-container page-container">

	    	<div class="horizontal-line-holder">
	    		<h1 class="page-title horizontal-line-value"><?php the_title(); ?></h1>
	    	</div>

	 		<div class="row form-row">
	 		
	 			<div class="col-md-6 page-content">
	 					
	 				<?php the_post(); ?>
	 				<?php the_content(); ?>

	 				<hr>
	
					<table class="contact-table">	

						<tr>
							<td><i class="fa fa-home"></i></td>
							<td>
								<span>
									Lyon County Republicans<br>
									PO Box 643<br>
									Marshall, Minnesota 56258
				 				</span>
			 				</td>
						</tr>

					</table>

					<table class="contact-table">
						<tr>
							<td><i class="fa fa-envelope"></i></td>
							<td>
								<span>
									<a href="mailto:lyoncountygop@gmail.com">lyoncountygop@gmail.com</a>
				 				</span>
			 				</td>
						</tr>
					</table>

					<table class="contact-table">
						<tr>
							<td><i class="fa fa-facebook-square"></i></td>
							<td>
								<span>
									<a href="https://www.facebook.com/pages/Lyon-County-MN-Republicans/104119089642669?fref=ts">We're on Facebook!</a>
				 				</span>
			 				</td>
						</tr>
					</table>
	
	 			</div>

	 			<div class="col-md-6 form-content">

	 				<!-- where alert messages are placed -->
					<div id="form-messages"></div>

					<!-- form to email -->
					<form action="<?php echo get_template_directory_uri(); ?>/send.php" method="post" class="contact-form" id="ajax-contact">

						<div class="form-field"><label>Name<span>*</span></label> <input type="text" id="name" name="name"></div>

						<div class="form-field"><label>Phone Number</label> <input type="text" id="phonenumber" name="phonenumber"></div>

						<div class="form-field"><label>Email Address<span>*</span></label> <input type="text" id="email" name="email"></div>

						<div class="form-field"><label>City, State</label> <input type="text" id="citystate" name="citystate"></div>

						<div class="form-field"><label>Message<span>*</span></label> <textarea name="message" id="message"></textarea></div>

						<input type="submit" name="submit" value="Submit" class="red-button">

					</form>

	 			</div>

	 		</div>

		</div>

    </main>

<?php get_footer() ?>
