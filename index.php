<?php
/*
 * Template Name: Home Page
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

		<div class="col-md-8 page-content post-roll">
			<h2 class="section-title">Latest News</h2>
				<?php while ( have_posts() ) : the_post() ?>		

						<div class="post-box">
							<h2><?php the_title(); ?></h2>
							<div class="post-content">
								<?php 
					
									if (has_post_thumbnail( $post->ID ) ): 
										$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
										$imageURL = $image[0];
										?>
											<div class="featured-image" style="background:url('<?php echo $imageURL; ?>'); background-size:cover; background-position:center;">

											</div>
										<?php
									endif; 

								?>
								<?php the_content(); ?>
								<div class="post-meta">
									<span class="post-date"><i class="fa fa-calendar">&nbsp;&nbsp;</i>Posted on <?php echo get_the_date('F j, Y'); ?></span>
									<span class="read-more">Read More</span>
								</div>
							</div>
						</div>

						

		<?php endwhile; ?>

		</div>

		<div class="col-md-4 sidebar-content">
			<h2 class="section-title">Upcoming Events</h2>
			<div class="sidebar-section">
				<?php get_template_part('includes/snippet', 'upcoming-events'); ?>
				<a class="more-info" href="#">See All Events</a>
			</div>

			<h2 class="section-title">Featured Official</h2>
			<div class="sidebar-section">
				<?php get_template_part('includes/snippet', 'upcoming-events'); ?>
				<a class="more-info" href="#">See All Events</a>
			</div>
		</div>	
	</div>

<?php get_footer(); ?>