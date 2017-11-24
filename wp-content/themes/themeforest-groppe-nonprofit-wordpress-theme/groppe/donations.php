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
$groppe_single_featured_image = cs_get_option('single_featured_image');
$groppe_single_author_info = cs_get_option('single_author_info');
$groppe_single_share_option = cs_get_option('single_share_option');
$single_post_pagination = cs_get_option('single_post_pagination');

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
$groppe_sidebar_position = cs_get_option('single_sidebar_position');
$groppe_single_comment = cs_get_option('single_comment_form');

// Sidebar Position
if ($groppe_sidebar_position === 'sidebar-hide') {
	$groppe_sidebar_class = ' grop-hide-sidebar';
} elseif ($groppe_sidebar_position === 'sidebar-left') {
	$groppe_sidebar_class = ' grop-left-sidebar';
} else {
	$groppe_sidebar_class = ' grop-right-sidebar';
}
?>
<div class="grop-fix  container grop-page-with_sidbr_warp <?php echo esc_attr($groppe_content_padding. $groppe_sidebar_class); ?>" style="<?php echo esc_attr($groppe_custom_padding); ?>">
	<article class="grop-float_left  grop-page-with_sidbr_entry_content">
	<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('grop-single_post_warp'); ?>>
						<?php get_template_part( 'layouts/post/single/content', get_post_format() ); ?>
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
							if($groppe_single_author_info) { echo groppe_author_info(); }
							if($single_post_pagination) { groppe_single_post_pagination(); }
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