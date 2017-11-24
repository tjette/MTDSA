<?php
/**
 * VictorTheme Custom Changes :Changed Overall Structure
*/
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version  4.3
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$event_id = get_the_ID();

// Theme Options
$groppe_single_featured_image = cs_get_option('event_featured_image');
$groppe_single_share_option = cs_get_option('event_share_option');
$single_post_pagination = cs_get_option('event_post_pagination');

$post_meta = get_post_meta( get_the_ID() );
$s_date = $post_meta['_EventStartDate'];
$s_createDate = new DateTime($s_date[0]);
$s_year = $s_createDate->format('Y');
$s_month = $s_createDate->format('M');
$s_day = $s_createDate->format('d');
$s_full_date = $s_createDate->format('d F Y');
$s_hour = $s_createDate->format('g:i a');
// end date
$e_date = $post_meta['_EventEndDate'];
$e_createDate = new DateTime($e_date[0]);
$e_year = $e_createDate->format('Y');
$e_month = $e_createDate->format('M');
$e_day = $e_createDate->format('d');
$e_full_date = $e_createDate->format('d M Y');
$e_hour = $e_createDate->format('g:i a');
$venu_details = tribe_get_venue_details ( get_the_ID() );
tribe_the_notices();
$event_popup_options = get_post_meta( get_the_ID(), '_event_popup_form_metabox', true );
  if ($event_popup_options) {
  	if ($event_popup_options['popup_btn']) {
    $event_contact_btn = $event_popup_options['popup_btn'];
    $event_popup_form_id = $event_popup_options['form_id'];
    $event_contact_btn_type = $event_popup_options['contact_btn_type'];
    $event_contact_btn_link = $event_popup_options['contact_btn_link'] ? $event_popup_options['contact_btn_link'] : cs_get_option('contact_btn_link');
  	} else {
	    $event_contact_btn = cs_get_option('popup_btn');
	    $event_popup_form_id = cs_get_option('form_id');
	    $event_contact_btn_type = cs_get_option('contact_btn_type');
	    $event_contact_btn_link = cs_get_option('contact_btn_link');
  	}
  } else {
    $event_contact_btn = cs_get_option('popup_btn');
    $event_popup_form_id = cs_get_option('form_id');
    $event_contact_btn_type = cs_get_option('contact_btn_type');
    $event_contact_btn_link = cs_get_option('contact_btn_link');
  }
?>

<header class="grop-evensigl_header">
	<!--post media image start\-->
	<div class="grop-flax_vr-middle  grop-fix  grop-evensigl_txbtn">
			<?php esc_attr(the_title( '<div class="grop-evensigl_tx">', '</div>' ));
		if ($event_contact_btn) { ?>
		<div class="text-right  grop-evensigl_rebtn_warp">
      <?php if ($event_contact_btn_type === 'popup') { ?>
      <a class="grop-btn grop-btn_overly grop-evensiglre_btn" href="#<?php echo esc_attr($event_popup_form_id); ?>"  data-toggle="modal" data-target="#<?php echo esc_attr($event_popup_form_id); ?>">
					<span><?php echo esc_html__( 'Register Now', 'groppe' ); ?></span>
				</a>
      <?php } else { ?>
      	<a class="grop-btn grop-btn_overly grop-evensiglre_btn" href="#<?php echo esc_url($event_contact_btn_link); ?>">
					<span><?php echo esc_html__( 'Register Now', 'groppe' ); ?></span>
				</a>
      <?php } ?>

		</div>
		<?php if ( function_exists( 'groppe_event_popup_form' ) ) {
			groppe_event_popup_form();
		}
 } ?>

	</div>
	<!--post media image start\-->
	<?php if ($groppe_single_featured_image){ ?>
		<div class="grop-evensigl_media">
			<!--image start\-->
			<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
		</div><!--/post media image end-->
	<?php } ?>
</header>
<div class="grop-evensigl_content grop-evensigl_desc_warp grop-evensigl_desc">
<!--Single Details warp start\-->
	<div class="grop-float_right   grop-evensigl_dtls_warp">
		<!--title start\-->
		<h5 class="grop-dtls_title"><?php echo esc_html__( 'Events Details', 'groppe' ); ?></h5><!--/end-->
		<div class="grop-evensigl_dtls">
			<!--Single Details start\-->
			<div class="grop-fix  grop-evensigl_dtl">
				<!--icon start\-->
				<div class="grop-float_left  grop-dtl_icon">
					<img src="<?php echo esc_attr(GROPPE_IMAGES.'/icon1.png'); ?>" alt="#" >
				</div><!--/ end-->
				<!--time text start\-->
				<div class="grop-fix grop-dtl">
					<h5><?php echo esc_html__( 'Date', 'groppe' ); ?></h5>
					<p><?php echo esc_attr($s_full_date); ?></p>
				</div><!--/ end-->
			</div><!--/Single Details end-->
			<!--Single Details start\-->
			<div class="grop-fix  grop-evensigl_dtl">
				<!--icon start\-->
				<div class="grop-float_left  grop-dtl_icon">
					<img src="<?php echo esc_attr(GROPPE_IMAGES.'/icon2.png'); ?>" alt="#" >
				</div><!--/ end-->
				<!--time text start\-->
				<div class="grop-fix grop-dtl">
					<h5><?php echo esc_html__( 'Time', 'groppe' ); ?></h5>
					<p><?php echo esc_attr($s_hour).'-'.esc_attr($e_hour);  ?></p>
				</div><!--/ end-->
			</div><!--/Single Details end-->
			<!--Single Details start\-->
			<?php if(!empty($venu_details['address']) || !empty($venu_details['linked_name'])){ ?>
				<div class="grop-fix  grop-evensigl_dtl">
					<!--icon start\-->
					<div class="grop-float_left  grop-dtl_icon">
						<img src="<?php echo esc_attr(GROPPE_IMAGES.'/icon3.png'); ?>" alt="#" >
					</div><!--/ end-->

					<!--time text start\-->
					<div class="grop-fix grop-dtl">
						<h5><?php echo esc_html__( 'Venue', 'groppe' ); ?></h5>
						<p><?php
	        if(!empty($venu_details['linked_name'])){
	          echo esc_attr( $venu_details['linked_name'] );
	        } else {
	          echo esc_attr( $venu_details['address'] );
	        } ?>
	        </p>
					</div><!--/ end-->

				</div><!--/Single Details end-->
      <?php } ?>

		</div>
	</div><!--/Single Details warp end-->
	<?php
	while ( have_posts() ) :  the_post();
	 	the_content();

			// tribe_get_template_part( 'modules/meta' );
	endwhile;
	$diff = strtotime($s_date[0])-time();
	if($diff > 0) { ?>
		<div class="grop-flax_vr-middle   grop-fix  grop-evensiglcnd_warp">
			<!--countdown  clock counter start  \-->
			<div class="grop-countdown">
				<div class="grop-flipclock"
					data-clockface="DailyCounter"
					data-diff="<?php echo esc_attr( $diff ); ?>"
					data-autoplay="true"
					data-autostart="false"
					data-countdown="true"
					data-defaultlanguage="english"
					data-minimumdigits="0">
				</div>
			</div><!--/countdown clock counter end-->

			<!--Events Details btn start  \-->
			<div class="text-right  grop-cntdwn_evt_btn_wrp">
				<a class="grop-btn grop-btn_overly grop-cntdwn_evt_btn" href="">
					<span><?php echo esc_html__( 'Buy Ticket Online', 'groppe' ); ?></span>
				</a>
			</div><!--/ end-->
		</div>
	<?php } ?>
	<div class="grop-evensigl_map">
		<h4><?php echo esc_html__( 'Location Map', 'groppe' ); ?></h4>
		<?php
		do_action( 'tribe_events_single_event_before_the_meta' );
			tribe_get_template_part( 'modules/meta' );
		do_action( 'tribe_events_single_event_after_the_meta' );
		?>
	</div>
	<div class="clearfix"></div>
</div>
<footer class="rop-evensigl_footer">
	<!--social share start\-->
	<?php
	if($groppe_single_share_option) {
		if ( function_exists( 'groppe_wp_share_option' ) ) {
			echo groppe_wp_share_option();
		}
	}
	if($single_post_pagination) { groppe_single_post_pagination(); } ?>
</footer>
