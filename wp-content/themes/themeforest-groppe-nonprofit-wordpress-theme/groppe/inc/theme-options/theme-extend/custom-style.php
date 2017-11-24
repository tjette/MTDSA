<?php
/*
 * Codestar Framework - Custom Style
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* All Dynamic CSS Styles */
if ( ! function_exists( 'groppe_dynamic_styles' ) ) {
  function groppe_dynamic_styles() {

    // Typography
    $groppe_vt_get_typography  = groppe_vt_get_typography();

    $all_element_color  = cs_get_customize_option( 'all_element_colors' );

    // Logo
    $brand_logo_top     = cs_get_option( 'brand_logo_top' );
    $brand_logo_bottom  = cs_get_option( 'brand_logo_bottom' );

    // Layout
    $bg_type = cs_get_option('theme_layout_bg_type');
    $bg_pattern = cs_get_option('theme_layout_bg_pattern');
    $bg_image = cs_get_option('theme_layout_bg');
    $bg_overlay_color = cs_get_option('theme_bg_overlay_color');

    // Footer
    $footer_bg_color  = cs_get_customize_option( 'footer_bg_color' );
    $footer_heading_color  = cs_get_customize_option( 'footer_heading_color' );
    $footer_text_color  = cs_get_customize_option( 'footer_text_color' );
    $footer_link_color  = cs_get_customize_option( 'footer_link_color' );
    $footer_link_hover_color  = cs_get_customize_option( 'footer_link_hover_color' );

  ob_start();

global $post;
$groppe_id    = ( isset( $post ) ) ? $post->ID : 0;
$groppe_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $groppe_id;
$groppe_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $groppe_id;
$groppe_meta  = get_post_meta( $groppe_id, 'page_type_metabox', true );

/* Layout - Theme Options - Background */
if ($bg_type === 'bg-image') {

  $layout_boxed = ( ! empty( $bg_image['image'] ) ) ? 'background-image: url('. $bg_image['image'] .');' : '';
  $layout_boxed .= ( ! empty( $bg_image['repeat'] ) ) ? 'background-repeat: '. $bg_image['repeat'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['position'] ) ) ? 'background-position: '. $bg_image['position'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['attachment'] ) ) ? 'background-attachment: '. $bg_image['attachment'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['size'] ) ) ? 'background-size: '. $bg_image['size'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['color'] ) ) ? 'background-color: '. $bg_image['color'] .';' : '';

echo <<<CSS
  .no-class {}
  .layout-boxed {
    {$layout_boxed}
  }
CSS;
}
if ($bg_type === 'bg-pattern') {
$custom_bg_pattern = cs_get_option('custom_bg_pattern');
$layout_boxed = ( $bg_pattern === 'custom-pattern' ) ? 'background-image: url('. $custom_bg_pattern .');' : 'background-image: url('. GROPPE_IMAGES . '/patterns/'. $bg_pattern .'.png);';

echo <<<CSS
  .no-class {}
  .layout-boxed {
    {$layout_boxed}
  }
CSS;
}

/* Primary Colors */
if ($all_element_color) {
echo <<<CSS
  .no-class {}
  ul.tribe-events-sub-nav a:hover,
  .grop-callout_area.team_cal_out,
  .flip-clock-wrapper ul li a div div.inn,
  .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
  .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
  .widget_product_search input[type="submit"],
  .tag-pagination .wp-link-pages span,
  .tag-gallery .wp-link-pages span,
  .tag-pagination .wp-link-pages a span:hover,
  .tag-pagination .wp-link-pages a span:focus,
  .tag-pagination .wp-link-pages a span:active,
  .tag-gallery .wp-link-pages a span:hover,
  .tag-gallery .wp-link-pages a span:focus,
  .tag-gallery .wp-link-pages a span:active,
  .wp-pagenavi a:hover, .wp-pagenavi span.current,
  .grop-hadr_donate_btn, .grop-sildcap_donate_btn, #grop-mainmenu > li > ul.sub-menu:before, .grop-big_link, .grop-cause_donate_btn, .grop-prlaxcap_donate_btn, .grop-ucoming_evnt_date, .grop-fetrdcs_dnt_btn,
.grop-prlaxcap_bcmvoljn_btn, .grop-help_btn, .grop-footer-socail li a:hover, .grop-footer-socail li a:focus, .grop-callout2_warp, .progress-content,
.grop-prgss_donate_btn, .grop-dnatrsd_cont_warp:before, .grop-h2bcm_vntr_jn_btn, .grop-suprtus_tday_txt h4:after, .grop-cntdwn_evt_btn:before, .grop-dont_sectors_btn, .grop-vltrs_peple_intro,
.grop-vltrs_peple_promo_box,
.grop-ndspnsr_box_btn, .grop-tstimnl_text_box:before, .grop-hm3callout_area,
.grop-causelist_donate_btn,
.grop-donatewigt_btn,
.grop-hm-4cap_pb_btn, .grop-nwesl-fields input[type='text']:focus + input[type='submit'],
.grop-nwesl-fields input[type='email']:focus + input[type='submit'],
.grop-nwesl-fields input[type='submit']:hover, .grop-cntdwn_upevt_warp:hover .grop-cntdwn_upevt_icn, [class*="grop-sildcap_tag-"]:hover, [class*="grop-sildcap_tag-"]:focus,
.grop-side-widget .tagcloud a:hover,
.grop-side-widget .tagcloud a:focus, .post-password-form input[type="submit"]:hover, .post-password-form input[type="submit"]:focus, .grop-hm-3sildcapst3_btn:hover, .grop-hm-3sildcapst3_btn:focus,
#comments.comments-area a.comment-reply-link:hover,
#comments.comments-area a.comment-reply-link:focus, .grop-hm-3sildcapst3_btn.grop-btn_active, #grop_filters ul li.is-active,
#grop_filters ul li:hover, .grop-posts-pagination-warp .page-numbers:hover,
.grop-posts-pagination-warp .page-numbers:focus,
.woocommerce-pagination li .page-numbers.current,
.woocommerce-pagination li .page-numbers:hover,
.woocommerce-pagination li .page-numbers:focus, .grop-cusigldt_btn:before,
.grop-sigldt_btn:before, .grop-ab_msionrd_btn:before, .grop-ab_calut_warp, .grop-tmsl_intro, .grop-grop-oimtrm_btn, .grop-bvlist_icon, .grop-btn_submit, .grop-callout3_btn, .grop-evnt_list_item .grop-evnt_list_date span.grop-evnt_d, .grop-evensiglre_btn:before, .grop-dtls_title, .grop-model_header .close, .grop-offic_loc, .wpcf7 .grop-file-upload .grop-file-btn,
.wpcf7 input[type="submit"], .wpcf7 button, .grop-postrm_btn, ul.grop-author-social li a:hover, ul.grop-author-social li a:focus, #comments.comments-area #respond #commentform .form-submit .submit:hover, #comments.comments-area #respond #commentform .form-submit .submit:focus, #comments.comments-area #respond #commentform .form-submit .submit, .woocommerce span.onsale, .woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button, .woocommerce #respond input#submit:hover, .woocommerce #respond input#submit:focus,
.woocommerce-cart .shipping-calculator-form button.button:hover,
.woocommerce-cart .shipping-calculator-form button.button:focus, .woocommerce .cart .button:hover, .woocommerce .cart .button:focus,
.woocommerce .cart input.button:hover,
.woocommerce .cart input.button:focus, .page-numbers.current, .grop-hm4srv_box_single,
.grop-pww_btn,
.grop-hm4_promo_area,
.grop-404_btn,
.grop-header_style3 .grop-header_navigations.grop-header_sticky_active,
.grop-header_style3 .grop-header_navigations.grop-header_sticky, .grop-hadrsrch_form_warp:before, .grop-header_style3 .grop-hadr_donate_btn:before,
.grop-header_style3 .grop-hadrsrch_form_warp, .grop-cause_remor_btn,
.woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:focus,
.woocommerce nav.woocommerce-pagination ul li a:hover,
#tribe-bar-form .tribe-bar-submit input[type=submit],
.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-],
#tribe-events-content .tribe-events-calendar td:hover,
#tribe-events .tribe-events-button, .woocommerce button.button.alt,
input#give-purchase-button:hover, .tribe-events-event-cost span {background-color: {$all_element_color};}

  .grop-logo:first-letter,
  .grop-post_comnt:hover span,
  .woocommerce ul.cart_list li a:hover, .woocommerce ul.product_list_widget li a:hover,
  .grop-header_info > ul li i, .grop-header_info > ul a i, .grop-header_social > ul li a:hover, .grop-header_social > ul li a:focus, #grop-mainmenu > li a:hover, #grop-mainmenu > li a:focus, .grop-hadr_search > a:hover, .grop-hadr_search > a:focus, .grop-hadr_shopping_cart > a:hover, .grop-hadr_shopping_cart > a:focus, #grop-mainmenu li.current-menu-ancestor > a, #grop-mainmenu li.current_page_item > a, #grop-mainmenu li.menu-item-has-children:hover:before, #grop-mainmenu > li.menu-item-has-children:hover > a, #grop-mainmenu > li.menu-item-has-children ul.sub-menu > li.menu-item-has-children:hover > a, #grop-mainmenu li.current-menu-ancestor:before, .grop-cause_title a:hover, .grop-cause_title a:focus,
.grop-ucoming_evnt_title a:hover,
.grop-ucoming_evnt_title a:focus, .grop-fetrd_cause_title a:hover, .grop-fetrd_cause_title a:focus, .help_single_itm_warp h4 a:hover, .help_single_itm_warp h4 a:focus, .grop-news_single h2 a:hover, .grop-news_single h2 a:focus, .grop-news_ps_title a:hover, .grop-news_ps_title a:focus,
.grop-news_pst_in a:hover,
.grop-news_pst_in a:focus,
.grop-news_pst_commnt a:hover,
.grop-news_pst_commnt a:focus,
.grop-copyright a:hover,
.grop-copyright a:focus, .grop-ftr_sngl_widget ul li a:hover, .grop-ftr_sngl_widget ul li a:focus, #grop-latest_tweets .twt-row a.user, .grop-header_info > ul a:hover, .grop-header_info > ul a:focus, .grop-ftr_wigt_locn span a:hover, .grop-ftr_wigt_locn span a:focus, .grop-dnatrsd_amount span, .grop-dnatrsd_name a:hover, .grop-dnatrsd_name a:focus, .grop-suprtus_tday_txt h4 a:hover, .grop-suprtus_tday_txt h4 a:focus,
.grop-cntdwn_upevt_txt h5 a:hover,
.grop-cntdwn_upevt_txt h5 a:focus,
.grop-side-widget > ul li a:hover,
.grop-side-widget > ul li a:focus, .grop-suess_strisst2_pst_txt h4 a:hover, .grop-suess_strisst2_pst_txt h4 a:focus,
.grop-suess_strisst2_txt h2 a:hover,
.grop-suess_strisst2_txt h2 a:focus,
.grop-missions_txt h4 a:hover,
.grop-missions_txt h4 a:focus,
.grop-vltrs_peple_intro_txt h4 a:hover,
.grop-vltrs_peple_intro_txt h4 a:focus,
.vltrs_peple_social ul li a:hover,
.vltrs_peple_social ul li a:focus,
.grop-tstimnl_prsn-title a:hover,
.grop-tstimnl_prsn-title a:focus,
.grop-grop-ndspnsr_box h2 a:hover,
.grop-grop-ndspnsr_box h2 a:focus,
.grop-upcomt_wigt_txt h5 a:hover,
.grop-upcomt_wigt_txt h5 a:focus,
.grop-urtcau_wigt_txt h5 a:hover,
.grop-urtcau_wigt_txt h5 a:focus,
.grop-tm_intro h4 a:hover,
.grop-tm_intro h4 a:focus,
.grop-tmsl_conctinfo a:hover,
.grop-tmsl_conctinfo a:focus,
.rop-tmsl_ci-so li a:hover,
.rop-tmsl_ci-so li a:focus,
.grop-ab_msions_txt h4 a:hover,
.grop-ab_msions_txt h4 a:focus,
.grop-oimt_cption a:hover,
.grop-oimt_cption a:focus,
.grop-bvlist_text h4 a:hover,
.grop-bvlist_text h4 a:focus,
.grop-galry_cption a:hover,
.grop-galry_cption a:focus,
.grop-offic_loc_txt h2 a:hover,
.grop-offic_loc_txt h2 a:focus,
.grop-cgettouch_locn a:hover,
.grop-cgettouch_locn a:focus,
.grop-offic_locfull a:hover,
.grop-offic_locfull a:focus,
.grop-post_meta a:hover,
.grop-post_meta a:focus,
a.grop-post_comnt:hover,
a.grop-post_comnt:focus,
.grop-pulrnws_wigt_warp a:hover,
.grop-pulrnws_wigt_warp a:focus,
a.author-name:hover,
a.author-name:focus,
#comments.comments-area .grop-comments-meta h4 a:hover,
#comments.comments-area .grop-comments-meta h4 a:focus,
.grop-sigl_content a:hover,
.grop-sigl_content a:focus,
#comments.comments-area .comment-content a:hover,
#comments.comments-area .comment-content a:focus,
.grop-projct_content_warp h4 a:hover,
.grop-projct_content_warp h4 a:focus,
.woocommerce .entry-summary .product_meta > span a:hover,
.woocommerce .entry-summary .product_meta > span a:focus,
.lost_password a:hover,
.lost_password a:focus,
#add_payment_method #payment .payment_method_paypal .about_paypal:hover,
#add_payment_method #payment .payment_method_paypal .about_paypal:focus,
.woocommerce-cart #payment .payment_method_paypal .about_paypal:hover,
.woocommerce-cart #payment .payment_method_paypal .about_paypal:focus,
.woocommerce-checkout #payment .payment_method_paypal .about_paypal:hover,
.woocommerce-checkout #payment .payment_method_paypal .about_paypal:focus,
.woocommerce-cart .woocommerce table.shop_table .cart_item td a:hover,
.woocommerce-cart .woocommerce table.shop_table .cart_item td a:focus,
.woocommerce-account a:hover,
.woocommerce-account a:focus,
.grop-hm4srv_txt h4 a:hover,
.grop-hm4srv_txt h4 a:focus, a.woocommerce-LoopProduct-link h3:hover, a.woocommerce-LoopProduct-link h3:focus, .grop-gallery-image a:hover .grop-galry_cption,
.grop-gallery-image a:focus .grop-galry_cption, #comments.comments-area #respond #reply-title small a:hover, #comments.comments-area #respond #reply-title small a:focus, .grop-wigt_search_form input[type="search"]:focus + .grop-wigt_search_submit,
.grop-wigt_search_submit:hover, .grop-cusigl_dtr_count i, .grop-cusigl_meta a:hover, .grop-cusigl_meta a:focus,
.grop-sigl_meta a:hover,
.grop-sigl_meta a:focus, ul.grop-ab_msions_list li a:hover, ul.grop-ab_msions_list li a:focus, ul.grop-ab_msions_list li i,
ul.grop-ab_msions_list li a i, .woocommerce .star-rating span:before,
.woocommerce p.stars a:before, .woocommerce-error a:hover, .woocommerce-error a:focus,
.woocommerce-info a:hover,
.woocommerce-info a:focus,
.woocommerce-message a:hover,
.woocommerce-message a:focus, .woocommerce a.remove:hover, .grop-rsd_amn span,
.grop-ftr_sngl_widget .textwidget .grop-ftr_wigt_locn span a:hover,
#grop-mainmenu ul.sub-menu li a:hover, .woocommerce a.remove:hover,
ul.slimmenu li.current-menu-item > a, ul.slimmenu li a:hover,
#grop-mainmenu ul.sub-menu li.current-menu-ancestor > a {color: {$all_element_color};}

  .tag-pagination .wp-link-pages a span:hover,
  .tag-pagination .wp-link-pages a span:focus,
  .tag-pagination .wp-link-pages a span:active,
  .tag-gallery .wp-link-pages a span:hover,
  .tag-gallery .wp-link-pages a span:focus,
  .tag-gallery .wp-link-pages a span:active,
  .wp-pagenavi a:hover, .wp-pagenavi span.current,
  .grop-side-widget .tagcloud a:hover, .grop-side-widget .tagcloud a:focus, .grop-hm-3sildcapst3_btn:hover, .grop-hm-3sildcapst3_btn:focus,
#comments.comments-area a.comment-reply-link:hover,
#comments.comments-area a.comment-reply-link:focus, #comments.comments-area #respond #reply-title small a:hover, #comments.comments-area #respond #reply-title small a:focus, .grop-hm-3sildcapst3_btn.grop-btn_active, .grop-posts-pagination-warp .page-numbers:hover,
.grop-posts-pagination-warp .page-numbers:focus,
.woocommerce-pagination li .page-numbers.current,
.woocommerce-pagination li .page-numbers:hover,
.woocommerce-pagination li .page-numbers:focus, .woocommerce a.remove:hover, .woocommerce .cart .button:hover, .woocommerce .cart .button:focus,
.woocommerce .cart input.button:hover,
.woocommerce .cart input.button:focus, .grop-cause_remor_btn,
.page-numbers.current, .tribe-events-event-cost span {border-color: {$all_element_color};}

.woocommerce-error,
.woocommerce-message{border-top-color: {$all_element_color};}

CSS;
}

/* Top Bar - Customizer - Background */
$topbar_bg_color  = cs_get_customize_option( 'topbar_bg_color' );
if ($topbar_bg_color) {
echo <<<CSS
  .no-class {}
  .grop-header_top {
    background-color: {$topbar_bg_color};
  }
CSS;
}
$topbar_text_color  = cs_get_customize_option( 'topbar_text_color' );
if ($topbar_text_color) {
echo <<<CSS
  .no-class {}
  .grop-header_top {
    color: {$topbar_text_color};
  }
CSS;
}
$topbar_link_color  = cs_get_customize_option( 'topbar_link_color' );
if ($topbar_link_color) {
echo <<<CSS
  .no-class {}
  .grop-header_top .grop-header_info > ul a, .grop-header_top a {
    color: {$topbar_link_color};
  }
CSS;
}
$topbar_link_hover_color  = cs_get_customize_option( 'topbar_link_hover_color' );
if ($topbar_link_hover_color) {
echo <<<CSS
  .no-class {}
  .grop-header_top .grop-header_info > ul a:hover, .grop-header_top .grop-header_info > ul a:focus .grop-header_top a:hover, .grop-header_top a:focus, .grop-header_top .grop-header_info > ul li i, .grop-header_top .grop-header_info > ul a i {
    color: {$topbar_link_hover_color};
  }
CSS;
}
$topbar_social_color  = cs_get_customize_option( 'topbar_social_color' );
if ($topbar_social_color) {
echo <<<CSS
  .no-class {}
  .grop-header_top .grop-header_social > ul li a {
    color: {$topbar_social_color};
  }
CSS;
}
$topbar_social_hover_color  = cs_get_customize_option( 'topbar_social_hover_color' );
if ($topbar_social_hover_color) {
echo <<<CSS
  .no-class {}
  .grop-header_top .grop-header_social > ul li a:hover {
    color: {$topbar_social_hover_color};
  }
CSS;
}

/* Header - Customizer */
$logo_bar_bg_color  = cs_get_customize_option( 'logo_bar_bg_color' );
if ($logo_bar_bg_color) {
echo <<<CSS
  .no-class {}
  .grop-header_style3 .grop-header_top, .grop-header_style2 .grop-header_top {
    background-color: {$logo_bar_bg_color};
  }
CSS;
}
$logo_bar_txt_color  = cs_get_customize_option( 'logo_bar_txt_color' );
if ($logo_bar_txt_color) {
echo <<<CSS
  .no-class {}
  .grop-header_style2 .grop-hsi2_txt h6, .grop-header_style3 .grop-hsi2_txt h6,
  .grop-header_style2 .grop-header_top, .grop-header_style3 .grop-header_top,
  .grop-header_style2 .grop-hsi2_icon, .grop-header_style3 .grop-hsi2_icon {
    color: {$logo_bar_txt_color};
  }
CSS;
}
$logo_bar_link_color  = cs_get_customize_option( 'logo_bar_link_color' );
if ($logo_bar_link_color) {
echo <<<CSS
  .no-class {}
  .grop-header_style2 .grop-hsi2_txt h5, .grop-header_style2 .grop-hsi2_txt h5 a,
  .grop-header_style3 .grop-hsi2_txt h5, .grop-header_style3 .grop-hsi2_txt h5 a,
  .grop-header_style2 .grop-header_top a, .grop-header_style3 .grop-header_top a {
    color: {$logo_bar_link_color};
  }
CSS;
}
$logo_bar_link_hover_color  = cs_get_customize_option( 'logo_bar_link_hover_color' );
if ($logo_bar_link_hover_color) {
echo <<<CSS
  .no-class {}
  .grop-header_style2 .grop-hsi2_txt h5:hover, .grop-header_style2 .grop-hsi2_txt h5 a:hover,
  .grop-header_style3 .grop-hsi2_txt h5:hover, .grop-header_style3 .grop-hsi2_txt h5 a:hover,
  .grop-header_style2 .grop-header_top a:hover, .grop-header_style3 .grop-header_top a:hover,
  .grop-header_style2 .grop-hsi2_txt h5:focus, .grop-header_style2 .grop-hsi2_txt h5 a:focus,
  .grop-header_style3 .grop-hsi2_txt h5:focus, .grop-header_style3 .grop-hsi2_txt h5 a:focus,
  .grop-header_style2 .grop-header_top a:focus, .grop-header_style3 .grop-header_top a:focus {
    color: {$logo_bar_link_hover_color};
  }
CSS;
}
$logo_bar_btn_bg_color  = cs_get_customize_option( 'logo_bar_btn_bg_color' );
if ($logo_bar_btn_bg_color) {
echo <<<CSS
  .no-class {}
  .grop-header_style2 .grop-hadr_donate_btn, .grop-header_style3 .grop-hadr_donate_btn,
  .grop-header_area .grop-hadr_donate_btn {
    background-color: {$logo_bar_btn_bg_color};
  }
CSS;
}
$logo_bar_btn_txt_color  = cs_get_customize_option( 'logo_bar_btn_txt_color' );
if ($logo_bar_btn_txt_color) {
echo <<<CSS
  .no-class {}
  .grop-header_style2 .grop-hadr_donate_btn, .grop-header_style3 .grop-hadr_donate_btn,
  .grop-header_area .grop-hadr_donate_btn {
    color: {$logo_bar_btn_txt_color};
  }
CSS;
}

$header_bg_color  = cs_get_customize_option( 'header_bg_color' );
if ($header_bg_color) {
echo <<<CSS
  .no-class {}
  .grop-header_navigations.grop-header_sticky, .grop-header_style3 .grop-header_navigations.grop-header_sticky {
    background-color: {$header_bg_color};
  }
CSS;
}

$header_txt_color  = cs_get_customize_option( 'header_txt_color' );
if ($header_txt_color) {
echo <<<CSS
  .no-class {}
  .grop-header_navigations.grop-header_sticky {
    color: {$header_txt_color};
  }
CSS;
}
$header_link_color  = cs_get_customize_option( 'header_link_color' );
$header_link_hover_color  = cs_get_customize_option( 'header_link_hover_color' );
if($header_link_color || $header_link_hover_color) {
echo <<<CSS
  .no-class {}
  .grop-header_sticky #grop-mainmenu > li > a, .grop-header_sticky_active #grop-mainmenu > li > a,
  .grop-header_sticky .grop-hadr_shopping_cart > a,
  .grop-header_sticky .grop-hadr_search > a, .grop-header_style3 .grop-header_sticky #grop-mainmenu > li > a,
  .grop-header_style3 .grop-header_sticky_active #grop-mainmenu > li > a,
  .grop-header_style3 .grop-header_sticky .grop-hadr_search > a,
  .grop-header_style3 .grop-header_sticky .grop-hadr_shopping_cart > a,
.grop-header_style3 .grop-header_sticky_active .grop-hadr_search > a,
.grop-header_style3 .grop-header_sticky_active .grop-hadr_shopping_cart > a {
    color: {$header_link_color};
  }

  .grop-header_sticky #grop-mainmenu > li > a:hover, .grop-header_sticky #grop-mainmenu > li > a:focus,
  .grop-header_sticky_active #grop-mainmenu > li > a:hover, .grop-header_sticky_active #grop-mainmenu > li > a:focus,
  .grop-header_sticky .grop-hadr_shopping_cart > a:hover, .grop-header_sticky .grop-hadr_shopping_cart > a:focus,
  .grop-header_sticky .grop-hadr_search > a:hover, .grop-header_sticky .grop-hadr_search > a:focus,
  .grop-header_style3 .grop-header_sticky #grop-mainmenu > li > a:hover,
  .grop-header_style3 .grop-header_sticky_active #grop-mainmenu > li > a:hover,
  .grop-header_style3 .grop-header_sticky #grop-mainmenu > li > a:focus,
  .grop-header_style3 .grop-header_sticky_active #grop-mainmenu > li > a:hover,
  .grop-header_style3 .grop-header_sticky .grop-hadr_search > a:hover,
  .grop-header_style3 .grop-header_sticky .grop-hadr_shopping_cart > a:hover,
  .grop-header_style3 .grop-header_sticky_active .grop-hadr_search > a:hover,
  .grop-header_style3 .grop-header_sticky_active .grop-hadr_shopping_cart > a:hover,
  .grop-header_style3 .grop-header_sticky .grop-hadr_search > a:focus,
  .grop-header_style3 .grop-header_sticky .grop-hadr_shopping_cart > a:focus,
  .grop-header_style3 .grop-header_sticky_active .grop-hadr_search > a:focus,
  .grop-header_style3 .grop-header_sticky_active .grop-hadr_shopping_cart > a:focus {
    color: {$header_link_hover_color};
  }
CSS;
}
// Metabox - Header Transparent
if ($groppe_meta) {
  $transparent_header = $groppe_meta['transparency_header'];
  $transparent_menu_color = $groppe_meta['transparent_menu_color'];
  $transparent_menu_hover = $groppe_meta['transparent_menu_hover_color'];
} else {
  $transparent_header = '';
  $transparent_menu_color = '';
  $transparent_menu_hover = '';
}
if ($transparent_header) {
echo <<<CSS
  .no-class {}
  .header-area-trprnt #grop-mainmenu > li > a,
  .header-area-trprnt .grop-hadr_shopping_cart > a,
  .header-area-trprnt .grop-hadr_search > a {
    color: {$transparent_menu_color};
  }

  .header-area-trprnt #grop-mainmenu > li > a:hover,
  .header-area-trprnt #grop-mainmenu > li > a:focus,
  .header-area-trprnt #grop-mainmenu li.current-menu-ancestor > a,
  .header-area-trprnt #grop-mainmenu > li.menu-item-has-children:hover > a,
  .header-area-trprnt .grop-hadr_shopping_cart > a:hover,
  .header-area-trprnt .grop-hadr_search > a:hover{
    color: {$transparent_menu_hover};
  }
CSS;
}

$submenu_bg_color  = cs_get_customize_option( 'submenu_bg_color' );
$submenu_bg_hover_color  = cs_get_customize_option( 'submenu_bg_hover_color' );
$submenu_border_color  = cs_get_customize_option( 'submenu_border_color' );
$submenu_link_color  = cs_get_customize_option( 'submenu_link_color' );
$submenu_link_hover_color  = cs_get_customize_option( 'submenu_link_hover_color' );
if ($submenu_bg_color || $submenu_bg_hover_color || $submenu_border_color || $submenu_link_color || $submenu_link_hover_color) {
echo <<<CSS
  .no-class {}
  #grop-mainmenu ul.sub-menu li {
    border-color: {$submenu_border_color};
  }
  #grop-mainmenu ul.sub-menu li a {
    color: {$submenu_link_color};
  }
  #grop-mainmenu ul.sub-menu li a:hover, #grop-mainmenu ul.sub-menu li a:focus,
  #grop-mainmenu ul.sub-menu li.current_page_item > a {
    color: {$submenu_link_hover_color};
  }
  #grop-mainmenu ul.sub-menu {
    background-color: {$submenu_bg_color};
  }

  .mean-container .mean-nav ul li li a,
  .mean-container .mean-nav ul li li li a,
  .mean-container .mean-nav ul li li li li a,
  .mean-container .mean-nav ul li li li li li a {
    border-top-color: {$submenu_border_color};
  }
CSS;
}

/* Title Area - Theme Options - Background */
$titlebar_bg = cs_get_option('titlebar_bg');
$title_heading_color  = cs_get_customize_option( 'titlebar_title_color' );
if ($titlebar_bg) {

  $title_area = ( ! empty( $titlebar_bg['image'] ) ) ? 'background-image: url('. $titlebar_bg['image'] .');' : '';
  $title_area .= ( ! empty( $titlebar_bg['repeat'] ) ) ? 'background-repeat: '. $titlebar_bg['repeat'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['position'] ) ) ? 'background-position: '. $titlebar_bg['position'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['attachment'] ) ) ? 'background-attachment: '. $titlebar_bg['attachment'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['size'] ) ) ? 'background-size: '. $titlebar_bg['size'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['color'] ) ) ? 'background-color: '. $titlebar_bg['color'] .';' : '';

echo <<<CSS
  .no-class {}
  .grop-title-area {
    {$title_area}
  }
CSS;
}
if ($title_heading_color) {
echo <<<CSS
  .no-class {}
  .grop-page_title {
    color: {$title_heading_color};
  }
CSS;
}

/* Footer */
if ($footer_bg_color) {
echo <<<CSS
  .no-class {}
  .grop-footer_top_widgets_warp {background: {$footer_bg_color};}
CSS;
}
if ($footer_heading_color) {
echo <<<CSS
  .no-class {}
  .grop-ftr_widget_title, .grop-footer_widgets h1, .grop-footer_widgets h2, .grop-footer_widgets h3, .grop-footer_widgets h4, .grop-footer_widgets h5, .grop-footer_widgets h6 {color: {$footer_heading_color};}
CSS;
}
if ($footer_text_color) {
echo <<<CSS
  .no-class {}
  .grop-footer_widgets p,
  .grop-footer_widgets, .grop-footer_widgets .widget_product_search label.screen-reader-text,
  .grop-footer_widgets #wp-calendar thead th, .grop-footer_widgets #wp-calendar tbody,
  .grop-footer_widgets .widget_recent_comments > ul, .grop-footer_widgets .widget_rss > ul,
  .grop-footer_widgets .grop-wigt_search_form input[type="search"],
  .grop-footer_widgets .grop-ftr_sngl_widget .mc4wp-form-fields p {color: {$footer_text_color};}
CSS;
}
if ($footer_link_color) {
echo <<<CSS
  .no-class {}
  .grop-footer_widgets a, .grop-footer_widgets .woocommerce ul.cart_list li a,
  .grop-footer_widgets .woocommerce ul.product_list_widget li a,
  .grop-footer_widgets .woocommerce a.remove,
  .grop-footer_widgets .widget_categories > ul li a, .grop-footer_widgets .widget_pages > ul li a,
  .grop-footer_widgets .widget_recent_entries > ul li a, .grop-footer_widgets .widget_meta > ul li a,
  .grop-footer_widgets .widget_archive > ul li a, .grop-footer_widgets .widget_product_categories > ul li a,
  .grop-footer_widgets .product-categories > ul li a, .grop-footer_widgets .widget_nav_menu ul.menu li a,
  .grop-footer_widgets .widget_layered_nav ul li a,
  .grop-footer_widgets .widget_categories > ul li a:before, .grop-footer_widgets .widget_pages > ul li a:before,
  .grop-footer_widgets .widget_nav_menu > ul li a:before, .grop-footer_widgets .widget_recent_entries > ul li a:before,
  .grop-footer_widgets .widget_meta > ul li a:before, .grop-footer_widgets .widget_archive > ul li a:before,
  .grop-footer_widgets .widget_product_categories > ul li a:before, .grop-footer_widgets .product-categories > ul li a:before,
  .grop-footer_widgets .widget_layered_nav ul li a:before,.grop-footer_widgets .widget_nav_menu ul li a:before,
  .grop-footer_widgets #wp-calendar tfoot #next a,
  .grop-footer_widgets #wp-calendar tfoot #prev a,
  .grop-footer_widgets .grop-ftr_sngl_widget .textwidget .grop-ftr_wigt_locn span a,
  .grop-footer_widgets .grop-ftr_sngl_widget ul li a {color: {$footer_link_color};}
CSS;
}
if ($footer_link_hover_color) {
echo <<<CSS
  .no-class {}
  .grop-footer_widgets a:hover,
  .grop-footer_widgets .woocommerce ul.product_list_widget li a:hover,
  .grop-footer_widgets .woocommerce a.remove:hover,
  .grop-footer_widgets  > ul li a:hover,
  .grop-footer_widgets .widget_categories > ul li a:hover:before, .grop-footer_widgets .widget_pages > ul li a:hover:before,
  .grop-footer_widgets .widget_nav_menu > ul li a:hover:before, .grop-footer_widgets .widget_recent_entries > ul li a:hover:before,
  .grop-footer_widgets .widget_meta > ul li a:hover:before, .grop-footer_widgets .widget_archive > ul li a:hover:before,
  .grop-footer_widgets .widget_product_categories > ul li a:hover:before, .grop-footer_widgets .product-categories > ul li a:hover:before,
  .grop-footer_widgets .widget_layered_nav ul li a:hover:before, .grop-footer_widgets .widget_product_categories > ul li a:hover,
  .grop-footer_widgets .widget_nav_menu ul li a:hover:before,
  .grop-footer_widgets #wp-calendar tfoot #next a:hover,
  .grop-footer_widgets #wp-calendar tfoot #prev a:hover,
  .grop-footer_widgets .widget_nav_menu ul.menu li a:hover,
  .grop-footer_widgets .grop-ftr_sngl_widget .textwidget .grop-ftr_wigt_locn span a:hover,
  .grop-footer_widgets .grop-ftr_sngl_widget ul li a:hover {color: {$footer_link_hover_color};}
CSS;
}

/* Copyright */
$copyright_text_color  = cs_get_customize_option( 'copyright_text_color' );
$copyright_link_color  = cs_get_customize_option( 'copyright_link_color' );
$copyright_link_hover_color  = cs_get_customize_option( 'copyright_link_hover_color' );
$copyright_bg_color  = cs_get_customize_option( 'copyright_bg_color' );
$copyright_social_icon_color  = cs_get_customize_option( 'copyright_social_icon_color' );
$copyright_social_icon_bg_color  = cs_get_customize_option( 'copyright_social_icon_bg_color' );
$copyright_social_icon_hover_color  = cs_get_customize_option( 'copyright_social_icon_hover_color' );
$copyright_social_icon_bg_hover_color  = cs_get_customize_option( 'copyright_social_icon_bg_hover_color' );
if ($copyright_bg_color) {
echo <<<CSS
  .no-class {}
  .grop-footer-bottom {background: {$copyright_bg_color};}
CSS;
}
if ($copyright_text_color) {
echo <<<CSS
  .no-class {}
  .grop-footer-bottom,
  .grop-footer-bottom p {color: {$copyright_text_color};}
CSS;
}
if ($copyright_link_color) {
echo <<<CSS
  .no-class {}
  .grop-footer-bottom a {color: {$copyright_link_color};}
CSS;
}
if ($copyright_link_hover_color) {
echo <<<CSS
  .no-class {}
  .grop-footer-bottom a:hover {color: {$copyright_link_hover_color};}
CSS;
}
// Copyright Social Icons
if ($copyright_social_icon_color) {
echo <<<CSS
  .no-class {}
  .grop-footer-bottom .grop-footer-socail li a {color: {$copyright_social_icon_color};}
CSS;
}
if ($copyright_social_icon_bg_color) {
echo <<<CSS
  .no-class {}
  .grop-footer-bottom .grop-footer-socail li a {background-color: {$copyright_social_icon_bg_color};}
CSS;
}
if ($copyright_social_icon_hover_color) {
echo <<<CSS
  .no-class {}
  .grop-footer-bottom .grop-footer-socail li a:hover {color: {$copyright_social_icon_hover_color};}
CSS;
}
if ($copyright_social_icon_bg_hover_color) {
echo <<<CSS
  .no-class {}
  .grop-footer-bottom .grop-footer-socail li a:hover {background-color: {$copyright_social_icon_bg_hover_color};}
CSS;
}

// Content Colors
$body_color  = cs_get_customize_option( 'body_color' );
if ($body_color) {
echo <<<CSS
  .no-class {}
  body, .no-sidebar p, .grop-float_left.grop-page-with_sidbr_entry_content p, .grop-knob,
  .grop-cause_time, .grop-ucoming_evnt_time, .grop-fetrdcs_dnt_stats, .grop-counter_cont h2,
  .grop-news_ps_date, .grop-news_pst_in, .grop-news_pst_commnt, .grop-donation_stats .grop-rasd_amount,
  .grop-fetrdcs_dnt_stats .grop-rasd_amount, .grop-news_ps_date i, .grop-news_pst_commnt i,
  .grop-caudetai_title, .grop-caudetai_amunt, .grop-dnatrsd_name, .grop-dnatrsd_amount,
  .grop-stryabtus_pra_stg, .submit-form .give-btn,
  .donation-form-wrap.grop-donation-form legend,
  form[id*=give-form] .form-row input[type=text].required,
  form[id*=give-form] #give-final-total-wrap .give-donation-total-label, .grop-txt-blck,
  .grop-suprtus_tday_txt h4, .grop-suessrstr_name, form[id*=give-form] .form-row input[type=email].required,
  form[id*=give-form] .form-row input[type=text],
  form[id*=give-form] .give-donation-amount .give-currency-symbol, .grop-stryabtus_box_txt h5,
  .grop-stryabtus_counter, .grop-cntdwn_upevt_txt h4, .grop-cntdwn_upevt_txt h5, .flip-clock-divider .flip-clock-label,
  .grop-vltrs_peple_scil_title, .grop-tstimnl_intro .grop-tstimnl_prsn-title,
  .grop-missions_txt h4, .grop-oicter_area, .grop-oic_txt, .grop-oic_singl_warp h2,
  .grop-piechart_list li, .woocommerce ul.products li.product .price, .woocommerce ul.products li.product .price del,
  .woocommerce ul.products li.product .price ins, .grop-hm4srv_txt h4,
  .grop-cause_list_single .grop-cause_txts_content p:not(.grop-donation_stats),
  .grop-cusigl_dt-txt, .grop-sigl_dt-txt, .grop-cusigl_content p, .grop-cusigl_content, .grop-sigl_content, .grop-sigl_content p,
  .grop-cusigl_dt-txt span, .grop-sigl_dt-txt span, .grop-cusiglso_txt h4, .grop-siglso_txt h4,
  .grop-about_txt h3, .grop-about_txt q, ul.grop-ab_msions_list li,
  .wpcf7 input, .wpcf7 textarea, .wpcf7 input[type=number], .grop-cgettouch_info .grop-cgettouch_locn span, .grop-offic_locfull span,
  .wpcf7 .wpcf7-list-item-label, .grop-faq-heading .panel-title, .grop-oimt_txt p.grop-oimt_semi,
  #grop_filters ul li, #grop_filters ul li:hover, #grop_filters ul li.is-active, .grop-tm_intro h6,
  .grop-tmsl_txt_warp p, .grop-tmsl_conctinfo, .grop-tmsl_conctinfo span,
  [class*="grop-input-col-"] label, .grop-bvlist_text h4, .grop-evensigl_content p, .grop-vltrs_peple_intro_txt h4,
  .grop-evensigl_content ol li, .grop-dtl h5, .grop-post_meta i, .grop-post_comnt i,
  #comments.comments-area .grop-comments-meta span, #comments.comments-area .grop-comments-meta h4,
  #comments.comments-area .comment-content p, .grop-sigltags_warp > span,
  .grop-projct_content_warp h4,.grop-sigl_content > ol li, .grop-sigl_content > ol dd, .grop-sigl_content > ul li,
  .grop-sigl_content > ul dd, .grop-sigl_content > dl li, .grop-sigl_content > dl dd,
  .woocommerce .woocommerce-ordering select,.woocommerce div.product p.price ins, .woocommerce div.product span.price ins,
  .woocommerce .entry-summary .product_meta > span span, .woocommerce-tabs .panel > h2,
  .woocommerce-Tabs-panel--description h2, del, .woocommerce .quantity .qty,
  .woocommerce .entry-summary .product_meta > span, .woocommerce #reviews #comments ol.commentlist li .comment-text .description p, .woocommerce-Tabs-panel--description p, .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta > time,
  .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta > strong,
  .woocommerce #review_form #respond .comment-form-rating > label,
  .woocommerce #review_form #respond .comment-form-comment label, .woocommerce #review_form #respond .comment-form-author label, .woocommerce #review_form #respond .comment-form-email label, .woocommerce #review_form #respond .comment-form-comment input, .woocommerce #review_form #respond .comment-form-comment textarea, .woocommerce #review_form #respond .comment-form-author input, .woocommerce #review_form #respond .comment-form-author textarea, .woocommerce #review_form #respond .comment-form-email input, .woocommerce #review_form #respond .comment-form-email textarea, .woocommerce #review_form #respond p, .woocommerce table.shop_table th,
  .woocommerce-cart .woocommerce table.shop_table .cart_item td.product-name,
  .woocommerce-cart .woocommerce table.shop_table .cart_item td,
  .woocommerce-cart .woocommerce table.shop_table td.actions #coupon_code,
  .woocommerce-cart .woocommerce table.shop_table tr.cart-subtotal td[data-title*="Subtotal"],
  .woocommerce-cart .woocommerce table.shop_table tr.shipping td[data-title*="Subtotal"],
  .woocommerce-cart .woocommerce table.shop_table tr.order-total td[data-title*="Subtotal"],
  .woocommerce table.shop_table td, .woocommerce-cart .woocommerce-shipping-calculator .shipping-calculator-button,
  .woocommerce-cart .cart-collaterals .cart_totals table select,
  .woocommerce form .form-row .input-text, .woocommerce-page form .form-row .input-text,
  .woocommerce table.shop_table td strong,
  .woocommerce-error, .woocommerce-info, .woocommerce-message, .woocommerce form .form-row label,
  .woocommerce .woocommerce-checkout-payment label, .woocommerce-page .woocommerce-checkout-payment label,
  .woocommerce form.login > p:not(.form-row), .latest_news_caro_nav > div, .grop-officlc_caro_nav > div,
  .grop-ucoming_evnt_casel_nav > div,
  .grop-suess_stris_carousel_warp .grop-suess_stris_single span.testi-pro,
  .grop-dnatrsd_single.grop-pjdnatrsd_single .grop-dnatrsd_cont_warp .grop-dnatrsd_name,
  .grop-dnatrsd_single.grop-pjdnatrsd_single .grop-dnatrsd_cont_warp .grop-dnatrsd_amount {color: {$body_color};}
CSS;
}
$body_links_color  = cs_get_customize_option( 'body_links_color' );
if ($body_links_color) {
echo <<<CSS
  .no-class {}
  body a,
  .grop-float_left.grop-page-with_sidbr_entry_content a, .grop-big_link,
  .grop-prjct_nav_tabs li a, .help_single_itm_warp h4 a, .grop-news_pst_in a,
  .grop-news_pst_commnt a, .grop-prjct_tab_title a, .grop-dnatrsd_name a, .grop-suprtus_tday_txt h4 a,
  .vltrs_peple_social ul li a, .grop-tstimnl_intro .grop-tstimnl_prsn-title a, .grop-missions_txt h4 a,
  .grop-dont_sectors_mta, .grop-hm4srv_txt h4 a,
  .grop-posts-pagination-warp .page-numbers.prev, .grop-posts-pagination-warp .page-numbers.next, .woocommerce-pagination .page-numbers.prev, .woocommerce-pagination .page-numbers.next, ul.grop-ab_msions_list li a, .grop-cgettouch_info .grop-cgettouch_locn a,
  .grop-offic_locfull a, .grop-ucoming_evnt_social i, .grop-faq-heading .panel-title a,
  .grop-tmsl_conctinfo a, .rop-tmsl_ci-so li a, .grop-bvlist_text h4 a, .grop-vltrs_peple_intro_txt h4 a, .grop-post_comnt,
  #comments.comments-area .grop-comments-meta h4 a, .grop-projct_content_warp h4 a,
  .grop-author-info .author-content .author-name,.woocommerce .entry-summary .product_meta > span a,
  .woocommerce div.product .woocommerce-tabs ul.tabs li.active a,.woocommerce div.product .woocommerce-tabs ul.tabs li a,
  .related.products a h2, .woocommerce ul.products li.product a h2,
  .woocommerce .entry-summary .woocommerce-review-link, .woocommerce-cart .woocommerce table.shop_table .cart_item td.product-name a,
  .woocommerce-error a, .woocommerce-info a, .woocommerce-message a,
  .woocommerce-checkout #payment .payment_method_paypal .about_paypal, .lost_password a, .grop-dnatrsd_amount span {color: {$body_links_color};}
CSS;
}
$body_link_hover_color  = cs_get_customize_option( 'body_link_hover_color' );
if ($body_link_hover_color) {
echo <<<CSS
  .no-class {}
  body a:hover,
  .grop-float_left.grop-page-with_sidbr_entry_content a:hover, .help_single_itm_warp h4 a:hover,
  .grop-news_pst_in a:hover, .grop-news_pst_commnt a:hover, .grop-prjct_tab_title a:hover,
  .grop-dnatrsd_name a:hover, .grop-suprtus_tday_txt h4 a:hover, .grop-callout2_text h3 a:hover,
  .grop-news_ps_title a:hover,
  .vltrs_peple_social ul li a:hover, .grop-tstimnl_intro .grop-tstimnl_prsn-title a:hover,
  .grop-callout_btn:hover, .grop-missions_txt h4 a:hover, .grop-cause_title a:hover,
  a.grop-dont_sectors_mta:hover, .grop-hm4srv_txt h4 a:hover,
  ul.grop-ab_msions_list li a:hover, .grop-cgettouch_info .grop-cgettouch_locn a:hover,
  .grop-offic_locfull a:hover, .grop-ucoming_evnt_social i:hover, .grop-faq-heading .panel-title a:hover,
  .grop-tmsl_conctinfo a:hover, .rop-tmsl_ci-so li a:hover, .grop-bvlist_text h4 a:hover,
  .grop-vltrs_peple_intro_txt h4 a:hover, .grop-post_comnt:hover span, #comments.comments-area .grop-comments-meta h4 a:hover,
  .grop-projct_content_warp h4 a:hover, .grop-author-info .author-content a.author-name:hover
  .woocommerce .entry-summary .product_meta > span a:hover,
  .woocommerce div.product .woocommerce-tabs ul.tabs li.active a:hover,
  .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
  .related.products a:hover h2, .woocommerce ul.products li.product a:hover h2,
  .woocommerce .entry-summary .woocommerce-review-link:hover,
  .woocommerce-cart .woocommerce table.shop_table .cart_item td.product-name a:hover,
  .woocommerce-error a:hover, .woocommerce-info a:hover, .woocommerce-message a:hover,
  .woocommerce-checkout #payment .payment_method_paypal .about_paypal:hover,
  .lost_password a:hover, .grop-ucoming_evnt_title a:hover,
  .grop-tm_intro h4 a:hover, .grop-tm_intro h4 a:focus {color: {$body_link_hover_color};}

CSS;
}
$sidebar_content_color  = cs_get_customize_option( 'sidebar_content_color' );
if ($sidebar_content_color) {
echo <<<CSS
  .no-class {}
  .grop-page-rgt_sidebar p,
  .grop-page-rgt_sidebar, .grop-side-widget.widget_product_search label.screen-reader-text,
  .grop-side-widget #wp-calendar thead th, .grop-side-widget #wp-calendar tbody,
  .grop-side-widget.widget_recent_comments > ul, .grop-side-widget.widget_rss > ul,
  .grop-side-widget .grop-wigt_search_form input[type="search"] {color: {$sidebar_content_color};}
CSS;
}
$sidebar_link_color  = cs_get_customize_option( 'sidebar_link_color' );
if ($sidebar_link_color) {
echo <<<CSS
  .no-class {}
  .grop-page-rgt_sidebar a, .woocommerce ul.cart_list li a,
  .grop-side-widget.woocommerce ul.product_list_widget li a,
  .grop-side-widget.woocommerce a.remove,
  .grop-side-widget.widget_categories > ul li a, .grop-side-widget.widget_pages > ul li a,
  .grop-side-widget.widget_recent_entries > ul li a, .grop-side-widget.widget_meta > ul li a,
  .grop-side-widget.widget_archive > ul li a, .grop-side-widget.widget_product_categories > ul li a,
  .grop-side-widget.product-categories > ul li a, .grop-side-widget.widget_nav_menu ul.menu li a,
  .grop-side-widget.widget_layered_nav ul li a,
  .grop-side-widget.widget_categories > ul li a:before, .grop-side-widget.widget_pages > ul li a:before,
  .grop-side-widget.widget_nav_menu > ul li a:before, .grop-side-widget.widget_recent_entries > ul li a:before,
  .grop-side-widget.widget_meta > ul li a:before, .grop-side-widget.widget_archive > ul li a:before,
  .grop-side-widget.widget_product_categories > ul li a:before, .grop-side-widget.product-categories > ul li a:before,
  .grop-side-widget.widget_layered_nav ul li a:before,.grop-side-widget.widget_nav_menu ul li a:before,
  .grop-side-widget #wp-calendar tfoot #next a,
  .grop-side-widget #wp-calendar tfoot #prev a {color: {$sidebar_link_color};}
CSS;
}
$sidebar_link_hover_color  = cs_get_customize_option( 'sidebar_link_hover_color' );
if ($sidebar_link_hover_color) {
echo <<<CSS
  .no-class {}
  .grop-page-rgt_sidebar a:hover,
  .grop-side-widget.woocommerce ul.product_list_widget li a:hover,
  .grop-side-widget.woocommerce a.remove:hover,
  .grop-side-widget > ul li a:hover,
  .grop-side-widget.widget_categories > ul li a:hover:before, .grop-side-widget.widget_pages > ul li a:hover:before,
  .grop-side-widget.widget_nav_menu > ul li a:hover:before, .grop-side-widget.widget_recent_entries > ul li a:hover:before,
  .grop-side-widget.widget_meta > ul li a:hover:before, .grop-side-widget.widget_archive > ul li a:hover:before,
  .grop-side-widget.widget_product_categories > ul li a:hover:before, .grop-side-widget.product-categories > ul li a:hover:before,
  .grop-side-widget.widget_layered_nav ul li a:hover:before, .grop-side-widget.widget_nav_menu ul li a:hover:before,
   .grop-side-widget #wp-calendar tfoot #next a:hover,
  .grop-side-widget #wp-calendar tfoot #prev a:hover,
  .grop-side-widget.widget_nav_menu ul.menu li a:hover {color: {$sidebar_link_hover_color};}
CSS;
}

$content_heading_color  = cs_get_customize_option( 'content_heading_color' );
if ($content_heading_color) {
echo <<<CSS
  .no-class {}
  .no-sidebar h1, .no-sidebar h2, .no-sidebar h3, .no-sidebar h4, .no-sidebar h5, .no-sidebar h6,
  .grop-page-with_sidbr_entry_content h1, .grop-page-with_sidbr_entry_content h2,
  .grop-page-with_sidbr_entry_content h3, .grop-page-with_sidbr_entry_content h4,
  .grop-page-with_sidbr_entry_content h5, .grop-page-with_sidbr_entry_content h6,
  .grop-section_text [class*="grop-sctn_title_"], .grop-fetrd_cause_cont .grop-fetrd_cause_title,
  .grop-evensigl_tx, .grop-evensigl_desc_warp h4, .grop-section_antext h2[class*="grop-sctn_title_"],
  #comments.comments-area .comments-title, .woocommerce div.product .product_title,
  .related.products h2, .woocommerce-Tabs-panel--description h2, .woocommerce div.product .woocommerce-tabs .woocommerce-Reviews-title,
  .woocommerce .cart-collaterals .cart_totals > h2, .woocommerce-page .cart-collaterals .cart_totals > h2,
  .woocommerce-billing-fields > h3, #ship-to-different-address label, #order_review_heading,
  .grop-resform_headr {color: {$content_heading_color};}
CSS;
}
$sidebar_heading_color  = cs_get_customize_option( 'sidebar_heading_color' );
if ($sidebar_heading_color) {
echo <<<CSS
  .no-class {}
  .grop-page-rgt_sidebar h1, .grop-page-rgt_sidebar h2, .grop-page-rgt_sidebar h3, .grop-page-rgt_sidebar h4, .grop-page-rgt_sidebar h5, .grop-page-rgt_sidebar h6, .grop-side-widget-title {color: {$sidebar_heading_color};}
CSS;
}

// Maintenance Mode
$maintenance_mode_bg  = cs_get_option( 'maintenance_mode_bg' );
if ($maintenance_mode_bg) {
  $maintenance_css = ( ! empty( $maintenance_mode_bg['image'] ) ) ? 'background-image: url('. $maintenance_mode_bg['image'] .');' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['repeat'] ) ) ? 'background-repeat: '. $maintenance_mode_bg['repeat'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['position'] ) ) ? 'background-position: '. $maintenance_mode_bg['position'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['attachment'] ) ) ? 'background-attachment: '. $maintenance_mode_bg['attachment'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['size'] ) ) ? 'background-size: '. $maintenance_mode_bg['size'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['color'] ) ) ? 'background-color: '. $maintenance_mode_bg['color'] .';' : '';
echo <<<CSS
  .no-class {}
  .vt-maintenance-mode {
    {$maintenance_css}
  }
CSS;
}

// Mobile Menu Breakpoint
$mobile_breakpoint = cs_get_option('mobile_breakpoint');
$breakpoint = $mobile_breakpoint ? $mobile_breakpoint : '767';

echo <<<CSS
  .no-class {}
@media (max-width: {$breakpoint}px) {
  .grop-mobil_menu_warp {
    display: block;
  }
  .grop-mainmenu_warp {
    display: none;
  }
  .grop-brand {background-color: #fff !important;}
  .navigation-bar,
  .top-nav-icons,
  .grop-nav-search,
  .hav-mobile-logo.grop-logo img.default-logo,
  .hav-mobile-logo.grop-logo img.retina-logo,
  .is-sticky .grop-logo img.default-logo.sticky-logo,
  .is-sticky .grop-logo img.retina-logo.sticky-logo,
  .header-transparent .grop-logo.hav-mobile-logo img.transparent-default-logo.transparent-logo,
  .header-transparent .is-sticky .grop-logo.hav-mobile-logo img.transparent-default-logo.sticky-logo,
  .grop-logo.hav-mobile-logo img.transparent-default-logo.sticky-logo {display: none;}
  .mean-container .top-nav-icons,
  .mean-container .grop-logo,
  .mean-container .grop-nav-search,
  .hav-mobile-logo.grop-logo img.mobile-logo {display: block;}
  .mean-container .container {width: 100%;}
  .grop-header-two .mean-container .grop-logo {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 99999;
    padding: 0 20px;
  }
  .grop-header-two .mean-container .grop-navigation {
    position: absolute;
    right: 73px;
    top: 0;
    z-index: 9999;
  }
  .mean-container .grop-nav-search {
    float: left;
    left: 0;right: auto;
    background-color: rgba(0,0,0,0.4);
  }
  .mean-container .grop-search-three {
    position: absolute;
    width: 100%;
    left: 0;top: 0;
    z-index: 9999;
  }
  .mean-container .grop-search-three input {
    position: absolute;
    left: 0;top: 0;
    background: rgba(0,0,0,0.4);
  }
  .grop-header-two .mean-container .top-nav-icons {
    position: absolute;
    left: 0;
    z-index: 999999;
  }
  .grop-header-two .grop-brand {padding-top: 20px;padding-bottom: 0;}
  .hav-mobile-logo .default-logo, .hav-mobile-logo .transparent-retina-logo,
  .hav-mobile-logo .retina-logo {
    display: none;
  }
  .mobile-logo {
    display: inline-block;
  }

  /* Retina Logo - Active */
  @media only screen and (-webkit-min-device-pixel-ratio: 1.5),
  only screen and (-moz-min-device-pixel-ratio: 1.5),
  only screen and (-o-min-device-pixel-ratio: 3/2),
  only screen and (min-device-pixel-ratio: 1.5) {

    .hav-mobile-logo .grop-hadr_black_logo, .grop-logo.default-logo, .transparent-retina-logo,
    .hav-default-retina-logo .grop-txt-logo, .hav-default-retina-logo .transparent-retina-logo {display:none;}
    .hav-mobile-logo .retina-logo, .hav-mobile-logo .transparent-retina-logo, .hav-mobile-logo.hav-transparent-retina .transparent-retina-logo {display:none;}
    .hav-mobile-logo.hav-transparent-retina .retina-logo {
      display: none;
    }
  }
}
CSS;

  echo $groppe_vt_get_typography;

  $output = ob_get_clean();
  return $output;

  }

}

/**
 * Custom Font Family
 */
if ( ! function_exists( 'groppe_custom_font_load' ) ) {
  function groppe_custom_font_load() {

    $font_family       = cs_get_option( 'font_family' );

    ob_start();

    if( ! empty( $font_family ) ) {

      foreach ( $font_family as $font ) {
        echo '@font-face{';

        echo 'font-family: "'. $font['name'] .'";';

        if( empty( $font['css'] ) ) {
          echo 'font-style: normal;';
          echo 'font-weight: normal;';
        } else {
          echo $font['css'];
        }

        echo ( ! empty( $font['ttf']  ) ) ? 'src: url('. esc_url($font['ttf']) .');' : '';
        echo ( ! empty( $font['eot']  ) ) ? 'src: url('. esc_url($font['eot']) .');' : '';
        echo ( ! empty( $font['woff'] ) ) ? 'src: url('. esc_url($font['woff']) .');' : '';
        echo ( ! empty( $font['otf']  ) ) ? 'src: url('. esc_url($font['otf']) .');' : '';

        echo '}';
      }

    }

    // Typography
    $output = ob_get_clean();
    return $output;
  }
}

/* Custom Styles */
if( ! function_exists( 'groppe_vt_custom_css' ) ) {
  function groppe_vt_custom_css() {
    wp_enqueue_style('groppe-default-style', get_template_directory_uri() . '/style.css');
    $output  = groppe_custom_font_load();
    $output .= groppe_dynamic_styles();
    $output .= cs_get_option( 'theme_custom_css' );
    $custom_css = groppe_compress_css_lines( $output );

    wp_add_inline_style( 'groppe-default-style', $custom_css );
  }
}

/* Custom JS */
if( ! function_exists( 'groppe_vt_custom_js' ) ) {
  function groppe_vt_custom_js() {
    if ( ! wp_script_is( 'jquery', 'done' ) ) {
      wp_enqueue_script( 'jquery' );
    }
    $output = cs_get_option( 'theme_custom_js' );
    wp_add_inline_script( 'jquery-migrate', $output );
  }
  add_action( 'wp_enqueue_scripts', 'groppe_vt_custom_js' );
}