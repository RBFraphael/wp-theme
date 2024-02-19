<?php
namespace WpTheme\Widgets;

use Carbon_Fields\Field\Field;
use Carbon_Fields\Widget\Widget;
use WpTheme\Core\Render;

class Example extends Widget
{
    function __construct()
    {
        $this->setup("example_widget", __("Example Widget", WPTHEME_TEXTDOMAIN), __("An example widget", WPTHEME_TEXTDOMAIN), [
            Field::make("text", "title", __("Title", WPTHEME_TEXTDOMAIN))->set_default_value("Lorem Ipsum"),
            Field::make("textarea", "text", __("Text", WPTHEME_TEXTDOMAIN))->set_default_value("Ullamco ex ea dolore consequat deserunt non. Aliquip culpa enim occaecat dolore proident reprehenderit dolore mollit qui. Nulla ea sint amet laborum consectetur aute qui labore."),
        ]);
    }

    function front_end($args, $instance)
    {
        Render::Widget("example", $args, $instance);
    }
}
