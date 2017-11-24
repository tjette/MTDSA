<?php
/*
 * The template for displaying all single posts.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();

// Metabox
$groppe_id    = ( isset( $post ) ) ? $post->ID : 0;
$groppe_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $groppe_id;
$groppe_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $groppe_id;
$groppe_meta  = get_post_meta( $groppe_id, 'page_type_metabox', true );

// Single Theme Option
$groppe_single_featured_image = cs_get_option('causes_featured_image');
$groppe_single_share_option = cs_get_option('causes_share_option');
$single_post_pagination = cs_get_option('causes_post_pagination');
$causes_related_post = cs_get_option('causes_related_post');

if ($groppe_meta) {
	$groppe_content_padding = $groppe_meta['content_spacings'];
} else { $groppe_content_padding = ''; }
// Padding - Metabox
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
if(function_exists('give_get_payments')) {
	$args = array(
		'give_forms' => array( get_the_ID() ),
	);
	$donations = give_get_payments( $args );
	$donor_count = count($donations);
} else {
	$donor_count = 0;
}

// Theme Options
$groppe_sidebar_position = cs_get_option('causes_single_sidebar_position');
$groppe_single_comment = cs_get_option('causes_comment_form');

// Sidebar Position
if ($groppe_sidebar_position === 'sidebar-hide') {
	$groppe_sidebar_class = ' grop-hide-sidebar';
} elseif ($groppe_sidebar_position === 'sidebar-left') {
	$groppe_sidebar_class = ' grop-left-sidebar';
} else {
	$groppe_sidebar_class = ' grop-right-sidebar';
} ?>
<div class="grop-fix  container grop-page-with_sidbr_warp <?php echo esc_attr($groppe_content_padding. $groppe_sidebar_class); ?>" style="<?php echo esc_attr($groppe_custom_padding); ?>">
	<article class="grop-float_left  grop-page-with_sidbr_entry_content">
		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			$args = array(
					'number' => -1,
				);
				$form        = new Give_Donate_Form( get_the_ID() );
				$goal_option = get_post_meta( get_the_ID(), '_give_goal_option', true );
				$goal        = $form->goal;
				$goal_format = get_post_meta( get_the_ID(), '_give_goal_format', true );
				$income      = $form->get_earnings();
				$color       = get_post_meta( get_the_ID(), '_give_goal_color', true );
				//Sanity check - ensure form has goal set to output
				if ( empty( $form->ID ) || ( is_singular( 'give_forms' ) && ! give_is_setting_enabled( $goal_option ) ) || ! give_is_setting_enabled( $goal_option ) || $goal == 0 ) {
					return false;
				}
				$progress = round( ( $income / $goal ) * 100, 2 );
				if ( $income >= $goal ) {
					$progress = 100;
				}
				$income = give_human_format_large_amount( give_format_amount( $income ) );
				$goal = give_human_format_large_amount( give_format_amount( $goal ) );
				$payment_mode = give_get_chosen_gateway( get_the_ID() );
				$form_action = add_query_arg( apply_filters( 'give_form_action_args', array( 'payment-mode' => $payment_mode, ) ), 	give_get_current_page_url() );
				$groppe_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
				$groppe_large_image = $groppe_large_image[0]; ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('grop-cause_single_warp'); ?>>
						<!-- blog post header start \-->
						<header class="grop-cusigl_header">
							<?php if ($groppe_large_image && $groppe_single_featured_image) { ?>
							<div class="grop-cusigl_media">
								<img src="<?php echo esc_url($groppe_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
								<div class="grop-cusigl_dtr_count">
									<i class="fa fa-heart"></i>
									<?php
										echo	$donor_count.' ';
										if ($donor_count == 1) {
											echo esc_html__('Donor', 'groppe' );
										} else {
											echo esc_html__('Donors', 'groppe' );
										}
									?>
								</div>
							</div>
							<?php }
							$dead_line = get_post_meta( get_the_ID(), '_donation_form_metabox', true );
							$donation_deadline = $dead_line['donation_deadline'];
							$deadline = str_replace('/', '-', $donation_deadline);
							$deadline = date('F d, Y', strtotime($deadline));

							$date = strtotime($deadline);
							$remaining = $date - time();

							$days_remaining = floor($remaining / 86400);
							$hours_remaining = floor(($remaining % 86400) / 3600); ?>
							<div class="grop-cusigl_hd_info">
								<div class="grop-cusigl_hd_primry">
									<p class="grop-cusigl_meta">
										<span class="grop-cusigl_date">
											<i class="fa fa-clock-o"></i><?php echo $days_remaining . esc_html__(' Days Left', 'groppe'); ?>
										</span>
										<?php $category_list = get_the_term_list( $form->ID, 'give_forms_category', '', ', ', '' );
										if ( $category_list ) { ?>
										<span class="grop-cusigl_cat">
											<i class="fa fa-folder-o"></i>
											<?php echo $category_list; ?>
										</span><!--/end-->
										<?php } ?>
									</p><!--/Meta info end-->
									<!--Title start\-->
									<?php if (!empty(get_the_title())) { echo '<h2 class="grop-cusigl_title">'.esc_attr(get_the_title()).'</h2>'; } ?>
								</div>
								<div class="grop-cusigl_hd_secdry">
									<!--prgresba bar start\ -->
									<div class="grop-skill_prgresbar">
										<div class="grop-progress-bar" data-percentage="<?php echo esc_attr($progress.'%') ; ?>">
											<h4 class="progress-title-holder">
												<span class="progress-number-wrapper">
													<span class="progress-number-mark">
														<span class="percent"></span>
														<span class="down-arrow"></span>
													</span>
												</span>
											</h4>
											<div class="progress-content-outter">
												<div class="progress-bar-striped animated progress-content"></div>
											</div>
										</div>
									</div><!--/prgresba bar end-->
									<!--Donate start\ -->
									<div class="grop-flax_vr-middle  grop-fix grop-cusigl_dnt">
										<!--txt start\ -->
										<div class="grop-cusigl_dt-txt">
											<p class="grop-donation_stats">
                    		<?php echo __('Raised: <span class="grop-rasd_amount">'.apply_filters( 'give_goal_amount_raised_output', give_currency_filter( $income ) ).'</span>', 'groppe'); ?> / <?php echo __('Goal: '.apply_filters( 'give_goal_amount_target_output', give_currency_filter( $goal ) ), 'groppe'); ?>
                  		</p>
										</div><!--/end-->
										<!--btn start\ -->
										<div class="grop-cusigl_dt-btn">
										<?php $display_label_field = get_post_meta( get_the_ID(), '_give_checkout_label', true );
											$display_label       = ( ! empty( $display_label_field ) ? $display_label_field : esc_html__( 'Donate Now', 'groppe' ) ); ?>
											<?php if ( function_exists( 'groppe_event_popup_form' ) ) {
												groppe_cause_popup_form();
											} ?>
											<a class="grop-btn grop-btn_overly grop-cusigldt_btn single-donate-now" href="#<?php echo esc_attr(get_the_ID()); ?>">
												<span><?php echo esc_attr($display_label); ?></span>
											</a>
										</div><!--/end-->
									</div><!--/Donate end -->
								</div>
							</div>
						</header>
						<div class="grop-cusigl_content">
							<?php
							$content = get_post_meta(get_the_ID(), '_give_form_content', true );
							echo do_shortcode( $content ); ?>
						</div>
						<!--post footer start\-->
						<footer class="grop-sigl_footer">
							<?php
								$tag_list = get_the_tags();
							  if($tag_list) { ?>
								<div class="grop-sigltags_warp">
									<span><?php echo esc_html__('Tags:', 'groppe' ); ?></span>
									<p class="grop-sigl_tags">
										<?php echo the_tags( '', '', '' ); ?>
									</p>
								</div>
							<?php }
							if($groppe_single_share_option) {
								if ( function_exists( 'groppe_wp_share_option' ) ) {
									echo groppe_wp_share_option();
								}
							}
							if($single_post_pagination) { groppe_single_post_pagination(); }
							if($causes_related_post) { groppe_donation_related_post(); }
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif; ?>
						</footer><!--/ post footer end-->
					</div>

			<?php
				endwhile;
			else :
				get_template_part( 'layouts/post/content', 'none' );
			endif;
			  wp_reset_postdata();  ?>
		</article>
	<?php if ( $groppe_sidebar_position !== 'sidebar-hide') { get_sidebar(); } ?>
</div>
<?php
get_footer();