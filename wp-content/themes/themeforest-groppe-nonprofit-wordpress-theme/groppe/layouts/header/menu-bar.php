<?php
// Metabox
$groppe_id    = ( isset( $post ) ) ? $post->ID : 0;
$groppe_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $groppe_id;
$groppe_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $groppe_id;
$groppe_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $groppe_id : false;
$groppe_meta  = get_post_meta( $groppe_id, 'page_type_metabox', true );

// Header Style - ThemeOptions & Metabox
if ($groppe_meta) {
  $groppe_header_design  = $groppe_meta['select_header_design'];
  $groppe_sticky_header  = $groppe_meta['sticky_header'];
} else {
  $groppe_header_design  = cs_get_option('select_header_design');
  $groppe_sticky_header  = cs_get_option('sticky_header');
}
if ($groppe_meta && $groppe_header_design !== 'default') {
  $groppe_sticky_header  = $groppe_meta['sticky_header'];
} else {
  $groppe_sticky_header  = cs_get_option('sticky_header');
}

$groppe_mobile_breakpoint = cs_get_option('mobile_breakpoint');
$groppe_breakpoint = $groppe_mobile_breakpoint ? $groppe_mobile_breakpoint : '767';

?>
<?php
  if ($groppe_meta) {
    $groppe_choose_menu = $groppe_meta['choose_menu'];
  } else { $groppe_choose_menu = ''; }
  $groppe_choose_menu = $groppe_choose_menu ? $groppe_choose_menu : '';
    wp_nav_menu(
      array(
        'theme_location'    => 'primary',
        'container'         => 'ul',
        'menu_id'         => 'grop-mainmenu',
        'menu_class'         => 'grop-list_unstyled',
        'menu'              => $groppe_choose_menu,
        'fallback_cb'       => 'groppe_wp_bootstrap_navwalker::fallback',
      )
    );
    