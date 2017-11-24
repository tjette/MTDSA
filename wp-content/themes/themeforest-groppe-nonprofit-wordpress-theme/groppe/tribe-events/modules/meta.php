<?php
/**
 * VictorTheme Custom Changes :Removed all Meta's except Google map.
*/
/**
 * Single Event Meta Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta.php
 *
 * @package TribeEventsCalendar
 */

do_action( 'tribe_events_single_meta_before' );

// Check for skeleton mode (no outer wrappers per section)
$not_skeleton = ! apply_filters( 'tribe_events_single_event_the_meta_skeleton', false, get_the_ID() );

// Do we want to group venue meta separately?
$set_venue_apart = apply_filters( 'tribe_events_single_event_the_meta_group_venue', false, get_the_ID() );

// If we have no map to embed and no need to keep the venue separate...
if ( ! $set_venue_apart && ! tribe_has_organizer() && tribe_embed_google_map() ) {
	tribe_get_template_part( 'modules/meta/map' );
}
// Custom Changes : Removed all Organizer Meta's