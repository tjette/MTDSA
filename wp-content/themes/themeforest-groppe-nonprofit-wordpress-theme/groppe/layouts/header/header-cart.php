<?php
	if ( class_exists( 'WooCommerce' ) ) :
	global $woocommerce;
	$cart_url = wc_get_cart_url(); ?>
	<div class="grop-hadr_shopping_cart">
		<a href="<?php echo esc_url( $cart_url ); ?>"><i class="fa fa-shopping-cart"></i></a>
	</div><!--/end-->
<?php endif;