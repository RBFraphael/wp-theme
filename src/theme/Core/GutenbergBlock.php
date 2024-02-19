<?php
namespace WpTheme\Core;

use Carbon_Fields\Block;

class GutenbergBlock
{
    private static $_BLOCKS = [];

    static function Create($title, $slug, $template)
    {
        $block = Block::make($title)->set_mode("both")->set_render_callback(function($fields, $attrs, $inner_blocks) use($template){
            Render::Block($template, $fields, $attrs, $inner_blocks);
        });

        static::$_BLOCKS[$slug] = $block;

        return $block;
    }

    static function Get($slug)
    {
        if(isset(static::$_BLOCKS[$slug])){
            return static::$_BLOCKS[$slug];
        }

        return false;
    }
}
