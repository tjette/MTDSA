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
} else { $groppe_content_padding = 'padding-none'; }
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
$groppe_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );
$above_footer_option = get_post_meta( get_the_ID(), 'above_footer_option', true );
if ($above_footer_option) {
	$above_footer_widget = $above_footer_option['above_footer_widget'];
} else {
  $above_footer_widget = '';
}

if ($groppe_page_layout) {
	$groppe_page_layout = $groppe_page_layout['page_layout'];
}else{
	$groppe_page_layout = '';
}
if (!empty($groppe_page_layout)) {
	if ($groppe_page_layout === 'extra-width') {
		$groppe_layout_class = 'container-fluid';
		$groppe_column_class = 'no-sidebar';
	} elseif($groppe_page_layout === 'left-sidebar' || $groppe_page_layout === 'right-sidebar') {
		$groppe_layout_class = 'container';
		$groppe_column_class = 'grop-float_left grop-page-with_sidbr_entry_content';
	} else {
		$groppe_column_class = 'no-sidebar';
		$groppe_layout_class = 'container';
	}

	// Page Layout Class
	if ($groppe_page_layout === 'left-sidebar') {
		$groppe_sidebar_class = 'grop-left-sidebar';
	} elseif ($groppe_page_layout === 'right-sidebar') {
		$groppe_sidebar_class = 'grop-right-sidebar';
	} elseif ($groppe_page_layout === 'extra-width') {
		$groppe_sidebar_class = 'grop-extra-width';
	} else {
		$groppe_sidebar_class = 'grop-full-width';
	}
} else {
	$groppe_page_layout = cs_get_option('theme_page_layout');
	if ($groppe_page_layout === 'extra-width') {
		$groppe_layout_class = 'container-fluid';
		$groppe_column_class = 'no-sidebar';
	} elseif($groppe_page_layout === 'left-sidebar' || $groppe_page_layout === 'right-sidebar') {
		$groppe_layout_class = 'container';
		$groppe_column_class = 'grop-float_left grop-page-with_sidbr_entry_content';
	} else {
		$groppe_column_class = 'no-sidebar';
		$groppe_layout_class = 'container';
	}

	// Page Layout Class
	if ($groppe_page_layout === 'left-sidebar') {
		$groppe_sidebar_class = 'grop-left-sidebar';
	} elseif ($groppe_page_layout === 'right-sidebar') {
		$groppe_sidebar_class = 'grop-right-sidebar';
	} elseif ($groppe_page_layout === 'extra-width') {
		$groppe_sidebar_class = 'grop-extra-width';
	} else {
		$groppe_sidebar_class = 'grop-full-width';
	}
}
// if (!tribee_is_event()) {
	$groppe_sidebar_class = $groppe_sidebar_class;
	$groppe_column_class = $groppe_column_class;

get_header(); ?>
<div class="grop-page <?php echo esc_attr($groppe_layout_class .' '. $groppe_content_padding .' '. $groppe_sidebar_class); ?>" style="<?php echo esc_attr($groppe_custom_padding); ?>">
	<div class="<?php echo esc_attr( $groppe_column_class ); ?>">
		<?php
			while ( have_posts() ) : the_post();
				the_content();
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile;
			  ?>
		<?php
			wp_reset_postdata();  // avoid errors further down the page
		?>
	</div><!-- Content Area -->
	<?php
	if ( $groppe_page_layout === 'left-sidebar' || $groppe_page_layout === 'right-sidebar') { get_sidebar(); }?>
</div>

<?php
if($above_footer_widget) {
	if (is_active_sidebar('above-footer')) {
	  dynamic_sidebar('above-footer');
	}
}
get_footer();