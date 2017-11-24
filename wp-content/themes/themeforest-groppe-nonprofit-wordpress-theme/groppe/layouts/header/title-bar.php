<?php
// Metabox
global $post, $wp_query;
$groppe_id    = ( isset( $post ) ) ? $post->ID : 0;
$groppe_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $groppe_id;
$groppe_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $groppe_id;
$groppe_id    = ( is_singular('tribe_events')) ? $wp_query->post->ID : $groppe_id;
$groppe_meta  = get_post_meta( $groppe_id, 'page_type_metabox', true );
if ($groppe_meta) {
	$groppe_title_bar_padding = $groppe_meta['title_area_spacings'];
	$title_bar_height = $groppe_meta['title_bar_height'];
} else { $groppe_title_bar_padding = ''; $title_bar_height = ''; }
// Padding - Theme Options
if ($groppe_title_bar_padding && $groppe_title_bar_padding !== 'padding-none') {
	$groppe_title_top_spacings = $groppe_meta['title_top_spacings'];
	$groppe_title_bottom_spacings = $groppe_meta['title_bottom_spacings'];
	if ($groppe_title_bar_padding === 'padding-custom') {
		$groppe_title_top_spacings = $groppe_title_top_spacings ? 'margin-top:'. groppe_check_px($groppe_title_top_spacings) .';' : '';
		$groppe_title_bottom_spacings = $groppe_title_bottom_spacings ? 'margin-bottom:'. groppe_check_px($groppe_title_bottom_spacings) .';' : '';
		$groppe_custom_padding = $groppe_title_top_spacings . $groppe_title_bottom_spacings;
	} else {
		$groppe_custom_padding = '';
	}
} else {
	$groppe_title_bar_padding = cs_get_option('title_bar_padding');
	$groppe_titlebar_top_padding = cs_get_option('titlebar_top_padding');
	$groppe_titlebar_bottom_padding = cs_get_option('titlebar_bottom_padding');
	if ($groppe_title_bar_padding === 'padding-custom') {
		$groppe_titlebar_top_padding = $groppe_titlebar_top_padding ? 'margin-top:'. groppe_check_px($groppe_titlebar_top_padding) .';' : '';
		$groppe_titlebar_bottom_padding = $groppe_titlebar_bottom_padding ? 'margin-bottom:'. groppe_check_px($groppe_titlebar_bottom_padding) .';' : '';
		$groppe_custom_padding = $groppe_titlebar_top_padding . $groppe_titlebar_bottom_padding;
	} else {
		$groppe_custom_padding = '';
	}
}

if ($title_bar_height && $title_bar_height !== 'height-none') {
	$title_bar_custom_height = $groppe_meta['title_bar_custom_height'];
	if ($title_bar_height === 'height-custom') {
		$title_bar_custom_height = $title_bar_custom_height ? 'height:'. groppe_check_px($title_bar_custom_height) .';' : '';
		$title_bar_custom_height = $title_bar_custom_height;
	} else {
		$title_bar_custom_height = '';
	}
} else {
	$title_bar_height = cs_get_option('title_bar_height');
	$title_bar_custom_height = cs_get_option('title_bar_custom_height');
	if ($title_bar_height === 'height-custom') {
		$title_bar_custom_height = $title_bar_custom_height ? 'height:'. groppe_check_px($title_bar_custom_height) .';' : '';
		$title_bar_custom_height = $title_bar_custom_height ;
	} else {
		$title_bar_custom_height = '';
	}
}

// Banner Type - Meta Box
if ($groppe_meta) {
	$groppe_banner_type = $groppe_meta['banner_type'];
} else { $groppe_banner_type = ''; }

// Overlay Color - Theme Options
if ($groppe_meta) {
	$groppe_bg_overlay_color = $groppe_meta['titlebar_bg_overlay_color'];
} else { $groppe_bg_overlay_color = ''; }
if ($groppe_bg_overlay_color) {
	if ($groppe_bg_overlay_color) {
		$groppe_overlay_color = $groppe_bg_overlay_color;
	} else {
		$groppe_overlay_color = '';
	}
} else {
	$groppe_bg_overlay_color = cs_get_option('titlebar_bg_overlay_color');
	if ($groppe_bg_overlay_color) {
		$groppe_overlay_color = $groppe_bg_overlay_color;
	} else {
		$groppe_overlay_color = '';
	}
}

// Background - Type
if( $groppe_meta && isset( $groppe_meta['title_area_bg'] ) ) {

  extract( $groppe_meta['title_area_bg'] );
	if ($image || $color) {

  $groppe_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
  $groppe_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
  $groppe_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
  $groppe_background_size    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
  $groppe_background_attachment    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . $attachment . ';' : '';
  $groppe_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . $color . ';' : '';
  $groppe_background_style       = ( ! empty( $image ) ) ? $groppe_background_image . $groppe_background_repeat . $groppe_background_position . $groppe_background_size . $groppe_background_attachment : '';

  $groppe_title_bg = ( ! empty( $groppe_background_style ) || ! empty( $groppe_background_color ) ) ? $groppe_background_style . $groppe_background_color : '';
	} else {
		if (cs_get_option('titlebar_bg')) {
		extract( cs_get_option('titlebar_bg') );

		  $groppe_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
		  $groppe_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
		  $groppe_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
		  $groppe_background_size    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
		  $groppe_background_attachment    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . $attachment . ';' : '';
		  $groppe_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . $color . ';' : '';
		  $groppe_background_style       = ( ! empty( $image ) ) ? $groppe_background_image . $groppe_background_repeat . $groppe_background_position . $groppe_background_size . $groppe_background_attachment : '';

		  $groppe_title_bg = ( ! empty( $groppe_background_style ) || ! empty( $groppe_background_color ) ) ? $groppe_background_style . $groppe_background_color : '';
	}
	else {
	  $groppe_background_image       = '';
	  $groppe_background_repeat      = '';
	  $groppe_background_position    = '';
	  $groppe_background_size    = '';
	  $groppe_background_attachment    = '';
	  $groppe_background_color       = '';
	  $groppe_background_style       = '';
	  $groppe_title_bg = '';
	}
	}

} else {
	if (cs_get_option('titlebar_bg')) {
		extract( cs_get_option('titlebar_bg') );

		  $groppe_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
		  $groppe_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
		  $groppe_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
		  $groppe_background_size    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
		  $groppe_background_attachment    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . $attachment . ';' : '';
		  $groppe_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . $color . ';' : '';
		  $groppe_background_style       = ( ! empty( $image ) ) ? $groppe_background_image . $groppe_background_repeat . $groppe_background_position . $groppe_background_size . $groppe_background_attachment : '';

		  $groppe_title_bg = ( ! empty( $groppe_background_style ) || ! empty( $groppe_background_color ) ) ? $groppe_background_style . $groppe_background_color : '';
	} else {
	  $groppe_background_image       = '';
	  $groppe_background_repeat      = '';
	  $groppe_background_position    = '';
	  $groppe_background_size    = '';
	  $groppe_background_attachment    = '';
	  $groppe_background_color       = '';
	  $groppe_background_style       = '';
	  $groppe_title_bg = '';
	}
}
if (!$groppe_background_image && $groppe_background_color) {
	$title_bar_class = 'title-style-two';
} else {
	$title_bar_class = '';
}

if (empty($groppe_title_bg)) {
	$groppe_title_bg = 'background-image: url());';
}
if (is_404()) {
	$groppe_error_page_banner_bg = cs_get_option('error_banner_bg');
	$groppe_title_bg = ( $groppe_error_page_banner_bg ) ? 'background-image: url(' .wp_get_attachment_url($groppe_error_page_banner_bg).');' : $groppe_title_bg;
}
if($groppe_banner_type === 'hide-title-area') { // Hide Title Area
} elseif($groppe_meta && $groppe_banner_type === 'revolution-slider') { // Hide Title Area
	echo do_shortcode($groppe_meta['page_revslider']);
} else { ?>
<!-- = Page banner area start = \-->
<section class="grop-banner-area grop-page_banner_height-200 <?php echo esc_attr($title_bar_class); ?>"  style="<?php echo esc_attr($groppe_custom_padding . $groppe_title_bg.$title_bar_custom_height); ?>">
	<div class="overlay" style="background-color:<?php echo esc_attr($groppe_overlay_color); ?>;"></div>
	<div class="grop-full_height  container">
		<h2 class="grop-vertical_middle  text-uppercase  grop-page_title"><?php ?></h2>
	</div>
	<!--banner overly start\-->
	<div class="grop-page_banr_overly_opc-30"></div><!--/banner overly end-->
</section>
<?php } ?>
