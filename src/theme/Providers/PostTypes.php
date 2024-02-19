<?php
namespace WpTheme\Providers;

class PostTypes
{
    static function Init()
    {
        self::Articles();
    }

    static function Articles()
    {
        $intl = [
            'name' => __("Articles", WPTHEME_TEXTDOMAIN),
            'singular_name' => __("Article", WPTHEME_TEXTDOMAIN),
            'menu_name' => __("Articles", WPTHEME_TEXTDOMAIN),
            'name_admin_bar' => __("Article", WPTHEME_TEXTDOMAIN),
            'add_new' => __("Add new", WPTHEME_TEXTDOMAIN),
            'add_new_item' => __("Add new article", WPTHEME_TEXTDOMAIN),
            'new_item' => __("New articles", WPTHEME_TEXTDOMAIN),
            'edit_item' => __("Edit articles", WPTHEME_TEXTDOMAIN),
            'view_item' => __("View articles", WPTHEME_TEXTDOMAIN),
            'all_items' => __("All articles", WPTHEME_TEXTDOMAIN),
            'search_items' => __("Search articles", WPTHEME_TEXTDOMAIN),
            'parent_item_colon' => __("Parent article:", WPTHEME_TEXTDOMAIN),
            'not_found' => __("No articles found", WPTHEME_TEXTDOMAIN),
            'not_found_in_trash' => __("No articles found in trash", WPTHEME_TEXTDOMAIN),
            'featured_image' => __("Articles cover image", WPTHEME_TEXTDOMAIN),
            'set_featured_image' => __("Set cover image", WPTHEME_TEXTDOMAIN),
            'remove_featured_image' => __("Remove cover image", WPTHEME_TEXTDOMAIN),
            'use_featured_image' => __("Use as cover image", WPTHEME_TEXTDOMAIN),
            'archives' => __("Articles archives", WPTHEME_TEXTDOMAIN),
            'insert_into_item' => __("Insert into article", WPTHEME_TEXTDOMAIN),
            'uploaded_to_this_item' => __("Upload to this article", WPTHEME_TEXTDOMAIN),
            'filter_items_list' => __("Filter article list", WPTHEME_TEXTDOMAIN),
            'items_list_navigation' => __("Articles list navigation", WPTHEME_TEXTDOMAIN),
            'items_list' => __("Scientific Srticles list", WPTHEME_TEXTDOMAIN),
        ];

        $settings = [
            'labels' => $intl,
            'description' => __("Article post type.", WPTHEME_TEXTDOMAIN),
            'public' => false,
            'publicly_queryable' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => false,
            'rewrite' => [
                'slug' => "articles"
            ],
            'capability_type' => "post",
            'has_archive' => false,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => [],
            'taxonomies' => [],
            'show_in_rest' => false
        ];

        register_post_type("article", $settings);
    }
}
