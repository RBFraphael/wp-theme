<?php
/*
Plugin Name: Pro Features for ACF
Plugin URI: https://github.com/rbfraphael/pro-features-for-acf
Description: Bring the power of Advanced Custom Fields Pro to free version. You must have Advanced Custom Fields (free) installed and active to enjoy this plugin.
Version: 5.12.2
Author: RBFraphael
Author URI: https://github.com/rbfraphael/pro-features-for-acf
*/

if(!defined('ABSPATH')) exit;

if(!class_exists("FreeAcfProFeatures")){
    class FreeAcfProFeatures
    {

        function __construct()
        {
            $base_url = STARTERTHEME_URL."/includes/plugins/pro-features-for-acf/";
            $base_path = STARTERTHEME_PATH."/includes/plugins/pro-features-for-acf/";

            define("PFFA_URL", $base_url);
            define("PFFA_PATH", $base_path);
            define("PFFA_VERSION", "5.12.2");

            $this->plugin_init();
            $this->plugin_actions();
        }

        function plugin_init()
        {
            include_once(PFFA_PATH."/resources/blocks.php");
            include_once(PFFA_PATH."/resources/options-page.php");

            if(is_admin()){
                include_once(PFFA_PATH."/resources/admin/admin-options-page.php");
            }
        }

        function plugin_actions()
        {
            add_action("init", [$this, "register_assets"]);
            add_action("acf/include_field_types", [$this, "include_field_types"], 5);
            add_action("acf/include_location_rules", [$this, "include_location_rules"], 5);
            add_action("acf/input/admin_enqueue_scripts", [$this, "input_admin_enqueue_scripts"]);
            add_action("acf/field_group/admin_enqueue_scripts", [$this, "field_group_admin_enqueue_scripts"]);
        }

        function register_assets()
        {
            wp_register_script("acf-pro-input", PFFA_URL."/resources/assets/build/js/pro/acf-pro-input.min.js", ["acf-input"], PFFA_VERSION);
            wp_register_script("acf-pro-field-group", PFFA_URL."/resources/assets/build/js/pro/acf-pro-field-group.min.js", ["acf-field-group"], PFFA_VERSION);

            wp_register_style("acf-pro-input", PFFA_URL."/resources/assets/build/css/pro/acf-pro-input.min.css", ["acf-input"], PFFA_VERSION);
            wp_register_style("acf-pro-field-group", PFFA_URL."/resources/assets/build/css/pro/acf-pro-field-group.min.css", ["acf-input"], PFFA_VERSION);
        }

        function include_field_types()
        {
            include_once(PFFA_PATH."/resources/fields/class-acf-field-repeater.php");
		    include_once(PFFA_PATH."/resources/fields/class-acf-field-flexible-content.php");
		    include_once(PFFA_PATH."/resources/fields/class-acf-field-gallery.php");
		    include_once(PFFA_PATH."/resources/fields/class-acf-field-clone.php");
        }

        function include_location_rules()
        {
            include_once(PFFA_PATH."/resources/locations/class-acf-location-block.php");
		    include_once(PFFA_PATH."/resources/locations/class-acf-location-options-page.php");
        }

        function input_admin_enqueue_scripts()
        {
            wp_enqueue_script("acf-pro-input");
		    wp_enqueue_style("acf-pro-input");
        }

        function field_group_admin_enqueue_scripts()
        {
            wp_enqueue_script("acf-pro-field-group");
		    wp_enqueue_style("acf-pro-field-group");
        }
    }
}

new FreeAcfProFeatures();