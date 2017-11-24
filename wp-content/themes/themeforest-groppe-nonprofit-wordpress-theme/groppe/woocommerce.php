<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Metabox
$groppe_id    = ( isset( $post ) ) ? $post->ID : 0;
$groppe_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $groppe_id;
$groppe_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $groppe_id;
$groppe_meta  = get_post_meta( $groppe_id, 'page_type_metabox', true );

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

// Page Layout Options
$groppe_woo_columns = cs_get_option('woo_product_columns');
$groppe_woo_sidebar = cs_get_option('woo_sidebar_position');

$groppe_woo_columns = $groppe_woo_columns ? $groppe_woo_columns : '3';

if ($groppe_woo_sidebar === 'left-sidebar') {
	$groppe_column_class = 'grop-float_left grop-page-with_sidbr_entry_content';
	$groppe_sidebar_class = 'grop-left-sidebar';
} elseif ($groppe_woo_sidebar === 'sidebar-hide') {
	$groppe_column_class = 'no-sidebar';
	$groppe_sidebar_class = 'grop-hide-sidebar';
} else {
	$groppe_column_class = 'grop-float_left grop-page-with_sidbr_entry_content';
	$groppe_sidebar_class = 'grop-right-sidebar';
}

get_header();
?>

<section class="grop-fix  container grop-page-with_sidbr_warp woo-col-<?php echo esc_attr($groppe_woo_columns); ?> <?php echo esc_attr($groppe_content_padding); ?> <?php echo esc_attr($groppe_sidebar_class); ?>" style="<?php echo esc_attr($groppe_custom_padding); ?>">
	<div class="<?php echo esc_attr($groppe_column_class); ?>">

		<div class="grop-wooco_content_warp">
			<?php
			if ( have_posts() ) :
				woocommerce_content();
			endif; // End of the loop.
			?>
		</div><!-- Content Area -->
	</div>
		<?php
			// Right Sidebar
			if($groppe_woo_sidebar == 'left-sidebar' || $groppe_woo_sidebar == 'right-sidebar') {
				get_sidebar('shop');
			}
		?>
</section>

<?php
get_footer();
