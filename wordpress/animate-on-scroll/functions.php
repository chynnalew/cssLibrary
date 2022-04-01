<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file. 
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

function generatepress_child_enqueue_scripts() {
	if ( is_rtl() ) {
		wp_enqueue_style( 'generatepress-rtl', trailingslashit( get_template_directory_uri() ) . 'rtl.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'generatepress_child_enqueue_scripts', 100 );

add_action( 'wp_enqueue_scripts', 'sk_enqueue_scripts' );

function sk_enqueue_scripts() {
  wp_enqueue_style('animate', '//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');
  wp_enqueue_style('wow-css', get_stylesheet_directory_uri() . '/css/animate.css', array(), true );
  wp_enqueue_script('wow', get_stylesheet_directory_uri() . '/js/wow.min.js', array(), true );
  wp_enqueue_script('custom-js-scripts', get_stylesheet_directory_uri() . '/js/custom.js', array(), true );
}