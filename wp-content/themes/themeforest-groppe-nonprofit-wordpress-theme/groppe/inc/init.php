<?php
/*
 * All Groppe Theme Related Functions Files are Linked here
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Theme All Basic Setup */
require_once( GROPPE_FRAMEWORK . '/theme-support.php' );
require_once( GROPPE_FRAMEWORK . '/backend-functions.php' );
require_once( GROPPE_FRAMEWORK . '/frontend-functions.php' );
require_once( GROPPE_FRAMEWORK . '/enqueue-files.php' );
require_once( GROPPE_CS_FRAMEWORK . '/custom-style.php' );
require_once( GROPPE_CS_FRAMEWORK . '/config.php' );

/* WooCommerce Integration */
if (class_exists( 'WooCommerce' )){
	require_once( GROPPE_FRAMEWORK . '/plugins/woocommerce/woo-config.php' );
}

/* Bootstrap Menu Walker */
require_once( GROPPE_FRAMEWORK . '/core/vt-mmenu/wp_bootstrap_navwalker.php' );

/* Install Plugins */
require_once( GROPPE_FRAMEWORK . '/plugins/notify/activation.php' );

/* Aqua Resizer */
require_once( GROPPE_FRAMEWORK . '/plugins/aq_resizer.php' );

/* Sidebars */
require_once( GROPPE_FRAMEWORK . '/core/sidebars.php' );