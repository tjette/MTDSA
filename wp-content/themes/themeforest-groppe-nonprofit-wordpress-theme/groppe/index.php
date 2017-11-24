<?php
/*
 * The main template file.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();

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
								get_template_part( 'layouts/post/content', get_post_format() );
							}
						endwhile;
						else :
							get_template_part( 'layouts/post/content', 'none' );
						endif;
					if ($groppe_blog_style === 'style-two') { ?>
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
<?php
get_footer();