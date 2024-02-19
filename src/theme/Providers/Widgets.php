<?php
namespace WpTheme\Providers;

class Widgets
{
    static function Init()
    {
        register_widget("WpTheme\Widgets\Example");
    }
}
