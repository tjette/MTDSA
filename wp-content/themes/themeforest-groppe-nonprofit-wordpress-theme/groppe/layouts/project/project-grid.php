<?php
/*
 * Admin Styles for Groppe Theme
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$groppe_project_column = cs_get_option('project_column');
$groppe_view_more = cs_get_option('project_read_more_txt');
$groppe_view_more = $groppe_view_more ? $groppe_view_more : esc_html__('View More', 'groppe');
$groppe_project_column = $groppe_project_column ? $groppe_project_column : 'bpw-col-3';

  // Category
  global $post;
  $groppe_terms = wp_get_post_terms($post->ID,'project_category');
  foreach ($groppe_terms as $term) {
    $groppe_cat_class = 'cat-' . $term->slug;
  }
  $groppe_count = count($groppe_terms);
  $i=0;
  $groppe_cat_class = '';
  if ($groppe_count > 0) {
    foreach ($groppe_terms as $term) {
      $i++;
      $groppe_cat_class .= 'cat-'. $term->slug .' ';
      if ($groppe_count != $i) {
        $groppe_cat_class .= '';
      } else {
        $groppe_cat_class .= '';
      }
    }
  }

  // Featured Image
  $groppe_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
  $groppe_large_image = $groppe_large_image[0];
  if ($groppe_project_column === 'bpw-col-2') {
    $groppe_project_img = $groppe_large_image;
    $groppe_featured_img = ( $groppe_project_img ) ? $groppe_project_img : EVLT_PLUGIN_ASTS . '/images/1000x800.jpg';
  } elseif ($groppe_project_column === 'bpw-col-4') {
    $groppe_project_img = aq_resize( $groppe_large_image, '280', '190', true );
    $groppe_featured_img = ( $groppe_project_img ) ? $groppe_project_img : EVLT_PLUGIN_ASTS . '/images/280x190.jpg';
  } elseif ($groppe_project_column === 'bpw-col-5') {
    $groppe_project_img = aq_resize( $groppe_large_image, '220', '150', true );
    $groppe_featured_img = ( $groppe_project_img ) ? $groppe_project_img : EVLT_PLUGIN_ASTS . '/images/220x150.jpg';
  } else {
    $groppe_project_img = aq_resize( $groppe_large_image, '420', '280', true );
    $groppe_featured_img = ( $groppe_project_img ) ? $groppe_project_img : EVLT_PLUGIN_ASTS . '/images/420x280.jpg';
  }
?>
<div class="grop-project-item <?php echo esc_attr($groppe_cat_class); ?>">
  <div class="bpw-featured-img">
    <img src="<?php echo esc_url($groppe_featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
  </div>
  <div class="bpw-content-overlay"></div>
  <div class="bpw-content">
    <div class="bpw-heading"><?php esc_html(the_title()); ?></div>
    <a href="<?php esc_url(the_permalink()); ?>" class="bpw-btn"><?php echo esc_attr($groppe_view_more); ?></a>
  </div>
</div>