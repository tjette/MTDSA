<?php
// Logo Image
$groppe_brand_logo_default = cs_get_option('brand_logo_default');
$groppe_brand_logo_retina = cs_get_option('brand_logo_retina');
$groppe_mobile_logo = cs_get_option('mobile_logo_retina');

// White Logo
$groppe_white_logo_default = cs_get_option('white_logo_default');
$groppe_white_logo_retina = cs_get_option('white_logo_retina');

// Transparent Header Logos
$groppe_transparent_logo = cs_get_option('transparent_logo_default');
$groppe_transparent_retina = cs_get_option('transparent_logo_retina');

// Metabox - Header Transparent
global $post;
$groppe_id    = ( isset( $post ) ) ? $post->ID : false;
$groppe_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $groppe_id;
$groppe_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $groppe_id;
$groppe_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $groppe_id : false;
$groppe_meta  = get_post_meta( $groppe_id, 'page_type_metabox', true );
if ($groppe_meta) {
  $groppe_transparent_header = $groppe_meta['transparency_header'];
} else { $groppe_transparent_header = ''; }
if ($groppe_meta && isset( $groppe_meta['grop_page_logo'] )) {
	$logo_image = $groppe_meta['grop_page_logo'];
	$retina_logo_image = $groppe_meta['grop_page_retina_logo'];
} else {
	$logo_image = '';
	$retina_logo_image = '';
}

if($groppe_transparent_header){
$transparent_default_class = $groppe_transparent_logo ? ' hav-transparent-logo' : ' dhav-transparent-logo';
$transparent_retina_class = $groppe_transparent_retina ? ' hav-transparent-retina' : ' dhav-transparent-retina';
} else {
	$transparent_default_class = '';
	$transparent_retina_class = '';
} 

$default_logo_cls = $groppe_brand_logo_default ? ' hav-default-logo' : ' dhav-default-logo';
$default_retina_logo_cls = $groppe_brand_logo_retina ? ' hav-default-retina-logo' : ' dhav-default-retina-logo';

$mobi_logo_cls = $groppe_mobile_logo ? ' hav-mobile-logo' : ' dhav-mobile-logo';

if (!empty($retina_logo_image)) {
	$retina_logo_image = $retina_logo_image;
} else {
	$retina_logo_image = $logo_image;
}

// mobile logo
$groppe_retina_width = cs_get_option('mobile_logo_width');
$groppe_retina_height = cs_get_option('mobile_logo_height');

// Retina Size
$groppe_retina_width = cs_get_option('retina_width');
$groppe_retina_height = cs_get_option('retina_height');

$groppe_retina_height_actual = $groppe_retina_height ? 'height ="'.$groppe_retina_height.'"' : '';
$groppe_retina_width_actual = $groppe_retina_width ? 'width ="'.$groppe_retina_width.'"' : '';

// Logo Spacings
$groppe_brand_logo_top = cs_get_option('brand_logo_top');
$groppe_brand_logo_bottom = cs_get_option('brand_logo_bottom');
if ($groppe_brand_logo_top !== '') {
	$groppe_brand_logo_top = 'padding-top:'. groppe_check_px($groppe_brand_logo_top) .';';
} else { $groppe_brand_logo_top = ''; }
if ($groppe_brand_logo_bottom !== '') {
	$groppe_brand_logo_bottom = 'padding-bottom:'. groppe_check_px($groppe_brand_logo_bottom) .';';
} else { $groppe_brand_logo_bottom = ''; }

?>
<div class="grop-hadr_logos <?php echo esc_attr($transparent_default_class . $transparent_retina_class .$default_logo_cls .$default_retina_logo_cls .$mobi_logo_cls); ?>" style="<?php echo esc_attr($groppe_brand_logo_top); echo esc_attr($groppe_brand_logo_bottom); ?>">
	<?php
	if (!empty($logo_image)) {
		echo '<a href="'.esc_url(home_url( '/' )).'" class="grop-logo default-logo"><img src="'. esc_url(wp_get_attachment_url($logo_image)) .'" alt="" '. esc_attr($groppe_retina_width_actual) .''. esc_attr($groppe_retina_height_actual) .'></a>';
		echo '<a href="'.esc_url(home_url( '/' )).'" class="grop-logo retina-logo"><img src="'. esc_url(wp_get_attachment_url($retina_logo_image)) .'" alt="" '. esc_attr($groppe_retina_width_actual) .''. esc_attr($groppe_retina_height_actual) .'></a>';
	} else {
		if ($groppe_transparent_header) {
			if (isset($groppe_transparent_logo)){
				if (isset($groppe_transparent_retina)){
					echo '<a href="'.esc_url(home_url( '/' )).'" class="grop-logo transparent-retina-logo "><img src="'. esc_url(wp_get_attachment_url($groppe_transparent_retina)) .'" '. esc_attr($groppe_retina_width_actual) .''. esc_attr($groppe_retina_height_actual) .' alt=""></a>';
				}
				echo '<a href="'.esc_url(home_url( '/' )).'" class="grop-logo retina-logo"><img src="'. esc_url(wp_get_attachment_url($groppe_brand_logo_retina)) .'"'. esc_attr($groppe_retina_width_actual) .''. esc_attr($groppe_retina_height_actual) .' alt=""></a>
					';
				echo '<a href="'.esc_url(home_url( '/' )).'" class="grop-logo default-logo"><img src="'. esc_url(wp_get_attachment_url($groppe_transparent_logo)) .'" alt="" '. esc_attr($groppe_retina_width_actual) .''. esc_attr($groppe_retina_height_actual) .'></a>';
				echo '<a href="'.esc_url(home_url( '/' )).'" class="grop-logo grop-default-logo"><img src="'. esc_url(wp_get_attachment_url($groppe_brand_logo_default)) .'" alt=""'. esc_attr($groppe_retina_width_actual) .''. esc_attr($groppe_retina_height_actual) .'></a>';
			} elseif (isset($groppe_brand_logo_default)){
				if ($groppe_brand_logo_retina){
					echo '<a href="'.esc_url(home_url( '/' )).'" class="grop-logo retina-logo"><img src="'. esc_url(wp_get_attachment_url($groppe_brand_logo_retina)) .'"'. esc_attr($groppe_retina_width_actual) .''. esc_attr($groppe_retina_height_actual) .' alt=""></a>
						';
				}
				if (isset($groppe_transparent_retina)){
					echo '<a href="'.esc_url(home_url( '/' )).'" class="grop-logo transparent-retina-logo "><img src="'. esc_url(wp_get_attachment_url($groppe_transparent_retina)) .'" '. esc_attr($groppe_retina_width_actual) .''. esc_attr($groppe_retina_height_actual) .' alt=""></a>';
				}
				echo '<a href="'.esc_url(home_url( '/' )).'" class="grop-logo default-logo"><img src="'. esc_url(wp_get_attachment_url($groppe_brand_logo_default)) .'" alt=""'. esc_attr($groppe_retina_width_actual) .''. esc_attr($groppe_retina_height_actual) .'></a>';
			} else {
				echo '<a href="'.esc_url(home_url( '/' )).'" class="grop-logo grop-txt-logo">'. esc_attr(get_bloginfo( 'name' )) . '</a>';
			}
		} elseif (isset($groppe_brand_logo_default)){
			if ($groppe_brand_logo_retina){
				echo '<a href="'.esc_url(home_url( '/' )).'" class="grop-logo retina-logo"><img src="'. esc_url(wp_get_attachment_url($groppe_brand_logo_retina)) .'"'. esc_attr($groppe_retina_width_actual) .''. esc_attr($groppe_retina_height_actual) .' alt=""></a>
					';
			}
			echo '<a href="'.esc_url(home_url( '/' )).'" class="grop-logo  grop-hadr_white_logo"><img src="'. esc_url(wp_get_attachment_url($groppe_brand_logo_default)) .'" alt="'. esc_attr(get_bloginfo( 'name' )) . '"'. esc_attr($groppe_retina_width_actual) .''. esc_attr($groppe_retina_height_actual) .'></a>
	      <a href="'.esc_url(home_url( '/' )).'" class="grop-logo  grop-hadr_black_logo"><img src="'. esc_url(wp_get_attachment_url($groppe_brand_logo_default)) .'" alt="'. esc_attr(get_bloginfo( 'name' )) . '"'. esc_attr($groppe_retina_width_actual) .''. esc_attr($groppe_retina_height_actual) .'></a>';
	      if (isset($groppe_transparent_retina)){
					echo '<a href="'.esc_url(home_url( '/' )).'" class="grop-logo transparent-retina-logo "><img src="'. esc_url(wp_get_attachment_url($groppe_transparent_retina)) .'" '. esc_attr($groppe_retina_width_actual) .''. esc_attr($groppe_retina_height_actual) .' alt=""></a>';
				}
		} else {
			echo '<a href="'.esc_url(home_url( '/' )).'" class="grop-logo grop-txt-logo">'. esc_attr(get_bloginfo( 'name' )) . '</a>';
			if (isset($groppe_transparent_retina)){
					echo '<a href="'.esc_url(home_url( '/' )).'" class="grop-logo transparent-retina-logo "><img src="'. esc_url(wp_get_attachment_url($groppe_transparent_retina)) .'" '. esc_attr($groppe_retina_width_actual) .''. esc_attr($groppe_retina_height_actual) .' alt=""></a>';
			}
			if ($groppe_brand_logo_retina){
				echo '<a href="'.esc_url(home_url( '/' )).'" class="grop-logo retina-logo"><img src="'. esc_url(wp_get_attachment_url($groppe_brand_logo_retina)) .'"'. esc_attr($groppe_retina_width_actual) .''. esc_attr($groppe_retina_height_actual) .' alt=""></a>
					';
			}
		}
		if($groppe_mobile_logo) {
			echo '<a href="'.esc_url(home_url( '/' )).'" class="grop-logo mobile-logo"><img src="'. esc_url(wp_get_attachment_url($groppe_mobile_logo)) .'"'. esc_attr($groppe_retina_width_actual) .''. esc_attr($groppe_retina_height_actual) .' alt=""></a>
					';
		}
	}
	?>
</div>
