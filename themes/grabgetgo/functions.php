<?php
/**
 * GrabGetGo engine room
 *
 */

$theme = wp_get_theme( 'grabgetgo' );
$grabgetgo_version = $theme['Version'];

// Set the content width based on the theme's design and stylesheet.
if (!isset($content_width)) {
	$content_width = 980; 
}

$grabgetgo = (object) array(
	'version' => $grabgetgo_version,
	'main'       => require 'inc/class-grabgetgo.php',
	'customizer' => require 'inc/customizer/class-grabgetgo-customizer.php',
);


require 'inc/grabgetgo-functions.php';
require 'inc/grabgetgo-template-hooks.php';
require 'inc/grabgetgo-template-functions.php';


if ( grabgetgo_is_woocommerce_activated() ) {
	$grabgetgo->woocommerce = require 'inc/woocommerce/class-grabgetgo-woocommerce.php';

	require 'inc/woocommerce/grabgetgo-woocommerce-template-hooks.php';
	require 'inc/woocommerce/grabgetgo-woocommerce-template-functions.php';
}