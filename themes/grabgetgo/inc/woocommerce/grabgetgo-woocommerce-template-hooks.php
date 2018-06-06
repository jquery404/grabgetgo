<?php 

// Custom INIT 
add_action( 'init', 'grabgetgo_taxonomy_color' );

// Add Tab and Save Product Meta Data 
add_filter( 'woocommerce_product_data_tabs', 'grabgetgo_product_meta_tab' , 99 , 1 );
add_action( 'woocommerce_product_data_panels', 'grabgetgo_product_meta_tab_field' );
add_action( 'woocommerce_process_product_meta_simple', 'grabgetgo_save_meta_tab_field' );
add_action( 'woocommerce_process_product_meta_variable', 'grabgetgo_save_meta_tab_field' );

add_filter( 'woocommerce_product_tabs', 'grabgetgo_single_product_tab' );
add_filter( 'woocommerce_product_tabs', 'grabgetgo_single_product_tabs_order' );


// Layouts
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
//remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
add_action( 'grabgetgo_content_top', 'grabgetgo_shop_messages', 15 );
add_action( 'grabgetgo_content_top', 'woocommerce_breadcrumb', 10 );



// Product Card View
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );


add_action( 'woocommerce_before_shop_loop_item', 'grabgetgo_template_loop_product_link_open', 10);
add_action( 'woocommerce_after_shop_loop_item', 'grabgetgo_template_loop_product_link_close', 5);
add_action( 'woocommerce_after_shop_loop_cart', 'grabgetgo_template_loop_add_to_cart', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'grabgetgo_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_shop_loop_item_title', 'grabgetgo_template_loop_product_title', 10);
add_action( 'woocommerce_after_shop_loop_item_title', 'grabgetgo_template_loop_price', 10 );

add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 10 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 20 );
add_filter( "woocommerce_catalog_orderby", "grabgetgo_catalog_orderby", 20 );
add_action( 'woocommerce_before_shop_loop', 'grabgetgo_woocommerce_pagination', 30 );


// Sale HTML Price Format
add_filter( 'woocommerce_format_sale_price', 'grabgetgo_format_sale_price', 10, 3);
add_filter( 'woocommerce_variable_price_html', 'grabgetgo_variable_price_html', 10, 3);


// Product Summary Box
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 15 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product_summary', 'grabgetgo_output_related_products', 20 );

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );


// Breadcrumbs
add_filter( 'woocommerce_breadcrumb_defaults', 'grabgetgo_breadcrumbs' );