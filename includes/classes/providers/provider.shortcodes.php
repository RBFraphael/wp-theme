<?php

class Provider_Shortcodes
{
    public function __construct()
    {
        $this->callbacks = new Callbacks_Shortcodes();

        $this->example_shortcode();
    }

    public function example_shortcode()
    {
        add_shortcode("example-shortcode", [$this->callbacks, "example_shortcode"]);
    }
}