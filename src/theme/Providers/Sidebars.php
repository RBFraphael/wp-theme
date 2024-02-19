<?php
namespace WpTheme\Providers;

class Sidebars
{
    static function Init()
    {
        self::Blog();
        self::Home();
    }

    static function Blog()
    {
        register_sidebar([
            'name' => __("Blog Sidebar", WPTHEME_TEXTDOMAIN),
            "id" => "blog"
        ]);
    }

    static function Home()
    {
        register_sidebar([
            'name' => __("Home Sidebar", WPTHEME_TEXTDOMAIN),
            "id" => "home"
        ]);
    }
}
