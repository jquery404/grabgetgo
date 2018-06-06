<?php
/**
 * Related Products
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>


		<div class="col-12">
			<div class="title">
				<span><?php esc_html_e( 'Customers also viewed these products', 'grabgetgo' ); ?></span>
			</div>
		</div>

		<div class="col-12">
			<div class="swiper-nav">
        <div class="swiper-nav-prev" id="newInPrev"><i class="fa fa-chevron-left"></i>Left</div>
        <div class="swiper-nav-next" id="newInNext"><i class="fa fa-chevron-right"></i>Right</div>
      </div>

      <div class="swiper-container swiper-container-have-hover" id="newIn-slider">
        <div class="swiper-wrapper">

					<?php woocommerce_product_loop_start(); ?>

						<?php foreach ( $related_products as $related_product ) : ?>

							<?php
							 	$post_object = get_post( $related_product->get_id() );

								setup_postdata( $GLOBALS['post'] =& $post_object );

								wc_get_template_part( 'content', 'product_related' ); ?>

						<?php endforeach; ?>

					<?php woocommerce_product_loop_end(); ?>

				</div>

				<div class="swiper-pagination"></div>
			</div>

		</div>


<?php endif;

wp_reset_postdata();
