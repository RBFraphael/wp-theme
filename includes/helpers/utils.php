<?php

use \StoutLogic\AcfBuilder\FieldsBuilder;

function startertheme_render_block($t, $f = [], $r = false)
{
    foreach($f as $k => $v){
        $$k = $v;
    }

    $__t_f = STARTERTHEME_PATH."/templates/blocks/".$t.".php";
    
    if(file_exists($__t_f)){
        ob_start();
        include($__t_f);
        $h = ob_get_contents();
        ob_end_clean();
        
        if($r) {
            return $h;
        }
        echo $h;
    }
}

function startertheme_render_shortcode($t, $attrs = [], $content = "", $r = true)
{
    $__t_f = STARTERTHEME_PATH."/templates/shortcodes/".$t.".php";

    if(file_exists($__t_f)){
        ob_start();
        include($__t_f);
        $h = ob_get_contents();
        ob_end_clean();
        
        if($r) {
            return $h;
        }
        echo $h;
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
