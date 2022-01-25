<?php

class Provider_OptionsPages
{
    public function __construct()
    {
        $this->fields = new Provider_Fields();

        $this->options_page();
        $this->general_subpage();
        $this->header_subpage();
        $this->footer_subpage();
        $this->additional_code_subpage();
    }

    public function options_page()
    {
        acf_add_options_page([
            'page_title' => __("Theme options", "starter-theme"),
            'menu_title' => __("Theme options", "starter-theme"),
            'menu_slug' => "theme-options",
            'icon_url' => "dashicons-admin-customizer",
            'update_button' => __("Update settings", "starter-theme")
        ]);
    }

    public function general_subpage()
    {
        acf_add_options_sub_page([
            'page_title' => __("Theme general options", "starter-theme"),
            'menu_title' => __("General", "starter-theme"),
            'menu_slug' => "theme-options-general",
            'parent_slug' => "theme-options",
            'update_button' => __("Update settings", "starter-theme")
        ]);

        $this->fields->general_options();
    }

    public function header_subpage()
    {
        acf_add_options_sub_page([
            'page_title' => __("Header options", "starter-theme"),
            'menu_title' => __("Header", "starter-theme"),
            'menu_slug' => "theme-options-header",
            'parent_slug' => "theme-options",
            'update_button' => __("Update settings", "starter-theme")
        ]);

        $this->fields->header_options();
    }

    public function footer_subpage()
    {
        acf_add_options_sub_page([
            'page_title' => __("Footer options", "starter-theme"),
            'menu_title' => __("Footer", "starter-theme"),
            'menu_slug' => "theme-options-footer",
            'parent_slug' => "theme-options",
            'update_button' => __("Update settings", "starter-theme")
        ]);

        $this->fields->footer_options();
    }

    public function additional_code_subpage()
    {
        acf_add_options_sub_page([
            'page_title' => __("Additional code", "starter-theme"),
            'menu_title' => __("Additional code", "starter-theme"),
            'menu_slug' => "theme-options-additional-code",
            'parent_slug' => "theme-options",
            'update_button' => __("Update settings", "starter-theme")
        ]);

        $this->fields->additional_code();
    }
}