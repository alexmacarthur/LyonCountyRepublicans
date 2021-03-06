<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header(); ?>

	<main>
		<div class="container main-container page-container events-container">

			<div class="horizontal-line-holder">
	    		<i class="fa fa-star left"></i>
	    		<h1 class="page-title horizontal-line-value">Events</h1>
	    		<i class="fa fa-star right"></i>
	    	</div>


			<div class="row">

				<div class="col-md-9 page-content calendar-content">
				
<!-- 					<div class="no-display display-550 message">
						To view our full calendar, please use a larger screen.
					</div> -->

					<?php tribe_events_before_html(); ?>

					<?php tribe_get_view(); ?>

					<?php tribe_events_after_html(); ?>

				</div>

				<div class="col-md-3 sidebar-content">

						<h3 class="events-sidebar-header">Upcoming Events</h3>
						<?php 
							$args = array('post_type' => 'tribe_events', 'posts_per_page' => 100, 'orderby' => '_EventStartDate', 'order' => 'ASC');
							$loop = new WP_Query($args);

							while ($loop -> have_posts()): $loop -> the_post();
								$eventStartDate = strtotime(tribe_get_event_meta( $event->ID, '_EventStartDate', true ));
								?>

								<div class="row upcoming-event-row">
									<div class="horizontal-line-holder">
										<span class="horizontal-line-value"><?php echo date("M", $eventStartDate) . ' ' . date("d", $eventStartDate); ?></span>
									</div>
									<span class="horizontal-line-under upcoming-event-title"><a href="<?php echo get_permalink($event->ID);?>"><?php echo get_the_title(); ?></a></span>
								</div>

								<?php
							endwhile;
						?>

				</div>

			</div>

		</div>
	</main>

<?php get_footer(); ?>
