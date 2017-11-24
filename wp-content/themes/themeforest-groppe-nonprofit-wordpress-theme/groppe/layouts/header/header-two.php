<?php
// Metabox
global $post;
$groppe_id    = ( isset( $post ) ) ? $post->ID : false;
$groppe_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $groppe_id;
$groppe_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $groppe_id;
$groppe_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $groppe_id : false;
$groppe_meta  = get_post_meta( $groppe_id, 'page_type_metabox', true );

// Parallax
$groppe_bg_parallax = cs_get_option('theme_bg_parallax');
$groppe_hav_parallax = $groppe_bg_parallax ? ' parallax-window' : '';
$groppe_parallax_speed = cs_get_option('theme_bg_parallax_speed');
$groppe_bg_parallax_speed = $groppe_parallax_speed ? $groppe_parallax_speed : '0.4';

// Theme Layout Width
$groppe_bg_overlay_color  = cs_get_option( 'theme_bg_overlay_color' );
$groppe_layout_width  = cs_get_option( 'theme_layout_width' );
$groppe_layout_width_class = ($groppe_layout_width === 'container') ? 'layout-boxed'. $groppe_hav_parallax : 'layout-full';

// Header Style
if ($groppe_meta) {
  $groppe_header_design  = $groppe_meta['select_header_design'];
  $groppe_sticky_header  = $groppe_meta['sticky_header'];
  $groppe_search_icon    = $groppe_meta['search_icon'];
  $groppe_cart_widget    = $groppe_meta['shopping_cart'];
  $donate_btn_type    = $groppe_meta['donate_btn_type'];
  $donate_button_text    = $groppe_meta['donate_button_text'];
  $donate_button_link    = $groppe_meta['donate_button_link'];
  $pop_form_id    = $groppe_meta['pop_form_id'];
} else {
  $groppe_header_design  = '';
  $groppe_sticky_header  = cs_get_option('sticky_header');
  $groppe_search_icon    = cs_get_option('search_icon');
  $groppe_cart_widget    = cs_get_option('shopping_cart');
  $donate_btn_type    = cs_get_option('donate_btn_type');
  $donate_button_text    = cs_get_option('donate_button_text');
  $donate_button_link    = cs_get_option('donate_button_link');
  $pop_form_id    = cs_get_option('pop_form_id');
}
if (!empty($groppe_header_design)) {
  $groppe_header_design  = $groppe_header_design;
}

if ($groppe_header_design === 'default') {
  $groppe_header_design_actual  = cs_get_option('select_header_design');
} else {
  $groppe_header_design_actual = ( $groppe_header_design ) ? $groppe_header_design : cs_get_option('select_header_design');
}
if ($groppe_meta && $groppe_header_design !== 'default') {
  $groppe_sticky_header  = $groppe_meta['sticky_header'];
  $groppe_search_icon    = $groppe_meta['search_icon'];
  $groppe_cart_widget    = $groppe_meta['shopping_cart'];
  $donate_btn_type    = $groppe_meta['donate_btn_type'];
  $donate_button_text    = $groppe_meta['donate_button_text'];
  $donate_button_link    = $groppe_meta['donate_button_link'];
  $pop_form_id    = $groppe_meta['pop_form_id'];
} else {
  $groppe_sticky_header  = cs_get_option('sticky_header');
  $groppe_search_icon    = cs_get_option('search_icon');
  $groppe_cart_widget    = cs_get_option('shopping_cart');
  $donate_btn_type    = cs_get_option('donate_btn_type');
  $donate_button_text    = cs_get_option('donate_button_text');
  $donate_button_link    = cs_get_option('donate_button_link');
  $pop_form_id    = cs_get_option('pop_form_id');
}
$donate_button_text = $donate_button_text ? $donate_button_text : esc_html__('Donate', 'groppe' );
if ($groppe_header_design_actual === 'style_three') {
  $header_wrapper_class = ' grop-header_style3';
} elseif ($groppe_header_design_actual === 'style_two') {
  $header_wrapper_class = ' grop-header_style2';
} else {
  $header_wrapper_class = '';
}

$groppe_sticky_header_class = $groppe_sticky_header ? ' sticky-header' : '';

// Header Transparent
if ($groppe_meta) {
  $groppe_transparent_header = $groppe_meta['transparency_header'];
  $groppe_banner_type = $groppe_meta['banner_type'];

  // if($groppe_banner_type != 'hide-title-area') {
    $groppe_transparent_header = $groppe_transparent_header ? ' ' : ' grop-header_sticky';
  // } else {
  //   $groppe_transparent_header = ' grop-header_sticky';
  // }
} else { $groppe_transparent_header = ' grop-header_sticky'; }

// Header Address
if ($groppe_meta && $groppe_header_design !== 'default') {
  $groppe_address_info  = $groppe_meta['header_address_info'];
} else {
  $groppe_address_info  = cs_get_option('header_address_info');
}
?>
	<div class="grop-header_top">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-2">
					<?php get_template_part( 'layouts/header/logo' ); ?>
				</div>
				<div class="col-md-8 col-sm-10">
					<!--  header top social start  \-->
					<div class="text-right grop-header_social_info">
						<?php
							if ($donate_button_link || $pop_form_id) {
	              if ($donate_btn_type === 'popup') {
	                echo '<a class="grop-btn grop-btn_overly grop-hadr_donate_btn" data-toggle="modal" data-target="#'.esc_attr($pop_form_id).'"><span>'.esc_attr($donate_button_text).'</span></a>';
	              } else {
	                echo '<a class="grop-btn grop-btn_overly grop-hadr_donate_btn" href="'.esc_url( $donate_button_link ).'"><span>'.esc_attr($donate_button_text).'</span></a>';
	              }
	            }
							echo do_shortcode($groppe_address_info);
						?>
					</div><!--/ header top social end-->
				</div>
			</div>
		</div>
	</div>
	<!--/  header top end-->

	<!--  header logo and Navigations start \-->
	<div class="grop-header_navigations <?php echo esc_attr( $groppe_sticky_header_class.$groppe_transparent_header ); ?>">
		<div class="container">
			<div class="row">
				<div class="col-md-10  col-sm-6  col-xs-3">
					<?php get_template_part( 'layouts/header/mobile', 'menu' ); ?>
					<nav class="grop-mainmenu_warp">
						<?php get_template_part( 'layouts/header/menu', 'bar' ); ?>
					</nav><!--/  header nav main menu end-->
				</div>
				<div class="col-md-2   col-sm-6  col-xs-9">
					<div class="text-right grop-naviga_btns">
						<?php
	  					if($groppe_cart_widget){
								get_template_part( 'layouts/header/header', 'cart' );
	  					}
							if($groppe_search_icon){
								get_template_part( 'layouts/header/header', 'search' );
							}
						?>
					</div><!--/  header nav right side btns end-->
				</div>
			</div>
		</div>
	</div>
<?php

