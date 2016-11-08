<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       melegjaroslav.github.io
 * @since      1.0.0
 *
 * @package    Custom_Post_Types
 * @subpackage Custom_Post_Types/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Custom_Post_Types
 * @subpackage Custom_Post_Types/admin
 * @author     Jaroslav <jaroslav@pbssolutions.net>
 */
class Custom_Post_Types_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Custom_Post_Types_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Custom_Post_Types_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/custom-post-types-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Custom_Post_Types_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Custom_Post_Types_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/custom-post-types-admin.js', array( 'jquery' ), $this->version, false );

	}
	public function add_plugin_admin_menu() {

	    /*
	     * Add a settings page for this plugin to the Settings menu.
	     */
	    add_options_page( 'Custom Post Types', 'Custom Post Types', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')
	    );
	}
	public function add_action_links( $links ) {
	    /*
	    *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
	    */
	   $settings_link = array(
	    '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
	   );
	   return array_merge(  $settings_link, $links );
	}

	public function display_plugin_setup_page() {
    	include_once( 'partials/custom-post-types-admin-display.php' );
	}
	public function simple_validate($input) {
	    // All inputs        
	    $valid = array();

	    //custom_post_type
	    $valid['namepl'] = sanitize_text_field($input['namepl']);
	    $valid['slug'] = sanitize_text_field($input['slug']);
	    $valid['namesg'] = sanitize_text_field($input['namesg']);
	    $valid['description'] = sanitize_text_field($input['description']);
	    $valid['hierarchical'] = (isset($input['hierarchical']) && !empty($input['hierarchical'])) ? "true" : "false";
	    $valid['public'] = (isset($input['public']) && !empty($input['public'])) ? "true" : "false";
	    $valid['show-ui'] = (isset($input['show-ui']) && !empty($input['show-ui'])) ? "true" : "false";
	    $valid['show-in-nav-menus'] = (isset($input['show-in-nav-menus']) && !empty($input['show-in-nav-menus'])) ? "true" : "false";
	    $valid['show-in-menu'] = (isset($input['show-in-menu']) && !empty($input['show-in-menu'])) ? "true" : "false";
	    $valid['show-in-admin-bar'] = (isset($input['show-in-admin-bar']) && !empty($input['show-in-admin-bar'])) ? "true" : "false";
	    $valid['menu-position'] = sanitize_text_field($input['menu-position']);
	    $valid['can-export'] = (isset($input['can-export']) && !empty($input['can-export'])) ? "true" : "false";
	    $valid['has-archive'] = (isset($input['has-archive']) && !empty($input['has-archive'])) ? "true" : "false";
	    $valid['exclude-from-serach'] = (isset($input['exclude-from-serach']) && !empty($input['exclude-from-serach'])) ? "true" : "false";
	    $valid['publicly-queryable'] = (isset($input['publicly-queryable']) && !empty($input['publicly-queryable'])) ? "true" : "false";
	    $valid['capability-type'] = sanitize_text_field($input['capability-type']);
	    $valid['supports'] = $input['supports'];

	    return $valid;
	}

		function simple_register_single_posttype($input){

		if(!empty($input)){
			$name 			= $input['namepl'];
			$singular_name 	= $input['namesg'];

			$public 			= $input['public'];
			$publicly_queryable	= $input['publicly-queryable'];
			$show_ui			= $input['show-ui'];
			$show_in_menu		= $input['show-in-menu'];
			$show_in_nav_menus	= $input['show-in-nav-menus'];
			$menu_position		= $input['menu-position'];
			$exclude_from_search= $input['exclude-from-serach'];
			$cabability_type	= $input['capability-type'];
			$has_archive		= $input['has-archive'];
			$hierarchical		= $input['hierarchical'];
			
			$slug	= $input['slug'];
			
			$supports = $input['supports'];

			//Absolute path to post-args.php file
			$file = PATH_TO_PLUGIN . 'post-args.php';
			if (is_writable($file)) {
			    $current = file_get_contents($file);
			    $current .=  "\n" . "\t" . '$slug = ' .'"'. $slug .'"'. ";" . "\n" . "\n" . "\t" .

			    '$supports = ' .'"'. $supports .'"'. ";" . "\n" . "\n" . "\t" .
			    "\$supports = explode(', ',\$supports,10);" . "\n" . "\n" . "\t" .

				"\$labels = array(" . "\n". "\t" . "\t" .
		        '\''."name" . '\'' . '=>' . '\'' .$name . '\'' . ',' . "\n" . "\t" . "\t" .
		        '\''."singular-name" . '\'' . '=>' . '\'' .$singular_name. '\'' . ',' . "\n" . "\t" .
		    	");"  . "\n" . "\n" . "\t" .
			
			    "\$args = array(" . "\n" .  "\t" .  "\t" .
		        '\''."labels".'\''.' => ' . "\$labels" . ',' . "\n" .  "\t" . "\t" .
		        '\'' . "public" . '\'' . '=>' . $public . ',' . "\n" .  "\t" .  "\t" .
		        '\'' . "publicly_queryable" . '\'' . '=>' . $publicly_queryable. ',' . "\n" .  "\t" .  "\t" .
		        '\'' . "show_ui" . '\'' . '=>' .$show_ui. ',' . "\n" .  "\t" .  "\t" .
		        '\'' . "show_in_menu" . '\'' . '=>' .$show_in_menu. ',' . "\n" .  "\t" .  "\t" .
		        '\'' . "show_in_nav_menus" . '\'' . '=>' .$show_in_nav_menus. ',' . "\n" .  "\t" .  "\t" .
		        '\'' . "menu_position" . '\'' . '=>' .$menu_position. ',' . "\n" .  "\t" . "\t" .
		        '\'' . "query_var" . '\' => true,' . "\n" .  "\t" .  "\t" .
		        '\'' . "exclude_from_search" . '\'' . '=>' .$exclude_from_search. ',' . "\n" .  "\t" .  "\t" .
		        '\'' . "rewrite' => array( 'slug', 'member')," . "\n" .  "\t" .  "\t" .
		        '\'' . "cabability_type" . '\'' . '=>' . '\'' . $cabability_type. '\'' . ',' . "\n" .  "\t" .  "\t" .
		        '\'' . "has_archive" . '\'' . '=>' .$has_archive. ',' . "\n" . "\t" . "\t" .
		        '\'' . "hierarchical" . '\'' . '=>' .$hierarchical. ',' . "\n" . "\t" ."\t" .
		        '\'' . "supports" . '\'' . '=>' . "\$supports" . "\n" . "\t" .
		    	");" . "\n" . "\t" .

		    	"register_post_type(\$slug, \$args);" . "\n" ;
		    	


			    file_put_contents($file, $current);
			}
			else{
				die("Cannot Write To File");
			}
		}
	}
}

