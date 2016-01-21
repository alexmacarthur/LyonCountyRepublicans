<?php
/*
 * Template Name: Home Page
 * Description: Just the front page.
 */
?>

<?php get_header()?>


	<div class="hero-content-holder">

		<div class="container hero-banner-container">
			<h1 class="hero-text">Welcome to the Growth &amp; Opportunity Party</h1>
			<span class="disclaimer">Representing Lyon County in Southwestern Minnesota</span>
		</div>

		<div class="main-three-holder">

			<div class="container">

				<div class="row main-three-row">
					<div class="col-md-4 col-sm-4 col-xs-4 main-three">
						<div class="icon-holder">
							<a class="main-link" href="<?php echo site_url(); ?>/about">
								<?php get_template_part('img/inline', 'info.svg'); ?>
							</a>
						</div>
						<h3>About the LCR</h3>
						
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 main-three">
						<div class="icon-holder">
							<a class="main-link" href="<?php echo site_url(); ?>/candidates">
								<?php get_template_part('img/inline', 'people.svg'); ?>
							</a>
						</div>
						<h3>Who We Support</h3>
						
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 main-three">
						<div class="icon-holder">
							<a class="main-link" href="<?php echo site_url(); ?>/involved">
								<?php get_template_part('img/inline', 'handshake.svg'); ?>
							</a>
						</div>
						<h3>Get Involved</h3>
						
					</div>
				</div>

			</div>

		</div>

	</div>

	<div class="container main-container">

		<div class="col-md-8 post-roll">
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

								<p><?php echo get_the_excerpt(); ?></p>
								
								<div class="post-meta">
									<a href="<?php echo get_permalink(); ?>" class="read-more red-button">Read More</a>
								</div>
							</div>
						</div>

		<?php endwhile; ?>

		</div>

		<?php 

			$today = date("Y-m-d",mktime(0,0,0,date("m"),date("d"),date("Y")));

			$args = array(
		      'post_type' => 'tribe_events',
		      'meta_key'=>'_EventStartDate',
		      'orderby'=>'_EventStartDate',
		      'order'=>'DESC',
		      	'meta_query' => array(
				    array(
				      'key' => '_EventStartDate',
				      'value' => $today,
				      'type' => 'DATE',
				      'compare' => '>=',
				    )
				)
		    );
		 	$events = get_posts($args);
		?>

		<div class="col-md-4 sidebar-content">
			<?php if(count($events) > 0): ?>
				<section>
					<h2 class="section-title">Upcoming Events</h2>
					<p class="section-description">Check out our upcomoing events for you to become involved with the LCR or the conservative cause as a whole.</p>
					<div class="sidebar-section">

						<?php //get_template_part('includes/snippet', 'upcoming-events'); ?>

						<?php 

						  if($events){
						    foreach ($events as $event){
						      $ID = $event->ID;
						      $timestamp = strtotime(tribe_get_event_meta( $event->ID, '_EventStartDate', true ));
						      $theDate = date('d', $timestamp);
						      $theMonth = date('M', $timestamp);
						      ?>

						      <div class="row upcoming-event-row">
						        <div class="col-md-4 date-details">
						          <div class="date-box-holder">
						            <div class="date-box">
						              <span class="date-only"><?php echo $theDate; ?></span>
						            </div>
						            <span class="month-only"><?php echo $theMonth; ?></span>
						          </div>
						       </div>

						       <div class="col-md-8 event-details">

						          <a href="<?php echo get_permalink($ID); ?>"><h4 class="event-title"><?php echo get_the_title($ID); ?></h4></a>
						          <span class="event-detail"><?php echo tribe_get_venue($event->ID); ?></span>
						          <span class="event-detail"><?php echo tribe_get_start_time($event->ID); ?></span>
						          
						       </div>

						      </div>

						      <?php
						    }
						  }
						?>
						<a class="more-info" href="<?php echo site_url(); ?>/events">See All Events</a>
					</div>
				</section>
			<?php endif; ?>
			
			<section>
				<h2 class="section-title">Featured Official</h2>
				<p class="section-description">The LCR supports several area officials who fight for conservative values and principles.</p>
				<div class="sidebar-section">
					<?php get_template_part('includes/snippet', 'featured-official'); ?>
					<a class="more-info" href="<?php echo site_url(); ?>/candidates">See Who Else We Support</a>
				</div>
			</section>
	
			<section>
				<h2 class="section-title">Looking to Get Involved?</h2>
				<p class="description">There are plenty of opportunities to get involved in advancing the goals of the LCR. Find more here!</p>
				<div class="sidebar-section get-involved-section">
					<a class="get-involved-button" href="<?php echo site_url(); ?>/involved">Learn How</a>
				</div>
			</section>
		</div>	

	</div>

<?php get_footer(); ?>