<?php

use \StoutLogic\AcfBuilder\FieldsBuilder;

class Provider_Fields
{
    public function general_options()
    {
        $fields = new FieldsBuilder("general-options", ['style' => "seamless"]);
        $fields
            ->addImage("favicon", ['label' => __("Site favicon", "starter-theme"), 'return_format' => "id"])
            ->addTrueFalse("enable_barba", ['label' => __("Enable SPA-like website (BarbaJS)", "starter-theme")])
            ->addTrueFalse("enable_loader", ['label' => __("Enable site loader", "starter-theme")])
            ->addImage("loader_image", ['label' => __("Site loader image", "starter-theme"), 'return_format' => "url"])
                ->conditional("enable_loader", "==", "1")
            ->setLocation("options_page", "==", "theme-options-general");
        
        startertheme_register_fields($fields);
    }

    public function header_options()
    {
        $fields = new FieldsBuilder("header-options", ['style' => "seamless"]);
        $fields
            ->addImage("header_logo", ['label' => __("Header logo", "starter-theme"), 'return_format' => "url"])
            ->addImage("mobile_header_logo", ['label' => __("Mobile header logo", "starter-theme"), 'return_format' => "url"])
            ->addImage("drawer_logo", ['label' => __("Mobile drawer logo", "starter-theme"), 'return_format' => "url"])
            ->setLocation("options_page", "==", "theme-options-header");
        
        startertheme_register_fields($fields);
    }

    public function footer_options()
    {
        $fields = new FieldsBuilder("footer-options", ['style' => "seamless"]);
        $fields
            ->addImage("footer_logo", ['label' => __("Footer logo", "starter-theme"), 'return_format' => "url"])
            ->addText("footer_copyright", ['label' => __("Copyright line", "starter-theme")])
            ->addRepeater("footer_social", ['label' => __("Social Networks", "starter-theme")])
                ->addText("label", ['label' => __("Name", "starter-theme")])
                ->addField("icon", "font-awesome", ['label' => __("Icon", "starter-theme")])
                ->addUrl("url", ['label' => __("Link", "starter-theme")])
                ->endRepeater()
            ->setLocation("options_page", "==", "theme-options-footer");
        
        startertheme_register_fields($fields);
    }

    public function additional_code()
    {
        $fields = new FieldsBuilder("additional-code", ['style' => "seamless"]);
        $fields
            ->addTextarea("head_open", ['label' => __("After opening &lt;head&gt;", "starter-theme")])
            ->addTextarea("head_close", ['label' => __("Before closing &lt;/head&gt;", "starter-theme")])
            ->addTextarea("body_open", ['label' => __("After opening &lt;body&gt;", "starter-theme")])
            ->addTextarea("body_close", ['label' => __("Before closing &lt;/body&gt;", "starter-theme")])
            ->setLocation("options_page", "==", "theme-options-additional-code");
        
        startertheme_register_fields($fields);
    }

    public function all_blocks()
    {
        $fields = new FieldsBuilder("all-blocks", ['style' => "seamless"]);
        $fields
            ->addTrueFalse("disabled", ['label' => __("Disable block", "starter-theme")])
            ->setLocation("block", "==", "starter-theme/all");

        startertheme_register_fields($fields);
    }

    public function block_container()
    {
        $fields = new FieldsBuilder("block-container", ['style' => "seamless"]);
        $fields
            ->addTrueFalse("px", ['label' => __("Enable H padding", "starter-theme")])
            ->addTrueFalse("py", ['label' => __("Enable V padding?", "starter-theme")])
            ->setLocation("block", "==", "starter-theme/container");

        startertheme_register_fields($fields);
    }
}