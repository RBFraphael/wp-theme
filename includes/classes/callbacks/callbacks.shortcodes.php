<?php

class Callbacks_Shortcodes
{
    public function example_shortcode($attrs, $content = "")
    {
        return startertheme_render_block("example", $attrs, $content);
    }
}