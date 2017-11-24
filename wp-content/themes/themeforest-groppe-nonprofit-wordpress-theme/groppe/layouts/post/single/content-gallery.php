<?php
/**
 * Single Post.
 */
$groppe_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$groppe_large_image = $groppe_large_image[0];

$groppe_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
if ($groppe_post_type) {
	$gallery_post_format = $groppe_post_type['gallery_post_format'];
} else {
	$gallery_post_format = '';
}
?>
<!-- blog post header start \-->
<header class="grop-post_header grop-sigl_header">
	<?php
	if ( 'gallery' == get_post_format() && ! empty( $gallery_post_format ) ) { ?>
		<div class="grop-post_image grop-theme-carousel" data-nav="true" data-autoplay="true" data-auto-height="true" data-dots="true">
			<?php $groppe_ids = explode( ',', $gallery_post_format );
		  foreach ( $groppe_ids as $id ) {
		    $groppe_attachment = wp_get_attachment_image_src( $id, 'full' );
		    $groppe_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
		    echo '<img src="'. esc_url($groppe_attachment[0]) .'" alt="'. esc_attr($groppe_alt) .'" />';
		  } ?>
		</div>
	<?php
	} elseif ($groppe_large_image) { ?>
	<div class="grop-post_image">
		<img src="<?php echo esc_url($groppe_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
	</div>
	<?php }
	echo groppe_post_metas(); 
	if (!empty(get_the_title())) {
	 	echo '<h2 class="grop-post_title"><a href="'.esc_url( get_the_permalink() ).'">'.esc_attr(get_the_title()).'</a></h2>';
	} ?>
</header>
<div class="grop-sigl_content">
	<?php the_content(); echo groppe_wp_link_pages(); ?>
</div>
