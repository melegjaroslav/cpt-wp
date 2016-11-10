<?php 
/**
 * Plugin Name: CPT holder
 * Description: Plugin for Custom Post Types
 * Version: 1.0
 * Author: Simple-task
 * License: GPL2
 */

add_action( 'init', 'my_custom_post_type' );

function my_custom_post_type() {
		include_once( 'post-args.php' );
}