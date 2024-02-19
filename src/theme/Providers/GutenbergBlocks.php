<?php
namespace WpTheme\Providers;

use WpTheme\Core\GutenbergBlock;

class GutenbergBlocks
{
    static function Init()
    {
        // static::Container();
    }

    static function Container()
    {
        GutenbergBlock::Create(__("Example Container", WPTHEME_TEXTDOMAIN), "example_container", "example_container")->set_inner_blocks();
        Fields::BlockContainer();
    }
}
