<?php
/**
 * Single Post.
 */
$groppe_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$groppe_large_image = $groppe_large_image[0];

?>
<!-- blog post header start \-->
<header class="grop-post_header grop-sigl_header">
	<?php if ($groppe_large_image) { ?>
	<div class="grop-post_image">
		<img src="<?php echo esc_url($groppe_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
	</div>
	<?php
	}
	echo groppe_post_metas();
	if (!empty(get_the_title())) {
	 	echo '<h2 class="grop-post_title"><a href="'. esc_url( get_the_permalink() ) .'">'. esc_attr(get_the_title()) .'</a></h2>';
	}
	?>
</header>
<div class="grop-sigl_content">
	<?php the_content(); echo groppe_wp_link_pages(); ?>
</div>
