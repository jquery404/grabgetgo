<?php
/**
 * Single Product Thumbnails
 *
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attachment_ids = $product->get_gallery_image_ids();

if ( $attachment_ids && has_post_thumbnail() ) {
	foreach ( $attachment_ids as $attachment_id ) {
		echo apply_filters( 'grabgetgo_single_product_image_thumbnail_html', grabgetgo_get_gallery_image_html( $attachment_id  ), $attachment_id );
	}
}
