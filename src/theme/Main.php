<?php
namespace WpTheme;

use WpTheme\Core\Core;

class Main
{
    public static function Init()
    {
        Core::Init();

        static::RegisterActions();
        static::RegisterFilters();
    }

    static function RegisterActions()
    {
        add_action("wp_head", "WpTheme\Providers\Actions::WpHead");
        add_action("wp_body_open", "WpTheme\Providers\Actions::WpBodyOpen");
        add_action("wp_footer", "WpTheme\Providers\Actions::WpFooter");
        add_action("admin_head", "WpTheme\Providers\Actions::AdminHead");
        add_action("admin_footer", "WpTheme\Providers\Actions::AdminFooter");
        add_action("wp_before_admin_bar_render", "WpTheme\Providers\Actions::WpBeforeAdminBarRender");
        add_action("wp_dashboard_setup", "WpTheme\Providers\Actions::WpDashboardSetup");
        add_action("after_setup_theme", "WpTheme\Providers\Actions::AfterSetupTheme");
        add_action("init", "WpTheme\Providers\Actions::Init");
        add_action("rest_api_init", "WpTheme\Providers\Actions::RestApiInit");
        add_action("widgets_init", "WpTheme\Providers\Actions::WidgetsInit");
        add_action("wp_enqueue_scripts", "WpTheme\Providers\Actions::WpEnqueueScripts");
        add_action("carbon_fields_register_fields", "WpTheme\Providers\Actions::CarbonFieldsRegisterFields");
        add_action("carbon_fields_theme_options_container_saved", "WpTheme\Providers\Actions::CarbonFieldsThemeOptionsContainerSaved");
        add_action("admin_init", "WpTheme\Providers\Actions::AdminInit");
        add_action("admin_menu", "WpTheme\Providers\MenuPages::Init");

        add_action("desktop_menu", "WpTheme\Providers\CustomActions::DesktopMenu");
        add_action("mobile_menu", "WpTheme\Providers\CustomActions::MobileMenu");
    }

    static function RegisterFilters()
    {
        add_filter("the_content", "WpTheme\Providers\Filters::TheContent");
        add_filter("excerpt_length", "WpTheme\Providers\Filters::ExcerptLength", PHP_INT_MAX);
        add_filter("excerpt_more", "WpTheme\Providers\Filters::ExcerptEnding", PHP_INT_MAX);
        add_filter("block_categories_all", "WpTheme\Providers\Filters::BlockCategoriesAll", 10, 2);
        add_filter("login_enqueue_scripts", "WpTheme\Providers\Filters::LoginEnqueueScripts");
        add_filter("use_block_editor_for_post_type", "WpTheme\Providers\Filters::UseBlockEditorForPostType", 10, 2);
        add_filter("admin_footer_text", "WpTheme\Providers\Filters::AdminFooterText", 10, 1);
        add_filter("update_footer", "WpTheme\Providers\Filters::UpdateFooter", PHP_INT_MAX, 1);
        add_filter("block_editor_rest_api_preload_paths", "WpTheme\Providers\Filters::BlockEditorRestApiPreloadPaths", 10, 1);
        add_filter("upload_mimes", "WpTheme\Providers\Filters::UploadMimes", 10, 1);

        add_filter("desktop_menu", "WpTheme\Providers\CustomFilters::DesktopMenu");
        add_filter("mobile_menu", "WpTheme\Providers\CustomFilters::MobileMenu");
    }
}
