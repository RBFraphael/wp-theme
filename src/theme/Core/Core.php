<?php
namespace WpTheme\Core;

use Carbon_Fields\Carbon_Fields;
use Illuminate\Database\Capsule\Manager;

class Core
{
    public static function Init()
    {
        add_action("init", "WpTheme\Core\Core::InitEloquent");
        add_action("after_setup_theme", "WpTheme\Core\Core::BootCarbonFields");
        add_action("after_switch_theme", "WpTheme\Core\Core::InitMigrations");

        static::RemapTemplates();

        add_action("get_html_start", "WpTheme\Core\Core::GetHtmlStart", 10, 2);
        add_action("get_header", "WpTheme\Core\Core::GetHeader", 10, 2);
        add_action("get_footer", "WpTheme\Core\Core::GetFooter", 10, 2);
        add_action("get_html_end", "WpTheme\Core\Core::GetHtmlEnd", 10, 2);
        add_action("get_search_form", "WpTheme\Core\Core::GetSearchForm");
    }

    static function BootCarbonFields()
    {
        define("Carbon_Fields\URL", get_template_directory_uri()."/vendor/htmlburger/carbon-fields/");
        Carbon_Fields::boot();
    }

    static function InitMigrations()
    {
        $wrapper = new PhinxWrapper();
        $wrapper->migrate();
    }

    static function InitEloquent()
    {
        global $wpdb;

        $dbManager = new Manager();
        $dbManager->addConnection([
            'driver' => "mysql",
            'host' => DB_HOST,
            'database' => DB_NAME,
            'username' => DB_USER,
            'password' => DB_PASSWORD,
            'prefix' => $wpdb->prefix,
        ]);
        $dbManager->setAsGlobal();
        $dbManager->bootEloquent();
    }

    static function RemapTemplates()
    {
        $templates = [
            "404", "archive", "attachment", "author", "category", "date", "embed", "frontpage", "home", "index", "page", "paged", "privacypolicy", "search", "single", "singular", "tag", "taxonomy"
        ];
        foreach($templates as $template){
            add_filter($template."_template_hierarchy", "WpTheme\Core\Core::TemplateHierarchy");
        }
    }

    static function TemplateHierarchy($templates)
    {
        $templates_dir = "views/";
        $base_dir = WPTHEME_PATH."/".$templates_dir;

        $templates = array_map(function($template) use($base_dir, $templates_dir){
            if(file_exists($base_dir.$template)){
                return $templates_dir.$template;
            }
            return $template;
        }, $templates);

        return $templates;
    }

    static function GetHtmlStart()
    {
        get_template_part("views/partials/html", "start");
    }

    static function GetHeader($name = null, $args = [])
    {
        get_template_part("views/partials/header", $name, $args);
    }

    static function GetFooter($name = null, $args = [])
    {
        get_template_part("views/partials/footer", $name, $args);
    }

    static function GetHtmlEnd()
    {
        get_template_part("views/partials/html", "end");
    }

    static function GetSearchForm()
    {
        get_template_part("views/partials/searchform");
    }
    
}
