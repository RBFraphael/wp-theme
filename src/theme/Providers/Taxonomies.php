<?php
namespace WpTheme\Providers;

class Taxonomies
{
    static function Init()
    {
        self::Year();
    }

    static function Year()
    {
        $labels = [
            'name' => __("Years", WPTHEME_TEXTDOMAIN),
            'singular_name' => __("Year", WPTHEME_TEXTDOMAIN),
            'search_items' => __("Search years", WPTHEME_TEXTDOMAIN),
            'all_items' => __("All years", WPTHEME_TEXTDOMAIN),
            'parent_item' => __("Parent year", WPTHEME_TEXTDOMAIN),
            'parent_item_colon' => __("Parent year:", WPTHEME_TEXTDOMAIN),
            'edit_item' => __("Edit year", WPTHEME_TEXTDOMAIN),
            'update_item' => __("Update year", WPTHEME_TEXTDOMAIN),
            'add_new_item' => __("Add new year", WPTHEME_TEXTDOMAIN),
            'new_item_name' => __("New year", WPTHEME_TEXTDOMAIN),
            'menu_name' => __("Year", WPTHEME_TEXTDOMAIN),
        ];
        
        $settings = [
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'article_year'],
        ];
        
        register_taxonomy("article_year", ['article'], $settings);
    }
}
