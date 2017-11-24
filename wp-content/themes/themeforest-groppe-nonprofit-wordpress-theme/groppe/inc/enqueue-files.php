<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Enqueue Files for FrontEnd
 */
if ( ! function_exists( 'groppe_vt_scripts_styles' ) ) {
  function groppe_vt_scripts_styles() {

    // Styles
    wp_enqueue_style( 'font-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700', array(), '3.3.7', 'all' );
    wp_enqueue_style( 'font-dosis', 'https://fonts.googleapis.com/css?family=Dosis:400,500,600', array(), '3.3.7', 'all' );
    wp_enqueue_style( 'font-arvo', 'https://fonts.googleapis.com/css?family=Arvo', array(), '3.3.7', 'all' );
    wp_enqueue_style( 'font-awesome', GROPPE_THEMEROOT_URI . '/inc/theme-options/cs-framework/assets/css/font-awesome.min.css' );
    wp_enqueue_style( 'owl-carousel', GROPPE_CSS .'/owl.carousel.min.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'animate', GROPPE_CSS .'/animate.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'flipclock', GROPPE_CSS .'/flipclock.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'slimmenu', GROPPE_CSS .'/slimmenu.min.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'progressbar', GROPPE_CSS .'/progressbar.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'bootstrap', GROPPE_CSS .'/bootstrap.min.css', array(), '3.3.7', 'all' );
    wp_enqueue_style( 'groppe-style', GROPPE_CSS .'/styles.css', array(), GROPPE_VERSION, 'all' );
    wp_enqueue_style( 'groppe-colors', GROPPE_CSS .'/colors.css', array(), GROPPE_VERSION, 'all' );

    // Scripts
    wp_enqueue_script( 'modernizr', GROPPE_SCRIPTS . '/vendor/modernizr-2.8.3.min.js');
    wp_enqueue_script( 'respond', GROPPE_SCRIPTS . '/vendor/respond.min.js');
    wp_enqueue_script( 'flexibility', GROPPE_SCRIPTS . '/vendor/flexibility.js');
    wp_enqueue_script( 'bootstrap', GROPPE_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), '3.3.7', true );
    wp_enqueue_script( 'groppe-plugins', GROPPE_SCRIPTS . '/plugins.js', array( 'jquery' ), GROPPE_VERSION, true );
    wp_enqueue_script( 'groppe-scripts', GROPPE_SCRIPTS . '/scripts.js', array( 'jquery' ), GROPPE_VERSION, true );

    // Comments
    wp_enqueue_script( 'validate', GROPPE_SCRIPTS . '/jquery.validate.min.js', array( 'jquery' ), '1.9.0', true );
    wp_add_inline_script( 'validate', 'jQuery(document).ready(function($) {$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );

    // Responsive Active
    wp_enqueue_style( 'groppe-responsive', GROPPE_CSS .'/responsive.css', array(), GROPPE_VERSION, 'all' );

    // Adds support for pages with threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'groppe_vt_scripts_styles' );
}

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'groppe_vt_admin_scripts_styles' ) ) {
  function groppe_vt_admin_scripts_styles() {

    wp_enqueue_style( 'groppe-admin-main', GROPPE_CSS . '/admin-styles.css', true );
    wp_enqueue_script( 'groppe-admin-scripts', GROPPE_SCRIPTS . '/admin-scripts.js', true );

  }
  add_action( 'admin_enqueue_scripts', 'groppe_vt_admin_scripts_styles' );
}

/* Enqueue All Styles */
if ( ! function_exists( 'groppe_vt_wp_enqueue_styles' ) ) {
  function groppe_vt_wp_enqueue_styles() {
    groppe_vt_google_fonts();
    add_action( 'wp_head', 'groppe_vt_custom_css', 99 );
  }
  add_action( 'wp_enqueue_scripts', 'groppe_vt_wp_enqueue_styles' );
}
