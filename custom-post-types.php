<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              melegjaroslav.github.io
 * @since             1.0.0
 * @package           Custom_Post_Types
 *
 * @wordpress-plugin
 * Plugin Name:       CPT Generator
 * Description:       Add custom post types.
 * Version:           1.0.0
 * Author:            Jaroslav Meleg
 * Author URI:        melegjaroslav.github.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       custom-post-types
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-custom-post-types-activator.php
 */
function activate_custom_post_types() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-post-types-activator.php';
	Custom_Post_Types_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-custom-post-types-deactivator.php
 */
function deactivate_custom_post_types() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-post-types-deactivator.php';
	Custom_Post_Types_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_custom_post_types' );
register_deactivation_hook( __FILE__, 'deactivate_custom_post_types' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-custom-post-types.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_custom_post_types() {

	$plugin = new Custom_Post_Types();
	$plugin->run();

}
run_custom_post_types();

define('PATH_TO_PLUGIN', plugin_dir_path( __FILE__ ));
