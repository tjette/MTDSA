<?php
/*
 * The template for displaying 404 pages (not found).
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Theme Options
$groppe_error_heading = cs_get_option('error_heading');
$groppe_error_page_content = cs_get_option('error_page_content');
$groppe_error_page_bg = cs_get_option('error_page_bg');
$groppe_error_btn_text = cs_get_option('error_btn_text');

$groppe_error_heading = ( $groppe_error_heading ) ? $groppe_error_heading : esc_html__( '404', 'groppe' );
$groppe_error_page_content = ( $groppe_error_page_content ) ? $groppe_error_page_content : esc_html__( 'Nothing Was Found', 'groppe' );
$groppe_error_page_bg = ( $groppe_error_page_bg ) ? wp_get_attachment_url($groppe_error_page_bg) : GROPPE_IMAGES . '/404.png';
$groppe_error_btn_text = ( $groppe_error_btn_text ) ? $groppe_error_btn_text : esc_html__( 'Go to Homepage', 'groppe' );

get_header(); ?>
<!-- = Page contents start = \-->
<div class="grop-page-entry_content">
	<div class="container">
		<div class="text-center grop-404_content">
			<div class="grop-404_txt" style="background-image: url(<?php echo esc_url($groppe_error_page_bg); ?>);">
				<h1><?php echo esc_attr($groppe_error_heading); ?></h1>
				<h2><?php echo esc_attr($groppe_error_page_content); ?></h2>
				<a class="grop-btn grop-btn_overly grop-404_btn" href="<?php echo esc_url(home_url( '/' )); ?>">
					<span><?php echo esc_attr($groppe_error_btn_text); ?></span>
				</a>
			</div>
		</div>
	</div>
</div><!--/ =XXX Page contents end XXX=-->

<?php
get_footer();