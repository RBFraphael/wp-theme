<?php

class Provider_AdminAssets
{
    public function __construct()
    {
        $this->register_assets();
        $this->enqueue_assets();
    }

    public function register_assets()
    {
        wp_register_style("starter-theme-admin", STARTERTHEME_URL."/assets/dist/css/admin.css", [], md5(filemtime((STARTERTHEME_PATH."/assets/dist/css/admin.css"))));
        wp_register_script("starter-theme-admin", STARTERTHEME_URL."/assets/dist/js/admin.js", [], md5(filemtime((STARTERTHEME_PATH."/assets/dist/js/admin.js"))), true);
    }
    
    public function enqueue_assets()
    {
        wp_enqueue_style("starter-theme-admin");
        wp_enqueue_script("starter-theme-admin");
    }
}