<?php

class Provider_PostTypes 
{
    public function __construct()
    {
        $this->fields = new Provider_Fields();

        $this->example_cpt();
    }

    public function example_cpt()
    {
        $intl = [
            'name' => __("Examples", "starter-theme"),
            'singular_name' => __("Example", "starter-theme"),
            'menu_name' => __("Examples", "starter-theme"),
            'name_admin_bar' => __("Example", "starter-theme"),
            'add_new' => __("Add new", "starter-theme"),
            'add_new_item' => __("Add new example", "starter-theme"),
            'new_item' => __("New example", "starter-theme"),
            'edit_item' => __("Edit example", "starter-theme"),
            'view_item' => __("View example", "starter-theme"),
            'all_items' => __("All examples", "starter-theme"),
            'search_items' => __("Search examples", "starter-theme"),
            'parent_item_colon' => __("Parent example:", "starter-theme"),
            'not_found' => __("No examples found", "starter-theme"),
            'not_found_in_trash' => __("No examples found in trash", "starter-theme"),
            'featured_image' => __("Example cover image", "starter-theme"),
            'set_featured_image' => __("Set cover image", "starter-theme"),
            'remove_featured_image' => __("Remove cover image", "starter-theme"),
            'use_featured_image' => __("Use as cover image", "starter-theme"),
            'archives' => __("Example archives", "starter-theme"),
            'insert_into_item' => __("Insert into example", "starter-theme"),
            'uploaded_to_this_item' => __("Upload to this example", "starter-theme"),
            'filter_items_list' => __("Filter examples list", "starter-theme"),
            'items_list_navigation' => __("Examples list navigation", "starter-theme"),
            'items_list' => __("Examples list", "starter-theme"),
        ];

        $settings = [
            'labels' => $intl,
            'description' => __("Example custom post type", "starter-theme"),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => [
                'slug' => "example-cpt"
            ],
            'capability_type' => "post",
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => [
                "title",
                "editor",
                "author",
                "thumbnail",
                "excerpt",
                "comments"
            ],
            'taxonomies' => [
                "category",
                "example_taxonomy"
            ],
            'show_in_rest' => true
        ];

        register_post_type("example_cpt", $settings);
    }
}