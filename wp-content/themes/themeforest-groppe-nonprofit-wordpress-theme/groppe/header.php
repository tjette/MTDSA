<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
// if the `wp_site_icon` function does not exist (ie we're on < WP 4.3)
if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
  if (cs_get_option('brand_fav_icon')) {
    echo '<link rel="shortcut icon" href="'. esc_url(wp_get_attachment_url(cs_get_option('brand_fav_icon'))) .'" />';
  } else { ?>
    <link rel="shortcut icon" href="<?php echo esc_url(GROPPE_IMAGES); ?>/favicon.png" />
  <?php }
  if (cs_get_option('iphone_icon')) {
    echo '<link rel="apple-touch-icon" sizes="57x57" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_icon'))) .'" >';
  }
  if (cs_get_option('iphone_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="114x114" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
    echo '<link name="msapplication-TileImage" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
  }
  if (cs_get_option('ipad_icon')) {
    echo '<link rel="apple-touch-icon" sizes="72x72" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_icon'))) .'" >';
  }
  if (cs_get_option('ipad_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="144x144" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_retina_icon'))) .'" >';
  }
}
$groppe_all_element_color  = cs_get_customize_option( 'all_element_colors' );
?>
<meta name="msapplication-TileColor" content="<?php echo esc_attr($groppe_all_element_color); ?>">
<meta name="theme-color" content="<?php echo esc_attr($groppe_all_element_color); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-97699471-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-97699471-1');
</script>

<?php
// Metabox
global $post;
$groppe_id    = ( isset( $post ) ) ? $post->ID : false;
$groppe_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $groppe_id;
$groppe_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $groppe_id;
$groppe_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $groppe_id : false;
$groppe_meta  = get_post_meta( $groppe_id, 'page_type_metabox', true );

if ($groppe_meta) {
  $groppe_hide_header  = $groppe_meta['hide_header'];
} else { $groppe_hide_header = ''; }

// Header Style
if ($groppe_meta) {
  $groppe_header_design  = $groppe_meta['select_header_design'];
} else {
  $groppe_header_design  = '';
}
if (!empty($groppe_header_design)) {
  $groppe_header_design  = $groppe_header_design;
}

if ($groppe_header_design === 'default') {
  $groppe_header_design_actual  = cs_get_option('select_header_design');
} else {
  $groppe_header_design_actual = ( $groppe_header_design ) ? $groppe_header_design : cs_get_option('select_header_design');
}

if ($groppe_header_design_actual === 'style_three') {
  $header_wrapper_class = ' grop-header_style3';
} elseif ($groppe_header_design_actual === 'style_two') {
  $header_wrapper_class = ' grop-header_style2';
} else {
  $header_wrapper_class = '';
}

if ($groppe_meta) {
  $groppe_transparent_header = $groppe_meta['transparency_header'];
  $groppe_banner_type = $groppe_meta['banner_type'];
  if($groppe_banner_type != 'hide-title-area') {
    $groppe_transparent_header = $groppe_transparent_header ? ' header-area-trprnt' : '';
  } else {
    $groppe_transparent_header = '';
  }
} else { $groppe_transparent_header = ''; }

wp_head();
?>
</head>
<body <?php body_class(); ?>>
<div id="grop_page"> <!-- #vtheme-wrapper -->
<?php
if (!$groppe_hide_header) { ?>
  <header class="grop-header_area <?php echo esc_attr( $header_wrapper_class. $groppe_transparent_header ); ?>">
    <!--  header top bar start  \-->
    <?php
      if ($groppe_header_design_actual == 'style_three') {
        get_template_part( 'layouts/header/header', 'three' );
      } elseif ($groppe_header_design_actual == 'style_two') {
        get_template_part( 'layouts/header/header', 'two' );
      } else {
        get_template_part( 'layouts/header/header', 'one' );
      }
    ?>
  </header>
<?php }
if ( function_exists( 'groppe_popup_form' ) ) {
echo groppe_popup_form();
}
// XXX Header area end XXX
// Title Area
$groppe_need_title_bar = cs_get_option('need_title_bar');
if (isset($groppe_need_title_bar)) {
  get_template_part( 'layouts/header/title', 'bar' );
}
