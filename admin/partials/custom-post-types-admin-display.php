<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       melegjaroslav.github.io
 * @since      1.0.0
 *
 * @package    Custom_Post_Types
 * @subpackage Custom_Post_Types/admin/partials
 */

	if ( ! empty( $_POST ) ) {
		include_once( 'admin/class-custom-post-types-admin.php' );
	    // Sanitize the POST field
	    $arr = $_POST['custom-post-types_'];

		$validatedData = Custom_Post_Types_Admin::simple_validate($arr);

		Custom_Post_Types_Admin::simple_register_single_posttype($validatedData);
		
		//Custom_Post_Types_Admin::simple_register_single_posttype($validatedData);
	}
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
    
    <form method="post" name="custom_post_type" action="">
    	<!-- Name PL -->
    	<fieldset>
    		<label for="<?php echo $this->plugin_name; ?>-namepl">
    			<input type="text" id="<?php echo $this->plugin_name; ?>-namepl" name="<?php echo $this->plugin_name; ?> [namepl]" value="">
    		</label>
    		<span><?php esc_attr_e('Name (plural)', $this->plugin_name); ?></span>
    	</fieldset>
    	<!-- Slug -->
    	<fieldset>
    		<label for="<?php echo $this->plugin_name; ?>-slug">
    			<input type="text" id="<?php echo $this->plugin_name; ?>-slug" name="<?php echo $this->plugin_name; ?> [slug]" value="">
    		</label>
    		<span><?php esc_attr_e('Slug', $this->plugin_name); ?></span>
    	</fieldset>
		<!-- Name SG -->
    	<fieldset>
    		<label for="<?php echo $this->plugin_name; ?>-namesg">
    			<input type="text" id="<?php echo $this->plugin_name; ?>-namesg" name="<?php echo $this->plugin_name; ?> [namesg]" value="">
    		</label>
    		<span><?php esc_attr_e('Name (singular)', $this->plugin_name); ?></span>
    	</fieldset>
		<!-- Description -->
    	<fieldset>
    		<label for="<?php echo $this->plugin_name; ?>-description">
    			<input type="text" id="<?php echo $this->plugin_name; ?>-description" name="<?php echo $this->plugin_name; ?> [description]" value="">
    		</label>
    		<span><?php esc_attr_e('Description', $this->plugin_name); ?></span>
    	</fieldset>
        <!-- Hierarchical -->
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-hierarchical">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-hierarchical" name="<?php echo $this->plugin_name; ?> [hierarchical]" value="true"/>
                <span><?php esc_attr_e('Hierarchical', $this->plugin_name); ?></span>
            </label>
        </fieldset>
        <!-- Public -->
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-public">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-public" name="<?php echo $this->plugin_name; ?> [public]" value="true"/>
                <span><?php esc_attr_e('public', $this->plugin_name); ?></span>
            </label>
        </fieldset>
		<!-- Show UI-->
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-show-ui">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-show-ui" name="<?php echo $this->plugin_name; ?> [show-ui]" value="true"/>
                <span><?php esc_attr_e('show-ui', $this->plugin_name); ?></span>
            </label>
        </fieldset>
		<!-- Show In Menu-->
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-show-in-menu">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-show-in-menu" name="<?php echo $this->plugin_name; ?> [show-in-menu]" value="true"/>
                <span><?php esc_attr_e('show-in-menu', $this->plugin_name); ?></span>
            </label>
        </fieldset>
		<!-- Show In Nav Menus-->
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-show-in-nav-menus">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-show-in-nav-menus" name="<?php echo $this->plugin_name; ?> [show-in-nav-menus]" value="true"/>
                <span><?php esc_attr_e('show-in-nav-menus', $this->plugin_name); ?></span>
            </label>
        </fieldset>
		<!-- Show In Admin Bar-->
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-show-in-admin-bar">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-show-in-admin-bar" name="<?php echo $this->plugin_name; ?> [show-in-admin-bar]" value="true"/>
                <span><?php esc_attr_e('show-in-admin-bar', $this->plugin_name); ?></span>
            </label>
        </fieldset>
		<!-- Menu Position-->
		<fieldset>
    		<label for="<?php echo $this->plugin_name; ?>-menu-position">
    			<input type="number" step="1" min="0" id="<?php echo $this->plugin_name; ?>-menu-position" name="<?php echo $this->plugin_name; ?> [menu-position]" value="1">
    		</label>
    		<span><?php esc_attr_e('menu-position (int)', $this->plugin_name); ?></span>
    	</fieldset>
		<!-- Can Export-->
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-can-export">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-can-export" name="<?php echo $this->plugin_name; ?> [can-export]" value="true"/>
                <span><?php esc_attr_e('can-export', $this->plugin_name); ?></span>
            </label>
        </fieldset>
		<!-- Has Archive-->
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-has-archive">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-has-archive" name="<?php echo $this->plugin_name; ?> [has-archive]" value="true"/>
                <span><?php esc_attr_e('has-archive', $this->plugin_name); ?></span>
            </label>
        </fieldset>
		<!-- Exclude From Search-->
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-exclude-from-serach">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-exclude-from-serach" name="<?php echo $this->plugin_name; ?> [exclude-from-serach]" value="true"/>
                <span><?php esc_attr_e('exclude-from-serach', $this->plugin_name); ?></span>
            </label>
        </fieldset>
		<!-- Publicly Queryable-->
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-publicly-queryable">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-publicly-queryable" name="<?php echo $this->plugin_name; ?> [publicly-queryable]" value="true"/>
                <span><?php esc_attr_e('publicly-queryable', $this->plugin_name); ?></span>
            </label>
        </fieldset>
		<!-- Capability Type -->
		<fieldset>
    		<label for="<?php echo $this->plugin_name; ?>-capability-type">
    			<input type="text" id="<?php echo $this->plugin_name; ?>-capability-type" name="<?php echo $this->plugin_name; ?> [capability-type]" value="post">
    		</label>
    		<span><?php esc_attr_e('capability-type', $this->plugin_name); ?></span>
    	</fieldset>
         <!-- Supports -->
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-supports">
                <input type="text" id="<?php echo $this->plugin_name; ?>-supports" name="<?php echo $this->plugin_name; ?> [supports]" value="'title', 'editor', 'thumbnail'">
            </label>
            <span><?php esc_attr_e('supports', $this->plugin_name); ?></span>
        </fieldset> 

    	<?php submit_button('Create', 'primary','submit', TRUE); ?>

    </form>
</div>


