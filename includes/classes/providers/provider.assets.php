<?php

class Provider_Assets
{
    public function __construct()
    {
        $this->register_assets();
        $this->enqueue_assets();
    }

    public function register_assets()
    {
        wp_register_style("starter-theme", STARTERTHEME_URL."/assets/dist/css/theme.min.css", [], md5(filemtime((STARTERTHEME_PATH."/assets/dist/css/theme.min.css"))));
        wp_register_script("starter-theme", STARTERTHEME_URL."/assets/dist/js/theme.js", [], md5(filemtime((STARTERTHEME_PATH."/assets/dist/js/theme.js"))), true);
    }
    
    public function enqueue_assets()
    {
        wp_enqueue_style("starter-theme");
        wp_enqueue_script("starter-theme");
    }
}