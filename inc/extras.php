<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package QOD_Starter_Theme
 */

/**
 * Removes Comments from admin menu.
 */
function qod_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'qod_remove_admin_menus' );

/**
 * Removes comments support from Posts and Pages.
 */
function qod_remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
add_action( 'init', 'qod_remove_comment_support', 100 );

/**
 * Removes Comments from admin bar.
 */
function qod_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'qod_admin_bar_render' );

/**
 * Removes Comments-related metaboxes.
 */
 function qod_remove_comments_meta_boxes() {
	remove_meta_box( 'commentstatusdiv', 'post', 'normal' );
	remove_meta_box( 'commentsdiv', 'post', 'normal' );
	remove_meta_box( 'trackbacksdiv', 'post', 'normal' );
}
add_action( 'admin_init', 'qod_remove_comments_meta_boxes' );


/**
 * 1 post per page, and in a random order 
 */
function quotes_on_dev_main ( $query ) {
	if ( is_admin() || ! $query->is_main_query() )
			return;

	if ( is_home() ) {
            $query->set( 'posts_per_page', 1);
            $query->set ( 'orderby', 'rand');
      return;
	} 
}
add_action( 'pre_get_posts', 'quotes_on_dev_main', 1 );

/**
 * Enqueue and localize script:
 */ 
function qod_scripts() {
    wp_enqueue_style( 'qod-style', get_stylesheet_uri() );

	wp_enqueue_style( 'font-awesome' , 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );

	wp_enqueue_script( 'qod-starter-navigation', get_template_directory_uri() . '/build/js/navigation.min.js', array(), '20151215', true );
	wp_enqueue_script( 'qod-starter-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20151215', true );
	$script_url = get_template_directory_uri() . '/js/scripts.js';
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'qod_quotes', $script_url, array( 'jquery' ), false, true );
 
    wp_localize_script( 'qod_quotes', 'red_vars', array(
		 'rest_url' => esc_url_raw( rest_url() ),
		 'wpapi_nonce' => wp_create_nonce( 'wp_rest' ),
		 'post_id' => get_the_ID()
 ) );
 
}

add_action( 'wp_enqueue_scripts', 'qod_scripts' );