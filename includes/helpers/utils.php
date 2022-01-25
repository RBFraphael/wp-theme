<?php

use \StoutLogic\AcfBuilder\FieldsBuilder;

function startertheme_render_block($template, $fields = [], $return = false)
{
    foreach($fields as $key => $value){
        $$key = $value;
    }

    $__template_file = STARTERTHEME_PATH."/templates/blocks/".$template.".php";
    
    if(file_exists($__template_file)){
        ob_start();
        include($__template_file);
        $html = ob_get_contents();
        ob_end_clean();
        
        if($return) {
            return $html;
        }
        echo $html;
    }
}

function startertheme_render_shortcode($template, $attrs = [], $content = "", $return = true)
{
    $__template_file = STARTERTHEME_PATH."/templates/shortcodes/".$template.".php";

    if(file_exists($__template_file)){
        ob_start();
        include($__template_file);
        $html = ob_get_contents();
        ob_end_clean();
        
        if($return) {
            return $html;
        }
        echo $html;
    }
}

function startertheme_get_nav_menu_content($menu_location)
{
    $menus = get_nav_menu_locations();
    if(isset($menus[$menu_location]) && $menu_data = $menus[$menu_location]){
        $menu_content = wp_nav_menu([
            'menu' => $menu_data,
            'echo' => false
        ]);
        return $menu_content;
    }
    return false;
}

function startertheme_register_fields(FieldsBuilder $fields)
{
    if(function_exists("acf_add_local_field_group")){
        acf_add_local_field_group($fields->build());
    }
}

function startertheme_register_block($arguments)
{
    if(function_exists("acf_register_block_type")){
        acf_register_block_type($arguments);
    } else {
        die("Function acf_register_block_type not found");
    }
}
