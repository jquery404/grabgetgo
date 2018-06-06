<?php
/**
 * The template for displaying product content within loops
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div <?php post_class('col-6 col-sm-4 col-md-6 col-lg-4 col-xl-3'); ?>>

	<div class="card card-product">
		<?php 
		//@hooked woocommerce_template_loop_product_link_open - 10
		do_action( 'woocommerce_before_shop_loop_item' ); 
		//@hooked woocommerce_show_product_loop_sale_flash - 10	
	 	//@hooked woocommerce_template_loop_product_thumbnail - 10
		do_action( 'woocommerce_before_shop_loop_item_title' ); 
		//@hooked woocommerce_template_loop_product_link_close - 5
		do_action( 'woocommerce_after_shop_loop_item' ); ?>

		<div class="card-body">
      
      <div class="card-title">
      	<?php 
				do_action( 'woocommerce_before_shop_loop_item' ); 
      	//@hooked woocommerce_template_loop_product_title - 10
				do_action( 'woocommerce_shop_loop_item_title' ); 
				do_action( 'woocommerce_after_shop_loop_item' ); ?>
      </div>

      <?php 
			//@hooked woocommerce_template_loop_rating - 5
			//@hooked woocommerce_template_loop_price - 10
			do_action( 'woocommerce_after_shop_loop_item_title' );

			//@hooked woocommerce_template_loop_add_to_cart - 10
			do_action( 'woocommerce_after_shop_loop_cart' ); ?>
              
    </div>

	</div>
</div>