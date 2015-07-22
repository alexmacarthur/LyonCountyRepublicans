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
		<div class="container page-container calendar-container" id="calendar-container">

			<div class="ten columns page-content calendar-content">
				<div id="tribe-events-pg-template">
					<div class="page-content">
						<?php tribe_events_before_html(); ?>
					</div>

					<?php tribe_get_view(); ?>

					<?php tribe_events_after_html(); ?>
				</div> <!-- #tribe-events-pg-template -->
			</div>

			<div class="vertical-border farther-right"></div>

			<div class="two columns page-sidebar calendar-sidebar">
				<h3>Upcoming Events</h3>
				<?php 
					$args = array('post_type' => 'tribe_events', 'posts_per_page' => 100, 'orderby' => '_EventStartDate', 'order' => 'ASC');
					$loop = new WP_Query($args);

					while ($loop -> have_posts()): $loop -> the_post();
						$eventStartDate = strtotime(tribe_get_event_meta( $event->ID, '_EventStartDate', true ));
						?>

						<div class="row event-row event-row-side">
							<div class="horizontal-line-holder">
								<span class="horizontal-line-value"><?php echo date("M", $eventStartDate) . ' ' . date("d", $eventStartDate); ?></span>
							</div>
							<h3 class="horizontal-line-under"><a href="<?php echo get_permalink($event->ID);?>"><?php echo get_the_title(); ?></a></h3>
						</div>

						<?php
					endwhile;
				?>
			</div>
		</div>
	</main>
<?php get_footer(); ?>
