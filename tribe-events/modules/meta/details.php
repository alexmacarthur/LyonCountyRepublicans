<?php
/**
 * Single Event Meta (Details) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 */


$time_format = get_option( 'time_format', Tribe__Events__Date_Utils::TIMEFORMAT );
$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

$start_datetime = tribe_get_start_date();
$start_date = tribe_get_start_date( null, false );
$start_time = tribe_get_start_date( null, false, $time_format );
$start_ts = tribe_get_start_date( null, false, Tribe__Events__Date_Utils::DBDATEFORMAT );

$end_datetime = tribe_get_end_date();
$end_date = tribe_get_end_date( null, false );
$end_time = tribe_get_end_date( null, false, $time_format );
$end_ts = tribe_get_end_date( null, false, Tribe__Events__Date_Utils::DBDATEFORMAT );

$cost = tribe_get_formatted_cost();
$website = tribe_get_event_website_link();
?>


<div class="<?php if(tribe_get_venue_id() == 0){echo 'col-md-12';}else{echo 'col-md-6';};?> tribe-events-meta-group tribe-events-meta-group-details">
	<div class="horizontal-line-holder">
		<h3 class="tribe-events-single-section-title"> <?php _e( 'Details', 'tribe-events-calendar' ) ?> </h3>
	</div>
	<dl>

		<?php
		do_action( 'tribe_events_single_meta_details_section_start' );

		// All day (multiday) events
		if ( tribe_event_is_all_day() && tribe_event_is_multiday() ) :
			?>

				<dt><?php _e( 'Start:', 'tribe-events-calendar' ) ?></dt>
				<dd><?php esc_html_e( $start_date ) ?></dd>
				<br>

				<dt><?php _e( 'End:', 'tribe-events-calendar' ) ?></dt>
				<dd><?php esc_html_e( $end_date ) ?></dd>
				<br>

		<?php
		// All day (single day) events
		elseif ( tribe_event_is_all_day() ):
			?>


				<dt><?php _e( 'Date:', 'tribe-events-calendar' ) ?></dt>
				<dd><?php esc_html_e( $start_date ) ?></dd>
				<br>


		<?php
		// Multiday events
		elseif ( tribe_event_is_multiday() ) :
			?>


				<dt><?php _e( 'Start:', 'tribe-events-calendar' ) ?> </dt>
				<dd><?php esc_html_e( $start_datetime ) ?> </dd>
				<br>

				<dt> <?php _e( 'End:', 'tribe-events-calendar' ) ?></dt>
				<dd> <?php esc_html_e( $end_datetime ) ?></dd>
				<br>


		<?php
		// Single day events
		else :
			?>

				<dt> <?php _e( 'Date:', 'tribe-events-calendar' ) ?></dt>
				<dd><?php esc_html_e( $start_date ) ?></dd>
				<br>

				<dt><?php _e( 'Time:', 'tribe-events-calendar' ) ?></dt>
				<dd>
					<?php if ( $start_time == $end_time ) {
						esc_html_e( $start_time );
					} else {
						esc_html_e( $start_time . $time_range_separator . $end_time );
					} ?>
				</dd>
				<br>

		<?php endif ?>

		<!-- Event content -->
		<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
		<dt>Description: </dt>
		<dd><?php the_content(); ?></dd>
		<br>
		<!-- .tribe-events-single-event-description -->

		<?php
		// Event Cost
		if ( ! empty( $cost ) ) : ?>

			<dt> <?php _e( 'Cost:', 'tribe-events-calendar' ) ?> </dt>
			<dd class="tribe-events-event-cost"> <?php esc_html_e( $cost ); ?> </dd>
			<br>
		<?php endif ?>

		<?php
		echo tribe_get_event_categories(
			get_the_id(), array(
				'before'       => '',
				'sep'          => ', ',
				'after'        => '',
				'label'        => null, // An appropriate plural/singular label will be provided
				'label_before' => '<dt>',
				'label_after'  => '</dt>',
				'wrap_before'  => '<dd class="tribe-events-event-categories">',
				'wrap_after'   => '</dd>'
			)
		);
		?>

		<?php echo tribe_meta_event_tags( sprintf( __( '%s Tags:', 'tribe-events-calendar' ), tribe_get_event_label_singular() ), ', ', false ) ?>

		<?php
		// Event Website
		if ( ! empty( $website ) ) : ?>

			<dt> <?php _e( 'Website:', 'tribe-events-calendar' ) ?> </dt>
			<dd class="tribe-events-event-url"> <?php echo $website; ?> </dd>
			<br>
		<?php endif ?>

		<?php do_action( 'tribe_events_single_meta_details_section_end' ) ?>
	</dl>
</div>