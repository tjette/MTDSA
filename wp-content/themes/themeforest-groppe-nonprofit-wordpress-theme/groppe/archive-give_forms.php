<?php
/*
 * The template for displaying archive pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();

$causes_style = cs_get_option('donation_style');
$causes_limit = cs_get_option('donation_limit');
$short_content = cs_get_option('theme_causes_excerpt');
$causes_column = cs_get_option('donation_column');
$causes_order = cs_get_option('donation_order');
$causes_orderby = cs_get_option('donation_orderby');
$causes_pagination = cs_get_option('donation_pagination');
$causes_filter = cs_get_option('donation_filter');

if ($short_content) {
  $short_content = $short_content;
} else {
  $short_content = '15';
}

if ($causes_style == 'causes-grid') {
  $causes_column = $causes_column ? $causes_column : 'column-three';
  $wrapper_class = ' grop-causes_grid_area ';
} else {
  $wrapper_class = ' grop-cause_list_warp ';
  $causes_column = '';
} ?>
<div class="grop-fix  container grop-page-with_sidbr_warp">
	<div class="<?php echo esc_attr($wrapper_class.' '.$causes_column); ?>">
    <?php if ($causes_style == 'causes-grid') {
      echo '<div class="grop-filter_content_warp">';
    }
    if ($causes_style == 'causes-grid') {
	    if ($causes_filter) { ?>
  	    <div id="grop_filters" class="text-center grop-causfilter_nav">
  	      <ul class="text-uppercase  list-inline">
  	  			<li class="grop-filte_btn is-active" data-filter="*"><?php echo esc_html__('Show All', 'groppe' ); ?></li>
  	        <?php
  	          $terms = get_terms('give_forms_category');
  	          $count = count($terms);
  	          $i=0;
  	          $term_list = '';
  	          if ($count > 0) {
  	            foreach ($terms as $term) {
  	              $i++;
  	              $term_list .= '<li class="grop-filte_btn" data-filter=".cat-'. $term->slug .'">' . $term->name . '</li>';
  	              if ($count != $i) {
  	                $term_list .= '';
  	              } else {
  	                $term_list .= '';
  	              }
  	            }
  	            echo $term_list;
  	          }
  	        ?>
  	      </ul>
  			</div>
	    <?php
	    }
	  }
    if ($causes_style == 'causes-grid') {
      echo '<div class="grop-filter_content grop-causfilter_content">';
    }
    // Pagination
    global $paged;
    if( get_query_var( 'paged' ) )
      $my_page = get_query_var( 'paged' );
    else {
      if( get_query_var( 'page' ) )
        $my_page = get_query_var( 'page' );
      else
        $my_page = 1;
      set_query_var( 'paged', $my_page );
      $paged = $my_page;
    }

    $args = array(
      // other query params here,
      'paged' => $paged,
      'post_type' => 'give_forms',
      'posts_per_page' => (int)$causes_limit,
      'give_forms_category' => '',
      'orderby' => $causes_orderby,
      'order' => $causes_order
    );
    $groppe_cas = new WP_Query( $args ); ?>

      <?php
      if ($groppe_cas->have_posts()) : while ($groppe_cas->have_posts()) : $groppe_cas->the_post();

        // Category
        global $post;
        $terms = wp_get_post_terms($post->ID,'give_forms_category');
        foreach ($terms as $term) {
          $cat_class = 'cat-' . $term->slug;
        }
        $count = count($terms);
        $i=0;
        $cat_class = '';
        if ($count > 0) {
          foreach ($terms as $term) {
            $i++;
            $cat_class .= 'cat-'. $term->slug .' ';
            if ($count != $i) {
              $cat_class .= '';
            } else {
              $cat_class .= '';
            }
          }
        }

        // Featured Image
        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $large_image = $large_image[0];
        if ($large_image) {
          if(class_exists('Aq_Resize')) {
            $causes_grid_image = aq_resize( $large_image, '360', '244', true );
            $causes_list_image = aq_resize( $large_image, '320', '215', true );
          } else {
            $causes_grid_image = $large_image;
            $causes_list_image = $large_image;
          }
        }
        $causes_grid_image = $causes_grid_image ? $causes_grid_image : GROPPE_PLUGIN_ASTS . '/images/1000x800.jpg';
        $causes_list_image = $causes_list_image ? $causes_list_image : GROPPE_PLUGIN_ASTS . '/images/1000x800.jpg';
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
        $customer_id = give_get_payment_donor_id( get_the_ID() );
        $income = give_human_format_large_amount( give_format_amount( $income ) );
        $goal = give_human_format_large_amount( give_format_amount( $goal ) );
        $payment_mode = give_get_chosen_gateway( get_the_ID() );
        $form_action = add_query_arg( apply_filters( 'give_form_action_args', array( 'payment-mode' => $payment_mode, ) ),  give_get_current_page_url() );
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
        if ($causes_style === 'causes-grid') { ?>
          <div class="grop-filter_single_col grop-cause-item <?php echo esc_attr($cat_class); ?>">
            <div class="text-center  grop-cause_fltr_itm_warp">
              <!--causes Media box start \-->
              <div class="grop-cause_media_box">
                <a class="grop-cause_media_img" href=""><img src="<?php echo esc_url($causes_grid_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /></a>
                <!--  cause donate btn start  \-->
                <div class="grop-cause_donate_btn_warp">
                  <a class="grop-btn grop-btn_overly grop-cause_donate_btn" href="<?php echo esc_url( get_the_permalink() ); ?>"><span><?php echo esc_attr($display_label); ?></span></a><!--/end-->
                </div>
              </div><!--/end-->

              <div class="grop-cause_txts_content_warp">
                  <!--progress start \-->
                  <div class="grop-progress-circular">
                      <input type="text" class="grop-knob" value="0" data-rel="<?php echo esc_attr( $progress ); ?>" data-linecap="square" data-width="62" data-bgcolor="#E4E4E4" data-fgcolor="#F0C84C" data-thickness=".15" data-readonly="true"  data-height="62">
                  </div><!--/end-->
                <!--causes Text content start \-->
                <div class="grop-cause_txts_content">
                  <h4 class="grop-cause_title"><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a></h4>
                  <p class="grop-donation_stats">
                    <?php esc_html_e('Raised: ', 'groppe'); ?><span class="grop-rasd_amount"><?php apply_filters( 'give_goal_amount_raised_output', give_currency_filter( $income ) ); ?></span> / <?php esc_html_e('Goal: ', 'groppe'); apply_filters( 'give_goal_amount_target_output', give_currency_filter( $goal ) ); ?>
                  </p>
                  <?php
                    echo "<p>";
                    if (groppe_framework_active()) {
                      groppe_excerpt($short_content);
                    } else {
                      the_excerpt();
                    }
                    echo "<p>";
                     ?>
                </div><!--/end-->

                <!--causes footer start \-->
                <div class="grop-cause_time">
                  <i class="fa fa-clock-o"></i><?php echo esc_attr($days_remaining).' '.esc_html__('Days Left', 'groppe'); ?>
                </div><!--/end-->
              </div>
            </div>
          </div>
        <?php
        } else { ?>
        <div class="text-left  grop-cause_list_single">
          <div class="grop-float_left  grop-cause_list_box">
            <!--causes Media box start \-->
            <div class="grop-cause_media_box">
              <a class="grop-cause_media_img" href="<?php echo esc_url( get_the_permalink() ); ?>"><img src="<?php echo esc_url($causes_list_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /></a>
              <!--  cause donate btn start  \-->
            </div><!--/end-->
            <!--progress start \-->
            <div class="grop-progress-circular">
                <input type="text" class="grop-knob" value="0" data-rel="<?php echo esc_attr( $progress ); ?>" data-linecap="square" data-width="62" data-bgcolor="#E4E4E4" data-fgcolor="#F0C84C" data-thickness=".15" data-readonly="true"  data-height="62">
            </div><!--/end-->
          </div>
          <div class="grop-fix grop-cause_txts_content_warp">
            <!--causes Text content start \-->
            <div class="grop-cause_txts_content">
              <h4 class="grop-cause_title"><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a></h4>
              <p class="grop-donation_stats">
                <?php esc_html_e('Raised:', 'groppe'); echo '<span class="grop-rasd_amount">'.apply_filters( 'give_goal_amount_raised_output', give_currency_filter( $income ) ).'</span>'; ?> / <?php esc_html_e('Goal:', 'groppe'); apply_filters( 'give_goal_amount_target_output', give_currency_filter( $goal )); ?>
              </p>
              <p>
                <?php
                    if (groppe_framework_active()) {
                      groppe_excerpt($short_content);
                    } else {
                      the_excerpt();
                    }
                  ?>
              </p>
            </div><!--/end-->
            <!--causes list btn start \-->
            <a class="grop-btn grop-btn_overly grop-causelist_donate_btn" href="<?php echo esc_url( get_the_permalink() ); ?>">
              <span><?php echo esc_attr($display_label); ?></span>
            </a><!--/end-->
          </div>
        </div><!--/causes list single  end-->
      <?php
        }
      endwhile;
      endif;

    if ($causes_style == 'causes-grid') {
      echo '</div></div><div class="grop-filter_content_warp"></div>';
    } ?>
  </div>
  <?php
    if ($causes_pagination) {
      groppe_custom_paging_nav($groppe_cas->max_num_pages,"",$paged);
    }
    wp_reset_postdata();
  ?>
</div>

<?php
get_footer();