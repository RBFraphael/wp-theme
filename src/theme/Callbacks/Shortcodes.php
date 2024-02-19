<?php
namespace WpTheme\Callbacks;

use WpTheme\Core\Render;

class Shortcodes
{
    static function Example($attrs, $content = "")
    {
        return Render::Shortcode("example", $attrs, $content);
    }
}
