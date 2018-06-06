<?php
/**
 * Show options for ordering
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="mb-2 col-12 col-sm-6 text-center text-sm-right">
	<form method="get">
		<span>Sort by</span>
		<select name="orderby" class="custom-select ml-2 w-auto custom-select-sm orderby">
			<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
				<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
			<?php endforeach; ?>
		</select>
		<input type="hidden" name="paged" value="1" />
		<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
		
		<div class="btn-group" role="group" aria-label="Basic example">
		  <a class="btn btn-theme btn-sm" href="shop.html" role="button"><i class="fa fa-th"></i></a>
		  <a class="btn btn-outline-theme btn-sm" href="shop-list.html" role="button"><i class="fa fa-list"></i></a>
		</div>
	</form>

	
</div>
