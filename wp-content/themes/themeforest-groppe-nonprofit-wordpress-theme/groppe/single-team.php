<?php
/*
 * The template for displaying all single team.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();

// Metabox
$groppe_id    = ( isset( $post ) ) ? $post->ID : 0;
$groppe_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $groppe_id;
$groppe_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $groppe_id;
$groppe_meta  = get_post_meta( $groppe_id, 'page_type_metabox', true );
$team_options  = get_post_meta( get_the_ID(), 'team_options', true );
if ($groppe_meta) {
	$groppe_content_padding = $groppe_meta['content_spacings'];
} else { $groppe_content_padding = ''; }
// Padding - Theme Options
if ($groppe_content_padding && $groppe_content_padding !== 'padding-none') {
	$groppe_content_top_spacings = $groppe_meta['content_top_spacings'];
	$groppe_content_bottom_spacings = $groppe_meta['content_bottom_spacings'];
	if ($groppe_content_padding === 'padding-custom') {
		$groppe_content_top_spacings = $groppe_content_top_spacings ? 'padding-top:'. groppe_check_px($groppe_content_top_spacings) .';' : '';
		$groppe_content_bottom_spacings = $groppe_content_bottom_spacings ? 'padding-bottom:'. groppe_check_px($groppe_content_bottom_spacings) .';' : '';
		$groppe_custom_padding = $groppe_content_top_spacings . $groppe_content_bottom_spacings;
	} else {
		$groppe_custom_padding = '';
	}
} else {
	$groppe_custom_padding = '';
}
$groppe_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$groppe_large_image = $groppe_large_image[0];
$team_call_action = cs_get_option('team_call_action');
$team_url = cs_get_option('team_callout_btn_url');
$team_callout_btn_text = cs_get_option('team_callout_btn_text');
$team_callout_btn_text = $team_callout_btn_text ? $team_callout_btn_text : esc_html__( 'BECOME A VOLUNTEER', 'groppe'  );
// Call To Action icon
$call_action_icon = cs_get_option('call_action_icon');
$call_action_icon = ( $call_action_icon ) ? wp_get_attachment_url($call_action_icon) : '';
?>
<div class="grop-tmslpage-entry_content <?php echo esc_attr($groppe_content_padding); ?>" style="<?php echo esc_attr($groppe_custom_padding); ?>">
	<div class="container">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="grop-fix  grop-tmsl_warp">
			<div class="grop-float_left  grop-tmsl_image">
				<img src="<?php echo esc_url($groppe_large_image); ?>" alt="#">
			</div>
			<div class="grop-fix  grop-tmsl_txt_warp">
				<?php
				if(isset($team_options['team_job_position']) &&  !empty( $team_options['team_job_position'] ) ){
					echo '<div class="text-uppercase  grop-tmsl_intro">'.esc_attr($team_options['team_job_position']).'</div>';
				} ?>
				<h3 class="grop-tmsl_title">
					<?php the_title(); ?>
				</h3>
				<?php the_content(); ?>
				<div class="grop-tmsl_conctinfo_warp">
					<!--Single contact info  start \-->
					<div class="grop-fix  grop-tmsl_conctinfo_single">
						<!--icon  start \-->
						<div class="grop-float_left  rop-tmsl_conctinfo_icon">
							<img src="<?php echo esc_url(GROPPE_IMAGES.'/icon1.png'); ?>" alt="<?php echo esc_attr( 'Phone' ); ?>">
						</div>
						<div class="grop-fix grop-tmsl_conctinfo">
							<span><?php esc_html_e( 'Phone:', 'groppe' ); ?></span>
							<a href="tel:<?php echo esc_attr( $team_options['contact_number'] ); ?>"><?php echo esc_attr( $team_options['contact_number'] ); ?></a>
						</div>
					</div>
					<div class="grop-fix  grop-tmsl_conctinfo_single">
						<div class="grop-float_left  rop-tmsl_conctinfo_icon">
							<img src="<?php echo esc_url(GROPPE_IMAGES.'/icon2.png'); ?>" alt="<?php echo esc_attr( 'Envelope' ); ?>">
						</div>
						<div class="grop-fix grop-tmsl_conctinfo">
							<span><?php esc_html_e( 'Email:', 'groppe' ); ?></span>
							<a href="mailto:<?php echo esc_attr( $team_options['team_email_id'] ); ?>"><?php echo esc_attr( $team_options['team_email_id'] ); ?></a>
						</div>
					</div>
					<!--Single contact info  start \-->
					<div class="grop-fix  grop-tmsl_conctinfo_single">
						<!--icon  start \-->
						<div class="grop-float_left  rop-tmsl_conctinfo_icon">
							<img src="<?php echo esc_url(GROPPE_IMAGES.'/icon3.png'); ?>" alt="<?php echo esc_attr( 'Globe' ); ?>">
						</div><!--/icon  end-->
						<!--info txt  start \-->
						<div class="grop-fix grop-tmsl_conctinfo">
							<span><?php esc_html_e( 'Profiles:', 'groppe' ); ?></span>
							<ul class="rop-tmsl_ci-so list-inline">
								<?php $social_icons = $team_options['team_socials'] ;
								foreach ($social_icons as $key => $icon) {
									echo '<li><a href="'.esc_url( $icon['team_social_link'] ).'"><i class="'.esc_attr( $icon['team_social_icon'] ).'"></i></a></li>';
								} ?>
							</ul>
						</div><!--/info txt  end-->
					</div><!--/Single contact info  end-->
				</div>
			</div>
		</div>
	</div>
	<?php
	endwhile;
	endif;
  wp_reset_postdata(); ?>
</div>
<div class="grop-callout_area team_cal_out">
	<div class="grop-vertical_middle  grop-fix container grop-callout_container">
		<div class="grop-float_right grop-callout_btn_warp">
			<a class="grop-btn grop-btn_overly grop-callout_btn" href="<?php echo esc_url( $team_url ); ?>"><span><?php echo esc_attr( $team_callout_btn_text ); ?></span></a>
		</div><!--/Callout btn warp end-->
		<!--Callout text warp start \-->
		<div class="grop-float_left  grop-callout_txt_warp">
			<div class="grop-callout_icon">
				<img src="<?php echo esc_url($call_action_icon); ?>" alt="" />
			</div>
			<p><?php echo esc_attr( $team_call_action ); ?></p>
		</div><!--/Callout text warp end-->
	</div>
</div>
<?php
get_footer();