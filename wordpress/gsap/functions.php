function theme_gsap_script() {
    wp_enqueue_script( 'gsap-js', 'http://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.1/TweenMax.min.js', array(), false, true );
    wp_enqueue_script( 'gsap-js-custom', get_stylesheet_directory_uri() . '/js/custom-gsap-scripts.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'theme_gsap_script' );