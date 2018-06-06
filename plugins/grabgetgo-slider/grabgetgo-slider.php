<?php
/*
    Plugin Name: GrabGetGo Slider
    Description: This is a slider for GrabGetGo hompage
    Author: jQuery404
    Author URI: https://www.grabgetgo.com
    Version: 1.0
    Copyright: 2018 - GrabGetGo Inc.
*/


function ggg_slider_init() {
    $args = array(
        'public' => true,
        'label' => 'GGG Slider',
        'supports' => array(
            'title',
            'thumbnail',
            'author',
            'editor'
        )
    );
    register_post_type('ggg_slider_images', $args);
}

function ggg_slider_register_scripts() {
    if (!is_admin()) {
        wp_register_script('ggg_slider_script', plugins_url('script.js', __FILE__), array( 'jquery'), '1.0', true);

        wp_enqueue_script('ggg_slider_script');
    }
}

function ggg_slider_function($type='ggg_slider_function') {
    $args = array(
        'post_type' => 'ggg_slider_images',
        'posts_per_page' => 5
    );
    $result = '<div class="swiper-container home-slider">';
    $result .= '<div class="swiper-wrapper">';
 
    //the loop
    $loop = new WP_Query($args);
    while ($loop->have_posts()) {
        $loop->the_post();
 
        $the_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $type);
        $result .='<div class="swiper-slide" data-cover="'.$the_url[0].'" data-xs-height="220px" data-sm-height="350px" data-md-height="400px" data-lg-height="430px" data-xl-height="460px">';

        $result .= '<div class="swiper-overlay justify-content-center">';
        $result .= get_the_content();
        $result .= '</div>';
        $result .= '</div><!--/swiper-slider-->';
    }
    $result .='</div>';

    $result .= '<div class="swiper-pagination"></div>';
    $result .= '<div class="swiper-button-prev d-none d-sm-flex" id="home-slider-prev"><i class="material-icons md-3">keyboard_arrow_left</i></div>';
    $result .= '<div class="swiper-button-next d-none d-sm-flex" id="home-slider-next"><i class="material-icons md-3">keyboard_arrow_right</i></div>';
    $result .='</div>';
    
    return $result;
}

add_action('init', 'ggg_slider_init');
add_theme_support( 'post-thumbnails' );
add_image_size('ggg_slider_function', 1920, 1080, true);
add_action('wp_print_scripts', 'ggg_slider_register_scripts');
add_shortcode('ggg-slider', 'ggg_slider_function');

