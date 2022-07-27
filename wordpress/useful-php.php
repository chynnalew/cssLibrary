SHOW PAGE CONTENTS IN CUSTOM TEMPLATE
<?php
// TO SHOW THE PAGE CONTENTS
while (have_posts()) : the_post(); ?>
  <!--Because the_content() works only inside a WP Loop -->
  <div class="entry-content-page">
    <?php the_content(); ?>
    <!-- Page Content -->
  </div><!-- .entry-content-page -->

<?php
endwhile; //resetting the page loop
wp_reset_query(); //resetting the page query
?>

ADD SHORTCODE
<?php echo do_shortcode('[tribe_events]'); ?>


ADD JQUERY to custom JS
<?php
wp_enqueue_script( 'custom-scripts', get_stylesheet_directory_uri() . '/js/custom.js', array ('jquery'), 'v1.0', true);

jQuery(document).ready(function($){
	
})
?>

CONSOLE LOG
<?php 
function printToConsole($msg){
  echo "<script>console.log('" . json_encode($msg) . "');</script>";
}
?>


CONSOLE LOG WHICH TEMPLATE IS IN USE
<?php 
function print_which_template_is_loaded() {
  global $template;
  echo "<script>console.log('" . json_encode($template) . "');</script>";
};
add_action('wp_footer', 'print_which_template_is_loaded');
?>

ADD PAGINATION TO ARCHIVE PAGE
<?php echo paginate_links();?>

INTERNAL URLS
<a href="<?php echo esc_url( home_url() . "/end-of-url" ); ?>">My Site</a>

FONT AWESOME PSEUDO CLASS
add the following to functions.php wp_add_scripts

wp_enqueue_style('font-awesome-css', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css');