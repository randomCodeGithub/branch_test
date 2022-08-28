<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="format-detection" content="telephone=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	  <meta name="viewport" content="width=device-width, initial-scale=1" />
	  <link rel="profile" href="https://gmpg.org/xfn/11" />

		<?php wp_head(); ?>

		<?php get_template_part( 'template-parts/head', 'additional' ); ?>
	</head>
	<body <?php body_class(); ?>>

        <!-- Google Tag Manager (noscript) --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WLCSL4W"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><!-- End Google Tag Manager (noscript) -->

		<?php get_template_part( 'template-parts/browser-notification' ); ?>
		<div class="site-wrap">