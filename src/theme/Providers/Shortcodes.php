<?php
namespace WpTheme\Providers;

class Shortcodes
{
    static function Init()
    {
        self::ExampleShortcode();
    }

    static function ExampleShortcode()
    {
        add_shortcode("example-shortcode", "WpTheme\Callbacks\Shortcodes::ExampleShortcode");
    }
}
