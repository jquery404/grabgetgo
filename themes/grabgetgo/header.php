<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=9" />
	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="icon" type="image/png" href="<?php echo esc_url(get_template_directory_uri()); ?>/images/icons/favicon.png"/>
	
	<title><?php the_title(); ?></title>

	<meta name="google-site-verification" content="" />


	<meta name="description" content=""/>
	<meta name="keyword" content=""/> 


	<?php wp_head(); ?>

</head>

<body <?php body_class('animsition'); ?>>

	<?php 

	do_action( 'grabgetgo_header' );

	do_action( 'grabgetgo_header_mobile' );

	do_action( 'grabgetgo_content_top' );
