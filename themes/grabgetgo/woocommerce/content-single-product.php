<?php
/**
 * The template for displaying product content in the single-product.php template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
do_action( 'woocommerce_before_single_product' );
if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div class="container-fluid limited">
	<div class="row">

		<div class="col-12 d-block d-md-none">
		  <?php the_title( '<div class="title"><span>', '</span></div>' ); ?>
		</div>

		<div class="col-xl-4 col-lg-5 col-md-6">
			<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
		</div>
		<!--end before_single_summary -->

		<div class="col-xl-8 col-lg-7 col-md-6">
			<?php do_action( 'woocommerce_single_product_summary' ); ?>
		</div>
		<!--end summary-->

		<?php do_action( 'woocommerce_after_single_product_summary' ); ?>


		<?php do_action( 'woocommerce_after_single_product' ); ?>
	
	</div>
</div>
