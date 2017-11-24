<?php
/*
 * Groppe Theme's Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Define - Folder Paths
 */
define( 'GROPPE_THEMEROOT_PATH', get_template_directory() );
define( 'GROPPE_THEMEROOT_URI', get_template_directory_uri() );
define( 'GROPPE_CSS', GROPPE_THEMEROOT_URI . '/assets/css' );
define( 'GROPPE_IMAGES', GROPPE_THEMEROOT_URI . '/assets/images' );
define( 'GROPPE_SCRIPTS', GROPPE_THEMEROOT_URI . '/assets/js' );
define( 'GROPPE_FRAMEWORK', get_template_directory() . '/inc' );
define( 'GROPPE_LAYOUT', get_template_directory() . '/layouts' );
define( 'GROPPE_CS_IMAGES', GROPPE_THEMEROOT_URI . '/inc/theme-options/theme-extend/images' );
define( 'GROPPE_CS_FRAMEWORK', get_template_directory() . '/inc/theme-options/theme-extend' ); // Called in Icons field *.json
define( 'GROPPE_ADMIN_PATH', get_template_directory() . '/inc/theme-options/cs-framework' ); // Called in Icons field *.json

/**
 * Define - Global Theme Info's
 */
if (is_child_theme()) { // If Child Theme Active
	$groppe_theme_child = wp_get_theme();
	$groppe_get_parent = $groppe_theme_child->Template;
	$groppe_theme = wp_get_theme($groppe_get_parent);
} else { // Parent Theme Active
	$groppe_theme = wp_get_theme();
}
define('GROPPE_NAME', $groppe_theme->get( 'Name' ), true);
define('GROPPE_VERSION', $groppe_theme->get( 'Version' ), true);
define('GROPPE_BRAND_URL', $groppe_theme->get( 'AuthorURI' ), true);
define('GROPPE_BRAND_NAME', $groppe_theme->get( 'Author' ), true);

/**
 * All Main Files Include
 */
require_once( GROPPE_FRAMEWORK . '/init.php' );