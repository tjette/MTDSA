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
$groppe_single_featured_image = cs_get_option('single_featured_image');

?>
<!-- blog post header start \-->
<header class="grop-post_header grop-sigl_header">
	<?php if ($groppe_large_image && $groppe_single_featured_image) { ?>
	<div class="grop-post_image">
		<img src="<?php echo esc_url($groppe_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
	</div>
	<?php  } echo groppe_post_metas(); ?>
	<h2 class="grop-post_title"><?php the_title(); ?></h2>
</header>
<div class="grop-sigl_content">
	<?php the_content(); echo groppe_wp_link_pages(); ?>
</div>
