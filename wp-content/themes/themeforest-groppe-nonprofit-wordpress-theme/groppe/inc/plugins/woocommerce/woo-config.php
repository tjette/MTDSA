<?php
/*
 * All WooCommerce Related Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if ( class_exists( 'WooCommerce' ) ) {

	if (function_exists('is_woocommerce')) {
  	remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
	}

	// Product Column
	add_filter('loop_shop_columns', 'groppe_loop_columns');
	if ( ! function_exists('groppe_loop_columns') ) {
	  function groppe_loop_columns() {
	    return cs_get_option('woo_product_columns', '3');
	  }
	}

	// WooCommerce Products per Page Limit
	add_filter( 'loop_shop_per_page', 'groppe_product_limit', 20 );
	if ( ! function_exists('groppe_product_limit') ) {
	  function groppe_product_limit() {
	    $woo_limit = cs_get_option('theme_woo_limit');
	    $woo_limit = $woo_limit ? $woo_limit : '9';
	    return $woo_limit;
	  }
	}

	// Single Product Page - Related Products Limit
	add_filter( 'woocommerce_output_related_products_args', 'groppe_related_products_args' );
  function groppe_related_products_args( $args ) {
  	$woo_related_limit = cs_get_option('woo_related_limit');
  	if ($woo_related_limit) {
			$args['posts_per_page'] = (int)$woo_related_limit; // 4 related products
		} else {
			$args['posts_per_page'] = 3; // 4 related products
		}
		return $args;
	}

	// Remove Related Products - Single Page
  $woo_single_related = cs_get_option('woo_single_related');
  if ($woo_single_related) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	}

	// Remove "You May Also Like..." Products - Single Page
  $woo_single_upsell = cs_get_option('woo_single_upsell');
  if ($woo_single_upsell) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	}

		// Add to cart text
	function groppe_add_to_cart_text_change() {

		// Add To Cart Change Text
		add_filter( 'woocommerce_product_single_add_to_cart_text', 'groppe_woo_add_cart_button' );    // 2.1 +
		function groppe_woo_add_cart_button() {
			$woo_cart_text = cs_get_option('add_to_cart_text');
			if ($woo_cart_text) {
				$woo_cart = $woo_cart_text;
			} else {
				$woo_cart = esc_html__('Add To Bag', 'groppe');
			}
			return $woo_cart;
		}

		add_filter( 'woocommerce_product_add_to_cart_text' , 'groppe_product_add_to_cart' );
		function groppe_product_add_to_cart() {
			$woo_cart_text = cs_get_option('add_to_cart_text');
			if ($woo_cart_text) {
				$woo_cart = $woo_cart_text;
			} else {
				$woo_cart = esc_html__('Add To Bag', 'groppe');
			}
			global $product;
			$grouped = $product->is_type( 'grouped' );
			$variable = $product->is_type( 'variable' );
			if ($grouped) {
				$button_text = esc_html__( 'View', 'groppe' );
			} elseif($variable) {
				$button_text = esc_html__( 'Select Option', 'groppe' );
			} else {
				$button_text = $woo_cart;
			}
			return $button_text;
		}

	} // Function OT
	add_action( 'after_setup_theme', 'groppe_add_to_cart_text_change' );

} // class_exists => WooCommerce