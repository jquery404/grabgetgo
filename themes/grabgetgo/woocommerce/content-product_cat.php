<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>


	<div class="col-6 col-sm-4 col-md-3">
		<?php do_action( 'woocommerce_before_subcategory', $category ); ?>
		<div class="single_top_category">
			<div class="top_category_image">
				<?php do_action( 'woocommerce_before_subcategory_title', $category ); ?>
			</div>
			<div class="top_category_desc">
				<?php
					do_action( 'woocommerce_shop_loop_subcategory_title', $category );
					do_action( 'woocommerce_after_subcategory_title', $category );
				?>
			</div>
		</div>
		<?php do_action( 'woocommerce_after_subcategory', $category ); ?>

	</div>

	

