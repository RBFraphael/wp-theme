<?php
namespace WpTheme\Core;

class Render
{
    static function Block($template, $fields, $attrs, $inner_blocks)
    {
        $template_file = WPTHEME_PATH."/views/blocks/".$template.".php";

        if(file_exists($template_file)){
            extract($fields);

            ob_start();
            include($template_file);
            $output = ob_get_contents();
            ob_end_clean();

            echo $output;
        }

        return false;
    }

    static function Shortcode($template_file, $attrs, $content = "", $return = true)
    {
        $template_file = WPTHEME_PATH."/views/shortcodes/".$template_file.".php";

        if(file_exists($template_file)){
            ob_start();
            include($template_file);
            $output = ob_get_contents();
            ob_end_clean();

            if($return){
                return $output;
            }

            echo $output;
        }
    }

    static function Widget($template_file, $args, $instance)
    {
        $template_file = WPTHEME_PATH."/views/widgets/".$template_file.".php";
        if(file_exists($template_file)){
            extract($instance);

            ob_start();
            include($template_file);
            $output = ob_get_contents();
            ob_end_clean();

            echo $output;
        }
    }

    static function AdminPage($template_file, $args = [])
    {
        $template_file = WPTHEME_PATH."/views/admin/".$template_file.".php";
        if(file_exists($template_file)){
            extract($args);
            include($template_file);
        }
    }
}
