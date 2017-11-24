<?php
/**
 * VictorTheme Custom Changes
*/
/**
 * List View Content Template
 * The content template for the list view. This template is also used for
 * the response that is returned on list view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/content.php
 *
 * @package TribeEventsCalendar
 * @version  4.3
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} 
// Custom Changes : Getting Event Styles From Theme Options
$event_style = cs_get_option('event_styles');
?>

<div id="tribe-events-content" class="tribe-events-list">

	<?php
	/**
	 * Fires before any content is printed inside the list view.
	 */
	do_action( 'tribe_events_list_before_the_content' );
	?>

	<!-- List Title -->
	<?php do_action( 'tribe_events_before_the_title' ); ?>
	<h2 class="tribe-events-page-title"><?php echo tribe_get_events_title() ?></h2>
	<?php do_action( 'tribe_events_after_the_title' ); ?>

	<!-- Notices -->
	<?php tribe_the_notices() ?>

	<!-- List Header -->
	<?php do_action( 'tribe_events_before_header' ); ?>
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>

		<!-- Header Navigation -->
		<?php do_action( 'tribe_events_before_header_nav' ); ?>
		<?php tribe_get_template_part( 'list/nav', 'header' ); ?>
		<?php do_action( 'tribe_events_after_header_nav' ); ?>

	</div>
	<!-- #tribe-events-header -->
	<?php do_action( 'tribe_events_after_header' ); ?>

	<!-- Events Loop -->
	<?php if ( have_posts() ) : ?>
		<!-- Custom Changes : Getting Templates based on Event Styles -->
		<?php do_action( 'tribe_events_before_loop' );
		if ($event_style == 'style_one'){
				get_template_part( 'layouts/event/event', 'grid' ); 
			} elseif ($event_style === 'style_two'){
				get_template_part( 'layouts/event/event', 'list' );
			} else {
 				tribe_get_template_part( 'list/loop' ); 
 			}
		do_action( 'tribe_events_after_loop' ); 
		endif; ?>

	<!-- List Footer -->
	<?php 
	// Custom Changes : Getting Pagination Option from Theme Options and wrapped events footer within that condition
	$event_pagination = cs_get_option('event_pagination');
	if ($event_pagination) {
		do_action( 'tribe_events_before_footer' ); ?>
		<div id="tribe-events-footer">

			<!-- Footer Navigation -->
			<?php do_action( 'tribe_events_before_footer_nav' ); ?>
			<?php tribe_get_template_part( 'list/nav', 'footer' ); ?>
			<?php do_action( 'tribe_events_after_footer_nav' ); ?>

		</div>
		<?php } ?>
		<!-- #tribe-events-footer -->
		<?php do_action( 'tribe_events_after_footer' ) ?>
	
</div><!-- #tribe-events-content -->
<?php 
