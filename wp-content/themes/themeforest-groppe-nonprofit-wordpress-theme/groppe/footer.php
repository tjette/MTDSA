<?php
/*
 * The template for displaying the footer.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
$groppe_id    = ( isset( $post ) ) ? $post->ID : 0;
$groppe_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $groppe_id;
$groppe_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $groppe_id;
$groppe_meta  = get_post_meta( $groppe_id, 'page_type_metabox', true );

if ($groppe_meta) {
	$groppe_hide_footer  = $groppe_meta['hide_footer'];
	$groppe_hide_copyright = $groppe_meta['hide_copyright'];
} else {
	$groppe_hide_footer = '';
	$groppe_hide_copyright = '';
}

?>
	<footer class="grop-footer_areas">
		<?php
		if (!$groppe_hide_footer) { // Hide Footer Metabox
			$footer_widget_block = cs_get_option('footer_widget_block');
			if ($footer_widget_block) {
	      get_template_part( 'layouts/footer/footer', 'widgets' );
	    }
	  }
	  if (!$groppe_hide_copyright) { // Hide Copyright Metabox
    	$need_copyright = cs_get_option('need_copyright');
			if ($need_copyright) {
      	get_template_part( 'layouts/footer/footer', 'copyright' );
	    }
	  }
	  ?>
	</footer>


</div><!-- #vtheme-wrapper -->
<?php wp_footer(); ?>
</body>
</html>
