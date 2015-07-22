<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 */

if ( ! tribe_get_venue_id() ) {
	return;
}

$phone   = tribe_get_phone();
$website = tribe_get_venue_website_link();

?>

<div class="col-md-6 tribe-events-meta-group tribe-events-meta-group-venue">
	<div class="horizontal-line-holder">
		<h3 class="tribe-events-single-section-title"> <?php _e( tribe_get_venue_label_singular(), 'tribe-events-calendar' ) ?> </h3>
	</div>
	<br>
	<div class="row">

		<?php if(tribe_embed_google_map()) : ?>
			<!-- <div class="col-md-6 venue-block"> -->
		<?php else : ?>
			
		<?php endif; ?>

			<div class="venue-block">

			<span class="venue-name"> <?php echo tribe_get_venue() ?> </span>

				<?php do_action( 'tribe_events_single_meta_venue_section_start' ) ?>

				<?php if ( tribe_address_exists() ) : ?>
					<dd class="location">
						<?php if ( ! empty( $phone ) ): ?>
							<?php echo $phone ?>
						<?php endif ?>
						<address class="tribe-events-address">
							<?php echo tribe_get_full_address(); ?>

							<?php if ( tribe_show_google_map_link() ) : ?>
								<?php echo tribe_get_map_link_html(); ?>
							<?php endif; ?>
						</address>
					</dd>
				<?php endif; ?>

				<?php if ( ! empty( $website ) ): ?>
					<dt> <?php _e( 'Website:', 'tribe-events-calendar' ) ?> </dt>
					<dd class="url"> <?php echo $website ?> </dd>
				<?php endif ?>

				<?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>

		</div>

		<?php if(tribe_embed_google_map()) : ?>
			<div class="six columns map-block">
				<div class="tribe-events-meta-group tribe-events-meta-group-gmap">
					<?php tribe_get_template_part( 'modules/meta/map' ); ?>
				</div>
			</div>
		<?php endif; ?>

	</div>

</div>