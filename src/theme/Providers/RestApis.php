<?php
namespace WpTheme\Providers;

class RestApis
{    
    static function Init ()
    {
        static::Example();
    }
    
    static function Example ()
    {
        register_rest_route("wptheme/v1", "example", [
            'methods' => ["GET", "POST", "PUT"],
            'callback' => "WpTheme\Callbacks\RestApi::Example",
            'permission_callback' => "__return_true"
        ]);
    }

}
