<?php
/**
 * Single variation cart button
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>

	<table class="table table-detail variations">
			<tbody>
				<tr>
		      <td class="align-middle">Quantity</td>
		      <td>
						<div class="input-group input-group-sm input-group-qty">
					    <div class="input-group-prepend">
					    	<button class="btn btn-light btn-down" type="button"><i class="fa fa-chevron-down"></i></button>
					    </div>
					    <?php
							woocommerce_quantity_input( array(
								'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
								'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
								'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
							) );
						?>
					    <div class="input-group-append">
					    	<button class="btn btn-light btn-up" type="button"><i class="fa fa-chevron-up"></i></button>
					    </div>
					  </div>
					</td>
				</tr>
			</tbody>
	</table>

	<div class="btn-group btn-group-sm" role="group">
      
    <button type="submit" name="add-to-cart" class="btn btn-theme text-uppercase"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

		<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
		<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
		<input type="hidden" name="variation_id" class="variation_id" value="0" />
    
    <button type="button" class="btn btn-outline-theme" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><i class="fa fa-retweet fa-2x"></i></button>

    <?php grabgetgo_whatsapp_single_product(); ?>

  </div>


