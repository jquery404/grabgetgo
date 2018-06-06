<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Grabgetgo_WooCommerce' ) ) :

	
	class Grabgetgo_WooCommerce {

		public function __construct() {

			if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.3', '<' ) ) {
				add_filter( 'loop_shop_per_page', array( $this, 'products_per_page' ) );
			}
			add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
		}

		public function products_per_page() {
			return intval( apply_filters( 'grabgetgo_products_per_page', 12 ) );
		}

		function woocommerce_header_add_to_cart_fragment( $fragments ) {
    	ob_start();
    	?>
    	<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
    	<?php

    	$fragments['a.cart-contents'] = ob_get_clean();

    	return $fragments;
    }
	
	}

endif;	