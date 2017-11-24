<?php
/*
 * The sidebar only for WooCommerce pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$groppe_woo_widget = cs_get_option('woo_widget'); ?>
<div class="grop-fix  grop-float_right  grop-page-rgt_sidebar woocommerce">
	<?php if ($groppe_woo_widget) {
		if (is_active_sidebar($groppe_woo_widget)) {
			dynamic_sidebar($groppe_woo_widget);
		}
	} else {
		if (is_active_sidebar( 'sidebar-shop' )) {
			dynamic_sidebar( 'sidebar-shop' );
		}
	} ?>
</div><!-- #secondary -->
<?php
