<?php
/**
 * Enqueues child theme stylesheet, loading first the parent theme stylesheet.
 */
function groppe_enqueue_child_theme_styles() {
	wp_enqueue_style( 'groppe-child-style', get_stylesheet_uri(), array(), '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'groppe_enqueue_child_theme_styles', 11 );
