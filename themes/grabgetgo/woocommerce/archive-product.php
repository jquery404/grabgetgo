<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

<!-- Shop Container-fluid -->
<div class="container-fluid limited">
  <div class="row">
  	
<!-- Filter Widget -->
<div class="col-lg-3 col-md-4 mb-3">
	<?php

	/**
	 * Hook: woocommerce_sidebar.
	 *
	 * @hooked woocommerce_get_sidebar - 10
	 */
	do_action( 'woocommerce_sidebar' );

	?>
</div>
<!-- /Filter Widget -->

<!-- Products -->
<div class="col-lg-9 col-md-8">
	
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<div class="title"><span><?php woocommerce_page_title(); ?></span></div>
	<?php endif; 
	do_action( 'woocommerce_archive_description' );


	if ( have_posts() ) { ?>

	<!-- Sorting Bar -->
	<div class="row mb-3 border pt-2 px-3 rounded no-gutters">
		<?php do_action( 'woocommerce_before_shop_loop' ); ?>
	</div>
	<!-- /Sorting Bar -->

	<div class="row compact">
	<?php
		woocommerce_product_loop_start();

		if ( wc_get_loop_prop( 'total' ) ) {
			while ( have_posts() ) {
				the_post();

				/**
				 * Hook: woocommerce_shop_loop.
				 *
				 * @hooked WC_Structured_Data::generate_product_data() - 10
				 */
				do_action( 'woocommerce_shop_loop' );

				wc_get_template_part( 'content', 'product_view' );
			}
		}

		woocommerce_product_loop_end();

		/**
		 * Hook: woocommerce_after_shop_loop.
		 *
		 * @hooked woocommerce_pagination - 10
		 */
		do_action( 'woocommerce_after_shop_loop' );
	} else {
		/**
		 * Hook: woocommerce_no_products_found.
		 *
		 * @hooked wc_no_products_found - 10
		 */
		do_action( 'woocommerce_no_products_found' );
	}
	?>
	</div>

</div>
<!-- /Products -->

	</div>
</div>
<!-- /Shop Container-fluid -->

<?php
get_footer( 'shop' );
