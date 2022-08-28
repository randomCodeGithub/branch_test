<?php

function theme_assets() {

    wp_enqueue_style( 'child-style', URL_THEME . '/assets/css/main.css', array(), VER );
    wp_enqueue_script( 'child-script', URL_THEME . '/assets/main.js', array( 'jquery' ), VER, true );



    // PHP variables to script
    $php_vars = array(
        'theme_url' => URL_THEME,
        'str_more_numbers' => __( 'Veel numbreid', 'default' ),
        'str_search'       => __( 'Otsing', 'default' )
    );

    wp_localize_script( 'child-script', 'php', $php_vars );

}

add_action( 'wp_enqueue_scripts', 'theme_assets', 99 );



/**
 * Add 'async' and 'defer' attributes to selected scripts.
 * 
 * @param string $tag
 * @param string $handle
 * @param string $src
 * 
 * @return string
 */
function async_scripts( $tag, $handle, $src ) {

	if ( $handle !== 'google-maps' ) {
		return $tag;
	}

	return '<script src="' . $src . '" async defer></script>';

}

add_filter( 'script_loader_tag', 'async_scripts', 10, 3 );


function remove_default_stylesheet() {

    wp_dequeue_style( 'bootstrap-grid' );
    wp_deregister_style( 'bootstrap-grid' );

}

add_action( 'wp_enqueue_scripts', 'remove_default_stylesheet', 100 );