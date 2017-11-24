<?php
  $short_content = cs_get_option('theme_event_excerpt');
?>
<div class="grop-events">
    <?php
    // Pagination
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args = array(
      // other query params here,
      'paged' => $paged,
      'post_type' => 'tribe_events',
    );

    $groppe_evnt = new WP_Query( $args ); ?>

      <?php
      if ($groppe_evnt->have_posts()) : while ($groppe_evnt->have_posts()) : $groppe_evnt->the_post();

        // Category
        global $post;
        $terms = wp_get_post_terms($post->ID,'tribe_events_cat');
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
            $event_list_image = aq_resize( $large_image, '320', '200', true );
          } else {
            $event_list_image = $large_image;
          }
        }
        $event_list_image = $event_list_image ? $event_list_image : GROPPE_PLUGIN_ASTS . '/images/1000x800.jpg';

        $event_popup_options = get_post_meta( get_the_ID(), '_event_popup_form_metabox', true );
        if ($event_popup_options) {
          if ($event_popup_options['popup_btn']){
            $event_contact_btn = $event_popup_options['popup_btn'];
            $event_popup_form_id = $event_popup_options['form_id'];
            $event_contact_btn_type = $event_popup_options['contact_btn_type'];
            $event_contact_btn_link = $event_popup_options['contact_btn_link'] ? $event_popup_options['contact_btn_link'] : cs_get_option('contact_btn_link');
          } else {
            $event_contact_btn = cs_get_option('popup_btn');
            $event_popup_form_id = cs_get_option('form_id');
            $event_contact_btn_type = cs_get_option('contact_btn_type');
            $event_contact_btn_link = cs_get_option('contact_btn_link');
          }
        } else {
          $event_contact_btn = cs_get_option('popup_btn');
          $event_popup_form_id = cs_get_option('form_id');
          $event_contact_btn_type = cs_get_option('contact_btn_type');
          $event_contact_btn_link = cs_get_option('contact_btn_link');
        }

      $post_meta = get_post_meta( get_the_ID() );
      $s_date = $post_meta['_EventStartDate'];
      $s_createDate = new DateTime($s_date[0]);
      $s_year = $s_createDate->format('Y');
      $s_month = $s_createDate->format('M');
      $s_day = $s_createDate->format('d');
      $s_full_date = $s_createDate->format('d M Y');
      $s_hour = $s_createDate->format('H:i a');
      // end date
      $e_date = $post_meta['_EventEndDate'];
      $e_createDate = new DateTime($e_date[0]);
      $e_year = $e_createDate->format('Y');
      $e_month = $e_createDate->format('M');
      $e_day = $e_createDate->format('d');
      $e_full_date = $e_createDate->format('d M Y');
      $e_hour = $e_createDate->format('H:i a');

      $venu_details = tribe_get_venue_details ( get_the_ID() ); ?>

        <div class="grop-fix  grop-evnt_list_item grop-evnt-list-global">
          <div class="grop-float_left  grop-ucoming_evnt_image">
            <img src="<?php echo esc_url($event_list_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
            <div class="text-center  grop-evnt_list_date">
              <span class="grop-evnt_d"><?php echo esc_attr($s_day); ?></span>
              <span class="grop-evnt_m-y">
                <?php echo esc_attr($s_month); ?> <br> <?php echo esc_attr( $s_year ); ?>
              </span>
            </div><!--/end-->
          </div>
          <div class="grop-fix  grop-ucoming_evnt_cont_warp">
            <div class="grop-ucoming_evnt_txt_cont">
              <!--Home upcoming events title start \-->
              <h4 class="grop-ucoming_evnt_title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html(the_title()); ?></a></h4>
              <div class="grop-ucoming_evnt_time">
                <i class="fa fa-clock-o"></i><?php echo esc_attr( $s_hour ); ?>
              </div>
              <?php if(!empty($venu_details['address']) || !empty($venu_details['linked_name'])){ ?>
              <p class="grop-ucoming_evnt_location">
                <i class="fa fa-map-marker"></i>
                <?php
                if(!empty($venu_details['linked_name'])){
                  echo esc_attr( $venu_details['linked_name'] );
                } else {
                  echo esc_attr( $venu_details['address'] );
                } ?>
              </p>
              <?php } ?>
              <p>
                <?php
                  if (groppe_framework_active()) {
                    groppe_excerpt($short_content);
                  } else {
                    the_excerpt();
                  }
                ?>
              </p>
            </div><!--/Home upcoming events text content end-->
            <!--Home upcoming events footer  content start \-->
            <div class="grop-fix  grop-ucoming_evnt_footr">
              <div class="grop-fix  grop-float_left  grop-ucoming_evnt_social">
              <div class="grop-ucoevnt_socil">
                <?php if ($event_contact_btn) {
                  if ($event_contact_btn_type === 'popup') { ?>
                    <a class="grop-evs_evpop" href="mailto:?subject=<?php print(urlencode( get_the_title() )); ?>&amp;body=<?php print(urlencode( get_permalink( get_the_ID() ) )); ?>" data-toggle="modal" data-target="#<?php echo esc_attr($event_popup_form_id); ?>"><i class="fa fa-envelope-o"></i></a>
                  <?php } else { ?>
                    <a href="<?php echo esc_url($event_contact_btn_link); ?>" target="_blank" class="grop-evs_evpop"><i class="fa fa-envelope-o"></i></a>
                  <?php }
                }
                if ( function_exists( 'groppe_event_share_option' ) ) {
                  echo groppe_event_share_option();
                }
                ?>
              </div>
              </div>
            </div>
          </div>
          <?php if ( function_exists( 'groppe_event_popup_form' ) ) {
            groppe_event_popup_form(); 
          } ?>
        </div>
    <?php
      endwhile;
      endif;
      wp_reset_postdata();
    ?>
</div>