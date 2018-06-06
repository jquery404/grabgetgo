<?php
/**
 * Simple product add to cart
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product );

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" action="<?php echo esc_url( get_permalink() ); ?>" method="post" enctype='multipart/form-data'>

		<table class="table table-detail">
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
      
      <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="btn btn-theme text-uppercase"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
      
      <button type="button" class="btn btn-outline-theme" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><i class="fa fa-retweet fa-2x"></i></button>

      <?php grabgetgo_whatsapp_single_product(); ?>

    </div>

	</form>
	

<?php endif; ?>
