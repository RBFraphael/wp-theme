<?php
namespace WpTheme\Providers;

use WpTheme\Core\Menu;

class CustomActions
{
    static function DesktopMenu()
    {
        echo apply_filters("desktop_menu_filter", Menu::GetContent("header"));
    }

    static function MobileMenu()
    {
        echo apply_filters("mobile_menu_filter", Menu::GetContent("header"));
    }
}
