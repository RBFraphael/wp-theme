<?php

class Provider_Blocks
{
    public function __construct()
    {
        $this->callbacks = new Callbacks_Blocks();
        $this->fields = new Provider_Fields();
    }

    public function container()
    {
        startertheme_register_block([
            'name' => "starter-theme-container",
            'title' => __("Container", "starter-theme"),
            'description' => __("Container", "starter-theme"),
            'category' => "starter-theme",
            'icon' => "grid-view",
            'render_callback' => [$this->callbacks, "container"],
            'mode' => "preview",
            'supports' => [
                'align' => true,
                'mode' => false,
                'jsx' => true
            ],
            'enqueue_assets' => function(){
                wp_enqueue_style("theme-main");
            }
        ]);
        
        $this->fields->block_container();
    }
}