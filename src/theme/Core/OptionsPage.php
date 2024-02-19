<?php
namespace WpTheme\Core;

use Carbon_Fields\Container\Container;

class OptionsPage
{
    private static $_PAGES = [];

    static function Create($title, $slug)
    {
        $page = Container::make("theme_options", $title)->set_page_file($slug);

        static::$_PAGES[$slug] = $page;

        return $page;
    }

    static function CreateChild($title, $slug, $parent_slug)
    {
        if($parent = static::$_PAGES[$parent_slug]){
            $page = Container::make("theme_options", $title)->set_page_file($slug);
            $page->set_page_parent($parent);
            
            static::$_PAGES[$slug] = $page;

            return $page;
        }

        return false;
    }

    static function Get($slug)
    {
        if(isset(static::$_PAGES[$slug])){
            return static::$_PAGES[$slug];
        }

        return false;
    }
}
