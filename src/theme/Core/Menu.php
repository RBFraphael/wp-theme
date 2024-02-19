<?php
namespace WpTheme\Core;

class Menu
{
    static function GetContent($menu_location)
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

    static function GetItems($menu_location)
    {
        $menus = get_nav_menu_locations();

        if(isset($menus[$menu_location]) && $menu_data = $menus[$menu_location]){
            $menu_content = wp_get_nav_menu_items($menu_data);
            
            return $menu_content;
        }

        return false;
    }

    static function ShowMenuItem($item, $uppercase = true)
    {
        $icon = carbon_get_nav_menu_item_meta($item->ID, "icon");
        $special = carbon_get_nav_menu_item_meta($item->ID, "special");
        $current_link = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $active = $current_link == $item->url;

        $classes = [];

        if($uppercase){
            $classes[] = "text-uppercase";
        }

        if($special){
            $classes[] = "btn btn-primary";
        }

        if($active){
            $classes[] = "active";
        }

        if($icon){
            ?>
            <a href="<?= $item->url; ?>" target="" class="<?= join(" ", $classes); ?>">
                <img src="<?= wp_get_attachment_image_url($icon); ?>" class="d-inline"> <?= $item->title; ?>
            </a>
            <?php
            
        } else {
            ?>
            <a href="<?= $item->url; ?>" target="" class="<?= join(" ", $classes); ?>">
                <?= $item->title; ?>
            </a>
            <?php
        }
    }
}
