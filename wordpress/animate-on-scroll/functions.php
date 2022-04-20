<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file. 
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

//* Enqueue Custom.js Animate.CSS and WOW.js 
add_action( 'wp_enqueue_scripts', 'gp_enqueue_scripts' );

function gp_enqueue_scripts() {
  wp_enqueue_style('animate', '//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');
  wp_enqueue_style('wow-css', get_stylesheet_directory_uri() . '/css/animate.css', array(), '1.0', false );
  wp_enqueue_script('wow', get_stylesheet_directory_uri() . '/js/wow.min.js', array(), '1.0', false);
	wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', array(), '', true );
  
};