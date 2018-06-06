<?php 


/**
 * Header
 *
 */
//add_action( 'grabgetgo_header', 'grabgetgo_site_social',                    10 );
add_action( 'grabgetgo_header', 'grabgetgo_site_top_menu',                  	22 );
add_action( 'grabgetgo_header', 'grabgetgo_site_branding',                    25 );
//add_action( 'grabgetgo_header', 'grabgetgo_secondary_navigation',             30 );
//add_action( 'grabgetgo_header', 'grabgetgo_primary_navigation_wrapper',       42 );
//add_action( 'grabgetgo_header', 'grabgetgo_primary_navigation',               50 );
//add_action( 'grabgetgo_header', 'grabgetgo_primary_navigation_wrapper_close', 68 );


add_action( 'grabgetgo_header_mobile', 'grabgetgo_mobile_header_menu',    	10);


/**
 * Footer
 *
 */
add_action( 'grabgetgo_before_footer', 'grabgetgo_footer_quickview_modal', 10 );
add_action( 'grabgetgo_footer', 'grabgetgo_footer_widgets', 10 );


// General
add_action( 'grabgetgo_sidebar', 'grabgetgo_get_sidebar', 10 );


/**
 * Posts
 *
 */
add_action( 'grabgetgo_loop_before', 'grabgetgo_post_wrapper', 0 );
add_action( 'grabgetgo_loop_post', 'grabgetgo_post_header', 10 );
add_action( 'grabgetgo_loop_post', 'grabgetgo_post_meta', 20 );
add_action( 'grabgetgo_loop_post', 'grabgetgo_post_content', 30 );
add_action( 'grabgetgo_post_content_before', 'grabgetgo_post_thumbnail', 10 );
add_action( 'grabgetgo_loop_after', 'grabgetgo_paging_nav', 10 );


/**
 * Pages
 *
 */
add_action( 'grabgetgo_page', 'grabgetgo_page_header', 10 );
add_action( 'grabgetgo_page', 'grabgetgo_page_content', 20 );
add_action( 'grabgetgo_page_after', 'grabgetgo_display_comments', 10 );


/**
 * Homepage
 *
 */
add_action( 'grabgetgo_homepage', 'grabgetgo_main_page_content', 10 );

add_action( 'homepage', 'grabgetgo_homepage_content',      10 );
add_action( 'homepage', 'grabgetgo_homepage_product_wrap', 15 );
add_action( 'homepage', 'grabgetgo_product_categories',    20 );
add_action( 'homepage', 'grabgetgo_featured_products',     30 );
add_action( 'homepage', 'grabgetgo_recent_products',       40 );
add_action( 'homepage', 'grabgetgo_popular_products',      50 );
add_action( 'homepage', 'grabgetgo_on_sale_products',      60 );
add_action( 'homepage', 'grabgetgo_best_selling_products', 70 );
add_action( 'homepage', 'grabgetgo_instagram_sell_snapppt', 80 );

