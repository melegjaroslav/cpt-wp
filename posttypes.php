<?php 
/**
 * Plugin Name: CPT holder
 * Description: Plugin for Custom Post Types
 * Version: 1.0
 * Author: Simple-task
 * License: GPL2
 */

add_action( 'init', 'my_custom_post_type' );

//This function must always be last!
//Do NOT leave spaces after this function!
function my_custom_post_type() {
	require( 'post-args.php' );
}