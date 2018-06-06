<?php 

if( !function_exists('grabgetgo_taxonomy_color')) {

	function grabgetgo_taxonomy_color()  {
		$labels = array(
		    'name'                       => 'Color',
		    'singular_name'              => 'Color',
		    'menu_name'                  => 'Color',
		    'all_items'                  => 'All Color',
		    'parent_item'                => 'Parent Color',
		    'parent_item_colon'          => 'Parent Color:',
		    'new_item_name'              => 'New Item Color',
		    'add_new_item'               => 'Add New Color',
		    'edit_item'                  => 'Edit Color',
		    'update_item'                => 'Update Color',
		    'separate_items_with_commas' => 'Separate Color with commas',
		    'search_items'               => 'Search Color',
		    'add_or_remove_items'        => 'Add or remove Colors',
		    'choose_from_most_used'      => 'Choose from the most used Colors',
		);
		$args = array(
		    'labels'                     => $labels,
		    'hierarchical'               => true,
		    'public'                     => true,
		    'show_ui'                    => true,
		    'show_admin_column'          => true,
		    'show_in_nav_menus'          => true,
		    'show_tagcloud'              => true,
		);
		register_taxonomy( 'color', 'product', $args );
		register_taxonomy_for_object_type( 'color', 'product' );
	}

}

if( !function_exists('grabgetgo_single_product_tab') ){
	function grabgetgo_single_product_tab( $tabs ) {
		$tabs['grabgetgo_product'] = array(
			'title'    => __( 'In the box', 'textdomain' ),
			'callback' => 'grabgetgo_single_product_tab_content',
			'priority' => 50,
		);
		return $tabs;
	}	
}

if( !function_exists('grabgetgo_single_product_tab_content') ){
	function grabgetgo_single_product_tab_content( $slug, $tab ) {
		
		$custom_field_data = get_post_meta( get_the_ID(), 'txt_area_inthebox', true );
		echo $custom_field_data;

	}
}

if( !function_exists('grabgetgo_single_product_tabs_order') ){
	function grabgetgo_single_product_tabs_order( $tabs ) {
		
		// Double check to make sure the default tabs exist and are not removed at some point.
		if ( isset( $tabs['description'] ) ) {
			$tabs['description']['priority'] = 10;
		}
		
		if ( isset( $tabs['additional_information'] ) ) {
			$tabs['additional_information']['priority'] = 20;
		}
		
		if ( isset( $tabs['reviews'] ) ) {
			$tabs['reviews']['priority'] = 40;
		}

		if ( isset( $tabs['grabgetgo_product'] ) ) {
			$tabs['grabgetgo_product']['priority'] = 30;
		}
		
		return $tabs;
	}
}

function grabgetgo_product_meta_tab($product_data_tabs){
	$product_data_tabs['grabgetgo-metatab'] = array(
      'label' => __( 'In the box', 'grabgetgo' ), 
      'target' => 'grabgetgo_product_in_the_box'
  );

  return $product_data_tabs;
}

function grabgetgo_product_meta_tab_field() {
    echo '<div id="grabgetgo_product_in_the_box" class="panel woocommerce_options_panel hidden">';
	    
			echo '<div class="options_group">';
			wp_editor ( 
	     	get_post_meta( get_the_ID(), 'txt_area_inthebox', true ), 
	      'txt_area_inthebox', 
	      array ( "media_buttons" => false ) 
	    );
			echo "</div>";
		echo "</div>";
}


function grabgetgo_save_meta_tab_field( $post_id ) {
	
	if ( isset( $_POST['txt_area_inthebox'] ) ) :
		update_post_meta( $post_id, 'txt_area_inthebox', $_POST['txt_area_inthebox']);
	endif;
	
}


if ( ! function_exists( 'grabgetgo_woocommerce_pagination' ) ) {
	
	function grabgetgo_woocommerce_pagination() {
		if ( woocommerce_products_will_display() ) {
			woocommerce_pagination();
		}
	}
}


if(!function_exists('grabgetgo_get_gallery_image_html')){

	function grabgetgo_get_gallery_image_html( $attachment_id, $main_image = false ) {

		$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
		$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
		$image_size        = apply_filters( 'woocommerce_gallery_image_size', $main_image ? 'woocommerce_single': $thumbnail_size );
		$full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
		$thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
		$full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
		$image             = wp_get_attachment_image( $attachment_id, $image_size, false, array(
			'title'                   => get_post_field( 'post_title', $attachment_id ),
			'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
			'data-src'                => $full_src[0],
			'data-large_image_width'  => $full_src[1],
			'data-large_image_height' => $full_src[2],
			'class'                   => $main_image ? 'w-100' : 'img-thumbnail',
		) );

		$html = $main_image ? '<div class="swiper-slide">'. $image . '</div>' : '<div class="swiper-slide">
			<a href="' . esc_url( $full_src[0] ) . '">' . $image . '</a></div>';

		return $html;
	}
}

if ( ! function_exists( 'grabgetgo_output_related_products' ) ) {
	
	function grabgetgo_output_related_products() {
		global $woocommerce;
		//echo $woocommerce->ajax_url();

		$args = array(
			'posts_per_page' => 10,
			'columns'        => 5,
			'orderby'        => 'rand', // @codingStandardsIgnoreLine.
		);

		woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
		
	}
}

if ( ! function_exists( 'grabgetgo_shop_messages' ) ) {
	
	function grabgetgo_shop_messages() {
		if ( ! is_checkout() ) {
			echo wp_kses_post( grabgetgo_do_shortcode( 'woocommerce_messages' ) );
		}
	}
}

if ( ! function_exists( 'grabgetgo_product_search' ) ) {
	
	function grabgetgo_product_search() {
		if ( grabgetgo_is_woocommerce_activated() ) { ?>
				<?php 
					//the_widget( 'WC_Widget_Product_Search', 'title=' ); 
				echo do_shortcode('[wcas-search-form]'); 
				?>
		<?php
		}
	}
}

function grabgetgo_catalog_orderby( $orderby ) {
	$orderby = array(
			'menu_order' => __( 'Default sorting', 'woocommerce' ),
			'popularity' => __( 'Popularity', 'woocommerce' ),
			'rating'     => __( 'Average rating', 'woocommerce' ),
			'date'       => __( 'Newest to oldest', 'woocommerce' ),
			'price'      => __( 'Price low to high', 'woocommerce' ),
			'price-desc' => __( 'Price high to low', 'woocommerce' )
	);
	return $orderby;
}

if ( ! function_exists( 'grabgetgo_header_cart' ) ) {
	
	function grabgetgo_header_cart() {
		if ( grabgetgo_is_woocommerce_activated() ) {
			global $woocommerce;
		?>
		
		<div class="header-wrapicon2">
			
			<!-- Header cart dropdown -->
			<div class="header-cart header-dropdown">
				<ul class="header-cart-wrapitem">
					<li class="header-cart-item">
						<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
					</li>
				</ul>
				<div class="header-cart-total">
					Total: <?php echo $woocommerce->cart->get_cart_total();?>
				</div>

				<div class="header-cart-buttons">
					<div class="header-cart-wrapbtn">
						<!-- Button -->
						<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
							View Cart
						</a>
					</div>
					
					<div class="header-cart-wrapbtn">
						<!-- Button -->
						<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
							Check Out
						</a>
					</div>
				</div>

			</div>

		</div>
		
		<?php
		}
	}
}

if(!function_exists('grabgetgo_cart_count')){

	function grabgetgo_cart_count() {
		if ( grabgetgo_is_woocommerce_activated() ) {
			global $woocommerce;
			
			if($woocommerce->cart->is_empty()) echo '0'; 
			else echo $woocommerce->cart->get_cart_contents_count();
		
		}
	}
	
}

if ( ! function_exists( 'grabgetgo_cart_link' ) ) {
	
	function grabgetgo_cart_link() {
		?>
			<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'storefront' ); ?>">
				<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'storefront' ), WC()->cart->get_cart_contents_count() ) );?></span>
			</a>
		<?php
	}
}


if ( ! function_exists( 'grabgetgo_template_loop_product_link_open' ) ) {
	
	function grabgetgo_template_loop_product_link_open() {
		global $product;

		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

		echo '<a href="' . esc_url( $link ) . '" class="">';
	}
}


if ( ! function_exists( 'grabgetgo_template_loop_product_link_close' ) ) {
	
	function grabgetgo_template_loop_product_link_close() {
		echo '</a>';
	}
}

if ( ! function_exists( 'grabgetgo_template_loop_add_to_cart' ) ) {
	
	function grabgetgo_template_loop_add_to_cart() {
		global $product;

		if ( $product ) {
			$defaults = array(
				'quantity'   => 1,
				'class'      => implode( ' ', array_filter( array(
					'btn btn-theme text-uppercase',
					'product_type_' . $product->get_type(),
					$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
					$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
				) ) ),
				'attributes' => array(
					'data-product_id'  => $product->get_id(),
					'data-product_sku' => $product->get_sku(),
					'aria-label'       => $product->add_to_cart_description(),
					'rel'              => 'nofollow',
				),
			);

			$args = apply_filters('woocommerce_loop_add_to_cart_args', wp_parse_args($args, $defaults), $product);
			$nonce = wp_create_nonce("ggg_quickview_nonce");
			?>

			<div class="action">
        <div class="btn-group btn-group-sm" role="group" aria-label="Action">
          <button class="btn btn-outline-theme gggQuickView" data-id="<?php echo $product->get_id(); ?>" data-nonce="<?php echo $nonce; ?>"><i class="fa fa-eye"></i></button>

					<?php wc_get_template( 'loop/add-to-cart.php', $args ); ?>

					<button class="btn btn-outline-theme"><i class="fa fa-heart-o"></i></button>
        </div>
      </div>
      
  	<?php
		}
	}
}

if( ! function_exists('grabgetgo_breadcrumbs') ){
	function grabgetgo_breadcrumbs() {
	    return array(
	            'delimiter'   => '&#47;',
	            'wrap_before' => '<ul class="breadcrumb">',
	            'wrap_after'  => '</ul>',
	            'before'      => '<li class="breadcrumb-item">',
	            'after'       => '</li>',
	            'home'        => _x( 'GrabGetGo', 'breadcrumb', 'grabgetgo' ),
	        );
	}
}

if( ! function_exists('grabgetgo_whatsapp_single_product') ){

	function grabgetgo_whatsapp_single_product() {
		wc_get_template( 'single-product/whatsapp.php' );
	}

}

if ( ! function_exists( 'grabgetgo_template_loop_product_thumbnail' ) ) {

	function grabgetgo_template_loop_product_thumbnail() {
		echo grabgetgo_get_product_thumbnail(); 
	}
}

if ( ! function_exists( 'grabgetgo_get_product_thumbnail' ) ) {

	function grabgetgo_get_product_thumbnail( $size = 'woocommerce_thumbnail') {
		global $product;

		$image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );

		return $product ? $product->get_image( $image_size, array('class'=>'img-fluid') ) : '';
	}
}

if ( ! function_exists( 'grabgetgo_template_loop_price' ) ) {

	function grabgetgo_template_loop_price() {
		wc_get_template( 'loop/price.php' );
	}
}



if ( ! function_exists( 'grabgetgo_template_loop_product_title' ) ) {

	function grabgetgo_template_loop_product_title() {
		echo get_the_title();
	}
}

if ( ! function_exists( 'grabgetgo_variable_price_html' ) ) {

	function grabgetgo_variable_price_html($price) {
		return '<li class="list-inline-item">'.$price.'</li>';
	}
}

if ( ! function_exists( 'grabgetgo_format_sale_price' ) ) {

	function grabgetgo_format_sale_price( $price, $regular_price, $sale_price ) { 
			$regular_price = floatval( strip_tags($regular_price) );
    	$sale_price = floatval( strip_tags($sale_price) );
	    $percentage = round( ( $regular_price - $sale_price ) / $regular_price * 100 ).'%';
    	$percentage_txt = __('-', 'grabgetgo' ).$percentage;
    	
    	$price = '<li class="list-inline-item">'.(is_numeric($sale_price) ? wc_price($sale_price) : $sale_price) .'</li>';
    	$price .='<li class="list-inline-item"><del class="text-muted small">'.(is_numeric($regular_price) ? wc_price($regular_price) : $regular_price). '</del></li>' ;
    	$price .= '<li class="list-inline-item d-none d-sm-inline-block"><span class="badge badge-theme">'.$percentage_txt.'</span></li>';

    	return $price;
	}

}