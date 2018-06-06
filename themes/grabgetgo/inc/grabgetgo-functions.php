<?php

if ( ! function_exists( 'grabgetgo_is_woocommerce_activated' ) ) {
	function grabgetgo_is_woocommerce_activated() {
		return class_exists( 'WooCommerce' ) ? true : false;
	}
}

function grabgetgo_post_pagination($args = [], $class = 'pagination') {

    if ($GLOBALS['wp_query']->max_num_pages <= 1) return;

    $args = wp_parse_args( $args, [
        'mid_size'           => 2,
        'prev_next'          => false,
        'prev_text'          => __('Prev', 'textdomain'),
        'next_text'          => __('Next', 'textdomain'),
        'screen_reader_text' => __('Posts navigation', 'textdomain'),
    ]);

    $links     = paginate_links($args);
    $next_link = get_previous_posts_link($args['next_text']);
    $prev_link = get_next_posts_link($args['prev_text']);
    $template  = apply_filters( 'grabgetgo_pagination_markup_template', '
    <nav class="navigation %1$s" role="navigation">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links">%3$s<div class="page-numbers-container">%4$s</div>%5$s</div>
    </nav>', $args, $class);

    echo sprintf($template, $class, $args['screen_reader_text'], $prev_link, $links, $next_link);

}


// Checks if the current page is a product archive
function grabgetgo_is_product_archive() {
	if ( grabgetgo_is_woocommerce_activated() ) {
		if ( is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag() ) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

/**
 * Call a shortcode function by tag name.
 *
 * @since  1.4.6
 *
 * @param string $tag     The shortcode whose function to call.
 * @param array  $atts    The attributes to pass to the shortcode function. Optional.
 * @param array  $content The shortcode's content. Default is null (none).
 *
 * @return string|bool False on failure, the result of the shortcode on success.
 */
function grabgetgo_do_shortcode( $tag, array $atts = array(), $content = null ) {
    global $shortcode_tags;

    if ( ! isset( $shortcode_tags[ $tag ] ) ) {
        return false;
    }

    return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
}