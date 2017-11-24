<?php
/*
 * The template for displaying archive pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();
if( 'project' == get_post_type() ) {
$project_limit = cs_get_option('project_limit');
$project_column = cs_get_option('project_column');
$project_order = cs_get_option('project_order');
$project_orderby = cs_get_option('project_orderby');
$project_pagination = cs_get_option('project_pagination');
$project_filter = cs_get_option('project_filter');
$project_read_more_txt = cs_get_option('project_read_more_txt');

$btn_text = $project_read_more_txt ? $project_read_more_txt : esc_html__( 'View Project', 'groppe' );
$project_column = $project_column ? $project_column : 'bpw-col-2';
?>
<div class="grop-project_grid_area">
  <div class="container">
    <div class="grop-filter_content_warp grop-prjt-page">
      <!-- Project Filter -->
      <?php if ($project_filter) { ?>
        <div id="grop_filters" class="text-left grop-projctfilter_nav">
          <ul class="text-uppercase list-inline">
      			<li class="grop-filte_btn is-active" data-filter="*"><?php echo esc_attr('Show All', 'groppe'); ?></li>
            <?php
              $terms = get_terms('project_category');
              $count = count($terms);
              $i=0;
              $term_list = '';
              if ($count > 0) {
                foreach ($terms as $term) {
                  $i++;
                  $term_list .= '<li class="grop-filte_btn cat-'. $term->slug .'" data-filter=".'. $term->slug .'" title="' . esc_attr($term->name) . '">' . $term->name . '</li>';
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
      <?php }

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
        'paged' => $my_page,
        'post_type' => 'project',
        'posts_per_page' => (int)$project_limit,
        'project_category' => '',
        'orderby' => $project_orderby,
        'order' => $project_order
      );

      $groppe_port = new WP_Query( $args ); ?>

      <!-- Project Start -->
      <div class="grop-filter_content  grop-projctfilter_content">

        <?php
        if ($groppe_port->have_posts()) : while ($groppe_port->have_posts()) : $groppe_port->the_post();

          // Category
          global $post;
          $terms = wp_get_post_terms($post->ID,'project_category');
          foreach ($terms as $term) {
            $cat_class = $term->slug;
          }
          $count = count($terms);
          $i=0;
          $cat_class = '';
          if ($count > 0) {
            foreach ($terms as $term) {
              $i++;
              $cat_class .= $term->slug .' ';
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
            if(class_exists('Aq_Resize')) {
              $project_img = aq_resize( $large_image, '360', '234', true );
            } else {$project_img = $large_image;}
            $featured_img = ( $project_img ) ? $project_img : GROPPE_PLUGIN_ASTS . '/images/420x280.jpg';
        ?>
        <div class="grop-filter_single_col  grop-projctfilter_col <?php echo esc_attr($project_column); ?> <?php echo esc_attr($cat_class); ?>">
          <div class="grop-projct_itm_warp">
            <!--project Media box start \-->
            <div class="grop-projct_media_box">
              <a class="grop-cause_media_img" href="">
                <img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
              </a>

            </div><!--/end-->

            <!--project content text start \-->
            <div class="grop-projct_content_warp">
              <h4>
                <a href="<?php esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a>
              </h4>
              <p><?php  groppe_excerpt('20'); ?></p>
              <!--  project btn start  \-->
              <a class="grop-btn grop-btn_overly grop-vpjct_btn" href="<?php esc_url(the_permalink()); ?>">
                <span><?php echo esc_attr($btn_text); ?></span>
              </a><!--/end-->
            </div>
          </div>
        </div>
        <?php
          endwhile;
          endif;
          wp_reset_postdata();
        ?>

      </div>
      <!-- Project End -->

      <?php
      if ($project_pagination) {
        groppe_custom_paging_nav($groppe_port->max_num_pages,"",$paged);;
        wp_reset_postdata();  // avoid errors further down the page
      } ?>
    </div>
  </div>
</div>
<?php
} elseif('team' == get_post_type()) {
  $team_style = cs_get_option('team_style');
  $team_limit = cs_get_option('team_limit');
  $team_column = cs_get_option('team_column');
  $team_order = cs_get_option('team_order');
  $team_orderby = cs_get_option('team_orderby');
  $team_pagination = cs_get_option('team_pagination');

if($team_style === 'basic'){
  $team_column = ( $team_column ) ?  $team_column : 'col-3';
    if ($team_column === 'col-4'){
      $col_class = 'col-md-3 col-sm-6 col-xs-12';
    } elseif ($team_column === 'col-5'){
      $col_class = 'grop-tm_single';
    } else {
      $col_class = 'col-md-4 col-sm-6 col-xs-12';
    }
} else {
  $col_class = 'col-md-4 col-sm-6 col-xs-12';
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
      'paged' => $my_page,
      'post_type' => 'team',
      'posts_per_page' => (int) $team_limit,
      'orderby' => $team_orderby,
      'order' => $team_order,
    );
    $count = 0;
    $grop_team = new WP_Query( $args );
    if ($grop_team->have_posts()) : ?>
    <div class="grop-team grop-team-global"> <!-- team Starts -->
      <div class="container">
        <div class="row">
        <?php
          while ($grop_team->have_posts()) : $grop_team->the_post();
            $count++;
            $team_options = get_post_meta( get_the_ID(), 'team_options', true );
            $employee_name = $team_options['employee_name'];
            $team_job_position = $team_options['team_job_position'];
            $team_socials = $team_options['team_socials'];
            $team_link = $team_options['team_link'];
            if (!empty($team_link)) {
              $team_url = $team_link;
            } else {
              $team_url = get_the_permalink();
            }
            if ( $team_column == 'col-3' && $count == 3 ) {
              $ofset = ' col-sm-offset-3 col-md-offset-0';
            } else {
              $ofset = '';
            }
            // Featured Image
            $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
            $groppe_alt = get_post_meta( get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
            if ($large_image) {
              $large_image = $large_image[0];
            } else {
              $large_image = GROPPE_PLUGIN_IMGS.'/mate.jpg';
            }
            if($team_style === 'standard'){
              if ( $team_column == 'col-4') {
                if(class_exists('Aq_Resize')) {
                  $large_image = aq_resize( $large_image, '263', '220', true );
                } else {
                  $large_image = $large_image;
                }
              } else {
                if(class_exists('Aq_Resize')) {
                  $large_image = aq_resize( $large_image, '360', '302', true );
                } else {
                  $large_image = $large_image;
                }
              }
            } else {
              if ( $team_column == 'col-5') {
                if(class_exists('Aq_Resize')) {
                  $large_image = aq_resize( $large_image, '210', '210', true );
                } else {
                  $large_image = $large_image;
                }
              } else {
                $large_image = $large_image;
              }
            }
            ?>
            <div class="grop-team-single-item <?php echo esc_attr( $col_class.$ofset ); ?>">
              <?php if($team_style === 'standard'){ ?>
              <div class="grop-vltrs_peple_sngle_intro  grop-tm_dr">
                <!--Volunteers people media image start \-->
                <div class="grop-vltrs_peple_media">
                  <?php
                  if ($team_job_position) {
                    echo '<div class="text-uppercase grop-vltrs_peple_intro">'.esc_attr($team_job_position).'</div>';
                  } ?>
                  <img src="<?php echo esc_url( $large_image ); ?>" alt="<?php echo esc_attr( $groppe_alt ); ?>" />
                </div><!--/Volunteers people media end-->
                <!--Volunteers people text start \-->
                <div class="grop-vltrs_peple_cont_warp">
                  <!--Volunteers people intro text start \-->
                  <div class="grop-vltrs_peple_intro_txt">
                    <?php if($employee_name){
                      echo '<h4><a href="'.esc_url( get_the_permalink() ).'">'.esc_attr($employee_name).'</a></h4>';
                    } ?>
                    <p>
                      <?php
                        if (groppe_framework_active()) {
                          groppe_excerpt('10');
                        } else {
                          the_excerpt();
                        } ?>
                    </p>
                  </div>
                  <!--Social  warp start \-->
                  <div class="grop-fix grop-vltrs_peple_social_warp">
                    <!--title text start \-->
                    <h5 class="text-left  col-xs-6 grop-vltrs_peple_scil_title"><?php echo esc_html__( 'Meet Me On:', 'groppe' ); ?></h5>
                    <!--Social  start \-->
                    <div class="col-xs-6  vltrs_peple_social">
                      <ul class="list-inline text-right">
                      <?php foreach ($team_socials as $key => $icon) : ?>
                        <li><a href="<?php echo esc_url($icon['team_social_link']); ?>">
                          <i class="<?php echo esc_attr($icon['team_social_icon']); ?>"></i>
                        </a></li>
                      <?php endforeach; ?>
                      </ul>
                    </div>
                  </div><!--/Social  warp end-->
                </div><!--/Volunteers people media end-->
              </div>

              <?php  } else { ?>
              <!--Team membars image start\-->
                  <div class="grop-tm_image">
                    <img src="<?php echo esc_url( $large_image ); ?>" alt="<?php echo esc_attr( $groppe_alt ); ?>" />
                  </div><!--/end-->
                  <!--Team membars intro start\-->
                  <div class="grop-tm_intro">
                    <?php if( $employee_name ){
                      echo '<h4><a href="'.esc_url( $team_url ).'">'.esc_attr($employee_name).'</a></h4>';
                    }
                    if ($team_job_position) {
                      echo '<h6>'.esc_attr($team_job_position).'</h6>';
                    } ?>
                  </div><!--/end-->
              <?php } ?>
            </div><!--/Volunteers people single intro end-->
            <?php
          endwhile;
        ?>
        </div> <!-- row -->
      </div> <!-- container -->
      <?php
        if ($team_pagination) {
          groppe_custom_paging_nav($grop_team->max_num_pages,"",$paged);
        }
        wp_reset_postdata();
      ?>
    </div> <!-- team End -->
    <?php endif;

} elseif('gallery' == get_post_type()) {
  $gallery_style = cs_get_option('gallery_style');
  $gallery_limit = cs_get_option('gallery_limit');
  $gallery_column = cs_get_option('gallery_column');
  $gallery_order = cs_get_option('gallery_order');
  $gallery_orderby = cs_get_option('gallery_orderby');
  $gallery_pagination = cs_get_option('gallery_pagination');
  $gallery_filter = cs_get_option('gallery_filter');
  ?>
  <div class="grop-gallery_grid_area grop-galler-global">
    <div class="grop-gallery-container">
      <div class="grop-filter_content_warp">
        <?php  // Gallery Filter
        if ($gallery_filter) {
        ?>
        <div id="grop_filters" class="text-center grop-galryfilter_nav">
          <ul class="text-uppercase  list-inline">
            <li class="grop-filte_btn is-active" data-filter="*"><?php echo esc_html__( 'All', 'groppe' ); ?></li>
            <?php
              $terms = get_terms('gallery_category');
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
        'paged' => $my_page,
        'post_type' => 'gallery',
        'posts_per_page' => (int)$gallery_limit,
        'gallery_category' => '',
        'orderby' => $gallery_orderby,
        'order' => $gallery_order
      );

      $groppe_port = new WP_Query( $args ); ?>

      <!-- Gallery Start -->
        <div class="grop-filter_content  grop-galryfilter_content">
          <?php
          if ($groppe_port->have_posts()) : while ($groppe_port->have_posts()) : $groppe_port->the_post();

            // Category
            global $post;
            $terms = wp_get_post_terms($post->ID,'gallery_category');
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
            if ( $large_image ) {
              $large_image = $large_image[0];
            } else {
              $large_image = GROPPE_PLUGIN_ASTS . '/images/1000x800.jpg';
            }
            $gallery_metabox = get_post_meta( get_the_ID(), 'gallery_post_type_metabox', true );
            if ($gallery_metabox ) {
              $gallery_type = $gallery_metabox['gallery_type'];
              $video_post = $gallery_metabox['video_post'];
              $gallery_post_format = $gallery_metabox['gallery_post_images'];
              $link_post = $gallery_metabox['link_post'];
            } else {
              $gallery_type = '';
              $video_post = '';
              $gallery_post_format = array();
              $link_post = '';
            } ?>
            <div class="grop-filter_single_col <?php echo esc_attr( $gallery_column.' '.$cat_class ); ?>">
              <?php if ( $gallery_type == 'gallery' ) { ?>
                <div class="text-center grop-gallery-slider">
                  <div class="owl-carousel  grop-galry_carousel" data-autoplay="false" data-center="true" data-dots="true" data-nav="true">
                    <?php $images = explode( ',', $gallery_post_format );
                    foreach ($images as $imagee) {
                      $image = wp_get_attachment_image_src( $imagee, 'full' );
                      $image_alt = get_post_meta($imagee, '_wp_attachment_image_alt', true);
                      $g_img = $image[0];
                      ?>
                      <div class="grop-galryslid_single">
                        <img src="<?php echo esc_url($g_img); ?>" alt="<?php esc_attr( $image_alt ); ?>" />
                      </div>
                    <?php } ?>
                  </div>
                  <?php if ($gallery_style === 'with_caption'){ ?>
                    <h5 class="grop-galry_cption"><?php echo esc_attr(get_the_title()); ?></h5>
                  <?php } ?>

                </div>
              <?php } elseif( $gallery_type == 'video' ) {
                preg_match(
                  '/[\\?\\&]v=([^\\?\\&]+)/',
                  $video_post,
                  $matches
                );
                $id = $matches[1];
               ?>
                <div class="text-center grop-gallery-video">
                  <a class="grop-gvideo_btn" href="" data-toggle="modal" data-target="#myVideo<?php the_ID(); ?>">
                    <img src="<?php echo esc_url( $large_image ); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                  </a>
                  <?php if ($gallery_style === 'with_caption'){ ?>
                    <h5 class="grop-galry_cption"><?php echo esc_attr(get_the_title()); ?></h5>
                  <?php } ?>
                </div>
                <div class="grop-model_popup_warp">
                  <!-- Your id here must be mach data-target="#your target here" btn-->
                  <div id="myVideo<?php the_ID(); ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog  grop-model_dialog  grop-model_video  vertical-align-center">
                      <div class="modal-content  grop-model_content">
                        <div class="modal-body grop-model_body">
                          <iframe width="560" height="315" src="<?php echo esc_url( '//www.youtube.com/embed/'.$id ); ?>" frameborder="0" allowfullscreen></iframe>
                          <?php if ($gallery_style === 'with_caption'){ ?>
                            <h5 class="grop-galry_cption"><?php echo esc_attr(get_the_title()); ?></h5>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } elseif( $gallery_type == 'link' ) { ?>
                <div class="text-center grop-gallery-image">
                  <a href="<?php echo esc_url( $link_post ); ?>">
                    <img src="<?php echo esc_url( $large_image ); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                    <?php if ($gallery_style === 'with_caption'){ ?>
                      <h5 class="grop-galry_cption"><?php echo esc_attr(get_the_title()); ?></h5>
                    <?php } ?>
                  </a>
                </div>
              <?php } else { ?>
              <div class="text-center grop-gallery-image">
                <img src="<?php echo esc_url( $large_image ); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                <?php if ($gallery_style === 'with_caption'){ ?>
                  <h5 class="grop-galry_cption"><?php echo esc_attr(get_the_title()); ?></h5>
                <?php } ?>
              </div>
              <?php } ?>
            </div>
          <?php
            endwhile;
            endif;
          ?>
        </div>
      </div>
  </div>
    <?php
    if ($gallery_pagination) {
      groppe_custom_paging_nav($groppe_port->max_num_pages,"",$paged);
    } ?>
</div>

   <?php wp_reset_postdata();
// Gallery End

} else {
// Metabox
$groppe_id    = ( isset( $post ) ) ? $post->ID : 0;
$groppe_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $groppe_id;
$groppe_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $groppe_id;
$groppe_meta  = get_post_meta( $groppe_id, 'page_type_metabox', true );

if ($groppe_meta) {
	$groppe_content_padding = $groppe_meta['content_spacings'];
} else { $groppe_content_padding = ''; }
// Padding - Metabox
if ($groppe_content_padding && $groppe_content_padding !== 'padding-none') {
	$groppe_content_top_spacings = $groppe_meta['content_top_spacings'];
	$groppe_content_bottom_spacings = $groppe_meta['content_bottom_spacings'];
	if ($groppe_content_padding === 'padding-custom') {
		$groppe_content_top_spacings = $groppe_content_top_spacings ? 'padding-top:'. groppe_check_px($groppe_content_top_spacings) .';' : '';
		$groppe_content_bottom_spacings = $groppe_content_bottom_spacings ? 'padding-bottom:'. groppe_check_px($groppe_content_bottom_spacings) .';' : '';
		$groppe_custom_padding = $groppe_content_top_spacings . $groppe_content_bottom_spacings;
	} else {
		$groppe_custom_padding = '';
	}
} else {
	$groppe_custom_padding = '';
}

// Theme Options
$groppe_blog_style = cs_get_option('blog_listing_style');
$groppe_blog_columns = cs_get_option('blog_listing_columns');
$groppe_sidebar_position = cs_get_option('blog_sidebar_position');

// Columns
if ($groppe_blog_style === 'style-two') {
	$groppe_blog_columns = $groppe_blog_columns ? $groppe_blog_columns : 'column-three';
	$listing_class = 'grop-blog_grid_area';
} else {
	$groppe_blog_columns = '';
	$listing_class = 'grop-blog_post_warp';
}

// Sidebar Position
if ($groppe_sidebar_position === 'sidebar-hide') {
	$groppe_sidebar_class = ' grop-hide-sidebar';
} elseif ($groppe_sidebar_position === 'sidebar-left') {
	$groppe_sidebar_class = ' grop-left-sidebar';
} else {
	$groppe_sidebar_class = ' grop-right-sidebar';
}
?>

<div class="grop-fix  container grop-page-with_sidbr_warp <?php echo esc_attr($groppe_content_padding. $groppe_sidebar_class); ?>" style="<?php echo esc_attr($groppe_custom_padding); ?>">
	<div class="grop-float_left  grop-page-with_sidbr_entry_content">
		<div class="<?php echo esc_attr( $listing_class ); ?>">
		<?php
		if ($groppe_blog_style === 'style-two') {
			?>
			<div class="grop-filter_content_warp">
				<div class="grop-filter_content <?php echo esc_attr( $groppe_blog_columns ); ?>">
			<?php
		}
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				if ($groppe_blog_style === 'style-two') {
					get_template_part( 'layouts/post/content', 'grid' );
				} else {
					get_template_part( 'layouts/post/content' );
				}
			endwhile;
		else :
			get_template_part( 'layouts/post/content', 'none' );
		endif;
		if ($groppe_blog_style === 'style-two') {
			?>
				</div>
			</div>
			<?php } ?>
		</div><!-- Blog Div -->
		<?php
			groppe_paging_nav();
			wp_reset_postdata();  // avoid errors further down the page
		?>
	</div><!-- Content Area -->
	<?php if ( $groppe_sidebar_position !== 'sidebar-hide') { get_sidebar(); } ?>
</div>

<?php }
get_footer();