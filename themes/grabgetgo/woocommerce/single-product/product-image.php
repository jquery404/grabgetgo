<?php
/**
 * Single Product Image
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();

?>
<div class="swiper-container border rounded mb-2" id="detail-slider">
	<div class="swiper-wrapper">
		<?php
		if ( has_post_thumbnail() ) {
			$html  = grabgetgo_get_gallery_image_html( $post_thumbnail_id, true );
		} else {
			$html  = '<div class="swipper-slide">';
			$html .= sprintf( '<img src="%s" alt="%s" class="w-100" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
			$html .= '</div>';
		}

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );

		?>
	</div><!-- /Swipper Wrapper-->
	<a href="#zoom" class="btn-zoom"><i class="fa fa-search-plus p-2 md-2"></i></a>
</div>

<div class="swiper-container detail-gallery mb-2" id="detail-gallery">
  <div class="swiper-wrapper">
  	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

  </div>

	<div class="swiper-button-prev" id="detail-gallery-prev"><i class="fa fa-chevron-left md-3"></i></div>
  <div class="swiper-button-next" id="detail-gallery-next"><i class="fa fa-chevron-right md-3"></i></div>

</div>

