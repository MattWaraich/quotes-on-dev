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

// MODIFY DEFAULT WP QUERY TO GENERATE RANDOM 
function qod_modify_archives( $query ){
// modify the blog index and single posts
if( 
    ( is_home() || is_single() )
    &&!is_admin() &&  $query->is_main_query()
    )
    {
        $query->set( 'orderby', 'rand');
        $query->set( 'post_per_page', 1 );
    } 
// MODIFY CATEGORIES, DEFAULT ARCHIVES
    if(
        ( is_archive() ) && !is_admin() && $query->is_main_query()
    )
    {
        $query->set( 'post_per_page', 5 );
    }
}
// THIS HOOK ALLOWS YOU TO MODIFY SEARCH RESULTS PAGE
add_action( 'pre_get_posts', 'qod_modify_archives' );