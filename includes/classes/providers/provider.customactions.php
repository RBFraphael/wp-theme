<?php

class Provider_CustomActions
{
    public function custom_code_head_open()
    {
        $code = get_field("head_open", "options");
        echo $code;
    }

    public function custom_code_head_close()
    {
        $code = get_field("head_close", "options");
        echo $code;
    }

    public function custom_code_body_open()
    {
        $code = get_field("body_open", "options");
        echo $code;
    }

    public function custom_code_body_close()
    {
        $code = get_field("body_close", "options");
        echo $code;
    }

    public function desktop_menu()
    {
        echo apply_filters("desktop_menu_filter", startertheme_get_nav_menu_content("header"));
    }

    public function mobile_menu()
    {
        echo apply_filters("mobile_menu_filter", startertheme_get_nav_menu_content("header"));
    }
}