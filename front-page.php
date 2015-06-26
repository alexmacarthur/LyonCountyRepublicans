<?php
/*
 * Template Name: Front Page
 * Description: Just the front page.
 */
?>

<?php get_header()?>

	<div class="hero-banner">

		<div class="container hero-banner-container">
			<h1 class="hero-text">Welcome to the Growth &amp; Opportunity Party</h1>
			<span class="disclaimer">Representing Lyon County in Southwestern Minnesota</span>
		</div>

		<div class="main-three-holder">

			<div class="container">

				<div class="row main-three-row">
					<div class="col-md-4 main-three">
						<div class="icon-holder">
							<?php get_template_part('img/inline', 'info.svg'); ?>
						</div>
						<h3>About Our Party</h3>
						
					</div>
					<div class="col-md-4 main-three">
						<div class="icon-holder">
							<?php get_template_part('img/inline', 'people.svg'); ?>
						</div>
						<h3>Who We Support</h3>
						
					</div>
					<div class="col-md-4 main-three">
						<div class="icon-holder">
							<?php get_template_part('img/inline', 'handshake.svg'); ?>
						</div>
						<h3>Get Involved</h3>
						
					</div>
				</div>

			</div>

		</div>

		<div class="background"></div>

	</div>

	<div class="container home-container">
	just somecontent;
	</div>

<?php get_footer(); ?>