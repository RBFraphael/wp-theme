<?php

class Provider_Actions
{
    public function wp_head()
    {
        ?>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

        <script>
            console.log("Code ran into frontend's head.");
        </script>
        <?php
    }

    public function wp_footer()
    {
        ?>
        <script>
            console.log("Code ran into frontend's footer.");
        </script>
        <?php
    }

    public function admin_head()
    {
        ?>
        <script>
            console.log("Code ran into admin's head.");
        </script>
        <?php
    }

    public function admin_footer()
    {
        ?>
        <script>
            console.log("Code ran into admin's footer.");
        </script>
        <?php
    }

    public function after_setup_theme()
    {
        // Set theme textdomain (language) directory
        load_theme_textdomain("starter-theme", STARTERTHEME_PATH."/lang");

        // Set theme supported features
        add_theme_support("automatic-feed-links");
        add_theme_support("html5");
        add_theme_support("menus");
        add_theme_support("post-thumbnails");
        add_theme_support("responsive-embeds");
        add_theme_support("title-tag");

        // Register nav menus
        register_nav_menu("header", __("Header Menu", "starter-theme"));
        register_nav_menu("footer", __("Footer Menu", "starter-theme"));
    }

    public function init()
    {
        // Register custom post types
        $cpts = new Provider_PostTypes();

        // Register taxonomies
        $taxonomies = new Provider_Taxonomies();

        // Register shortcodes
        $shortcodes = new Provider_Shortcodes();
    }

    public function rest_api_init()
    {
        // Register custom Rest API endpoints
        $restapi = new Provider_RestAPI();
    }

    public function widgets_init()
    {
        // Register sidebars
        $sidebars = new Provider_Sidebars();
    }

    public function wp_enqueue_scripts()
    {
        // Register assets
        $assets = new Provider_Assets();
    }

    public function admin_enqueue_scripts()
    {
        // Register admin assets
        $assets = new Provider_AdminAssets();
    }

    public function acf_init()
    {
        // Register options pages
        $options_pages = new Provider_OptionsPages();

        // Register Gutenberg blocks
        $blocks = new Provider_Blocks();

        // Register ACF fields
        $fields = new Provider_Fields();
    }

    public function acf_save_post($post_id)
    {
        if($post_id == "options"){
            
            // Update site's favicon
            $favicon_id = get_field("favicon", "options");
            update_option("site_icon", $favicon_id);

        }
    }
}