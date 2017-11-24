<?php
/**
 * Template part for displaying posts.
 */
$groppe_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$groppe_large_image = $groppe_large_image[0];

$groppe_read_more_text = cs_get_option('read_more_text');
$groppe_read_text = $groppe_read_more_text ? $groppe_read_more_text : esc_html__( 'Read More', 'groppe' );
$groppe_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
if ($groppe_post_type) {
	$gallery_post_format = $groppe_post_type['gallery_post_format'];
} else {
	$gallery_post_format = '';
}
$groppe_blog_style = cs_get_option('blog_listing_style');
$groppe_metas_hide = (array) cs_get_option( 'theme_metas_hide' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('grop-blog_post'); ?>>
	<header class="grop-post_header">
		<?php
		if ( 'gallery' == get_post_format() && ! empty( $gallery_post_format ) ) { ?>
			<div id="theme-blog-carousel" class="grop-post_image grop-theme-carousel"  data-ride="carousel">
				<div class="carousel-inner" role="listbox">
					<?php $groppe_ids = explode( ',', $gallery_post_format );
					$count = 0;
				  foreach ( $groppe_ids as $id ) {
				  	$count++;
				  	if ($count == 1) {
				  		$active_class = ' active';
				  	} else {
				  		$active_class = '';
				  	}
				    $groppe_attachment = wp_get_attachment_image_src( $id, 'full' );
				    $groppe_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
				    echo '<div class="item'.esc_attr($active_class).'"><img src="'. esc_url($groppe_attachment[0]) .'" alt="'. esc_attr($groppe_alt) .'" /></div>';
				  } ?>
				</div>
			</div>
		<?php
		} elseif ($groppe_large_image) { ?>
		<div class="grop-post_image">
			<img src="<?php echo esc_url($groppe_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
		</div>
		<?php } // Featured Image
			 echo groppe_post_metas();
			 if (!empty(get_the_title())) {
			 	echo '<h2 class="grop-post_title"><a href="'. esc_url( get_the_permalink() ) .'">'. esc_attr(get_the_title()) .'</a></h2>';
			 }
		?>
	</header><!--/ blog post header end-->
	<div class="grop-post_content">
		<p>
			<?php
			$blog_excerpt = cs_get_option('theme_blog_excerpt');
			if ($blog_excerpt) {
				$blog_excerpt = $blog_excerpt;
			} else {
				$blog_excerpt = '55';
			}
			groppe_excerpt($blog_excerpt);
			echo groppe_wp_link_pages();
			?>
		</p>
	</div><!--/ post content end-->
	<!-- post footer start \-->
	<footer class="row grop-post_footer">
		<div class="text-left  col-xs-6">
			<a class="grop-btn grop-btn_overly grop-postrm_btn" href="<?php echo esc_url( get_permalink() ); ?>" class="bp-read-more">
				<span><?php echo esc_attr($groppe_read_text); ?></span>
			</a>
		</div>
		<div class="text-right  col-xs-6">
			<?php comments_popup_link( __( '<span class="grop-post_comnt"><i class="fa fa-comment-o"></i><span>0</span></span>', 'groppe' ), __( '<span class="grop-post_comnt"><i class="fa fa-comment-o"></i><span>1</span></span>', 'groppe' ), __( '<span class="grop-post_comnt"><i class="fa fa-comment-o"></i><span>%</span></span>', 'groppe' ), '', '' ); ?>
		</div>
	</footer><!--/post footer end-->

</article><!-- #post-## -->
