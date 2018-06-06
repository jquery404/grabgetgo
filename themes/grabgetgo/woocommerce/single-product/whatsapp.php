<?php
/**
 * WhatsApp Single Product
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$product_title = esc_html($product->get_title());
$product_link = esc_html($product->get_permalink());
?>


<a href="https://api.whatsapp.com/send?phone=601161963941&text=Hi, I would like to buy <?php echo $product_title. ' ' .$product_link; ?>" target="_blank" class="btn btn-outline-theme" data-toggle="tooltip" data-placement="top" data-original-title=""><i class="fa fa-whatsapp fa-2x"></i></a>
