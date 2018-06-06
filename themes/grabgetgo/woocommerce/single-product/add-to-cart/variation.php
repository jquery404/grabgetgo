<?php
/**
 * Single variation display
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<script type="text/template" id="tmpl-variation-template">
	{{{ data.variation.variation_description }}}
	<table class="table table-detail">
		<tbody>
		<tr>
	    <td class="align-middle">Price</td>
	    <td>
	      <ul class="list-inline mb-0">
	        <li class="list-inline-item">{{{ data.variation.price_html }}}</li>
	        <li class="list-inline-item">{{{ data.variation.availability_html }}}</li>
	      </ul>
	    </td>
	  </tr>
		</tbody>
	</table>

	

	
</script>
<script type="text/template" id="tmpl-unavailable-variation-template">
	<p><?php _e( 'Sorry, this product is unavailable. Please choose a different combination.', 'woocommerce' ); ?></p>
</script>
