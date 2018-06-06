<?php
/*
    Plugin Name: GrabGetGo Product
    Description: This is a product enhancement plugin for GrabGetGo shop
    Author: jQuery404
    Author URI: https://www.grabgetgo.com
    Version: 1.0
    Copyright: 2018 - GrabGetGo Inc.
*/


function ggg_product_register_scripts() {

    if (!is_admin()) {
        wp_register_script('ggg_product_script', plugins_url('script.js', __FILE__), array( 'jquery'), '1.0', true);
        wp_localize_script( 'ggg_product_script', 'gggproductajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
        wp_enqueue_script('ggg_product_script');
    }
}

function ggg_quickview_ajaxhandler() 
{
    if ( !wp_verify_nonce( $_GET['nonce'], "ggg_quickview_nonce")) {
        exit("Wrong nonce");
    }

    $results = '';
 		$product = wc_get_product( $_GET['product_id'] );

    if (!$product->is_in_stock()) 
 			$results .= '<a href="'. get_permalink($product->id).'" class="button">Out of Stock</a>';
 		else
 		{
			$link = array(
			  'url'   => '',
			  'label' => '',
			  'class' => ''
			);

			switch ( $product->product_type ) {
        case "variable" :
            $link['url']    = get_permalink( $product->id );
            $link['label']  = 'Select options';
        break;
        case "grouped" :
            $link['url']    = get_permalink( $product->id );
            $link['label']  = 'View options';
        break;
        case "external" :
            $link['url']    = get_permalink( $product->id );
            $link['label']  = 'Read More';
        break;
        default :
            if ( $product->is_purchasable() ) {
                $link['url']    = esc_url( $product->add_to_cart_url() );
                $link['label']  = 'Add to cart';
                $link['class']  = 'add_to_cart_button';
            } else {
                $link['url']    = get_permalink( $product->id );
                $link['label']  = 'Read More';
            }
        break;
    	}

    	$galleryImg = '';
    	$attachment_ids = $product->get_gallery_attachment_ids();
	    
	    foreach( $attachment_ids as $attachment_id ){
	    	$galleryImg .= '<div class="swiper-slide"><img src="'.wp_get_attachment_url( $attachment_id ).'" alt="image" class="w-100"/></div>';
	    }

	    $html .= '<div class="modal-header">
        <h5 class="modal-title font-weight-normal" id="quickviewModalLabel">
        	<a href="'.get_permalink($product->id).'" class="text-dark">'.$product->get_name().'</a>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
      </div>';

      $html .= '
      <div class="modal-body px-0">
        <div class="container-fluid">
          <div class="row compact">

            <div class="col col-sm-6">
              <div class="swiper-container" id="quickview-slider">
                <div class="swiper-wrapper">'.$galleryImg.'</div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev d-none d-sm-flex" id="quickview-prev"><i class="material-icons md-3">keyboard_arrow_left</i></div>
                <div class="swiper-button-next d-none d-sm-flex" id="quickview-next"><i class="material-icons md-3">keyboard_arrow_right</i></div>
              </div>
            </div>

            <div class="col col-sm-6">
              <div class="list-detail">
                <div>Price</div>
                <div>'.$product->get_price_html().'</div>
              </div>';

          

    	if ( $product->product_type == 'simple' ) {

        $html .= '<form action="'.esc_url( $product->add_to_cart_url() ).'" class="cart" method="post" enctype="multipart/form-data">';
        $html .= sprintf( '<button type="submit" data-product_id="%s" data-product_sku="%s" data-quantity="1" class="%s button product_type_simple">%s</button>', esc_attr( $product->id ), esc_attr( $product->get_sku() ), esc_attr( $link['class'] ), esc_html( $link['label'] ) );
          
        $html .= '</form>';

      }
      else
      {
      	$html .= sprintf('<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="%s button product_type_%s">%s</a>', esc_url( $link['url'] ), esc_attr( $product->id ), esc_attr( $product->get_sku() ), esc_attr( $link['class'] ), esc_attr( $product->product_type ), esc_html( $link['label'] ));
       
      }

     $html.='</div>
      		</div>	
        </div>
      </div>';
      

	    $results = $html;
 		}
 		
 
    die($results);
}

function ggg_show_quickview(){
 
    $results ='';
    $nonce = wp_create_nonce("ggg_quickview_nonce");
		$link = '<span class="gggQuickView" data-id="161" data-nonce="'.$nonce.'">Plastic Rice Dispenser 15 KG</span>';
 
    $result.= '<div>' . $link . '</div>';
 
    return $result;
}

function ggg_quickview_shortcode( $atts ){
    return ggg_show_quickview();
}


add_shortcode('ggg-quickview', 'ggg_quickview_shortcode' );
add_action('wp_print_scripts', 'ggg_product_register_scripts');

add_action('wp_ajax_nopriv_ggg_quickview_ajaxhandler', 'ggg_quickview_ajaxhandler');
add_action('wp_ajax_ggg_quickview_ajaxhandler', 'ggg_quickview_ajaxhandler');

