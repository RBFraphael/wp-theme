<?php
namespace WpTheme\Providers;

class Actions
{
    static function WpHead()
    {
        ?>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
        <?php
    }

    static function WpBodyOpen()
    {
        ?>
        <?php
    }

    static function WpFooter()
    {
        ?>
        <?php
    }

    static function AdminHead()
    {
        ?>
        <style>
            body.gutenberg-editor-page .editor-post-title__block, body.gutenberg-editor-page .editor-default-block-appender, body.gutenberg-editor-page .editor-block-list__block {
                max-width: none !important;
            }
            .block-editor__container .wp-block {
                max-width: none !important;
            }
            /*code editor*/
            .edit-post-text-editor__body {
                max-width: none !important;	
                margin-left: 2%;
                margin-right: 2%;
            }
        </style>
        <?php
    }

    static function AdminFooter()
    {
        ?>
        <?php
    }

    static function WpBeforeAdminBarRender()
    {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu("wp-logo");
    }

    static function WpDashboardSetup()
    {
        // $metaboxes = [
        //     ["dashboard_activity", "dashboard", "normal"],
        //     ["dashboard_site_health", "dashboard", "normal"],
        //     ["dashboard_recent_comments", "dashboard", "normal"],
        //     ["dashboard_quick_press", "dashboard", "side"],
        //     ["dashboard_incoming_links", "dashboard", "normal"],
        //     ["dashboard_plugins", "dashboard", "normal"],
        //     ["dashboard_primary", "dashboard", "side"],
        //     ["dashboard_secondary", "dashboard", "side"],
        //     ["dashboard_recent_drafts", "dashboard", "side"],
        //     ["dashboard_right_now", "dashboard", "normal"],
        //     ["yoast_db_widget", "dashboard", "normal"],
        //     ["wpseo-dashboard-overview", "dashboard", "normal"]
        // ];

        // foreach($metaboxes as $metabox){
        //     remove_meta_box($metabox[0], $metabox[1], $metabox[2]);
        // }

        remove_action("welcome_panel", "wp_welcome_panel");
    }

    static function AfterSetupTheme()
    {
        load_theme_textdomain(WPTHEME_TEXTDOMAIN, WPTHEME_PATH."/src/languages");

        add_theme_support("align-wide");
        add_theme_support("automatic-feed-links");
        add_theme_support("dark-editor-style");
        add_theme_support("html5", ["comment-list", "comment-form", "search-form", "gallery", "caption", "style", "script"]);
        add_theme_support("menus");
        add_theme_support("post-thumbnails");
        add_theme_support("responsive-embeds");
        add_theme_support("title-tag");

        /**
         * Based on Flat UI Colors Palette V1
         * https://flatuicolors.com/palette/defo
         */
        add_theme_support("editor-color-palette", [
            [ 'name' => __("Turquoise"), 'slug' => "turquoise", 'color' => "#1abc9c" ],
            [ 'name' => __("Emerald"), 'slug' => "emerald", 'color' => "#2ecc71" ],
            [ 'name' => __("Peterriver"), 'slug' => "peterriver", 'color' => "#3498db" ],
            [ 'name' => __("Amethyst"), 'slug' => "amethyst", 'color' => "#9b59b6" ],
            [ 'name' => __("Wetasphalt"), 'slug' => "wetasphalt", 'color' => "#34495e" ],
            [ 'name' => __("Greensea"), 'slug' => "greensea", 'color' => "#16a085" ],
            [ 'name' => __("Nephritis"), 'slug' => "nephritis", 'color' => "#27ae60" ],
            [ 'name' => __("Belizehole"), 'slug' => "belizehole", 'color' => "#2980b9" ],
            [ 'name' => __("Wisteria"), 'slug' => "wisteria", 'color' => "#8e44ad" ],
            [ 'name' => __("Midnightblue"), 'slug' => "midnightblue", 'color' => "#2c3e50" ],
            [ 'name' => __("Sunflower"), 'slug' => "sunflower", 'color' => "#f1c40f" ],
            [ 'name' => __("Carrot"), 'slug' => "carrot", 'color' => "#e67e22" ],
            [ 'name' => __("Alizarin"), 'slug' => "alizarin", 'color' => "#e74c3c" ],
            [ 'name' => __("Clouds"), 'slug' => "clouds", 'color' => "#ecf0f1" ],
            [ 'name' => __("Concrete"), 'slug' => "concrete", 'color' => "#95a5a6" ],
            [ 'name' => __("Orange"), 'slug' => "orange", 'color' => "#f39c12" ],
            [ 'name' => __("Pumpkin"), 'slug' => "pumpkin", 'color' => "#d35400" ],
            [ 'name' => __("Pomegranate"), 'slug' => "pomegranate", 'color' => "#c0392b" ],
            [ 'name' => __("Silver"), 'slug' => "silver", 'color' => "#bdc3c7" ],
            [ 'name' => __("Asbestos"), 'slug' => "asbestos", 'color' => "#7f8c8d" ]
        ]);

        register_nav_menu("primary", __("Primary Menu", WPTHEME_TEXTDOMAIN));
        register_nav_menu("secondary", __("Secondary Menu", WPTHEME_TEXTDOMAIN));
    }

    static function Init()
    {
        PostTypes::Init();
        Taxonomies::Init();
        Shortcodes::Init();
    }

    static function RestApiInit()
    {
        RestApis::Init();
    }

    static function WidgetsInit()
    {
        Sidebars::Init();
        Widgets::Init();
    }

    static function WpEnqueueScripts()
    {
        Assets::Init();
    }

    static function CarbonFieldsRegisterFields()
    {
        Fields::Init();
        OptionsPages::Init();
        GutenbergBlocks::Init();
    }

    static function CarbonFieldsThemeOptionsContainerSaved()
    {
        $favicon = intval(carbon_get_theme_option("favicon"));
        update_option("site_icon", $favicon);
    }

    static function AdminInit()
    {
        $post_id = null;
        
        if(isset($_GET['post'])){
            $post_id = $_GET['post'];
        } else if(isset($_POST['post_ID'])){
            $post_id = $_POST['post_ID'];
        }
        
        if(!isset($post_id)) return;

        $template = get_page_template_slug($post_id);

        $templates = [
            "templates/template-example.php"
        ];

        if(in_array($template, $templates)){
            remove_post_type_support("page", "editor");
        }
    }
}
