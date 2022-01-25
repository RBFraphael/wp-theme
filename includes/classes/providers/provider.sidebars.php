<?php

class Provider_Sidebars
{
    public function __construct()
    {
        $this->footer_1();
        $this->footer_2();
        $this->footer_3();
    }

    public function footer_1()
    {
        register_sidebar([
            'name' => __("Footer - Section 1", "starter-theme"),
            'id' => "footer-widgets-1"
        ]);
    }

    public function footer_2()
    {
        register_sidebar([
            'name' => __("Footer - Section 2", "starter-theme"),
            'id' => "footer-widgets-2"
        ]);
    }

    public function footer_3()
    {
        register_sidebar([
            'name' => __("Footer - Section 3", "starter-theme"),
            'id' => "footer-widgets-3"
        ]);
    }
}