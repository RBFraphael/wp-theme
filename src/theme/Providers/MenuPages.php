<?php
namespace WpTheme\Providers;

class MenuPages
{
    static function Init()
    {
        static::DatabaseMigrations();
    }

    static function DatabaseMigrations()
    {
        add_submenu_page("options-general.php", __("Database Migrations", WPTHEME_TEXTDOMAIN), __("Database Migrations", WPTHEME_TEXTDOMAIN), "manage_options", "database-migrations", "\WpTheme\Callbacks\MenuPages::DatabaseMigrations");
    }

}
