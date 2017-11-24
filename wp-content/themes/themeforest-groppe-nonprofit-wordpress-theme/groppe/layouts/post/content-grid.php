<?php
/**
 * Template part for displaying posts.
 */
// Metabox
$groppe_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );

$groppe_large_image = $groppe_large_image[0];
if ($groppe_large_image) {
  if(class_exists('Aq_Resize')) {
    $post_grid_image = aq_resize( $groppe_large_image, '360', '224', true );
  } else {
    $post_grid_image = $groppe_large_image;
  }
}

$groppe_read_more_text = cs_get_option('read_more_text');
$groppe_read_text = $groppe_read_more_text ? $groppe_read_more_text : esc_html__( 'Read More', 'groppe' );
$groppe_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
$groppe_blog_style = cs_get_option('blog_listing_style');
$groppe_metas_hide = (array) cs_get_option( 'theme_metas_hide' );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('grop-filter_single_col'); ?>>
	<div class="grop-hm3news_single_post_warp  grop-blog_grid">
		<?php
		if ( 'gallery' == get_post_format() && ! empty( $groppe_post_type['gallery_post_format'] ) ) { ?>
			<div class="featured-image rounded-three grop-theme-carousel" data-nav="true" data-autoplay="true" data-auto-height="true" data-dots="true">
				<?php
			  $groppe_ids = explode( ',', $groppe_post_type['gallery_post_format'] );
			  foreach ( $groppe_ids as $id ) {
			    $groppe_attachment = wp_get_attachment_image_src( $id, 'full' );
			    $groppe_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
			    echo '<img src="'. esc_url($groppe_attachment[0]) .'" alt="'. esc_attr($groppe_alt) .'" />';
			  }
				?>
			</div>
		<?php
		} elseif ($post_grid_image) { ?>
		<div class="grop-news_pst_media">
			<img src="<?php echo esc_url($post_grid_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
		</div>
		<?php } ?>
		<div class="grop-news_pst_cont_warp">
			<div class="grop-news_pst_cont">
				<?php if ( !in_array( 'date', $groppe_metas_hide ) ) {  ?>
		    <div class="grop-news_ps_date"><i class="fa fa-clock-o"></i><?php echo get_the_date('d M Y'); ?></div>
		    <?php }
				 if (!empty(get_the_title())) {
				 	echo '<h4 class="grop-news_ps_title"><a href="'.esc_url( get_the_permalink() ).'">'.get_the_title().'</a></h4>';
				 }
				echo "<p>";
				$blog_excerpt = cs_get_option('theme_blog_excerpt');
				if ($blog_excerpt) {
					$blog_excerpt = $blog_excerpt;
				} else {
					$blog_excerpt = '55';
				}
				groppe_excerpt($blog_excerpt);
				echo groppe_wp_link_pages();
				echo "</p>"; ?>
			</div><!--/ end-->

			<!--meta element start \-->
			<?php if (( !in_array( 'category', $groppe_metas_hide ) ) || ( !in_array( 'comments', $groppe_metas_hide ) ) ){ ?>
			<div class="grop-fix grop-news_pst_meta">
				<?php if ( !in_array( 'category', $groppe_metas_hide ) ) { ?>
				<div class="grop-float_left grop-news_pst_in">
					in
					<?php echo get_the_category_list( ', ' ); ?>
				</div>
				<?php }
				if ( !in_array( 'comments', $groppe_metas_hide ) ) { ?>
				<div class="grop-float_right grop-news_pst_commnt">
					<?php comments_popup_link( __( '<i class="fa fa-comment-o"></i><span>0</span>', 'groppe' ), __( '<i class="fa fa-comment-o"></i><span>1</span>', 'groppe' ), __( '<i class="fa fa-comment-o"></i><span>%</span>', 'groppe' ), '', '' ); ?>
				</div>
				<?php } ?>
			</div><!--/ end-->
			<?php } ?>
		</div>
	</div>
</div>