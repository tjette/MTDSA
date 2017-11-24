<?php
/*
 * All Front-End Helper Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Exclude category from blog */
if( ! function_exists( 'groppe_vt_excludeCat' ) ) {
  function groppe_vt_excludeCat($query) {
  	if ( $query->is_home ) {
  		$exclude_cat_ids = cs_get_option('theme_exclude_categories');
  		if($exclude_cat_ids) {
  			foreach( $exclude_cat_ids as $exclude_cat_id ) {
  				$exclude_from_blog[] = '-'. $exclude_cat_id;
  			}
  			$query->set('cat', implode(',', $exclude_from_blog));
  		}
  	}
  	return $query;
  }
  add_filter('pre_get_posts', 'groppe_vt_excludeCat');
}

/* Excerpt Length */
class GroppeExcerpt {

  // Default length (by WordPress)
  public static $length = 55;

  // Output: groppe_excerpt('short');
  public static $types = array(
    'short' => 25,
    'regular' => 55,
    'long' => 100
  );

  /**
   * Sets the length for the excerpt,
   * then it adds the WP filter
   * And automatically calls the_excerpt();
   *
   * @param string $new_length
   * @return void
   * @author Baylor Rae'
   */
  public static function length($new_length = 55) {
    GroppeExcerpt::$length = $new_length;
    add_filter('excerpt_length', 'GroppeExcerpt::new_length');
    GroppeExcerpt::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(GroppeExcerpt::$types[GroppeExcerpt::$length]) )
      return GroppeExcerpt::$types[GroppeExcerpt::$length];
    else
      return GroppeExcerpt::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_excerpt();
  }

}

// Custom Excerpt Length
if( ! function_exists( 'groppe_excerpt' ) ) {
  function groppe_excerpt($length = 55) {
    GroppeExcerpt::length($length);
  }
}

if ( ! function_exists( 'groppe_new_excerpt_more' ) ) {
  function groppe_new_excerpt_more( $more ) {
    global $post;
    if ( $post->post_type == 'team' ) {
     return '';
    } else {
      return ' ...';
    }
  }
  add_filter('excerpt_more', 'groppe_new_excerpt_more');
}

/* Tag Cloud Widget - Remove Inline Font Size */
if( ! function_exists( 'groppe_vt_tag_cloud' ) ) {
  function groppe_vt_tag_cloud($tag_string){
    return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
  }
  add_filter('wp_generate_tag_cloud', 'groppe_vt_tag_cloud', 10, 3);
}

/* Password Form */
if( ! function_exists( 'groppe_vt_password_form' ) ) {
  function groppe_vt_password_form( $output ) {
    $output = str_replace( 'type="submit"', 'type="submit" class=""', $output );
    return $output;
  }
  add_filter('the_password_form' , 'groppe_vt_password_form');
}

/* Maintenance Mode */
if( ! function_exists( 'groppe_vt_maintenance_mode' ) ) {
  function groppe_vt_maintenance_mode(){

    $maintenance_mode_page = cs_get_option( 'maintenance_mode_page' );
    $enable_maintenance_mode = cs_get_option( 'enable_maintenance_mode' );

    if ( isset($enable_maintenance_mode) && ! empty( $maintenance_mode_page ) && ! is_user_logged_in() ) {
      get_template_part('layouts/post/content', 'maintenance');
      exit;
    }

  }
  add_action( 'wp', 'groppe_vt_maintenance_mode', 1 );
}

/* Widget Layouts */
if ( ! function_exists( 'groppe_vt_footer_widgets' ) ) {
  function groppe_vt_footer_widgets() {

    $output = '';
    $footer_widget_layout = cs_get_option('footer_widget_layout');

    if( $footer_widget_layout ) {

      switch ( $footer_widget_layout ) {
        case 1: $widget = array('piece' => 1, 'class' => 'col-md-12'); break;
        case 2: $widget = array('piece' => 2, 'class' => 'col-md-6'); break;
        case 3: $widget = array('piece' => 3, 'class' => 'col-md-4'); break;
        case 4: $widget = array('piece' => 4, 'class' => 'col-md-3 col-sm-6'); break;
        case 5: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 6: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 2); break;
        case 7: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 3); break;
        case 8: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 9: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 4); break;
        default : $widget = array('piece' => 4, 'class' => 'col-md-3'); break;
      }

      for( $i = 1; $i < $widget["piece"]+1; $i++ ) {

        $widget_class = ( isset( $widget["queue"] ) && $widget["queue"] == $i ) ? $widget["layout"] : $widget["class"];

        $output .= '<div class="'. $widget_class .'">';
        ob_start();
        if (is_active_sidebar('footer-'. $i)) {
          dynamic_sidebar( 'footer-'. $i );
        }
        $output .= ob_get_clean();
        $output .= '</div>';

      }
    }

    return $output;

  }
}

if( ! function_exists( 'groppe_vt_top_bar' ) ) {
  function groppe_vt_top_bar() {

    $out     = '';

    if ( ( cs_get_option( 'top_left' ) || cs_get_option( 'top_right' ) ) ) {
      $out .= '<div class="grop-topbar"><div class="container"><div class="row">';
      $out .= groppe_vt_top_bar_modules( 'left' );
      $out .= groppe_vt_top_bar_modules( 'right' );
      $out .= '</div></div></div>';
    }

    return $out;
  }
}

/* WP Link Pages */
if ( ! function_exists( 'groppe_wp_link_pages' ) ) {
  function groppe_wp_link_pages() {
    $defaults = array(
      'before'           => '<div class="wp-link-pages">' . esc_html__( 'Pages:', 'groppe' ),
      'after'            => '</div>',
      'link_before'      => '<span>',
      'link_after'       => '</span>',
      'next_or_number'   => 'number',
      'separator'        => ' ',
      'pagelink'         => '%',
      'echo'             => 1
    );
    wp_link_pages( $defaults );
  }
}

/* Metas */
if ( ! function_exists( 'groppe_post_metas' ) ) {
  function groppe_post_metas() {
  $metas_hide = (array) cs_get_option( 'theme_metas_hide' );
  ?>
  <p class="grop-post_meta">
    <?php
    if ( !in_array( 'date', $metas_hide ) ) { // Date Hide
    ?>
    <span class="grop-post_date"><i class="fa fa-clock-o"></i><?php echo get_the_date('d M Y'); ?></span>
    <?php } // Date Hides
    if ( !in_array( 'category', $metas_hide ) ) { // Category Hide
      if ( get_post_type() === 'post') {
        $category_list = get_the_category_list( ', ' );
        if ( $category_list ) {
          echo '<span class="grop-post_in"><i class="fa fa-folder-o"></i>In '. $category_list .' </span>';
        }
      }
    } // Category Hides
    if ( !in_array( 'author', $metas_hide ) ) { // Author Hide
    ?>
    <span class="grop-post_by">
      <?php
      printf(
        '<i class="fa fa-pencil"></i>'. esc_html__('By','groppe') .'<span> <a href="%1$s" rel="author">%2$s</a></span>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        get_the_author()
      );
      ?>
    </span>
    <?php } ?>
  </p>
  <?php
  }
}

/* Added Featured Image in Upcoming Events Widget */
function groppe_widget_featured_image() {
  global $post;
  echo tribe_event_featured_image( $post->ID, 'thumbnail' );
}
add_action( 'tribe_events_list_widget_before_the_event_title', 'groppe_widget_featured_image' );

/* Author Info */
if ( ! function_exists( 'groppe_author_info' ) ) {
  function groppe_author_info() {

    if (get_the_author_meta( 'url' )) {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_the_author_meta( 'url' );
      $target = 'target="_blank"';
    } else {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $target = '';
    }
    $facebook = get_the_author_meta( 'facebook' );
    $twitter = get_the_author_meta( 'twitter' );
    $google_plus = get_the_author_meta( 'google_plus' );
    $linkedin = get_the_author_meta( 'linkedin' );
    $pinterest = get_the_author_meta( 'pinterest' );

    // variables
    $author_content = get_the_author_meta( 'description' );
if ($author_content) {
?>
  <div class="grop-fix grop-author-info">
    <div class="grop-float_left author-avatar">
      <a href="<?php echo esc_url($website_url); ?>" <?php echo esc_attr($target); ?>>
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 98 ); ?>
      </a>
    </div>
    <div class="grop-fix  author-content">
      <a href="<?php echo esc_url($author_url); ?>" class="author-name"><?php echo esc_attr(get_the_author_meta('first_name')).' '.esc_attr(get_the_author_meta('last_name')); ?></a>
      <p><?php echo esc_attr(get_the_author_meta( 'description' )); ?></p>
      <?php
        if( !empty( $facebook || $twitter || $google_plus || $linkedin ) ){
          echo '<ul class="list-inline  grop-author-social">';
            if($facebook){
              echo '<li><a href="'.esc_url($facebook).'"><i class="fa fa-facebook"></i></a></li>';
            }
            if($twitter){
              echo '<li><a href="'.esc_url($twitter).'"><i class="fa fa-twitter"></i></a></li>';
            }
            if($google_plus){
              echo '<li><a href="'.esc_url($google_plus).'"><i class="fa fa-google-plus"></i></a></li>';
            }
            if($linkedin){
              echo '<li><a href="'.esc_url($linkedin).'"><i class="fa fa-linkedin"></i></a></li>';
            }
            if($pinterest){
              echo '<li><a href="'.esc_url($pinterest).'"><i class="fa fa-pinterest-p"></i></a></li>';
            }
          echo '</ul>';
        }
      ?>
    </div>
  </div>
<?php
} // if $author_content
  }
}

/* ==============================================
   Custom Comment Area Modification
=============================================== */
if ( ! function_exists( 'groppe_comment_modification' ) ) {
  function groppe_comment_modification($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
    $comment_class = empty( $args['has_children'] ) ? '' : 'parent';
  ?>

  <<?php echo esc_attr($tag); ?> <?php comment_class('item ' . $comment_class .' ' ); ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>">
    <?php endif; ?>
    <div class="comment-theme">
        <div class="comment-image">
          <?php if ( $args['avatar_size'] != 0 ) {
            echo get_avatar( $comment, 80 );
          } ?>
        </div>
    </div>
    <div class="comment-main-area">
      <div class="comment-wrapper">
        <div class="grop-comments-meta">
          <h4><?php printf( '%s', get_comment_author() ); ?></h4>
          <span class="says"><?php esc_html_e('Says', 'groppe' ); ?></span>
          <span class="comments-date">
            <?php echo get_comment_date('F d, Y'); esc_html_e(' at ', 'groppe' ); ?>
            <?php echo get_comment_time(); ?>
          </span>
        </div>
        <div class="comment-content">
          <?php comment_text(); ?>
        </div>
        <div class="comments-reply">
          <?php
            comment_reply_link( array_merge( $args, array(
            'reply_text' => '<span class="comment-reply-link">'. esc_html__('Reply','groppe') .'</span>',
            'before' => '',
            'class'  => '',
            'depth' => $depth,
            'max_depth' => $args['max_depth']
            ) ) );
          ?>
          </div>
        <?php if ( $comment->comment_approved == '0' ) : ?><em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'groppe' ); ?></em><?php endif; ?>
      </div>
    </div>
  <?php if ( 'div' != $args['style'] ) : ?>
  </div>
  <?php endif;
  }
}

/* Title Area */
if ( ! function_exists( 'groppe_title_area' ) ) {
  function groppe_title_area() {

    global $post, $wp_query;

    // Get post meta in all type of WP pages
    $groppe_id    = ( isset( $post ) ) ? $post->ID : 0;
    $groppe_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $groppe_id;
    $groppe_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $groppe_id;
    $groppe_meta  = get_post_meta( $groppe_id, 'page_type_metabox', true );
    if ($groppe_meta && (!is_archive() || is_woocommerce_shop())) {
      $custom_title = $groppe_meta['page_custom_title'];
      if ($custom_title) {
        $custom_title = $custom_title;
      } elseif(post_type_archive_title()) {
        post_type_archive_title();
      } else {
        $custom_title = '';
      }
    } else { $custom_title = ''; }

    if ( is_home() ) {
      bloginfo('name');
    } elseif ( is_search() ) {
      printf( esc_html__( 'Search Results for %s', 'groppe' ), '<span>' . get_search_query() . '</span>' );
    } elseif ( is_category() || is_tax() ){
      single_cat_title();
    } elseif ( is_tag() ){
      single_tag_title(esc_html__('Posts Tagged: ', 'groppe'));
    } elseif ( is_archive() ){
      if ( is_day() ) {
        printf( esc_html__( 'Archive for %s', 'groppe' ), get_the_date());
      } elseif ( is_month() ) {
        printf( esc_html__( 'Archive for %s', 'groppe' ), get_the_date( 'F, Y' ));
      } elseif ( is_year() ) {
        printf( esc_html__( 'Archive for %s', 'groppe' ), get_the_date( 'Y' ));
      } elseif ( is_author() ) {
        printf( esc_html__( 'Posts by: %s', 'groppe' ), get_the_author_meta( 'display_name', $wp_query->post->post_author ));
      } elseif( is_woocommerce_shop() ) {
        echo esc_attr($custom_title);
      } elseif ( is_post_type_archive() ) {
        post_type_archive_title();
      } else {
        esc_html_e( 'Archives', 'groppe' );
      }
    } elseif( is_404() ) {
      esc_html_e('404 Error', 'groppe');
    } elseif( $custom_title ) {
      echo esc_attr($custom_title);
    } elseif( is_singular('tribe_events') ) {
      echo get_the_title($wp_query->post->ID);
    } else {
      the_title();
    }

  }
}

/**
 * Pagination Function
 */
if ( ! function_exists( 'groppe_paging_nav' ) ) {
  function groppe_paging_nav() { ?>
    <div class="text-center grop-posts-pagination-warp">
      <nav class="navigation pagination">
        <?php
        $older_post = cs_get_option('older_post');
        $newer_post = cs_get_option('newer_post');
        $older_post = $older_post ? $older_post : esc_html__( 'Prev', 'groppe' );
        $newer_post = $newer_post ? $newer_post : esc_html__( 'Next', 'groppe' );
        global $wp_query;
        $big = 999999999;
        if($wp_query->max_num_pages == '1' ) {} else {echo '';}
        echo paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'prev_text' => $older_post,
          'next_text' => $newer_post,
          'current' => max( 1, get_query_var('paged') ),
          'total' => $wp_query->max_num_pages,
        ));
        if($wp_query->max_num_pages == '1' ) {} else {echo '';}
        ?>
      </nav>
    </div>
  <?php
  }
}
if ( ! function_exists( 'groppe_custom_paging_nav' ) ) {
  function groppe_custom_paging_nav($numpages = '', $pagerange = '', $paged='') {
    if (empty($pagerange)) {
      $pagerange = 2;
    }
    if (empty($paged)) {
      $paged = 1;
    } else {
      $paged = $paged;
    }
    if ($numpages == '') {
      global $wp_query;
      $numpages = $wp_query->max_num_pages;
      if(!$numpages) {
        $numpages = 1;
      }
    }
    $big = 999999999; ?>
  <div class="text-center grop-posts-pagination-warp">
    <nav class="navigation pagination">
      <div class="nav-links">
      <?php echo paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?page=%#%',
        'prev_text' => __('<i class="fa fa-angle-left"></i> Prev</a>', 'groppe'),
        'next_text' => __('Next <i class="fa fa-angle-right"></i>', 'groppe'),
        'current' => $paged,
        'total' => $numpages,
        'type' => 'plain'
      )); ?>
      </div>
    </nav>
  </div>
<?php
  }
}
function groppe_single_post_pagination(){
    $older_post = cs_get_option('older_post');
    $newer_post = cs_get_option('newer_post');
    $older_post = $older_post ? $older_post : esc_html__( 'Prev Post', 'groppe' );
    $newer_post = $newer_post ? $newer_post : esc_html__( 'Next Post', 'groppe' );

    $next_post = get_next_post(false);
    $prev_post = get_previous_post(false);
    if (!$next_post) {
      $class_next = 'disabled_next';
    }else{
      $class_next = '';
    }
    if( !$prev_post ){
      $class_prev = 'disabled_prev';
      $no_prev = 'no-prev';
    }else{
      $class_prev = '';
      $no_prev = '';
    }
  ?>
    <div class="row  grop-sigl_pager <?php echo esc_attr( $no_prev ); ?>">
    <?php if( $prev_post ){ ?>
      <div class="text-left  col-xs-6  grop-pager_prev <?php echo esc_attr($class_prev); ?>"><a class="grop-btn grop-btn_overly" href="<?php echo esc_url(get_the_permalink( $prev_post->ID)); ?>"><span><i class="fa fa-angle-left" aria-hidden="true"></i> <?php echo esc_attr($older_post); ?></span></a></div>
      <?php } if ($next_post) {?>
      <div class="text-right col-xs-6  grop-pager_next <?php echo esc_attr($class_next); ?>"><a class="grop-btn grop-btn_overly" href="<?php echo esc_url(get_the_permalink( $next_post->ID)); ?>"><span><?php echo esc_attr($newer_post); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></span></a></div>
      <?php } ?>
    </div>
  <?php
}

function groppe_project_related_post() {
 // get the custom post type's taxonomy terms
 global $post;
 $related_project_title = cs_get_option('related_project_title');
 $related_project_limit = cs_get_option('related_project_limit');
 $related_project_order = cs_get_option('related_project_order');
 $related_project_orderby = cs_get_option('related_project_orderby');
$custom_taxterms = wp_get_object_terms( $post->ID, 'project_category', array('fields' => 'ids') );

$title = $related_project_title ? $related_project_title : esc_html__('Related Projects', 'groppe');
// arguments
$args = array(
'post_type' => 'project',
'post_status' => 'publish',
'posts_per_page' => (int)$related_project_limit,
'orderby' => $related_project_orderby,
'order' => $related_project_order,
'tax_query' => array(
  array(
    'taxonomy' => 'project_category',
    'field' => 'id',
    'terms' => $custom_taxterms
  )
),
'post__not_in' => array ($post->ID),
);
$related_items = new WP_Query( $args );
// loop over query
if ($related_items->have_posts()) :
echo '<div class="grop-related_project">';
echo '<h3 class="grop-rtdpjct-title">'.esc_attr($title).'</h3><div class="row">';
while ( $related_items->have_posts() ) : $related_items->the_post();
// View Details Button
if (groppe_framework_active()) {
  $view_more_text = cs_get_option('project_read_more_txt');
  if ($view_more_text) {
    $btn_text = $view_more_text;
  } else {
    $btn_text = esc_html__('View Project', 'groppe');
  }
} else {
  $btn_text = $btn_text ? $btn_text : esc_html__('View Project', 'groppe');
}

// Featured Image
$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$large_image = $large_image[0];
if(class_exists('Aq_Resize')) {
  $project_img = aq_resize( $large_image, '360', '234', true );
} else {$project_img = $large_image;}
$featured_img = ( $project_img ) ? $project_img : GROPPE_PLUGIN_ASTS . '/images/420x280.jpg';
?>
  <div class="col-md-4 col-sm-6">
    <div class="grop-projct_itm_warp">
      <div class="grop-projct_media_box">
        <a class="grop-cause_media_img" href="">
          <img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
        </a>
      </div>
      <div class="grop-projct_content_warp">
        <h4>
          <a href="<?php esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a>
        </h4>
        <p><?php groppe_excerpt('20'); ?></p>
        <a class="grop-btn grop-btn_overly grop-vpjct_btn" href="<?php esc_url(the_permalink()); ?>">
          <span><?php echo esc_attr($btn_text); ?></span>
        </a>
      </div>
    </div>
  </div>
<?php
endwhile;
echo '</div></div>';
endif;
// Reset Post Data
wp_reset_postdata();
}
function groppe_donation_related_post( $number = 3 ) {
  global $post;
  $related_causes_title = cs_get_option('related_causes_title');
  $related_causes_limit = cs_get_option('related_causes_limit');
  $related_causes_order = cs_get_option('related_causes_order');
  $related_causes_orderby = cs_get_option('related_causes_orderby');
  $custom_taxterms = wp_get_object_terms( $post->ID, 'give_forms_category', array('fields' => 'ids') );

  $title = $related_causes_title ? $related_causes_title : esc_html__('Related Causes', 'groppe');
  // remaining date
  $dead_line = get_post_meta( get_the_ID(), '_donation_form_metabox', true );
  $donation_deadline = $dead_line['donation_deadline'];
  $deadline = str_replace('/', '-', $donation_deadline);
  $deadline = date('F d, Y', strtotime($deadline));

  $date = strtotime($deadline);
  $remaining = $date - time();

  $days_remaining = floor($remaining / 86400);
  $hours_remaining = floor(($remaining % 86400) / 3600);
  $display_label_field = get_post_meta( get_the_ID(), '_give_checkout_label', true );
  $display_label       = ( ! empty( $display_label_field ) ? $display_label_field : esc_html__( 'Donate Now', 'groppe' ) );
  // arguments
  $args = array(
  'post_type' => 'give_forms',
  'post_status' => 'publish',
  'posts_per_page' => (int)$related_causes_limit,
  'orderby' => $related_causes_orderby,
  'order' => $related_causes_order,
  'tax_query' => array(
    array(
      'taxonomy' => 'give_forms_category',
      'field' => 'id',
      'terms' => $custom_taxterms
    )
  ),
  'post__not_in' => array ($post->ID),
  );
  $related_items = new WP_Query( $args );
  // loop over query
  if ($related_items->have_posts()) :
  echo '<div class="grop-related_caus"><h3 class="grop-rtdcaus-title">'.esc_attr($title).'</h3>';
  echo '<div class="row">';
  while ( $related_items->have_posts() ) : $related_items->the_post();
  $form        = new Give_Donate_Form( get_the_ID() );
  $goal_option = get_post_meta( get_the_ID(), '_give_goal_option', true );
  $goal        = $form->goal;
  $goal_format = get_post_meta( get_the_ID(), '_give_goal_format', true );
  $income      = $form->get_earnings();
  $color       = get_post_meta( get_the_ID(), '_give_goal_color', true );
  //Sanity check - ensure form has goal set to output
  if ( empty( $form->ID ) || ( is_singular( 'give_forms' ) && ! give_is_setting_enabled( $goal_option ) ) || ! give_is_setting_enabled( $goal_option ) || $goal == 0 ) {
    return false;
  }
  $progress = round( ( $income / $goal ) * 100, 2 );
  if ( $income >= $goal ) {
    $progress = 100;
  }

  $income = give_human_format_large_amount( give_format_amount( $income ) );
  $goal = give_human_format_large_amount( give_format_amount( $goal ) );
  $payment_mode = give_get_chosen_gateway( get_the_ID() );
  $form_action = add_query_arg( apply_filters( 'give_form_action_args', array( 'payment-mode' => $payment_mode, ) ),  give_get_current_page_url() );
  // Featured Image
$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$large_image = $large_image[0];
if ($large_image) {
  if(class_exists('Aq_Resize')) {
    $causes_grid_image = aq_resize( $large_image, '360', '244', true );
  } else {
    $causes_grid_image = $large_image;
  }
}
$causes_grid_image = $causes_grid_image ? $causes_grid_image : GROPPE_PLUGIN_ASTS . '/images/1000x800.jpg';

$display_label_field = get_post_meta( get_the_ID(), '_give_checkout_label', true );
$display_label       = ( ! empty( $display_label_field ) ? $display_label_field : esc_html__( 'Donate Now', 'groppe' ) ); ?>
  <div class="col-md-4  col-sm-6">
    <div class="text-center grop-cause_sgle_itm_warp">
      <div class="grop-cause_media_box">
        <a class="grop-cause_media_img" href=""><img src="<?php echo esc_url($causes_grid_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /></a>
        <div class="grop-cause_donate_btn_warp">
          <a class="grop-btn grop-btn_overly grop-cause_donate_btn" href="<?php echo esc_url( get_the_permalink() ); ?>"><span><?php echo esc_attr($display_label); ?></span></a><!--/end-->
        </div>
      </div><!--/end-->

      <div class="grop-cause_txts_content_warp">
        <div class="grop-progress-circular">
            <input type="text" class="grop-knob" value="0" data-rel="<?php echo esc_attr( $progress ); ?>" data-linecap="square" data-width="62" data-bgcolor="#E4E4E4" data-fgcolor="#F0C84C" data-thickness=".15" data-readonly="true"  data-height="62">
        </div><!--/end-->
        <div class="grop-cause_txts_content">
          <h4 class="grop-cause_title"><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a></h4>
          <p class="grop-donation_stats">
            <?php esc_html_e('Raised: ', 'groppe') . '<span class="grop-rasd_amount">'.apply_filters( 'give_goal_amount_raised_output', give_currency_filter( $income ) ).'</span>'; ?> / <?php esc_html_e('Goal: ', 'groppe'); apply_filters( 'give_goal_amount_target_output', give_currency_filter( $goal ) ); ?>
          </p>
        </div>
        <div class="grop-cause_time">
          <i class="fa fa-clock-o"></i><?php echo esc_attr($days_remaining).' '.esc_html__('Days Left', 'groppe'); ?>
        </div>
      </div>
    </div>
  </div>
  <?php
  endwhile;
  echo '</div></div>';
  endif;
  // Reset Post Data
  wp_reset_postdata();
  // end custom related loop
}

// Custom Post Type limit
function groppe_custom_posts_per_page( $query ) {
  if ( post_type_exists( 'team' ) ) {
    if ( is_post_type_archive() ) {
      $team_limit = cs_get_option('team_limit');
      if ( $query->query_vars['post_type'] == 'team' ) $query->query_vars['posts_per_page'] = $team_limit;
    }
  }
  if ( post_type_exists( 'project' ) ) {
    if ( is_post_type_archive() ) {
      $project_limit = cs_get_option('project_limit');
      if ( $query->query_vars['post_type'] == 'project' ) $query->query_vars['posts_per_page'] = $project_limit;
    }
  }
  if ( post_type_exists( 'gallery' ) ) {
    if ( is_post_type_archive() ) {
      $gallery_limit = cs_get_option('gallery_limit');
      if ( $query->query_vars['post_type'] == 'gallery' ) $query->query_vars['posts_per_page'] = $gallery_limit;
    }
  }
  if ( post_type_exists( 'give_forms' ) ) {
    if (is_admin()) {
      if ( $query->query_vars['post_type'] == 'give_forms' ) $query->query_vars['posts_per_page'] = -1;
    } elseif ( is_post_type_archive() ) {
      $donation_limit = cs_get_option('donation_limit');
      if ( $query->query_vars['post_type'] == 'give_forms' ) $query->query_vars['posts_per_page'] = $donation_limit;
    }
  }
  return $query;
}
add_filter( 'pre_get_posts', 'groppe_custom_posts_per_page' );

// Woocommerce quantity increment
add_action( 'wp_enqueue_scripts', 'groppe_enqueue_polyfill' );
function groppe_enqueue_polyfill() {
  wp_enqueue_script( 'wcqi-number-polyfill' );
}
add_action( 'wp_enqueue_scripts', 'groppe_dequeue_quantity' );
function groppe_dequeue_quantity() {
  wp_dequeue_style( 'wcqi-css' );
}
