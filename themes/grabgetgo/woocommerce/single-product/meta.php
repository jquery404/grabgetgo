<?php
/**
 * Single Product Meta
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>


<div>
	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<small>
			<?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?>
		</small>


	<?php endif; ?>

	<?php if ( wc_get_product_tag_list($product->get_id()) ) : ?>
		<small>
			<i class="fa fa-tags md-1"></i> <?php echo wc_get_product_tag_list( $product->get_id(), ', ', '' . _n( '', '', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '' ); ?>
		</small>

	<?php endif; ?>

</div>
<hr/>

