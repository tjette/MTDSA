<?php
// Metabox
global $post;
$groppe_id    = ( isset( $post ) ) ? $post->ID : false;
$groppe_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $groppe_id;
$groppe_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $groppe_id;
$groppe_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $groppe_id : false;
$groppe_meta  = get_post_meta( $groppe_id, 'page_type_metabox', true );
if ($groppe_meta) {
  $groppe_topbar_options = $groppe_meta['topbar_options'];
} else {
  $groppe_topbar_options = '';
}
// Define Theme Options and Metabox varials in right way!
if ($groppe_meta) {
  if ($groppe_topbar_options === 'custom' && $groppe_topbar_options !== 'default') {
    $groppe_top_left           = $groppe_meta['top_left'];
    $groppe_top_right          = $groppe_meta['top_right'];
    $groppe_topbar_left_width  = $groppe_meta['topbar_left_width'];
    $groppe_topbar_right_width = $groppe_meta['topbar_right_width'];
    $groppe_left_width         = $groppe_topbar_left_width ? 'width:'. $groppe_topbar_left_width .';' : '';
    $groppe_right_width        = $groppe_topbar_right_width ? 'width:'. $groppe_topbar_right_width .';' : '';
    $groppe_hide_topbar        = $groppe_topbar_options;
    $groppe_topbar_bg          = $groppe_meta['topbar_bg'];
    if ($groppe_topbar_bg) {
      $groppe_topbar_bg = 'background-color: '. $groppe_topbar_bg .';';
    } else {$groppe_topbar_bg = '';}
  } else {
    $groppe_top_left           = cs_get_option('top_left');
    $groppe_top_right          = cs_get_option('top_right');
    $groppe_topbar_left_width  = cs_get_option('topbar_left_width');
    $groppe_topbar_right_width = cs_get_option('topbar_right_width');
    $groppe_left_width         = $groppe_topbar_left_width ? 'width:'. $groppe_topbar_left_width .';' : '';
    $groppe_right_width        = $groppe_topbar_right_width ? 'width:'. $groppe_topbar_right_width .';' : '';
    $groppe_hide_topbar        = cs_get_option('top_bar');
    $groppe_topbar_bg          = '';
  }
} else {
  // Theme Options fields
  $groppe_top_left           = cs_get_option('top_left');
  $groppe_top_right          = cs_get_option('top_right');
  $groppe_topbar_left_width  = cs_get_option('topbar_left_width');
  $groppe_topbar_right_width = cs_get_option('topbar_right_width');
  $groppe_left_width         = $groppe_topbar_left_width ? 'width:'. $groppe_topbar_left_width .';' : '';
  $groppe_right_width        = $groppe_topbar_right_width ? 'width:'. $groppe_topbar_right_width .';' : '';
  $groppe_hide_topbar        = cs_get_option('top_bar');
  $groppe_topbar_bg          = '';
}
// All options
if ($groppe_meta && $groppe_topbar_options === 'custom' && $groppe_topbar_options !== 'default') {
  $groppe_top_left = ( $groppe_top_left ) ? $groppe_meta['top_left'] : cs_get_option('top_left');
  $groppe_top_right = ( $groppe_top_right ) ? $groppe_meta['top_right'] : cs_get_option('top_right');
} else {
  $groppe_top_left = cs_get_option('top_left');
  $groppe_top_right = cs_get_option('top_right');
}
if ($groppe_meta && $groppe_topbar_options !== 'default') {
  if ($groppe_topbar_options === 'hide_topbar') {
    $groppe_hide_topbar = 'hide';
  } else {
    $groppe_hide_topbar = 'show';
  }
} else {
  $groppe_hide_topbar_check = cs_get_option('top_bar');
  if ($groppe_hide_topbar_check === true ) {
    $groppe_hide_topbar = 'hide';
  } else {
    $groppe_hide_topbar = 'show';
  }
}
if ($groppe_meta) {
  $groppe_topbar_bg = ( $groppe_topbar_bg ) ? $groppe_meta['topbar_bg'] : '';
} else {
  $groppe_topbar_bg = '';
}

if ($groppe_topbar_bg) {
  $groppe_topbar_bg = 'background-color: '. $groppe_topbar_bg .';';
} else {$groppe_topbar_bg = '';}

$groppe_topbar_left_width = ( $groppe_topbar_left_width ) ? $groppe_meta['topbar_left_width'] : cs_get_option('topbar_left_width');
$groppe_topbar_right_width = ( $groppe_topbar_right_width ) ? $groppe_meta['topbar_right_width'] : cs_get_option('topbar_right_width');
$groppe_left_width   = $groppe_topbar_left_width ? 'width:'. $groppe_topbar_left_width .';' : '';
$groppe_right_width  = $groppe_topbar_right_width ? 'width:'. $groppe_topbar_right_width .';' : '';

if($groppe_hide_topbar === 'show') {
  if ($groppe_top_left || $groppe_top_right) {
?>
<div class="grop-header_top" style="<?php echo esc_attr($groppe_topbar_bg); ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-8" style="<?php echo esc_attr($groppe_left_width); ?>">
        <?php echo do_shortcode($groppe_top_left); ?>
      </div> <!-- grop-topbar-left -->
      <div class="col-md-6 col-sm-4" style="<?php echo esc_attr($groppe_right_width); ?>">
        <?php echo do_shortcode($groppe_top_right); ?>
      </div> <!-- grop-topbar-right -->
    </div> <!-- Row -->
  </div> <!-- Container -->
</div>
<?php } } // Hide Topbar - From Metabox