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
$project_options  = get_post_meta( $groppe_id, 'project_options', true );
if ($project_options) {
	$project_donors = $project_options['project_donors'];
	$project_info = $project_options['project_info'];
} else {
	$project_donors = array();
	$project_info = array();
}
// Single Theme Option
$groppe_single_featured_image = cs_get_option('single_featured_image');
$groppe_single_author_info = cs_get_option('single_author_info');
$groppe_single_share_option = cs_get_option('single_share_option');
$project_single_pagination = cs_get_option('project_single_pagination');
$project_related_post = cs_get_option('project_related_post');

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

// Theme Options
$groppe_sidebar_position = cs_get_option('project_single_sidebar_position');
$groppe_single_comment = cs_get_option('single_comment_form');

// Sidebar Position
if ($groppe_sidebar_position === 'sidebar-hide') {
	$groppe_sidebar_class = ' grop-hide-sidebar';
} elseif ($groppe_sidebar_position === 'sidebar-left') {
	$groppe_sidebar_class = ' grop-left-sidebar';
} else {
	$groppe_sidebar_class = ' grop-right-sidebar';
}
$groppe_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$groppe_large_image = $groppe_large_image[0];
?>
<div class="grop-fix  container grop-page-with_sidbr_warp <?php echo esc_attr($groppe_content_padding. $groppe_sidebar_class); ?>" style="<?php echo esc_attr($groppe_custom_padding); ?>">
	<article class="grop-float_left  grop-page-with_sidbr_entry_content">
		<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('grop-project_single_warp'); ?>>
						<header class="grop-pjctsigle_header">
							<?php
							if ($groppe_large_image) { ?>
							<div class="grop-projct_media">
								<img src="<?php echo esc_url($groppe_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
							</div>
							<?php }
							 if (!empty(get_the_title())) {
							 	echo '<h2 class="grop-pjctsigle_title">'.esc_attr(get_the_title()).'</h2>';
							 } ?>
						</header>
							<div class="grop-pjctsigle_content">
									<?php the_content(); ?>
							</div>
						<!--post footer start\-->
						<footer class="grop-pjctsigle_footer">

							<!--project donors  start\-->
							<?php if ($project_donors){ ?>
								<div class="grop-pjdnatrsd_area">
									<!--project donors sec title start\-->
									<h3><?php echo esc_html__( 'Donors Who Funded This Project', 'groppe' ); ?></h3><!--/ end-->
									<div class="grop-pjdnatrsdcaro_warp">
										<!--project donors carousel  start\-->
										<div class="owl-carousel  grop-pjdnatrsd_carousel" data-items="4"  data-items-mobile="1" data-autoplay="false" data-dots="true" data-nav="false" data-margin="30">
											<!--  Donators single start \-->
											<?php	foreach ($project_donors as $key => $donor) {
												$image = wp_get_attachment_url( $donor['donor_thumb'] );
												$donor_name = $donor['donor_name'];
												$donated_amount = $donor['donated_amount'];
											?>
											<div class="dnatrsd_single_item">
												<div class="grop-dnatrsd_single  grop-pjdnatrsd_single">
													<div class="text-center  grop-dnatrsd_cont_warp">
														<div class="grop-dnatrsd_cont">
															<!--  image start \-->
															<div class="grop-dnatrsd_media">
																<img src="<?php echo esc_url($image); ?>" alt="#" />
															</div><!--/  end-->

															<!--  text start \-->
															<h5 class="grop-dnatrsd_name"><?php echo esc_attr( $donor_name ); ?></h5>
															<h5 class="grop-dnatrsd_amount"><?php echo esc_attr( 'Donated :', 'groppe' ); ?> <span><?php echo esc_attr($donated_amount); ?></span></h5>
															<!--/  end-->
														</div>
													</div>
												</div>
											</div>
											<?php } ?>
										</div><!--/ end-->
									</div>
								</div><!--/project donors  end-->
							<?php } ?>

							<!--social share start\-->
							<?php
							if($groppe_single_share_option) {
								if ( function_exists( 'groppe_wp_share_option' ) ) {
									echo groppe_wp_share_option();
								}
							}
							if($project_single_pagination) { groppe_single_post_pagination(); }
							if ( comments_open() || get_comments_number() ) :
								comments_template();
						  endif;
							if($project_related_post) { groppe_project_related_post(); }  ?>
						</footer>
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